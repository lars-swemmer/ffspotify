@extends('layouts.app')

@section('content')
    <div class="dashhead">
        <div class="dashhead-titles">
            <h6 class="dashhead-subtitle">Dashboards</h6>
            <h2 class="dashhead-title">Overview <small class="text-muted">&middot; Last 14 days ({{ Carbon\Carbon::today()->subDays(13)->format('d M Y') }} - {{ Carbon\Carbon::today()->format('d M Y') }})</small></h2>
        </div>

        {{-- <div class="btn-toolbar dashhead-toolbar">
            <div class="btn-toolbar-item input-with-icon">
                <input type="text" value="01/01/15 - 01/08/15" class="form-control" data-provide="datepicker">
                <span class="icon icon-calendar"></span>
            </div>
        </div> --}}
    </div> <!-- dashhead -->

    <script type="text/javascript">
    window.onload = function() {

      var ctx = document.getElementById("graphArtist");
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
                  label: 'Fans',
                  data: [
                    @foreach ($weekPerformance as $day)
                      {{ $day->spotify_users }},
                    @endforeach
                    @foreach ($todayPerformance as $day)
                      {{ $day->spotify_users }},
                    @endforeach
                  ],
                  backgroundColor: "rgba(25, 181, 254,0.2)",
                  borderColor: "rgba(25, 181, 254,1)",
                  borderWidth: 2
              }]
          },
          options: {
              scales: {
                  xAxes: [{
                      display: false
                  }]
              }
          }
      });

    var ctxArtist = document.getElementById("graphPlaylist");
      var myChartArtist = new Chart(ctxArtist, {
          type: 'line',
          data: {
              labels: [
                @foreach ($weekPerformance as $day)
                  "{{ Carbon\Carbon::parse($day->created_at)->format('d-M') }}",
                @endforeach
                "{{ Carbon\Carbon::today()->format('d-M') }}"
              ],
              datasets: [{
                  label: 'Playlist follows',
                  data: [
                    @foreach ($weekPerformance as $day)
                      {{ $day->spotify_playlist_followers }},
                    @endforeach
                    @foreach ($todayPerformance as $day)
                      {{ $day->spotify_playlist_followers }},
                    @endforeach
                  ],
                  backgroundColor: "rgba(25, 181, 254,0.2)",
                  borderColor: "rgba(25, 181, 254,1)",
                  borderWidth: 2
              }]
          },
          options: {
              scales: {
                  xAxes: [{
                      display: false
                  }]
              }
          }
      });

    }

  </script>

  <hr class="m-t">

  <div class="row p-t p-b">
    <div class="col-md-6">
      <canvas id="graphArtist" style="width: 100%;"></canvas>
    </div>
    <div class="col-md-6">
      <canvas id="graphPlaylist" style="width: 100%;"></canvas>
    </div>
  </div>

    <hr class="m-t">

    <div class="row statcards">
        {{-- <div class="col-sm-6 col-lg-3">
          <div class="statcard p-a">
            <h2 class="statcard-number">
              12,938
              <small class="delta-indicator">5%</small>
            </h2>
            <span class="statcard-desc">Page views</span>
          </div>
        </div> --}}
        <div class="col-sm-6 col-lg-3">
            <div class="statcard p-a">
            <h2 class="statcard-number">
              {{ number_format($usersTotal) }}
              @if($usersToday > '0')
                <small class="text-success delta-indicator delta-positive">{{ $usersToday }}</small>
              @else
                <small class="delta-indicator">-</small>
              @endif
            </h2>
            <span class="statcard-desc">Fans</span>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="statcard p-a">
            <h2 class="statcard-number">
              {{ number_format($playlistFollowers) }}
              @if($playlistFollowerToday > '0')
                <small class="text-success delta-indicator delta-positive">{{ $playlistFollowerToday }}</small>
              @else
                <small class="delta-indicator">-</small>
              @endif
            </h2>
            <span class="statcard-desc">Playlist Follows</span>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="statcard p-a">
            <h2 class="statcard-number">
              {{ number_format($artistFollowers) }}
              @if($artistFollowerToday > '0')
                <small class="text-success delta-indicator delta-positive">{{ $artistFollowerToday }}</small>
              @else
                <small class="delta-indicator">-</small>
              @endif
            </h2>
            <span class="statcard-desc">Artist Follows</span>
          </div>
        </div>
    </div> <!-- /statcards -->

    <div class="hr-divider m-t-md m-b">
      <h3 class="hr-divider-content hr-divider-heading">Quick stats</h3>
    </div>

    <div class="row">
      <div class="col-md-4 m-b-md">
        <div class="list-group">
          <h4 class="list-group-header">
            Top countries
          </h4>
          
            @foreach($topCountries as $country)
              <a class="list-group-item">
                {{-- <span class="list-group-progress" style="width: 62.4%;"></span> --}}
                <span class="list-group-progress"></span>
                <span class="pull-right text-muted">{{ $country->count }}</span>
                {{ $country->country }}
              </a>
            @endforeach
          
        </div>
        {{-- <a href="#" class="btn btn-primary-outline p-x">View all countries</a> --}}
      </div>
      <div class="col-md-4 m-b-md">
        <div class="list-group">
          <h4 class="list-group-header">
            Top artists
          </h4>
          
            @foreach($topArtists as $topArtist)

            <a class="list-group-item">
              <span class="pull-right text-muted">{{ $topArtist->count }}</span>
              {{ $topArtist->name }}
            </a>

            @endforeach
          
        </div>
        {{-- <a href="top-artists" class="btn btn-primary-outline p-x">View all artists</a> --}}
      </div>

      <div class="col-md-4 m-b-md">
        <div class="list-group">
          <h4 class="list-group-header">
            New fans
          </h4>
          
            @foreach($users as $user)

            <a class="list-group-item">
              <span class="pull-right text-muted">{{ $user->updated_at->diffForHumans() }}</span>
              {{ $user->spotify_id }}
            </a>

            @endforeach
          
        </div>
        {{-- <a href="top-artists" class="btn btn-primary-outline p-x">View all artists</a> --}}
      </div>
    </div>

 {{--  <div class="hr-divider m-t-md m-b">
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
      <a href="users" class="btn btn-primary-outline p-x">View all fans</a>

    </div> --}}

    {{-- <script src="{{ asset('js/chart_users.js') }}"></script> --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js"></script>

@endsection
