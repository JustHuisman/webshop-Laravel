@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Show product') }}</div>

                <div>
                    <a href="/admin-products/{{$product->id}}"><button>Go back</button></a> <a href="/logout"><button>Log out</button></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Product details:') }}
                </div>
                <ul>
                   <li> Name: {{ $product->name }} </li>
                   <li> <img src="{{URL::asset('/images/posters/'.$orientation.'/').'/'.$product->id.'.jpg'}}"
                   alt="{{$product->name}}" height="200" width="200"> </li>
                   <li> Stock: {{ $variation->stock }} </li>
                </ul>
            </div>
            <a href="/admin-products/{{$product->id}}/variations/{{$variation->id}}/edit">
                <button>Edit</button>
            </a>

            <a href="/admin-products/{{$product->id}}/variations/{{$variation->id}}/destroy">
                <button class="btn btn-danger" style="width:150px;margin-top:0px">Delete variation</button>
            </a>
            <a href="/admin-products/{{$product->id}}/destroy">
                <button class="btn btn-danger" style="width:150px;margin-top:0px">Delete product</button>
            </a>
        </div>
    </div>
</div>
@endsection