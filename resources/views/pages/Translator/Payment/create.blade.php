@extends('layouts.default')

@section('title', 'Winny Translator | Registration')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Payment Information</h1>
    </div>

    <div class="container">
        <form method="POST" action="{{ route('payment-translator.store')}}">
            @csrf
            {{-- hidden input for ID translator --}}
            <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{auth()->user()->id}}">

            <div class="form-group ">
                <label for="payment_method">Payment Method</label>
                <input type="text" class="form-control @error('payment_method') is-invalid
                    @enderror" id="payment_method" name="payment_method" value="{{old('payment_method')}}" autofocus>
                @error('payment_method')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group ">
                <label for="account_info">Account Info</label>
                <input type="text" class="form-control @error('account_info') is-invalid
                @enderror" id="account_info" name="account_info" value="{{old('account_info')}}">
                @error('account_info')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-plus-square"></i> Add</button>
            </div>

            {{-- <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="payment_method">Payment Method</label>
                    <input type="text" class="form-control @error('payment_method') is-invalid
                    @enderror" id="payment_method" name="payment_method" value="{{old('payment_method')}}" autofocus>
                    @error('payment_method')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="account_info">Account Info</label>
                    <input type="text" class="form-control @error('account_info') is-invalid
                    @enderror" id="account_info" name="account_info" value="{{old('account_info')}}">
                    @error('account_info')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div> --}}
            {{-- <div class="text-center">
                <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-plus-square"></i> Add</button>
            </div> --}}
        </form>
    </div>

    <hr>
</main>

@endsection