@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Users') }}</div>
                <div>
                    <a href="/admin"><button>Go back</button></a> <a href="/admin-users/create"><button style="width:150px;">Create new user</button></a>
                    <a href="/logout"><button>Log out</button></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('List of users:') }}
                    <ul class="pagination">
                        <li><a href="?page=1"><button>First 10</button></a></li>
                        <li class="@if ($page <= 1) 
                                        {{ 'disabled' }}
                                     @endif">
                            <a href="@if ($page <= 1) 
                                            {{ '#' }}
                                         @else 
                                            {{ "?page=" . ($page - 1) }}
                                         @endif"><button>Previous 10</button></a>
                        </li>
                        <li class="@if ($page >= $lastpage) 
                                        {{ 'disabled' }}
                                     @endif">
                            <a href="@if ($page >= $lastpage) 
                                            {{ '#' }}
                                         @else 
                                            {{ "?page=" . ($page + 1) }}
                                         @endif"><button>Next 10</button></a>
                        </li>
                        <li><a href="?page={{$lastpage}}"><button>Last 10</button></a></li>
                    </ul>
                </div>
                @foreach ($users as $user)
                <ul>
                {{ $user->id }} <a href="/admin-users/{{$user->id}}">{{ $user->first_name . ' ' . $user->last_name }}</a>
                </ul>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection