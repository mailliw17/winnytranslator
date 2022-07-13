@extends('layouts.default')

@section('title', 'WW World | Edit Payroll Acc')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Payroll Account</h1>
    </div>

    <div class="container">
        <form method="POST" action="{{ route('payments.update', $user->id)}}">
            @method('PUT')
            @csrf
            {{-- hidden input for ID translator --}}
            {{-- <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{$user[0]->user_id}}">
            --}}
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="payment_method">Payment Method</label>
                    <input type="text" class="form-control @error('payment_method') is-invalid
                    @enderror" id="payment_method" name="payment_method"
                        value="{{old('payment_method') ? old('payment_method') : $user->payment_method }}"
                        autocomplete="off" autofocus>
                    @error('payment_method')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="account_info">Account Info</label>
                    <input type="text" class="form-control @error('account_info') is-invalid
                @enderror" id="account_info" name="account_info" autocomplete="off"
                        value="{{old('account_info') ? old('account_info') : $user->account_info }}">
                    @error('account_info')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="price">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid
                @enderror" id="price" name="price" autocomplete="off"
                        value="{{old('price') ? old('price') : $user->price }}">
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-sm btn-primary"> Save</button>
    </div>
    </form>
    </div>

    <hr>
</main>

@endsection