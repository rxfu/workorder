<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    public function list($action = null, $id = null)
    {
        $departments = Department::all();

        $department = null;
        if ($action == 'edit') {
            $department = Department::findOrFail($id);
        }

        return view('department.list', compact('departments', 'action', 'department'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request, [
            'name'=>'required'
            ]
        );

        $inputs = $request->all();
        $department = new Department;
        $department->fill($inputs);
        
        if ($department->save()) {
            $request->session()->flash('success', '创建部门成功');
        }else {
            $request->session()->flash('danger', '创建部门失败');
        }

        return redirect()->route('department.list');
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request, [
            'name'=>'required',
            ]
        );

        $inputs = $request->all();
        $department = Department::findOrFail($id);
        $department->fill($inputs);
        
        if ($department->save()) {
            $request->session()->flash('success', '修改部门成功');
        }else {
            $request->session()->flash('danger', '修改部门失败');
        }

        return back();
    }

    public function delete(Request $request)
    {
        $inputs = $request->input('items');

        Department::destroy($inputs);

        $request->session()->flash('success', '删除部门成功');

        return redirect()->route('department.list');
    }
}
