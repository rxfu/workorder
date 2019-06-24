<?php

namespace App\Http\Controllers;

use App\Type;
use App\User;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function list() {
        $users = User::where('id', '<>', 1)->get();
        $types = Type::with('orders')->get();

        return view('statistics.list', compact('types', 'users'));
    }
}
