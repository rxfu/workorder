<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller
{
    public function list($action = null, $id = null)
    {
        $types = Type::all();

        $type = null;
        if ($action == 'edit') {
            $type = Type::findOrFail($id);
        }

        return view('type.list', compact('types', 'action', 'type'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request, [
            'name'=>'required'
            ]
        );

        $inputs = $request->all();
        $type = new Type;
        $type->fill($inputs);
        
        if ($type->save()) {
            $request->session()->flash('success', '创建维修种类成功');
        }else {
            $request->session()->flash('danger', '创建维修种类失败');
        }

        return redirect()->route('type.list');
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request, [
            'name'=>'required',
            ]
        );

        $inputs = $request->all();
        $type = Type::findOrFail($id);
        $type->fill($inputs);
        
        if ($type->save()) {
            $request->session()->flash('success', '修改维修种类成功');
        }else {
            $request->session()->flash('danger', '修改维修种类失败');
        }

        return back();
    }

    public function delete(Request $request)
    {
        $inputs = $request->input('items');

        Type::destroy($inputs);

        $request->session()->flash('success', '删除维修种类成功');

        return redirect()->route('type.list');
    }
}
