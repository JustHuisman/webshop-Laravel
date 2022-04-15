@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create new product') }}</div>

                <div>
                    <a href="/admin-products"><button>Go back</button></a> <a href="/logout"><button>Log out</button></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Create form:') }}
                </div>

                <form method="{{ $method }}" enctype="multipart/form-data" action="{{ $action }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="container mt-5">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="text" name="name" required placeholder="Name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                            <label for="image">Image</label><br>
                                <livewire:upload-photo />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="number" name="stock" required min="0" placeholder="Stock">
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

                        <div class="row mb-3">
                            <div class="col-md-4">
                            <label for="vat">Vat type</label><br>
                                <select class="form-group" name="vat_id">
                                    <option value=1>General rate</option>
                                    <option value=2>Low rate</option>
                                    <option value=3>Exemption</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                            <label for="category">Categories (Hold ctrl for multiple!)</label><br>
                                <select class="form-group" name="category_id[]" required multiple>
                                    <option value=1>Sunset</option>
                                    <option value=2>Animals</option>
                                    <option value=3>Nature</option>
                                    <option value=4>Space</option>
                                    <option value=5>Sky</option>
                                    <option value=6>Skyline</option>
                                    <option value=7>City</option>
                                    <option value=8>Holiday</option>
                                    <option value=9>Beach</option>
                                    <option value=10>Mountain</option>
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