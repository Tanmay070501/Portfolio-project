@extends('layouts.app')
@section('content')
    <h3>Friends List</h3>
    @if($friends->isEmpty())
        <p>No friends yet!</p>
    @else
    <table class="table border table-hover">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th class="text-center">Rating</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($friends as $friend)
                <tr>
                   <td>{{ $friend->name }} 
                    @if($friend->premium == 1)<span class="hover-sign">⭐<p class="h-text">Prem User</p></span>@endif
                  </td>
                   <td>
                    <div class="d-flex justify-content-center">
                        <div class="rateYo"
                      data-rateyo-rating={{ $friend->rating }}
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
                </tr>
        @endforeach
        </tbody>
      </table> 
      {{ $friends->links() }}
    @endif
@endsection
