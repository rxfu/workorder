<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function list($action = null, $id = null)
    {
        $projects = Project::all();

        $project = null;
        if ($action == 'edit') {
            $project = Project::findOrFail($id);
        }

        return view('project.list', compact('projects', 'action', 'project'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
            'name'=>'required'
            ]
        );

        $inputs = $request->all();
        $project = new Project;
        $project->fill($inputs);
        
        if ($project->save()) {
            $request->session()->flash('success', '创建项目成功');
        } else {
            $request->session()->flash('danger', '创建项目失败');
        }

        return redirect()->route('project.list');
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
            'name'=>'required',
            ]
        );

        $inputs = $request->all();
        $project = Project::findOrFail($id);
        $project->fill($inputs);
        
        if ($project->save()) {
            $request->session()->flash('success', '修改项目成功');
        } else {
            $request->session()->flash('danger', '修改项目失败');
        }

        return back();
    }

    public function delete(Request $request)
    {
        $inputs = $request->input('items');

        Project::destroy($inputs);

        $request->session()->flash('success', '删除项目成功');

        return redirect()->route('project.list');
    }
}
