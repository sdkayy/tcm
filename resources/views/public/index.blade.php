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
                          
                    </li>
                </ul>

            </div>
        </div>
    </nav>


    <div class="content">
        <div class="container-fluid">
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
                                <hr>
                                <button class="btn btn-info" data-toggle="modal" data-target="#searchRecords">Search</button>
                            </div>
                        </div>
			        </div>
			    </div>
			</div>
        </div>
    </div>


    <footer class="footer">
        <div class="container-fluid">

        </div>
    </footer>
</div>
@endsection