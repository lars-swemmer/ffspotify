@extends('layouts.app')

@section('content')
    <div class="dashhead">
        <div class="dashhead-titles">
            <h6 class="dashhead-subtitle">Dashboards</h6>
            <h2 class="dashhead-title">Overview <small class="text-muted">&middot; {{ Carbon\Carbon::today()->format('d M Y') }}</small></h2>
        </div>

        {{-- <div class="btn-toolbar dashhead-toolbar">
            <div class="btn-toolbar-item input-with-icon">
                <input type="text" value="01/01/15 - 01/08/15" class="form-control" data-provide="datepicker">
                <span class="icon icon-calendar"></span>
            </div>
        </div> --}}
    </div> <!-- dashhead -->

    <hr class="m-t">

    <div class="row statcards">
        <div class="col-sm-6 col-lg-3 m-b">
            <div class="statcard statcard-primary">
                <div class="p-a">
                    <span class="statcard-desc">Page views</span>
                    <h2 class="statcard-number">
                        0
                        <small class="delta-indicator">-</small>
                    </h2>
                    <hr class="statcard-hr m-b-0">
                </div>
                <canvas id="sparkline1" width="378" height="94" class="sparkline" data-chart="spark-line" data-value="[{data:[0,0,0,0,0,0,0]}]" data-labels="['a','b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 m-b">
            <div class="statcard statcard-primary">
                <div class="p-a">
                    <span class="statcard-desc">Fans</span>
                    <h2 class="statcard-number">
                        {{ $usersTotal }}
                        @if($usersToday > '0')
                          <small class="text-success delta-indicator delta-positive">{{ $usersToday }}</small>
                        @else
                          <small class="delta-indicator">-</small>
                        @endif
                    </h2>
                    <hr class="statcard-hr m-b-0">
                </div>
                <canvas id="sparkline1" width="378" height="94" class="sparkline" data-chart="spark-line" data-value="[{data:[0,0,0,0,0,0,0]}]" data-labels="['a', 'b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 m-b">
            <div class="statcard statcard-primary">
                <div class="p-a">
                    <span class="statcard-desc">Artist Follows</span>
                    <h2 class="statcard-number">
                        {{ $artistFollowers }}
                        @if($artistFollowerToday > '0')
                          <small class="text-success delta-indicator delta-positive">{{ $artistFollowerToday }}</small>
                        @else
                          <small class="delta-indicator">-</small>
                        @endif
                    </h2>
                    <hr class="statcard-hr m-b-0">
                </div>
                <canvas id="sparkline1" width="378" height="94" class="sparkline" data-chart="spark-line" data-value="[{data:[0,0,0,0,0,0,0 ]}]" data-labels="['a', 'b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 m-b">
            <div class="statcard statcard-primary">
                <div class="p-a">
                    <span class="statcard-desc">Playlist Follows</span>
                    <h2 class="statcard-number">
                        {{ $playlistFollowers }}
                        @if($playlistFollowerToday > '0')
                          <small class="text-success delta-indicator delta-positive">{{ $playlistFollowerToday }}</small>
                        @else
                          <small class="delta-indicator">-</small>
                        @endif
                    </h2>
                    <hr class="statcard-hr m-b-0">
                </div>
                <canvas id="sparkline1" width="378" height="94" class="sparkline" data-chart="spark-line" data-value="[{data:[0,0,0,0,0,0,0]}]" data-labels="['a', 'b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
            </div>
        </div>
    </div> <!-- /statcards -->

    <div class="hr-divider m-t-md m-b">
      <h3 class="hr-divider-content hr-divider-heading">Quick stats</h3>
    </div>

    <div class="row">
      <div class="col-md-6 m-b-md">
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
      <div class="col-md-6 m-b-md">
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
    </div>

  <div class="hr-divider m-t-md m-b">
      <h3 class="hr-divider-content hr-divider-heading">Latest fans</h3>
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

    </div>

@endsection
