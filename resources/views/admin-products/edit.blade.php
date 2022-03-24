@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit product') }}</div>

                <div>
                    <a href="/admin-products/{{$product->id}}"><button>Go back</button></a> <a href="/logout"><button>Log out</button></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Edit form:') }}
                </div>
                <form method="{{ $method }}" enctype="multipart/form-data" action="{{ $action }}">
                @csrf
                    <div class="container mt-5">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="text" name="name" placeholder="Name" value="{{ isset($product) ? $product->name : '' }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="file" name="image" placeholder="Image" value="{{ isset($product) ? $product->id . '.jpg' : '' }}">
                                Current image: <img src="{{URL::asset('/images/posters/portrait/').'/'.$product->id.'.jpg'}}" alt="{{$product->name}}" height="50" width="50">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="text" name="stock" placeholder="Stock" value="{{ isset($product) ? $product->variations[0]->stock : '' }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="text" name="price" placeholder="Price" value="{{ isset($product) ? $product->variations[0]->size->price  : '' }}">
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