<?php /**
 * @var \App\Models\User[] $users
 */ ?>

@extends('_template')

@section('body')

    <ul>
        <li><a href="?show-admin=1">Filter Admins</a></li>
        <li><a href="?show-user=1">Filter Users</a></li>
        <li><a href="?show-admin=1&show-user=1">Filter Both</a></li>
        <li><a href="?">Show All</a></li>
    </ul>

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Admin</th>
            <th>User</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->hasPermission(\App\Models\GroupPermissionType::ADMIN) ? 'YES' : 'NO' }}</td>
                <td>{{ $user->hasPermission(\App\Models\GroupPermissionType::USER) ? 'YES' : 'NO' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
