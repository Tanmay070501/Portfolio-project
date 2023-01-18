@extends('layouts.app')
@section('content')
    <h3>Premium Users List</h3>
    @if($premium->isEmpty())
        <p>No Premium Users yet!</p>
    @else
    <table class="table border table-hover">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th class="text-center">Rating</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($premium as $prem)
                <tr>
                   <td>{{ $prem->name }} 
                    @if($prem->friend == 1)<span class="hover-sign">🤝<p class="h-text">Friend</p></span>@endif
                  </td>
                   <td>
                    <div class="d-flex justify-content-center">
                        <div class="rateYo"
                      data-rateyo-rating={{ $prem->rating }}
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
      {{ $premium->links() }}
    @endif
@endsection
