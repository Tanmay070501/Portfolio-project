@extends('layouts.app')
@section('content')
    <h2>Create Diary</h2>
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <form action={{ route('submit') }} method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" name="description" id="description"></textarea>
          </div>
          <button type="submit" class="btn btn-secondary">Submit</button>
    </form>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ), )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection