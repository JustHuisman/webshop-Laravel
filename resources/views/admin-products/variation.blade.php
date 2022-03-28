@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Poster variations') }}</div>

                <div>
                    <a href="/admin-products"><button>Go back</button></a> <a href="/admin-products/create-variation"><button>Create new variation</button></a>
                    <a href="/logout"><button>Log out</button></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Choose a variation:') }}
                </div>

                @foreach ($variations as $variation)
                          {{ $variation->id }}
                @endforeach
                
            </div>
            <a href="/admin-products/{{$product->id}}./{{$product->variation}}">
                <button>Next</button>
            </a>

            <!-- <a href="/admin-products/{{$product->id}}/destroy"> -->
                <button class="btn btn-danger">Delete</button>
            </a>
        </div>
    </div>
</div>
@endsection