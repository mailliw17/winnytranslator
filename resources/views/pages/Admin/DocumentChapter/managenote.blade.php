@extends('layouts.default')

@section('title', 'WW World | Manage Note')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage Note</h1>
    </div>

    <div class="container">
        <form method="POST" action="{{ route('document-chapters.note',  $note[0]->id)}}">
            @method('PUT')
            @csrf
            {{-- hidden form --}}
            <input type="hidden" name="document_id" value="{{$note[0]->id}}">

            <div class="form-group">
                <label for="note">Note</label>
                <textarea class="form-control" name="note" id="note" rows="20" required>{{old('note') ? old('note') : $note[0]->note }} 
                </textarea>
                @error('note')
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