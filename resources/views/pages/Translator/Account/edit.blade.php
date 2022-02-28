@extends('layouts.default')

@section('title', 'Winny Translator | Registration')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data</h1>
    </div>

    <div class="container">
        <form method="POST" action="{{ route('account-translator.update', $user->id)}}">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" autocomplete="off" class="form-control @error('name') is-invalid
                    @enderror" id="name" name="name" value="{{old('name') ? old('name') : $user->name }}" autofocus>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="username">Username</label>
                    <input type="text" autocomplete="off" class="form-control @error('username') is-invalid
                    @enderror" id="username" name="username"
                        value="{{old('username') ? old('username') : $user->username }}">
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" autocomplete="off" class="form-control @error('email') is-invalid
                    @enderror" id="email" name="email" value="{{old('email') ? old('email') : $user->email }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="number" autocomplete="off" class="form-control @error('phone') is-invalid
                    @enderror" id="phone" name="phone" value="{{old('phone') ? old('phone') : $user->phone }}">
                    @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group">

            </div>
            <button type="submit" class="btn btn-block btn-sm btn-primary">Save</button>
        </form>
    </div>

    <hr>
</main>

@endsection