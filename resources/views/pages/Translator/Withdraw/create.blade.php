@extends('layouts.default')

@section('title', 'Winny Translator | Registration')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Confirmation</h1>
    </div>
    <p style="color: red">*Please Read Carefully</p>

    <div class="container">
        <form method="POST" action="{{ route('withdraw-translator.store')}}">
            @csrf
            {{-- hidden input for ID translator --}}

            <input type="hidden" class="form-control" id="status" name="status" value="0">
            <input type="hidden" class="form-control" id="user_payment_id" name="user_payment_id"
                value="{{$info_user_payment[0]->id}}">


            <div class="form-group ">
                <label for="payment_method">Payment Method</label>
                <input type="text" class="form-control" id="payment_method" name="payment_method"
                    value="{{$info_user_payment[0]->payment_method}}" readonly>
            </div>

            <div class="form-group ">
                <label for="payment_method">Account Info</label>
                <input type="text" class="form-control" id="account_info" name="account_info"
                    value="{{$info_user_payment[0]->account_info}}" readonly>
            </div>

            <div class="form-group ">
                <label for="payment_method">Account Name</label>
                <input type="text" class="form-control" id="account_name" name="account_name"
                    value="{{$info_user_payment[0]->account_name}}" readonly>
            </div>

            {{-- <div class="form-group ">
                <label for="payment_method">Total Chapter</label>
                <input type="text" class="form-control" id="total_doc" name="total_doc"
                    value="{{$info_doc[0]->total_doc}}" readonly>
            </div> --}}

            {{-- this input for assign value to number_words_wd in withdraw_histories --}}
            <div class="form-group ">
                {{-- <label for="payment_method">Total Words</label> --}}
                <input type="hidden" class="form-control" id="number_words_wd" name="number_words_wd" value="{{($info_doc[0]->total_number_words == null) ? '0' :
                    $info_doc[0]->total_number_words}}" readonly>
            </div>

            <div class="form-group ">
                <label for="payment_method">Total Income (¥)</label>
                <input type="text" class="form-control" id="salary" name="salary" value=" {{($info_doc[0]->total_cost_of_translate == null) ? '0' :
                    $info_doc[0]->total_cost_of_translate }}" readonly>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-sm btn-primary"> Withdraw</button>
            </div>


        </form>
    </div>

    <hr>
</main>

@endsection