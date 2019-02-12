<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Type;
use App\Department;
use Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['create', 'store']);
    }

    public function list()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        $types = Type::all();
        $departments = Department::all();

        return view('order.list', compact('orders', 'types', 'departments'));
    }

    public function create()
    {
        $types = Type::all();
        $departments = Department::all();

        return view('order.create', compact('types', 'departments'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
            'type_id' => 'required',
            'department_id' => 'required',
            'address' => 'required',
            'applicant' => 'required',
            'description' => 'required',
            'fault' => 'image',
            ]
        );

        $inputs = $request->all();
        $order = new Order;
        $order->fill($inputs);
        $order->id = date('YmdHis') . random_int(100, 999);
        $order->pathname = $request->file('fault')->store('faults');
        
        if ($order->save()) {
            $request->session()->flash('success', '系统报修成功');
        } else {
            $request->session()->flash('danger', '系统报修失败');
        }

        return redirect()->route('order.create');
    }

    public function edit($id)
    {
        $types = Type::all();
        $departments = Department::all();
        $order = Order::findOrFail($id);

        return view('order.edit', compact('order', 'types', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'type_id'=>'required',
                'department_id'=>'required',
                'address'=>'required',
                'applicant'=>'required',
                'description'=>'required',
            ]
        );

        $inputs = $request->all();
        $order = Order::findOrFail($id);
        $order->fill($inputs);
        
        if ($order->save()) {
            $request->session()->flash('success', '修改工单成功');
        } else {
            $request->session()->flash('danger', '修改工单失败');
        }

        return back();
    }

    public function delete(Request $request)
    {
        $inputs = $request->input('items');

        Order::destroy($inputs);

        $request->session()->flash('success', '删除工单成功');

        return redirect()->route('order.list');
    }

    public function status(Request $request, $id)
    {
        if ($request->isMethod('put')) {
            $order = Order::findOrFail($id);
            $order->status = $request->input('status');

            if ($order->status == 1) {
                $order->user_id = Auth::user()->id;
                $order->finished_at = date('Y-m-d H:i:s');
            } else {
                $order->user_id = null;
                $order->finished_at = null;
            }

            if ($order->save()) {
                $request->session()->flash('success', '修改维修状态成功');
            } else {
                $request->session()->flash('danger', '修改维修状态失败');
            }

            return redirect()->route('order.list');
        }
    }
}
