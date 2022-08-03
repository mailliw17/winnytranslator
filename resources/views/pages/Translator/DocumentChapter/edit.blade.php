@extends('layouts.default')

@section('title', 'Winny Translator | Registration')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="container">
        <form method="POST" action="{{ route('document-chapters-translator.update', $doc_chap->id)}}">
            @method('PUT')
            @csrf

            {{-- hidden form --}}
            <input type="hidden" name="document_id" value="{{$doc_chap->document_id}}">
            <input type="hidden" name="number_words" value="{{$doc_chap->number_words}}">
            <input type="hidden" name="user_id" value=" {{ auth()->user()->id }}">

            {{-- condition for pre-submit & re-submit --}}
            {{-- kalau baru awal banget translate / pas mau edit lagi - pas diinput status naik jadi 1 --}}
            @if(($doc_chap->status == 0)||($doc_chap->status == 1))
            <input type="hidden" name="status" value=1>

            {{-- kalau saat revisi dan pas mau submit status jadi 1 --}}
            @elseif($doc_chap->status == 3)
            <input type="hidden" name="status" value=2>
            @else

            @endif

            <div class="form-group mt-3">
                <div class="text-center">
                    <h5 for="ch_text">Note</h5>
                </div>
                <textarea class="form-control" name="note" id="note" rows="10" readonly>{{ $note->note }}</textarea>
            </div>

            {{-- show if only revision --}}
            @if ($doc_chap->revision_reason)
            <div class="form-group mt-3">
                <div class="text-center">
                    <h5 for="ch_text">Revision Note</h5>
                </div>
                <textarea class="form-control" name="note" id="note" rows="3"
                    readonly>{{ $doc_chap->revision_reason }}</textarea>
            </div>
            @endif

            <hr>

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
                            value="{{old('id_chapter_title') ? old('id_chapter_title') : $doc_chap->id_chapter_title }}">
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
                        <textarea class="form-control @error('id_text') is-invalid @enderror" name="id_text"
                            id="id_text" rows="50">{{old('id_text')
                            ? old('id_text') : $doc_chap->id_text }}</textarea>
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