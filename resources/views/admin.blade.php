@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin') }}</div>

                <div class="card-body">
                    <ul>
                        <li> <a href="/admin-products">Products</a> </li>
                        <li> <a href="/admin-users">Users</a> </li>
                        <li> <a href="/admin-returns">Returns</a> </li>
                    </ul>
                    <br>
                    <a href="/logout">Log out</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
