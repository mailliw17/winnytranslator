@extends('layouts.default')

@section('title', 'WW World | Forgot Password')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Forgot Password</h1>
    </div>

    <div class="container">
        <form method="POST" action="{{ route('update-password', $user->id)}}">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="newpassword">New Password</label>
                    <input type="password" class="form-control @error('newpassword') is-invalid
                    @enderror" id="newpassword" name="newpassword" autofocus>
                    @error('newpassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="password_confirmation">Re-type New Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid
                    @enderror" id="password_confirmation" name="password_confirmation">
                    @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group">

            </div>
            <button type="submit" class="btn btn-block btn-sm btn-primary">Submit</button>
        </form>
    </div>

    <hr>
</main>

@endsection