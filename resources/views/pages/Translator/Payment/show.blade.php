@extends('layouts.default')

@section('title', 'Winny Translator | Profile')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Payment Information</h1>
    </div>


    <div class="jumbotron">
        {{-- if the user has filled in the payment data --}}
        @if ($payment->count() > 0)
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Payment Method : {{($payment[0]->payment_method) ? $payment[0]->payment_method :
                "Please complete this information"}}
            </li>
            <li class="list-group-item">Account Info : {{($payment[0]->account_info) ? $payment[0]->account_info :
                "Please complete this information"}}</li>
            <li class="list-group-item">Price : {{($payment[0]->price) ? $payment[0]->price . ' ¥ / 1000 words' :
                "-"}}</li>
            <li class="list-group-item">Salary : {{($payment[0]->salary) ? $payment[0]->salary :
                "-"}}</li>
            <li class="list-group-item">Last Payment : {{$payment[0]->last_payment}}</li>
        </ul>
        <hr class="my-4">
        <div class="text-right">
            <a class="btn btn-primary" href="{{route('payment-translator.edit', $payment[0]->id)}}" role="button"><i
                    class="bi bi-pencil-square"></i> Edit</a>
        </div>
        {{-- if not --}}
        @else
        <h3>You have never added payment information before</h3>
        <h5>Please add it first</h5>
        <a href="{{ route('payment-translator.create')}}" class="btn btn-primary"> <i class="bi bi-plus-square"></i>
            Add</a>
        @endif
        {{-- <p>halo</p> --}}
        {{-- <h1 class="display-6">Here is the payment information for, {{ auth()->user()->name }}</h1> --}}
        {{-- <p class="">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
            to
            featured content or information.</p> --}}


    </div>
</main>

@endsection