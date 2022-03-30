@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create new variation') }}</div>

                <div>
                    <a href="/admin-products/{{$product->id}}"><button>Go back</button></a> <a href="/logout"><button>Log out</button></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Create form for product:') }}
                    {{$product->name}}
                </div>

                <form method="{{ $method }}" enctype="multipart/form-data" action="{{ $action }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="row mb-3">
                            <div class="col-md-4">
                            <label for="image">Image</label><br>
                                <input type="file" name="image" placeholder="Image">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="number" name="stock" required placeholder="Stock">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                            <label for="orientation">Orientation</label><br>
                                <select class="form-group" name="orientation_id">
                                    <option value=1>Landscape</option>
                                    <option value=2>Portrait</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                            <label for="size">Size</label><br>
                                <select class="form-group" name="size_id">
                                    <option value=1>Large</option>
                                    <option value=2>Medium</option>
                                    <option value=3>Small</option>
                                </select>
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