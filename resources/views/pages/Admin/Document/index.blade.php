@extends('layouts.default')

@section('title', 'WW World | Doc Management')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Document Management</h1>

        <div class="btn-toolbar mb-2 mb-md-0">
            {{-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button> --}}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Document : {{$doc->count()}}</h5>
                    <a href="{{ route('documents.create')}}" class="btn btn-primary"><i
                            class="bi bi-plus-square-dotted"></i> Create New</a>
                </div>
            </div>
        </div>
        {{-- <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div> --}}
    </div>

    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-sm myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Chinese Title</th>
                    <th>Number of Chapters</th>
                    {{-- <th>Chapter Done</th> --}}
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
                    {{-- <td>{{$d->document_chapter_count}}</td> --}}
                    <td>
                        @if (isset($d->cost_of_translate))
                        {{$d->cost_of_translate}}
                        @else
                        0
                        @endif
                    </td>
                    <td>
                        <a href="{{route('documents.edit', $d->id)}}" class="btn btn-sm btn-primary"><i
                                class="bi bi-pencil-square"></i> Edit</a>

                        <a href="{{route('document-chapters.manageChapters', $d->id)}}"
                            class="btn btn-sm btn-warning"><i class="bi bi-kanban"></i> Chapter
                            Management</a>

                        <form action="{{route('documents.destroy', $d->id)}}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')

                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i> Delete</button>
                        </form>
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