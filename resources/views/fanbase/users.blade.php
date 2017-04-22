@extends('layouts.app')

@section('content')
    <div class="dashhead">
        <div class="dashhead-titles">
            <h6 class="dashhead-subtitle">Dashboards</h6>
            <h2 class="dashhead-title">Users</h2>
        </div>

       {{--  <div class="btn-toolbar dashhead-toolbar">
            <div class="btn-toolbar-item input-with-icon">
                <input type="text" value="01/01/15 - 01/08/15" class="form-control" data-provide="datepicker">
                <span class="icon icon-calendar"></span>
            </div>
        </div> --}}
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

<canvas id="graph" style="width: 100%;"></canvas>

<div class="hr-divider m-t-md m-b">
        <h3 class="hr-divider-content hr-divider-heading">Users</h3>
    </div>

<div class="table-full">
  <div class="table-responsive">
    <table class="table" data-sort="table">
      <thead>
        <tr>
              <th>#</th>
              <th>Full name</th>
              <th>Username</th>
              <th>Country</th>
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
            <td>{{$user->country}}</td>
            <td>
              @if($user->artistFollow->new_follow == '1')
                Yes
              @else
                No
              @endif
            </td>
            <td>{{$user->followers}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
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

<script src="{{ asset('js/chart_users.js') }}"></script>

@endsection
