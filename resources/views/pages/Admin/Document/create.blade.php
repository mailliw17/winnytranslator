@extends('layouts.default')

@section('title', 'WW World | Create Doc')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h3>Create Document</h3>
    </div>

    <div class="container">
        <form method="POST" action="{{ route('documents.store')}}">
            @csrf

            {{-- hidden input --}}
            <input type="hidden" name="note" value="This is note for document">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="id_title">Indonesia Title</label>
                    <input type="text" autocomplete="off" class="form-control @error('id_title') is-invalid
                    @enderror" id="id_title" name="id_title" value="{{old('id_title')}}" autofocus>
                    @error('id_title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="ch_title">Chinese Title</label>
                    <input type="text" autocomplete="off" class="form-control @error('ch_title') is-invalid
                    @enderror" id="ch_title" name="ch_title" value="{{old('ch_title')}}">
                    @error('ch_title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="number_chapter">Number of Chapters</label>
                <input type="number" autocomplete="off" class="form-control @error('number_chapter') is-invalid
                    @enderror" id="number_chapter" name="number_chapter" value="{{old('number_chapter')}}">
                @error('number_chapter')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            {{-- hidden input --}}
            <input type="hidden" id="number_chapter_done" name="number_chapter_done" value=0>

            <input type="hidden" id="cost_of_translate" name="cost_of_translate" value=0>

            <button type="submit" class="btn btn-block btn-success">Save</button>
        </form>
    </div>

    <hr>
</main>

@endsection