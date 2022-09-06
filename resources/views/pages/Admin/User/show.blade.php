@extends('layouts.default')

@section('title', 'WW World | Detail Account')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h3>Detail User</h3>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{asset('/img/damir-bosnjak.jpg')}}" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="{{asset('/img/default-avatar.png')}}" alt="...">
                                <h5 class="title">{{$user->name}}</h5>
                            </a>
                            <p class="description">
                                {{$user->email}}
                            </p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="button-container">
                            <div class="row">
                                <div class=" col-md-6 ml-auto mr-auto">
                                    <h5>{{$user->phone}}<br><small>Phone</small></h5>
                                </div>
                                <div class=" col-md-6 ml-auto mr-auto">
                                    <h5>{{$user->username}}<br><small>Username</small></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Payment Data</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled team-members">
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <p>Price</p>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        {{$user->price}}¥
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <p>Method</p>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        {{$user->payment_method}}
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <p>Account Info</p>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        {{$user->account_info}}
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <p>Account Name</p>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        {{$user->account_name}}
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <p>Payment Period</p>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        {{($user->payment_period == 'M') ? 'Monthly' :
                                        'Weekly'}}
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="text-right">
                            <a class="btn btn-sm btn-warning" href="{{route('users.edit', $user->id)}}">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                            <form action="{{route('users.destroy', $user->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')

                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection