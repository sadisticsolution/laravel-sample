<?php

namespace App\Http\Controllers;

use App\Models\GroupPermissionType;
use App\Models\User;
use Illuminate\Http\Request;

class Sample01Controller extends Controller
{

    public function index(Request $request)
    {
        $query = User::query()->with('groups.permissions');

        if ($showAdmin = $request->get('show-admin'))
            $query->whereHasPermission(GroupPermissionType::ADMIN);

        if ($showUser = $request->get('show-user'))
            $query->whereHasPermission(GroupPermissionType::USER);

        $users = $query->get();

        return view('sample01.index', compact('users', 'showAdmin', 'showUser'));
    }

}
