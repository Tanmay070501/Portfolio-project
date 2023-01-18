@extends('layouts.app')
@section('content')
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
@if ($diary->isEmpty())
  <h3>No Diaries Yet.</h3>
  @else
  <table class="table border table-hover">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th class="text-end" scope="col">Created On</th>
      @guest
      @else
        @if (Auth::user()->role == 1)
          <th class="text-center">Action</th>
        @endif
      @endguest
      </tr>
    </thead>
    <tbody>
    @foreach ($diary as $diaries )
            <tr>
                <td><a class="text-decoration-none" href="/diary/{{ $diaries->id }}">{{ $diaries->title }}</a></td>
                <td class="text-end">{{ date('jS M Y',strtotime($diaries->created_at)) }}</td>
                
                  @guest
                  @else
                  @if (Auth::user()->role == 1)
                    <td class="text-center">
                      <form class="d-inline-block" action={{ route('diary.delete',$diaries->id) }} method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger mx-auto">Delete</button>
                      </form>
                    </td>
                    @endif
                  @endguest
            </tr>
        
    @endforeach
    </tbody>
  </table> 
  {{ $diary->links() }}
@endif    

@endsection