@extends('layouts.default')

@section('title', 'Winny Translator | Profile')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome, {{ auth()->user()->name }}</h1>

        <div class="btn-toolbar mb-2 mb-md-0">
            {{-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button> --}}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">My Account</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name : {{auth()->user()->name}}</li>
                        <li class="list-group-item">Username : {{auth()->user()->username}}</li>
                        <li class="list-group-item">Email : {{auth()->user()->email}}</li>
                        <li class="list-group-item">Phone : {{auth()->user()->phone}}</li>
                        {{-- <li class="list-group-item">Created At : {{auth()->user()->created_at}}</li> --}}
                    </ul>
                    {{-- <div class="text-right">
                        <a href="{{route('account-translator.edit', auth()->user()->id)}}" class="btn btn-primary"><i
                                class="bi bi-pencil-square"></i> Edit</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</main>

@endsection