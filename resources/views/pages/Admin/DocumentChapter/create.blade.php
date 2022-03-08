@extends('layouts.default')

@section('title', 'Winny Translator | Registration')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Chapter</h1>
    </div>

    <div class="container">
        <form method="POST" action="{{ route('document-chapters.store')}}">
            @csrf
            {{-- hidden form --}}
            <input type="hidden" name="document_id" value="{{$doc_chap[0]->id}}">
            <input type="hidden" name="status" value=0>

            <div class="form-group">
                <div class="form-row">
                    <div class="col">
                        <label for="ch_chapter_title">Chapter Name (Chinese)</label>
                        <input type="text" autocomplete="off" class="form-control @error('ch_chapter_title') is-invalid
                        @enderror" id="ch_chapter_title" name="ch_chapter_title" value="{{old('ch_chapter_title')}}"
                            autofocus>
                        @error('ch_chapter_title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="number_words"> <a
                                href="https://www.chineseconverter.com/en/convert/chinese-character-count"
                                target="_blank"> Total
                                Characters</a></label>
                        <input type="number" autocomplete="off" class="form-control @error('number_words') is-invalid
                        @enderror" id="number_words" name="number_words" value="{{old('number_words')}}">
                        @error('number_words')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="ch_text">Chinese Text</label>
                <br>
                {{-- <label style="color: blue">Total : <span id="wordCount">0</span> words</label> --}}
                <textarea {{-- onkeyup="countMandarinWords()" --}}
                    class="form-control @error('ch_text') is-invalid @enderror" name="ch_text" id="ch_text"
                    rows="50">{{old('ch_text')}}</textarea>
                @error('ch_text')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <hr>

            <button type="submit" class="btn btn-block btn-sm btn-primary">Save</button>
        </form>
    </div>

    <hr>
</main>

@endsection