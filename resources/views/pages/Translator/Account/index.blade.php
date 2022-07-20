@extends('layouts.default')

@section('title', 'WW World | Detail Account')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Account Info</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="">
                    <div class="card-header">
                        PERSONAL DATA
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name : {{$user->name}}</li>
                        <li class="list-group-item">Username : {{$user->username}}</li>
                        <li class="list-group-item">Email : {{$user->email}}</li>
                        <li class="list-group-item">Phone : {{$user->phone}}</li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="card" style="">
                    <div class="card-header">
                        PAYMENT DATA
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Price : {{$user->price}}¥ / 1000 words</li>
                        <li class="list-group-item">Method : {{$user->payment_method}}</li>
                        <li class="list-group-item">Account info : {{$user->account_info}}</li>
                        <li class="list-group-item">Account name : {{$user->account_name}}</li>
                        <li class="list-group-item">Payment Period : {{($user->payment_period == 'M') ? 'Monthly' :
                            'Weekly'}}</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <hr>
</main>

@endsection