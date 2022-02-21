@extends('templates.main')

@section('content')
    <h1>Edit User</h1>

    <div class="card">
        <form method="POST" action="{{route('super-admin.users.update', $user->id)}}">
            @method('PATCH')
            @include('super-admin.users.parts.form')
        </form>
    </div>
@endsection

