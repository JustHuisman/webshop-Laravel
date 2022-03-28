@extends('layouts.app')

@section('content')
<div id="app">
    <!-- WRAPPER CONTAINER WITH PRODUCT FILTERS AND PRODUCTS. -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <!-- PRODUCT FILTERS -->
                <product-filters></product-filters>
                <div>
                    <div class="form-check">
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
                <!-- PRODUCTS CONTAINER -->
                <div class="container" style="margin-top:30px">
                    <products></products>  
                </div>
                
                <product-display>
            </div>
        </div>
    </div>
</div>
@endsection