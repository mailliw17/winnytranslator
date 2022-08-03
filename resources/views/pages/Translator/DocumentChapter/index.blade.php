@extends('layouts.default')

@section('title', 'WW World | Doc Chapter Management')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h5>Document Chapters Management (translator)</h5>

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
                    <p class="card-title"><i class="bi bi-card-heading"></i> Document Title :
                        {{$document->id_title}} / {{$document->ch_title}}
                    </p>

                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <p class="card-title"><i class="bi bi-bookmark-plus"></i> Created :
                        @if ($doc_chapter->count() < 1) 0 @else {{$doc_chapter->count()}}
                            @endif
                    </p>

                    <p class="card-title"><i class="bi bi-check-circle"></i> Finished :
                        {{$doc_chapter_finished}}
                    </p>

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
                    <th>Status (Reduced)</th>
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
                        {{$dc->name}}
                        @else
                        <span class="badge badge-warning">PENDING</span>
                        @endif
                    </td>
                    <td>{{$dc->number_words}}</td>

                    <td>
                        @if (isset($dc->user_id))
                        {{$dc->cost_of_translate}} ¥
                        @else
                        <span class="badge badge-warning">PENDING</span>
                        @endif
                    </td>

                    <td>
                        @if (($dc->status) == '0')
                        <span class="badge badge-warning">PENDING</span>
                        @elseif (($dc->status) == '1')
                        <button class="btn btn-outline-info btn-sm">
                            Translating <span class="badge badge-secondary">
                                {{is_null($dc->reduced_fare) ? 0 :
                                $dc->reduced_fare}}%</span>
                        </button>
                        @elseif (($dc->status) == '2')
                        <button class="btn btn-outline-primary btn-sm">
                            Submitted
                            <span class="badge badge-secondary">{{is_null($dc->reduced_fare) ? 0 :
                                $dc->reduced_fare}}%</span>

                        </button>
                        @elseif (($dc->status) == '3')
                        <button class="btn btn-outline-danger btn-sm">
                            Revision
                            <span class="badge badge-secondary">{{is_null($dc->reduced_fare) ? 0 :
                                $dc->reduced_fare}}%</span>
                        </button>
                        @else
                        <button class="btn btn-outline-success btn-sm">
                            Success <span class="badge badge-secondary">{{is_null($dc->reduced_fare) ? 0 :
                                $dc->reduced_fare}}%</span>
                        </button>
                        @endif
                    </td>
                    <td>
                        {{-- START BUTTON TRANSLATOR --}}
                        @if (auth()->user()->role == 2)


                        {{-- button only show when status is pending and translating AND he translated this chapter --}}
                        @if (
                        (
                        (($dc->status == "0")||($dc->status == "1")||($dc->status == "3"))
                        &&
                        ((auth()->user()->id) == ($dc->user_id))
                        )
                        ||
                        ($dc->status == null)
                        )
                        <a href="{{route('document-chapters-translator.edit', $dc->id)}}"
                            class="btn btn-sm btn-primary"><i class="bi bi-pen"></i> Translate</a>

                        @else
                        <p>No Actions</p>
                        @endif

                        {{-- button only show when done translating and wanna to submit AND he translated this chapter
                        --}}
                        @if (
                        ($dc->status == "1")
                        &&
                        ((auth()->user()->id) == ($dc->user_id))
                        )
                        <form action="{{route('document-chapters-translator.updateStatusSubmit', $dc->id)}}"
                            method="POST" class="d-inline">
                            @csrf
                            @method('put')

                            <input type="hidden" name="document_id" value="{{$dc->document_id}}">
                            <input type="hidden" name="status" value=2>

                            <button class="btn btn-sm btn-success"><i class="bi bi-check2-circle"></i> Submit</button>
                        </form>
                        @endif

                        @endif
                        {{-- END OF BUTTON TRANSLATOR --}}
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