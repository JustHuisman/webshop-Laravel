@extends('layouts.app')

@section('content')
    <!-- WRAPPER CONTAINER WITH PRODUCT FILTERS AND PRODUCTS. -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <!-- PRODUCT FILTERS -->
                <product-filters></product-filters>
                <div>
                    <div class="form-check">
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                
                <!-- PRODUCTS CONTAINER -->
                <div class="container" style="margin-top:30px">
                    <products></products>  
                </div>
                
                <product-display>
            </div>
        </div>
    </div>
@endsection