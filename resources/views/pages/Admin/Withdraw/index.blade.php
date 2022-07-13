@extends('layouts.default')

@section('title', 'WW World | Payroll')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Payroll</h1>

        <div class="btn-toolbar mb-2 mb-md-0">
            {{-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button> --}}
        </div>
    </div>

    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-sm myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Salary</th>
                    <th>Number of Words</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($payroll as $p)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$p->name}}</td>
                    <td>{{$p->salary}}¥</td>
                    <td>{{$p->number_words_wd}}</td>
                    <td>
                        @if ($p->status == 10)
                        <span class="badge badge-success">Paid on {{date('d-m-Y H:m',
                            strtotime($p->paid_on))}}</span>

                        @else
                        <span class="badge badge-danger">Unpaid</span>
                        @endif
                    </td>
                    <td>
                        @if ($p->status == 10)
                        <p>No actions</p>
                        @else
                        <a href="{{route('withdraw.check', $p->withdraw_id)}}" class="btn btn-sm btn-primary"><i
                                class="bi bi-wallet2"></i> Pay</a>
                        @endif

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center p-5">
                        Data not available
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</main>

@endsection