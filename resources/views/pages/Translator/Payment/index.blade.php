@extends('layouts.default')

@section('title', 'Winny Translator | Document')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Payment</h1>

        {{-- <a href="{{route('payment-translator.info')}}" class="btn btn-primary"><i class="bi bi-cash-coin"></i>
            Info</a> --}}
    </div>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Congrats, this is your achievement !</h4>
        <ul class="list-group">
            <li class="list-group-item"> Total Chapter : {{$doc[0]->total_doc}}</li>
            <li class="list-group-item">Total Words : {{($doc[0]->total_number_words == null) ? '0' :
                $doc[0]->total_number_words}} </li>
            <li class="list-group-item">Total Income : {{($doc[0]->total_cost_of_translate == null) ? '0' :
                $doc[0]->total_cost_of_translate }} ¥</li>
        </ul>

        @if ($disabled_button == 1 || $doc[0]->total_doc == 0)

        {{-- disabled button --}}
        <div class="text-right mt-4">
            <button data-toggle="modal" data-target="#disabledWithdrawModal" class="btn btn-secondary"><i
                    class="bi bi-wallet-fill"></i>
                Withdraw</button>
        </div>

        @else
        {{-- active button --}}
        <div class="text-right mt-4">
            <a href="{{route('withdraw-translator.create')}}" class="btn btn-success"><i class="bi bi-wallet-fill"></i>
                Withdraw</a>
        </div>

        @endif


    </div>


</main>

@endsection