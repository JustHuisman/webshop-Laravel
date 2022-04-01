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
                    @method('PUT')
                    <div class="container mt-3">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="name">Name</label><br>
                                <input type="text" name="name" required placeholder="Name" value="{{ isset($product) ? $product->name : '' }}">
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
                                <label for="stock">Stock</label><br>
                                <input type="number" name="stock" required min="0" placeholder="Stock" value="{{ isset($product) ? $variation->stock : '' }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="vat">Vat type</label><br>
                                <input type="radio" name="vat_id" value="1" {{ ($product->vat_id=="1")? "checked" : "" }}>General rate</label>
                                <input type="radio" name="vat_id" value="2" {{ ($product->vat_id=="2")? "checked" : "" }}>Low rate</label>
                                <input type="radio" name="vat_id" value="3" {{ ($product->vat_id=="3")? "checked" : "" }}>Exemption</label>
                            </div>
                        </div>

                        Categories
                        @foreach( $categories as $category)
                        <li>
                            <input type="checkbox" name="category_id[]" value="{{ $category->id }}" id="{{ $category->id }}" {{ in_array($category->id, $productCategories) ? 'checked' : '' }}>
                            <label for="{{ $category->id }}">{{ $category->name}}</label>
                        </li>
                        @endforeach

                        <input type="submit" value="Submit">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection