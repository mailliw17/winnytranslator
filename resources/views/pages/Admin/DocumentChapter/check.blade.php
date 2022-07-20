@extends('layouts.default')

@section('title', 'Winny Translator | Registration')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Check Task</h1>
    </div>

    <div class="container">
        <form method="POST" action="{{ route('document-chapters.afterCheckDocumentChapter', $doc_chap->id)}}">
            @method('PUT')
            @csrf
            {{-- hidden form --}}
            <input type="hidden" name="document_id" value="{{$doc_chap->document_id}}">
            <input type="hidden" name="status" id="status" value="">
            <input type="hidden" name="cost_of_translate" id="cost_of_translate"
                value="{{$doc_chap->cost_of_translate}}">
            <input type="hidden" name="original_cost" id="original_cost" value="{{$doc_chap->cost_of_translate}}">
            <input type="hidden" id="user_id" name="user_id" value="{{$doc_chap->user_id}}">


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
                        <textarea class="form-control @error('id_text') is-invalid @enderror" name="id_text"
                            id="id_text" rows="50">{{old('id_text') ? old('id_text') : $doc_chap->id_text }}</textarea>
                        @error('id_text')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <hr>

                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="checkDocChap" id="accept_radio"
                                    onchange="hideUnhideRevision()" required>
                                <label class="form-check-label" for="gridRadios1">
                                    Accept
                                </label>
                            </div>

                            @if (($doc_chap->reduced_fare == 0)||(is_null($doc_chap->reduced_fare)))
                            {{-- only active when discount rate is 0 or never get review before --}}
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="checkDocChap" id="revision_radio"
                                    onchange="hideUnhideRevision()">
                                <label class="form-check-label" for="gridRadios2">
                                    Revision
                                </label>
                            </div>

                            @else
                            {{-- when it was previously discounted it will be disabled --}}
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="checkDocChap" id="revision_radio"
                                    onchange="hideUnhideRevision()" disabled>
                                <label class="form-check-label" for="gridRadios2">
                                    Revision (You have chosen this before)
                                </label>
                            </div>

                            @endif


                            {{-- this condition is for worst translator --}}
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="checkDocChap" id="take_out_chapter"
                                    onchange="takeOutChapter()">
                                <label class="form-check-label" for="gridRadios2">
                                    Take out chapter
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <span class="badge badge-warning">Current Reduced Fare :
                                {{is_null($doc_chap->reduced_fare) ? 0 : $doc_chap->reduced_fare}}%</span>
                        </div>
                    </div>
                </fieldset>

                <div class="form-row d-none" id="revision_reason">
                    <div class="form-group col-md-6 ">
                        <label for="inputCity">Revision Reason</label>
                        <textarea class="form-control" name="revision_reason" cols="30" rows="3"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Reduced Fare</label>
                        <select id="reduced_fare" name="reduced_fare" class="form-control" onchange="reducedFare(this)"
                            required>
                            <option selected disabled>--PLEASE CHOOSE ONE--</option>
                            <option value=0>0%</option>
                            <option value=10>10%</option>
                            <option value=20>20%</option>
                            <option value=50>50%</option>
                        </select>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-block btn-primary">
                        Submit</button>
                </div>
        </form>
    </div>

    <hr>
</main>

<!-- Modal -->
{{-- <div class="modal fade" id="revisionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    @csrf --}}
                    {{-- hidden input status 3 means revision --}}
                    {{-- <input type="hidden" name="status" value=3>
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
</div> --}}

@endsection