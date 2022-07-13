@extends('layouts.default')

@section('title', 'WW World | Check Payroll')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Confirmation</h1>
    </div>
    <p style="color: red">*Please Read Carefully</p>

    <div class="container">
        <form method="POST" action="{{ route('withdraw.update', $check->id)}}">
            @method('PUT')
            @csrf
            {{-- hidden input for status payment --}}

            <input type="hidden" class="form-control" id="status" name="status" value="10">

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="payment_method">Name</label>
                    <input type="text" class="form-control" id="payment_method" name="payment_method"
                        value="{{$check->name}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="payment_method">Email</label>
                    <input type="text" class="form-control" id="payment_method" name="payment_method"
                        value="{{$check->email}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="payment_method">Phone</label>
                    <input type="text" class="form-control" id="payment_method" name="payment_method"
                        value="{{$check->phone}}" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <div class="form-group ">
                        <label for="payment_method">Payment Method</label>
                        <input type="text" class="form-control" id="payment_method" name="payment_method"
                            value="{{$check->payment_method}}" readonly>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <div class="form-group ">
                        <label for="payment_method">Account Info</label>
                        <input type="text" class="form-control" id="account_info" name="account_info"
                            value="{{$check->account_info}}" readonly>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <div class="form-group ">
                        <label for="payment_method">Account Name</label>
                        <input type="text" class="form-control" id="account_info" name="account_info"
                            value="{{$check->account_name}}" readonly>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="form-group ">
                        <label for="payment_method">Price</label>
                        <input type="text" class="form-control" id="payment_method" name="payment_method"
                            value="{{$check->price}} ¥/ 1000 words" readonly>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="form-group ">
                        <label for="payment_method">Total of Words</label>
                        <input type="text" class="form-control" id="account_info" name="account_info"
                            value="{{$check->number_words_wd}}" readonly>
                    </div>
                </div>
            </div>



            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="form-group ">
                        <label for="payment_method">Salary</label>
                        <input type="text" class="form-control" id="payment_method" name="payment_method"
                            value="{{$check->salary}} ¥" readonly>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <div class="form-group ">
                        <label for="payment_method">Already transferred?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="transfer_radio" id="no" value="no"
                                checked onclick="disabledButton()">
                            <label class="form-check-label" for="exampleRadios1">
                                Not Yet
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="transfer_radio" id="yes" value="yes"
                                onclick="undisabledButton()">
                            <label class="form-check-label" for="exampleRadios2">
                                Yes done !
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-secondary" id="button_ok" disabled> Ok</button>
            </div>

        </form>
    </div>

    <hr>
</main>

<script>
    function disabledButton() {
        document.getElementById("button_ok").disabled = true;
        document.getElementById("button_ok").className = "btn btn-secondary";
    }

    function undisabledButton() {
        document.getElementById("button_ok").disabled = false;
        document.getElementById("button_ok").className = "btn btn-primary";
    }
</script>

@endsection