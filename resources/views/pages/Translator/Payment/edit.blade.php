@extends('layouts.default')

@section('title', 'Winny Translator | Registration')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Payment Information</h1>
    </div>

    <div class="container">
        <form method="POST" action="{{ route('payment-translator.update', $user->id)}}">
            @method('PUT')
            @csrf
            {{-- hidden input for ID translator --}}
            {{-- <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{$user[0]->user_id}}">
            --}}

            <div class="form-group ">
                <label for="payment_method">Payment Method</label>

                <select class="form-control  @error('payment_method') is-invalid
                @enderror" id="payment_method" name="payment_method"
                    value="{{old('payment_method') ? old('payment_method') : $user->payment_method }}">
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

            <div class="form-group ">
                <label for="account_info">Account Number</label>
                <input type="text" class="form-control @error('account_info') is-invalid
                @enderror" id="account_info" name="account_info" autocomplete="off"
                    value="{{old('account_info') ? old('account_info') : $user->account_info }}">
                @error('account_info')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group ">
                <label for="account_info">Account Name</label>
                <input type="text" class="form-control @error('account_name') is-invalid
                @enderror" id="account_name" name="account_name" autocomplete="off"
                    value="{{old('account_name') ? old('account_name') : $user->account_name }}">
                @error('account_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-sm btn-primary"> Save</button>
            </div>


        </form>
    </div>

    <hr>
</main>

@endsection