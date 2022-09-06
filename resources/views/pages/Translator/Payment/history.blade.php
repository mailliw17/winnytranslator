@extends('layouts.default')

@section('title', 'WW World | Payroll')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h3>Payroll</h3>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Salary</th>
                    <th>Number of Words</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($payroll as $p)
                <tr>
                    <td>{{$loop->iteration}}</td>
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