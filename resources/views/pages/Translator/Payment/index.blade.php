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
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item"> Total Chapter : {{$total_income[0]->total_doc}}</li>
                    <li class="list-group-item">Total Words : {{($total_income[0]->total_number_words == null) ? '0' :
                        $total_income[0]->total_number_words}} </li>
                    <li class="list-group-item">Total Income : {{($total_income[0]->total_cost_of_translate == null) ?
                        '0' :
                        $total_income[0]->total_cost_of_translate }} ¥</li>
                </ul>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Balance Locked</h5>
                        <p class="card-text">The income is still locked because the payment is being taken care of by
                            admin</p>
                        <ul class="list-group">
                            <li class="list-group-item"> {{$total_income_locked[0]->total_doc}} Chapters</li>
                            <li class="list-group-item"> {{($total_income_locked[0]->total_number_words ==
                                null) ?
                                '0 words' :
                                $total_income_locked[0]->total_number_words}} words</li>
                            <li class="list-group-item"> Income :
                                {{($total_income_locked[0]->total_cost_of_translate ==
                                null) ?
                                '0' :
                                $total_income_locked[0]->total_cost_of_translate }} ¥</li>
                        </ul>
                        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Withdrawable Balance</h5>
                        <p class="card-text">You can withdraw this balance <br> to your bank account</p>
                        <ul class="list-group">
                            <li class="list-group-item"> {{$total_income_withdrawalable[0]->total_doc}} Chapters
                            </li>
                            <li class="list-group-item">
                                {{($total_income_withdrawalable[0]->total_number_words ==
                                null) ?
                                '0 Words' :
                                $total_income_withdrawalable[0]->total_number_words}} Words</li>
                            <li class="list-group-item"> Income :
                                {{($total_income_withdrawalable[0]->total_cost_of_translate ==
                                null) ?
                                '0' :
                                $total_income_withdrawalable[0]->total_cost_of_translate }} ¥</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- <p>{{$disabled_button}} == 1</p> --}}
        {{-- <p>{{$total_income_withdrawalable[0]->total_doc}} == 0</p> --}}
        {{-- <p>{{$payment_period}} == 1</p> --}}

        {{-- $disabled_button = ada transaksi dia sebelumnya yang belum di ACC admin --}}
        {{-- $payment_period = belum waktunya dia gajian --}}
        {{-- $total_income_withdrawalable[0]->total_doc = tidak ada bab yang mau dicairkan --}}

        @if (($disabled_button == 1) || ($payment_period == 0) || $total_income_withdrawalable[0]->total_doc == 0)

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

        <!-- Modal -->
        <div class="modal fade" id="disabledWithdrawModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Withdrawal rules</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Here are some reasons why you can't withdraw money</p>
                        <ul>
                            <li>Your previous balance withdrawal has not been confirmed by the admin</li>
                            <li>Your withdrawal time category does not match your profile (weekly / monthly)</li>
                            <li>The chapter you are working on is still locked for payment</li>
                            <li>You haven't done a chapter yet</li>
                        </ul>
                        <p>Contact your admin for more information</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>


    </div>


</main>

@endsection