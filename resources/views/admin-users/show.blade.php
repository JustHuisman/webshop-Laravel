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
                   <li> E-mail: {{ $user->email  }} </li>
                   <li> Role: {{ $user->role  }} </li>
                   <li> Name: {{ $user->password  }} </li>
                </ul>
            </div>
            <a href="/admin-users/{{$user->id}}/edit">
                <button>Edit</button>
            </a>

            <a href="/admin-users/{{$user->id}}/destroy">
                <button class="btn btn-danger" style="width:150px;margin-top:0px">Delete user</button>
            </a>
        </div>
    </div>
</div>
@endsection