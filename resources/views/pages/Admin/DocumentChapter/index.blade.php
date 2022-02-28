@extends('layouts.default')

@section('title', 'Winny Translator | Document')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Document Chapters Management</h1>

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
                    <h5 class="card-title"><i class="bi bi-card-heading"></i> Document Title : {{$doc[0]->ch_title}}
                    </h5>

                    <div class="text-right">
                        <a href="{{ route('document-chapters.note', $doc[0]->id)}}" class="btn btn-warning"><i
                                class="bi bi-journal-bookmark-fill"></i> Manage Note</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-boxes"></i> Total Chapter : @if ($doc_chapter->count() < 1) 0
                            @else {{$doc_chapter->count()}}
                            @endif
                    </h5>

                    <div class="text-right">
                        <a href="{{ route('document-chapters.add-chapter', $doc[0]->id)}}" class="btn btn-primary"><i
                                class="bi bi-plus-square-dotted"></i> Add Chapter</a>
                    </div>
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
                    <th>Title</th>
                    <th>Translator</th>
                    <th>Number of Words</th>
                    <th>Cost</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($doc_chapter as $dc)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$dc->ch_chapter_title}}</td>
                    <td>
                        @if (isset($dc->user_id))
                        {{$dc->user_id}}
                        @else
                        <span class="badge badge-warning">PENDING</span>
                        @endif
                    </td>
                    <td>{{$dc->number_words}}</td>

                    <td>
                        @if (isset($dc->cost_of_translate))
                        {{$dc->cost_of_translate}}
                        @else
                        <span class="badge badge-warning">PENDING</span>
                        @endif
                    </td>

                    <td>
                        @if (($dc->status) == '0')
                        <span class="badge badge-warning">PENDING</span>
                        @else
                        <span class="badge badge-success">REVIEW</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('document-chapters.edit', $dc->id)}}" class="btn btn-sm btn-primary"><i
                                class="bi bi-pencil-square"></i> Edit</a>

                        {{-- <a href="{{route('document-chapters.manageChapters', $d->id)}}"
                            class="btn btn-sm btn-warning"><i class="bi bi-kanban"></i> Chapter
                            Management</a> --}}

                        <form action="{{route('document-chapters.destroy', $dc->id)}}" method="POST" class="d-inline">
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

    <hr>
</main>

@endsection