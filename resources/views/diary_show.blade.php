@extends('layouts.app')
@section('content')
    <h1>{{ $diary->title }}</h1>
    <p>Created on: {{ date('jS M Y',strtotime($diary->updated_at)) }}</p>
    <p>By: {{ $diary->user->name }}</p>
    <div class="ck-content">
        {!! $diary->description !!}
    </div>
    <div class="leave-comment-area">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action={{ route('comment.add') }} method="POST">
            @csrf
            <div class="mb-3">
                <label for="comment-area" class="form-label">Leave a Comment</label>
                <textarea class="form-control" id="comment-area" name="body" rows="3"></textarea>
                <input type="text" name="diary_id" value={{ $diary->id }} hidden>
                <button class="btn btn-primary my-3" type="submit">Comment</button>
            </div>
        </form>
    </div>
    <h4>Comments:</h4>
    @forelse ($diary->comments as $comments )
    <div class="card shadow-sm my-2">
        <div class="card-body">
          <div class="card-title d-flex">
            <div class="justify-self-start">
                <strong>
                    {{ $comments->user->name }}
                        @if($comments->user->role == 1)<span class="hover-sign">👑<p class="h-text">Admin</p></span>@endif
                        @if($comments->user->premium == 1)<span class="hover-sign">⭐<p class="h-text">Prem User</p></span>@endif
                        @if($comments->user->friend == 1)<span class="hover-sign">🤝<p class="h-text">Friend</p></span>@endif
                </strong>
            </div>
            <p class="ms-auto">Commented on: {{ date('jS M Y',strtotime($comments->updated_at)) }}</p>
          </div>
          <p class="card-text">{{ $comments->body }}</p>
          @if (Auth::check())
              @if(Auth::user()->id === $comments->user->id || Auth::user()->role == 1)
                <form action={{ route('comments.delete',$comments->id) }} method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              @endif
          @endif
          </div>
      </div>
    @empty
        <p>No Comments Yet.</p>
    @endforelse
@endsection
