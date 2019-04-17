<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ipaddress;
use Auth;

class IpaddressController extends Controller
{
    public function list($action = null, $id = null)
    {
        $ipaddresses = Ipaddress::orderBy('ip')->get();

        $ipaddress = null;
        if ($action == 'edit') {
            $ipaddress = Ipaddress::findOrFail($id);
        }

        return view('ipaddress.list', compact('ipaddresses', 'action', 'ipaddress'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request, [
            'ip' => 'required'
            ]
        );

        $inputs = $request->all();
        $ipaddress = new Ipaddress;
        $ipaddress->fill($inputs);
        $ipaddress->user_id = Auth::user()->id;
        
        if ($ipaddress->save()) {
            $request->session()->flash('success', '创建IP地址成功');
        }else {
            $request->session()->flash('danger', '创建IP地址失败');
        }

        return redirect()->route('ipaddress.list');
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request, [
            'ip' => 'required',
            ]
        );

        $inputs = $request->all();
        $ipaddress = Ipaddress::findOrFail($id);
        $ipaddress->fill($inputs);
        $ipaddress->user_id = Auth::user()->id;
        
        if ($ipaddress->save()) {
            $request->session()->flash('success', '修改IP地址成功');
        }else {
            $request->session()->flash('danger', '修改IP地址失败');
        }

        return back();
    }

    public function delete(Request $request)
    {
        $inputs = $request->input('items');

        Ipaddress::destroy($inputs);

        $request->session()->flash('success', '删除IP地址成功');

        return redirect()->route('ipaddress.list');
    }
}
