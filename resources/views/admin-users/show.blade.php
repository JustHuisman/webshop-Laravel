@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Show user') }}</div>

                <div>
                    <a href="/admin-users"><button>Go back</button></a> <a href="/logout"><button>Log out</button></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('User details:') }}
                </div>
                <ul>
                    <li> Name: {{ $user->first_name . ' ' . $user->last_name }} </li>
                    <li> E-mail: {{ $user->email }} </li>
                    <li> Role: {{ $user->roles->name }} </li>
                </ul>
            </div>
            <a href="/admin-users/{{$user->id}}/edit">
                <button>Edit</button>
            </a>
            <form action="{{ route('admin-users.destroy', $user->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit" style="width:150px">Delete user</button>
            </form>
        </div>
    </div>
</div>
@endsection