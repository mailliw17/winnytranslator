@extends('layouts.default')

@section('title', 'WW World | Create New Chapter')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h3>Create Chapter</h3>
    </div>

    <div class="container">
        <form method="POST" action="{{ route('document-chapters.store')}}">
            @csrf
            {{-- hidden form --}}
            <input type="hidden" name="document_id" value="{{$doc_chap[0]->id}}">
            <input type="hidden" name="status" value=0>
            <input type="hidden" name="is_paid" value=0>
            <input type="hidden" name="is_lock" value=1>
            <input type="hidden" name="is_vendor_paid" value=0>

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

                        <div class="alert alert-warning" role="alert">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_not_same_title">
                                    <label class="form-check-label" for="gridCheck">
                                        Check this box if you have input the correct title
                                    </label>
                                </div>
                            </div>
                        </div>
                        @enderror

                    </div>



                    <div class="col">
                        <label for="number_words"> Total
                            Characters</a></label>
                        <input type="number" autocomplete="off" class="form-control @error('number_words') is-invalid
                        @enderror" id="number_words" name="number_words" value="{{old('number_words')}}" readonly>
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
                <textarea class="form-control @error('ch_text') is-invalid @enderror" name="ch_text" id="ch_text"
                    rows="30">{{old('ch_text')}}</textarea>
                @error('ch_text')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-block btn-success">Save</button>
        </form>
    </div>

    <hr>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
    $("#ch_text").keyup(function () {
      var text = $(this).val();
      var textTrim = text.trim();
      var wordCount =
        textTrim.split(
          /[\u4E00-\u9FAF\u3040-\u3096\u30A1-\u30FA\uFF66-\uFF9D\u31F0-\u31FF]/g
        ).length - 1;
      $("#number_words").attr("value", wordCount);
    });
  });
</script>

@endsection