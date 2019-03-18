<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function list($action = null, $id = null)
    {
        $statuses = Status::all();

        $status = null;
        if ($action == 'edit') {
            $status = Status::findOrFail($id);
        }

        return view('Status.list', compact('statuses', 'action', 'status'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
            'name'=>'required',
            'is_enable' => 'required',
            'is_displayed' => 'required',
            ]
        );

        $inputs = $request->all();
        $Status = new Status;
        $Status->fill($inputs);
        
        if ($Status->save()) {
            $request->session()->flash('success', '创建处理状态成功');
        } else {
            $request->session()->flash('danger', '创建处理状态失败');
        }

        return redirect()->route('status.list');
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
            'name'=>'required',
            'is_enable' => 'required',
            'is_displayed' => 'required',
            ]
        );

        $inputs = $request->all();
        $Status = Status::findOrFail($id);
        $Status->fill($inputs);
        
        if ($Status->save()) {
            $request->session()->flash('success', '修改处理状态成功');
        } else {
            $request->session()->flash('danger', '修改处理状态失败');
        }

        return back();
    }

    public function delete(Request $request)
    {
        $inputs = $request->input('items');

        Status::destroy($inputs);

        $request->session()->flash('success', '删除处理状态成功');

        return redirect()->route('status.list');
    }
}
