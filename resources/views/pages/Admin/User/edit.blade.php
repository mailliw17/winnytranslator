@extends('layouts.default')

@section('title', 'WW World | Edit Account')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data</h1>
    </div>

    <div class="container">
        <form method="POST" action="{{ route('users.update', $user->id)}}">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" id="id" value="{{$user->id}}">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid
                    @enderror" id="name" name="name" value="{{old('name') ? old('name') : $user->name }}" autofocus>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="username">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid
                    @enderror" id="username" name="username"
                        value="{{old('username') ? old('username') : $user->username }}" readonly>
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
                    <input type="email" class="form-control @error('email') is-invalid
                    @enderror" id="email" name="email" value="{{old('email') ? old('email') : $user->email }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control @error('phone') is-invalid
                    @enderror" id="phone" name="phone" value="{{old('phone') ? old('phone') : $user->phone }}">
                    @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                {{-- <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid
                    @enderror" id="password" name="password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div> --}}
                <div class="form-group col-md-6">
                    <label for="role">Role</label>
                    <select class="form-control @error('role') is-invalid
                    @enderror" id="role" name="role" value={{old('role') ? old('role') : $user->role }}>
                        <option value=1>Admin</option>
                        <option value=2>Translator</option>
                    </select>
                    @error('role')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <hr>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="payment_method">Payment Method</label>

                    <select class="form-control  @error('payment_method') is-invalid
                @enderror" id="payment_method" name="payment_method"
                        value="{{old('payment_method') ? old('payment_method') : $user->payment_method }}" autofocus>
                        <option selected disabled>--FILL THIS INPUT--</option>
                        <option value="Wepay">Wepay</option>
                        <option value="Alipay">Alipay</option>
                        <option value="BCA">BCA</option>
                    </select>

                    @error('payment_method')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="account_info">Account Number</label>
                    <input type="text" class="form-control @error('account_info') is-invalid
                @enderror" id="account_info" name="account_info"
                        value="{{old('account_info') ? old('account_info') : $user->account_info }}" autocomplete="off">
                    @error('account_info')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="account_info">Account Name</label>
                    <input type="text" class="form-control @error('account_name') is-invalid
                @enderror" id="account_name" name="account_name"
                        value="{{old('account_name') ? old('account_name') : $user->account_name }}" autocomplete="off">
                    @error('account_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="account_info">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid
                @enderror" id="price" name="price" value="{{old('price') ? old('price') : $user->price }}"
                        autocomplete="off">
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-block btn-sm btn-primary">Save</button>
        </form>

    </div>

    <hr>
</main>

@endsection