@extends('layouts.master')

@section('content')
<div class="main-panel">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="#">{{ ucwords(\Request::route()->getName()) }}</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-bell"></i>
								<p>Last 5 Records</p>
								<b class="caret"></b>
                          </a>
                          <ul class="dropdown-menu">
                            @foreach($lastFive as $record)
                                <li><a href="{{ route('dashboard') }}?filter=gamertag&value={{ $record->gamertag }}">{{ $record->user_added }} Added {{ $record->gamertag }} {{ $record->created_at->diffForHumans() }}</a></li>
                            @endforeach
                          </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
            	<div class="col-md-12">
                    @if(auth()->user()->admin_level > 2)
                    <div class="card">
                        <div class="header">
                            <h4 class="title">All Admins</h4>
                            <p class="category">Sorted by id</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                    <th>ID</th>
                                	<th>Username</th>
                                	<th>Created At</th>
                                	<th>Actions</th>
                                </thead>
                                <tbody>
                                	@foreach($admins as $admin)
                                		@include('layouts.a_table')
                                	@endforeach
                                </tbody>
                            </table>
                            <div class="content">
                                {{ $admins->appends(Illuminate\Support\Facades\Input::except('admins'))->links('layouts.paginate') }}
                                <hr>
                                <button class="btn btn-info" data-toggle="modal" data-target="#addAdmin">Add Admin</button>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="card">
                        <div class="header">
                            <h4 class="title">All Whitelists</h4>
                            <p class="category">Sorted by latest entries</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Field</th>
                                    <th>Value</th>
                                    <th>Admin</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach($whitelists as $entry)
                                        @include('layouts.aw_table')
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="content">
                                {{ $admins->appends(Illuminate\Support\Facades\Input::except('admins'))->links('layouts.paginate') }}
                                <hr>
                                <button class="btn btn-info" data-toggle="modal" data-target="#addWhitelist">Add Whitelist</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Users Behavior</h4>
                            <p class="category">24 Hours performance</p>
                        </div>
                        <div class="content">
                            <div id="chartHours" class="ct-chart"></div>
                            <div class="footer">
                                <div class="chart-legend">
                                    <i class="fa fa-circle text-info"></i> Open
                                    <i class="fa fa-circle text-danger"></i> Click
                                    <i class="fa fa-circle text-warning"></i> Click Second Time
                                </div>
                                <hr>
                                <div class="stats">
                                    <i class="ti-reload"></i> Updated 3 minutes ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>
    </div>


    <footer class="footer">
        <div class="container-fluid">

        </div>
    </footer>
</div>
@endsection