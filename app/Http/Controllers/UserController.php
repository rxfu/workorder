<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function password()
    {
        return view('auth.passwords.change');
    }

    public function change(Request $request)
    {
        $this->validate(
            $request,
            [
            'old_password'          => 'required',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            ]
        );

        list($old, $password, $confirm) = array_values($request->only('old_password', 'password', 'password_confirmation'));

        $user = $request->user();
        if (Auth::attempt(['username' => $user->username, 'password' => $old])) {
            if ($password === $confirm && mb_strlen($password) >= 6) {
                $user->password = $password;
                $user->save();

                $request->session()->flash('success', '修改密码成功');
                return back();
            }
        }

        $request->session()->flash('danger', '修改密码失败');
        return back();
    }

    public function list($action = null, $id = null)
    {
        $users = User::all();

        $user = null;
        if ($action == 'edit') {
            $user = User::findOrFail($id);
        }

        return view('user.list', compact('users', 'action', 'user'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
            'username'=>'required',
            'password'=>'required|min:6',
            'realname'=>'required'
            ]
        );

        $inputs = $request->all();
        $user = new User;
        $user->fill($inputs);
        
        if ($user->save()) {
            $request->session()->flash('success', '创建用户成功');
        } else {
            $request->session()->flash('danger', '创建用户失败');
        }

        return redirect()->route('user.list');
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
            'username'=>'required',
            'realname'=>'required'
            ]
        );

        $inputs = $request->all();
        $user = User::findOrFail($id);
        $user->fill($inputs);
        
        if ($user->save()) {
            $request->session()->flash('success', '修改用户成功');
        } else {
            $request->session()->flash('danger', '修改用户失败');
        }

        return back();
    }

    public function delete(Request $request)
    {
        $inputs = $request->input('items');

        User::destroy($inputs);

        $request->session()->flash('success', '删除用户成功');

        return redirect()->route('user.list');
    }

    public function reset(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->password = '123456';

        if ($user->save()) {
            $request->session()->flash('success', '重置用户密码成功');
        } else {
            $request->session()->flash('danger', '重置用户密码失败');
        }

        return back();
    }
}
