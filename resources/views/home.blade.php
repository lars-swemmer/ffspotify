@extends('layouts.app')

@section('content')
    <div class="dashhead">
        <div class="dashhead-titles">
            <h6 class="dashhead-subtitle">Dashboards</h6>
            <h2 class="dashhead-title">Overview</h2>
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
            <div class="statcard statcard-success">
                <div class="p-a">
                    <span class="statcard-desc">Page views</span>
                    <h2 class="statcard-number">
                        0
                    <small class="delta-indicator delta-positive">0%</small>
                    </h2>
                    <hr class="statcard-hr m-b-0">
                </div>
                <canvas id="sparkline1" width="378" height="94" class="sparkline" data-chart="spark-line" data-value="[{data:[0,0,0,0,0,0,0]}]" data-labels="['a','b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 m-b">
            <div class="statcard statcard-danger">
                <div class="p-a">
                    <span class="statcard-desc">Users</span>
                    <h2 class="statcard-number">
                        {{ $usersTotal }}
                        <small class="delta-indicator delta-negative">100%</small>
                    </h2>
                    <hr class="statcard-hr m-b-0">
                </div>
                <canvas id="sparkline1" width="378" height="94" class="sparkline" data-chart="spark-line" data-value="[{data:[0,0,0,0,0,0,0]}]" data-labels="['a', 'b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 m-b">
            <div class="statcard statcard-info">
                <div class="p-a">
                    <span class="statcard-desc">Artist Follows</span>
                    <h2 class="statcard-number">
                        {{ $artistFollowers }}
                        <small class="delta-indicator delta-positive">100%</small>
                    </h2>
                    <hr class="statcard-hr m-b-0">
                </div>
                <canvas id="sparkline1" width="378" height="94" class="sparkline" data-chart="spark-line" data-value="[{data:[0,0,0,0,0,0,0 ]}]" data-labels="['a', 'b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 m-b">
            <div class="statcard statcard-warning">
                <div class="p-a">
                    <span class="statcard-desc">Playlist Follows</span>
                    <h2 class="statcard-number">
                        {{ $playlistFollowers }}
                        <small class="delta-indicator delta-negative">0%</small>
                    </h2>
                    <hr class="statcard-hr m-b-0">
                </div>
                <canvas id="sparkline1" width="378" height="94" class="sparkline" data-chart="spark-line" data-value="[{data:[0,0,0,0,0,0,0]}]" data-labels="['a', 'b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
            </div>
        </div>
    </div> <!-- /statcards -->

   {{--  <div class="hr-divider m-t-md m-b">
      <h3 class="hr-divider-content hr-divider-heading">Quick stats</h3>
    </div>

    <div class="row">
      <div class="col-md-6 m-b-md">
        <div class="list-group">
          <h4 class="list-group-header">
            Countries
          </h4>
          
            <a class="list-group-item" href="#">
              <span class="list-group-progress" style="width: 62.4%;"></span>
              <span class="pull-right text-muted">62.4%</span>
              United States
            </a>
          
            <a class="list-group-item" href="#">
              <span class="list-group-progress" style="width: 15.0%;"></span>
              <span class="pull-right text-muted">15.0%</span>
              India
            </a>
          
            <a class="list-group-item" href="#">
              <span class="list-group-progress" style="width: 5.0%;"></span>
              <span class="pull-right text-muted">5.0%</span>
              United Kingdom
            </a>
          
            <a class="list-group-item" href="#">
              <span class="list-group-progress" style="width: 5.0%;"></span>
              <span class="pull-right text-muted">5.0%</span>
              Canada
            </a>
          
            <a class="list-group-item" href="#">
              <span class="list-group-progress" style="width: 4.5%;"></span>
              <span class="pull-right text-muted">4.5%</span>
              Russia
            </a>
          
            <a class="list-group-item" href="#">
              <span class="list-group-progress" style="width: 2.3%;"></span>
              <span class="pull-right text-muted">2.3%</span>
              Mexico
            </a>
          
            <a class="list-group-item" href="#">
              <span class="list-group-progress" style="width: 1.7%;"></span>
              <span class="pull-right text-muted">1.7%</span>
              Spain
            </a>
          
            <a class="list-group-item" href="#">
              <span class="list-group-progress" style="width: 1.5%;"></span>
              <span class="pull-right text-muted">1.5%</span>
              France
            </a>
          
            <a class="list-group-item" href="#">
              <span class="list-group-progress" style="width: 1.4%;"></span>
              <span class="pull-right text-muted">1.4%</span>
              South Africa
            </a>
          
            <a class="list-group-item" href="#">
              <span class="list-group-progress" style="width: 1.2%;"></span>
              <span class="pull-right text-muted">1.2%</span>
              Japan
            </a>
          
        </div>
        <a href="#" class="btn btn-primary-outline p-x">View all countries</a>
      </div>
      <div class="col-md-6 m-b-md">
        <div class="list-group">
          <h4 class="list-group-header">
            Favorite artists
          </h4>
          
            <a class="list-group-item" href="#">
              <span class="pull-right text-muted">3,929,481</span>
              Avicii
            </a>
          
            <a class="list-group-item" href="#">
              <span class="pull-right text-muted">1,143,393</span>
              Moderat
            </a>
          
            <a class="list-group-item" href="#">
              <span class="pull-right text-muted">938,287</span>
              The Xx
            </a>
          
            <a class="list-group-item" href="#">
              <span class="pull-right text-muted">749,393</span>
              /features/something
            </a>
          
            <a class="list-group-item" href="#">
              <span class="pull-right text-muted">695,912</span>
              /features/another-thing
            </a>
          
            <a class="list-group-item" href="#">
              <span class="pull-right text-muted">501,938</span>
              /users/username
            </a>
          
            <a class="list-group-item" href="#">
              <span class="pull-right text-muted">392,842</span>
              /page-title
            </a>
          
            <a class="list-group-item" href="#">
              <span class="pull-right text-muted">298,183</span>
              /some/page-slug
            </a>
          
            <a class="list-group-item" href="#">
              <span class="pull-right text-muted">193,129</span>
              /another/directory/and/page-title
            </a>
          
            <a class="list-group-item" href="#">
              <span class="pull-right text-muted">93,382</span>
              /one-more/page/directory/file-name
            </a>
          
        </div>
        <a href="#" class="btn btn-primary-outline p-x">View all artists</a>
      </div>
    </div> --}}

    <div class="hr-divider m-t-md m-b">
        <h3 class="hr-divider-content hr-divider-heading">Latest fans</h3>
    </div>

    <div class="table-full">
      <div class="table-responsive">
        <table class="table" data-sort="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Full name</th>
              <th>Username</th>
              <th>Type</th>
              <th>New follower</th>
              <th>Followers</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->display_name}}</td>
                <td>{{$user->spotify_id}}</td>
                <td>{{$user->type}}</td>
                <td>
                  @if($user->artistFollow->new_follow == '1')
                    Yes
                  @else
                    No
                  @endif
                </td>
                <td>{{$user->followers}}</td>
                <td>{{$user->updated_at}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <a href="#" class="btn btn-primary-outline p-x">View all users</a>

    </div>

@endsection
