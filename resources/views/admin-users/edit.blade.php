@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit user') }}</div>

                <div>
                    <a href="/admin-users/{{$user->id}}"><button>Go back</button></a> <a href="/logout"><button>Log out</button></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Edit form:') }}
                </div>

                <form method="POST" enctype="multipart/form-data" action="{{ route('admin-users.update', $user->id) }}">
                    @csrf
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @method('PUT')
                    <div class="container mt-3">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="first_name">First Name</label><br>
                                <input type="text" name="first_name" placeholder="First Name" value="{{ isset($user) ? $user->first_name : '' }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="last_name">Last Name</label><br>
                                <input type="text" name="last_name" placeholder="First Name" value="{{ isset($user) ? $user->last_name : '' }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="email">Email</label><br>
                                <input type="email" name="email" placeholder="Email" value="{{ isset($user) ? $user->email : '' }}">
                            </div>
                        </div>

                        <input type="submit" value="Submit">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection