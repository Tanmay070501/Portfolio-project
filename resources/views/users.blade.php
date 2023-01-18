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
<div class="main-content">


<table class="table border table-hover">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th>Email</th>
        <th>Email verified</th>
        <th class="text-center">Rating</th>
        <th class="text-end" scope="col">Created On</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
            <tr>
                <td>{{ $user->name}} 
                  @if($user->premium == 1)<span class="hover-sign">⭐<p class="h-text">Prem User</p></span>@endif
                  @if($user->friend == 1)<span class="hover-sign">🤝<p class="h-text">Friend</p></span>@endif
                </td>
                <td>{{ $user->email }}</td>
                <td>@if($user->email_verified_at)<span>verified</span>@else<span>unverified</span>@endif</td>
                <td >
                  <div class="d-flex justify-content-center">
                    <div class="rateYo"
                  data-rateyo-rating={{ $user->rating }}
                  data-rateyo-num-stars="5"
                  data-rateyo-score="3"></div>
                  <script>
                      $(function () {
                      var $rateYo = $(".rateYo").rateYo({
                        readOnly: true
                      });
                        $rateYo.rateYo();});
                  </script>
                  </div>
                </td>
                <td class="text-end">{{ date('jS M Y',strtotime($user->created_at)) }}</td>
                <td class="text-center">
                    @if ($user->friend == 1)
                    <form class="d-inline-block" action="{{ route('friend.remove',$user->id) }}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-warning mx-auto">Unfriend</button>
                    </form>
                    @else
                      <form class="d-inline-block" action="{{ route('friend.add',$user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success mx-auto">Friend</button>
                      </form>
                    @endif
                    <form class="d-inline-block" action="{{ route('users.delete',$user->id) }}" method="POST">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger mx-auto">Delete</button>
                    </form>
                </td>
            </tr>
    @endforeach
    </tbody>
  </table> 
  </div>
  {{ $users->links() }}
@endsection
