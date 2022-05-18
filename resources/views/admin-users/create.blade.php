@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create new user') }}</div>

                <div>
                    <a href="/admin-users"><button>Go back</button></a> <a href="/logout"><button>Log out</button></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Create form:') }}
                </div>

                <form method="POST" enctype="multipart/form-data" action="{{ route('admin-users.store') }}">
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
                    <div class="container mt-5">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="text" name="first_name" placeholder="First name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="text" name="last_name" placeholder="Last name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="email" name="email" placeholder="E-mail">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="password" name="password" placeholder="Password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="role">User role</label><br>
                                <select class="form-group" name="role">
                                    <option value=1>Admin</option>
                                    <option value=2>Customer</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="text" name="company_name" placeholder="Company name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="tel" name="phone_number" placeholder="Phone number">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="text" name="address" placeholder="Address">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="text" name="postal_code" placeholder="Postal code">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="text" name="city" placeholder="City">
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