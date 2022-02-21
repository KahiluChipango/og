@extends('templates.main')

@section('content')
    <h1>Create New User</h1>

    <div class="card">
        <form method="POST" action="{{route('super-admin.users.store')}}">

            @include('super-admin.users.parts.form', ['create'=> true])
        </form>
    </div>
@endsection

