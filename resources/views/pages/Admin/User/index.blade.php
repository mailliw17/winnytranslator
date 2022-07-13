@extends('layouts.default')

@section('title', 'WW World | User Account')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        {{-- <h1 class="h2">Users</h1> --}}

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
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Total Translator : {{$translators->count()}}</h5>
                        </div>
                        <div class="col">
                            <h5 class="card-title">Total Admin : {{$admin->count()}}</h5>
                        </div>
                    </div>
                    {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    --}}
                    <a href="{{ route('register')}}" class="btn btn-success "> <i class="bi bi-plus-square-dotted"></i>
                        Create New</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session()->has('success-edit'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success-edit')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session()->has('success-update-password'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success-update-password')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>

    {{-- table for translators --}}
    <hr>
    <h2 class="text-center text-light bg-dark">Translator</h1>
        <div class="table-responsive">
            <table class="table table-striped table-sm myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($translators as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>
                            <a href="{{route('users.show', $user->id)}}" class="btn btn-sm btn-primary"><i
                                    class="bi bi-info-square"></i> Info</a>

                            {{-- <form action="{{route('users.destroy', $user->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')

                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i> Delete</button>
                            </form> --}}

                            <a href="{{route('forgot-password', $user->id)}}" class="btn btn-sm btn-warning"><i
                                    class="bi bi-lock"> </i> Password</a>


                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center p-5">
                            Data tidak tersedia
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- table for admin --}}
        <hr>
        <h2 class="text-center text-light bg-dark">Admin</h1>
            <div class="table-responsive">
                <table class="table table-striped table-sm myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($admin as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                @if (auth()->user()->id == $user->id)
                                <p>No Action</p>
                                @else
                                <a href="{{route('users.show', $user->id)}}" class="btn btn-sm btn-primary"><i
                                        class="bi bi-info-square"></i> Info</a>

                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-warning"><i
                                        class="bi bi-lock"> </i> Password</a>
                                @endif

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center p-5">
                                Data tidak tersedia
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
</main>

@endsection