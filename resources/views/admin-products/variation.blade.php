@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Poster variations') }}</div>

                <div>
                    <a href="/admin-products"><button>Go back</button></a> <a href="/admin-products/{{$product->id}}/variations/create"><button style="width:150px;">Create new variation</button></a>
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

                @foreach ($variations as $i => $variation)
                    {{ $i + 1 }}
                    <a href="/admin-products/{{$product->id}}/variations/{{$variation->id}}">{{ $variation->orientation->name }} 
                    {{ $variation->size->name }} </a> <br>
                @endforeach 
            </div>
        </div>
    </div>
</div>
@endsection