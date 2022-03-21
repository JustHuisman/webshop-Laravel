@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit products') }}</div>
                <div>
                    <a href="/admin-products">Go back</a> <a href="/logout">Log out</a>
                    <!-- <a href="/admin-products">Products 1-20</a> 
                    <a href="/admin-products?page=2">Products 21-40</a> <a href="/admin-products?page=3">Products 41-56</a>  -->
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('List of products:') }}
                </div>
                @foreach ($products as $product)
                <ul>
                    <a href="/product/{id}">{{ $product->id . '. ' . $product->name }}</a>
                </ul>
                @endforeach
            </div>
            <a href="/products/<?= $product->id ?>/edit">
                                <button>Edit</button>
                            </a>
        </div>
    </div>
</div>
@endsection