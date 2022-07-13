@extends('layouts.default')

@section('title', 'WW World | Payroll Account')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Payment - Information</h2>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Payment Method</th>
                    <th>Account Number</th>
                    <th>Account Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($user_payments as $up)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$up->user->name}}</td>
                    <td>{{$up->payment_method}}</td>
                    <td>{{$up->account_info}}</td>
                    <td>{{$up->account_name}}</td>
                    {{-- <td>{{(isset($up->price)) ? $up->price : '<span class="badge badge-warning">Warning</span>'}}
                    </td> --}}
                    <td>
                        @if (isset($up->price))
                        {{$up->price}}
                        @else
                        <span class="badge badge-warning">Fill this value</span>
                        @endif
                    </td>
                    {{-- <td>{{$up->number_chapters}}</td> --}}
                    {{-- <td>{{$up->number_words}}</td> --}}
                    {{-- <td>{{$up->salary}}</td> --}}
                    {{-- <td>{{$up->last_payment}}</td> --}}
                    <td>
                        <a href="{{route('payments.edit', $up->id)}}" class="btn btn-sm btn-primary"><i
                                class="bi bi-pencil-square"></i> Edit</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center p-5">
                        Data not available
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>

@endsection