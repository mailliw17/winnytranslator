@extends('layouts.default')

@section('title', 'Winny Translator | Document')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Task</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Chinese Title</th>
                    <th>Number of Chapters</th>
                    <th>Chapter Done</th>
                    <th>Cost (¥)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($doc as $d)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->id_title}}</td>
                    <td>{{$d->ch_title}}</td>
                    <td>{{$d->number_chapter}}</td>
                    <td>{{$d->number_chapter_done}}</td>
                    <td>{{$d->cost_of_translate}}</td>
                    <td>
                        <a href="{{route('document-chapters.manageChapters', $d->id)}}"
                            class="btn btn-sm btn-primary"><i class="bi bi-eye"></i> Look</a>
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