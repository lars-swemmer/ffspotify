@extends('layouts.app')

@section('content')
    <div class="dashhead">
        <div class="dashhead-titles">
            <h6 class="dashhead-subtitle">Spotify</h6>
            <h2 class="dashhead-title">Fans <small class="text-muted">&middot; {{ Carbon\Carbon::today()->format('d M Y') }}</small></h2>
        </div>

       {{--  <div class="btn-toolbar dashhead-toolbar">
            <div class="btn-toolbar-item input-with-icon">
                <input type="text" value="01/01/15 - 01/08/15" class="form-control" data-provide="datepicker">
                <span class="icon icon-calendar"></span>
            </div>
        </div> --}}
        <div class="btn-toolbar dashhead-toolbar">
            <button type="button" class="btn btn-pill btn-primary"><span class="icon icon-export"></span> Export users</button>
        </div>
    </div> <!-- dashhead -->

   {{--  <div class="flextable table-actions">
  <div class="flextable-item flextable-primary">
    <div class="btn-toolbar-item input-with-icon">
      <input type="text" class="form-control input-block" placeholder="Search orders">
      <span class="icon icon-magnifying-glass"></span>
    </div>
  </div>
  <div class="flextable-item">
    <div class="btn-group">
      <button type="button" class="btn btn-primary-outline">
        <span class="icon icon-pencil"></span>
      </button>
      <button type="button" class="btn btn-primary-outline">
        <span class="icon icon-erase"></span>
      </button>
    </div>
  </div>
</div> --}}

<script type="text/javascript">
  window.onload = function() {

    var ctx = document.getElementById("graph");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
              @foreach ($weekPerformance as $day)
                "{{ Carbon\Carbon::parse($day->created_at)->format('D d M') }}",
              @endforeach
              "{{ Carbon\Carbon::today()->format('D d M') }}"
            ],
            datasets: [{
                label: 'New fans',
                data: [
                  @foreach ($weekPerformance as $day)
                    {{ $day->new_spotify_users }},
                  @endforeach
                  {{ $usersToday }}
                ],
                backgroundColor: "rgba(75,192,192,0.4)",
                borderColor: "rgba(75,192,192,1)",
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });

  }
</script>

<canvas id="graph" style="width: 100%;"></canvas>

<div class="hr-divider m-t-md m-b">
        <h3 class="hr-divider-content hr-divider-heading">New fans</h3>
    </div>

<div class="table-full">
  <div class="table-responsive">
    <table class="table" data-sort="table">
      <thead>
            <tr>
              <th>#</th>
              <th>Username</th>
              <th>Email</th>
              <th>Product</th>
              <th>Age</th>
              <th>Country</th>
              <th>Added</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->spotify_id}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->product}}</td>
                <td>{{Carbon\Carbon::parse($user->birthdate)->age}}</td>
                <td>{{$user->country}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
                <td>
                  @if(!empty($user->playlistFollows[0]->new_follow) && $user->playlistFollows[0]->new_follow == 1)
                    <span class="icon icon-add-user text-success"></span>
                  @else
                    &nbsp;
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
    </table>
  </div>
</div>

{{-- <div class="text-center">
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</div> --}}

{{-- <script src="{{ asset('js/chart_users.js') }}"></script> --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js"></script>

@endsection
