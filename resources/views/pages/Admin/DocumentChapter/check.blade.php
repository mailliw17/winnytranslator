@extends('layouts.default')

@section('title', 'Winny Translator | Registration')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Check Task</h1>
    </div>

    <div class="container">
        <form method="POST" action="{{ route('document-chapters.accept', $doc_chap->id)}}">
            @method('PUT')
            @csrf
            {{-- hidden form --}}
            <input type="hidden" name="document_id" value="{{$doc_chap->document_id}}">
            {{-- if success change status to 10 --}}
            <input type="hidden" name="status" value=10>

            <div class="form-group mt-3">
                <div class="text-center">
                    <h5 for="ch_text">Note</h5>
                </div>
                <textarea class="form-control" name="note" id="note" rows="10" readonly>{{ $note->note }}</textarea>
            </div>

            <div class="form-group">
                <div class="form-row">
                    <div class="col">
                        <label for="ch_chapter_title">Chapter Name (Chinese)</label>
                        <input type="text" autocomplete="off" class="form-control @error('ch_chapter_title') is-invalid
                        @enderror" id="ch_chapter_title" name="ch_chapter_title"
                            value="{{old('ch_chapter_title') ? old('ch_chapter_title') : $doc_chap->ch_chapter_title }}"
                            readonly>
                        @error('ch_chapter_title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="id_chapter_title">Chapter Name (Indonesia)</label>
                        <input type="text" autocomplete="off" class="form-control @error('id_chapter_title') is-invalid
                        @enderror" id="id_chapter_title" name="id_chapter_title"
                            value="{{old('id_chapter_title') ? old('id_chapter_title') : $doc_chap->id_chapter_title }}"
                            autofocus>
                        @error('id_chapter_title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-row">
                    <div class="col">
                        <label for="ch_text">Chinese Text</label>
                        <textarea class="form-control @error('ch_text') is-invalid @enderror" name="ch_text"
                            id="ch_text" rows="50" readonly>{{old('ch_text') ? old('ch_text') : $doc_chap->ch_text }}
                        </textarea>
                        @error('ch_text')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="id_text">Indonesia Text</label>
                        <textarea class="form-control" name="id_text" id="id_text"
                            rows="50">{{old('id_text') ? old('id_text') : $doc_chap->id_text }}</textarea>
                        @error('id_text')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <hr>
                <div class="text-center">
                    <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#revisionModal"><i
                            class="bi bi-clipboard2-minus"></i> Revision</a>
                    <button type="submit" class="btn  btn-sm btn-primary"><i class="bi bi-bookmark-check"></i>
                        Accept</button>
                </div>
        </form>
    </div>

    <hr>
</main>

<!-- Modal -->
<div class="modal fade" id="revisionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Revision</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('document-chapters.revision', $doc_chap->id)}}">
                    @method('PUT')
                    @csrf
                    {{-- hidden input status 3 means revision --}}
                    <input type="hidden" name="status" value=3>
                    <input type="hidden" name="document_id" value="{{$doc_chap->document_id}}">

                    <div class="form-group">
                        <label for="revision_reason">Reason</label>
                        <textarea class="form-control" id="revision_reason" name="revision_reason" rows="3"
                            required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection