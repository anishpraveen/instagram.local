@extends('layouts.admin')
@section('content')

<div class="container">
    <ul>
        
    @foreach ($userList as $user)
        <li>{{ $user->name }}</li>
    @endforeach

    </ul>
</div>
{{ $userList->links() }}
@endsection