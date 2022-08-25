<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class Sample02Controller extends Controller
{

    public function index(Request $request)
    {
        $users = User::all();

        return view('sample02.index', compact('users'));
    }

    public function postCheck(Request $request, Session $session)
    {
        $data = $request->validate([
            'user' => 'required|UserIsOdd',
        ]);

        $session->flash('sample02-success', "User:{$data['user']} is odd.");

        return redirect('/sample02');
    }

}
