<?php /**
 * @var \App\Models\User[] $users
 */ ?>

@extends('_template')

@section('body')

    @foreach ($errors->all() as $message)
        <div class="alert alert-danger">{{ $message }}</div>
    @endforeach

    @if (Session::has('sample02-success'))
        <div class="alert alert-success">{{ Session::get('sample02-success') }}</div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Length</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>
                    <a href="#" class="sample02-check" data-id="{{ $user->id }}">{{ $user->name }}</a>
                </td>
                <td>{{ $user->email }}</td>
                <td>{{ strlen($user->name) }}</td>
                <td>
                    <form method="post" action="/sample02">
                        {{ csrf_field() }}
                        <input type="hidden" name="user" value="{{ $user->id }}"/>
                        <button type="submit" class="btn btn-sm btn-primary">Check</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
