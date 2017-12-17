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
                <a class="navbar-brand" href="{{ route('dashboard') }}">{{ ucwords(\Request::route()->getName()) }}</a>
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
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-warning text-center">
                                        <i class="ti-notepad"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Total Records</p>
                                        {{ $recordCount }}
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="ti-timer"></i> All time
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-success text-center">
                                        <i class="ti-notepad"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Recent Records</p>
                                        {{ $recordYCount }}
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="ti-timer"></i> In the last day
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-info text-center">
                                        <i class="ti-notepad"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Recent Records</p>
                                        {{ $recordHCount }}
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="ti-timer"></i> In the last hour
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-danger text-center">
                                        <i class="ti-pulse"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Failed Requests</p>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="ti-timer"></i> In the last hour
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            	<div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">All Records</h4>
                            <p class="category">Sorted by latest entries</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                    <th>ID</th>
                                	<th>Logged By</th>
                                	<th>Gamertag</th>
                                	<th>XUID</th>
                                	<th>IP / Port</th>
                                	<th>Created At</th>
                                	<th>Actions</th>
                                </thead>
                                <tbody>
                                	@foreach($records as $record)
                                		@include('layouts.s_table')
                                	@endforeach
                                </tbody>
                            </table>
                            <div class="content">
                                {{ $records->appends(Illuminate\Support\Facades\Input::except('records'))->links('layouts.paginate') }}
                                <form>
                                    <input type="number" name="records" class="form-control" value="{{ $records->currentPage() + 1 }}">
                                    <br>
                                    <button type="submit" class="btn btn-info">Goto Page</button>
                                    <p>Min Page: 1 | Max Page: {{ $records->lastPage() }}
                                </form>
                                <hr>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#massDModal">Mass Delete Records</button>
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