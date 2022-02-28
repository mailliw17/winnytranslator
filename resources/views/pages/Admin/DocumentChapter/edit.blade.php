@extends('layouts.default')

@section('title', 'Winny Translator | Registration')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Chapter</h1>
    </div>

    <div class="container">
        <form method="POST" action="{{ route('document-chapters.update', $doc_chap->id)}}">
            @method('PUT')
            @csrf
            {{-- hidden form --}}
            <input type="hidden" name="document_id" value="{{$doc_chap->document_id}}">

            <div class="form-group">
                <div class="form-row">
                    <div class="col">
                        <label for="ch_chapter_title">Chapter Name (Chinese)</label>
                        <input type="text" autocomplete="off" class="form-control @error('ch_chapter_title') is-invalid
                        @enderror" id="ch_chapter_title" name="ch_chapter_title"
                            value="{{old('ch_chapter_title') ? old('ch_chapter_title') : $doc_chap->ch_chapter_title }}"
                            autofocus>
                        @error('ch_chapter_title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="id_chapter_title">Chapter Name (Indonesia)</label>
                        <input type="text" autocomplete="off" class="form-control @error('id_chapter_title') is-invalid
                        @enderror" id="id_chapter_title" name="id_chapter_title" value="{{old('id_chapter_title')}}"
                            readonly>
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
                            id="ch_text" rows="50">{{old('ch_text') ? old('ch_text') : $doc_chap->ch_text }}
                        </textarea>
                        @error('ch_text')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="id_text">Indonesia Text</label>
                        <textarea class="form-control" name="id_text" id="id_text" rows="50" readonly></textarea>
                        @error('id_text')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <hr>

                <button type="submit" class="btn btn-block btn-sm btn-primary">Save</button>
        </form>
    </div>

    <hr>
</main>

@endsection