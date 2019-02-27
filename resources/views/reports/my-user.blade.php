@extends('layouts.app')

@section('content')
    <h1>Listagem de usuários</h1>
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
