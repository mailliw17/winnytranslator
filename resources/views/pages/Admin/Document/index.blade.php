@extends('layouts.default')

@section('title', 'WW World | Doc Management')
@section('content')

<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h3>Document Management</h3>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Total Document : {{$doc->count()}}</p>
                    <a href="{{ route('documents.create')}}" class="btn btn-success "><i
                            class="bi bi-plus-square-dotted"></i> Create</a>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-sm myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Indonesia Title</th>
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
                    <td>{{($d->id_title == null ? '-' : $d->id_title)}}</td>
                    <td>{{$d->ch_title}}</td>
                    {{-- <td>{{$d->number_chapter}}</td> --}}
                    <td>{{$d->document_chapter_count}}</td>
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
                        </a>

                        <form action="{{route('documents.destroy', $d->id)}}" method="POST" class="d-inline"
                            onclick="return confirm('Are you sure?')">
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