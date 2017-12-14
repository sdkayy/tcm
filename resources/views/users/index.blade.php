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
                            <h4 class="title">Please Login</h4>
                            <p class="category">To access this part you need to have an admin account</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <form method="POST" action="login">
                                {{ csrf_field() }}
                                <div class="content">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input placeholder="Enter username" class="form-control" type="text" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input placeholder="Enter password" class="form-control" type="password" name="password">
                                    </div>
                                    <button type="submit" class="btn btn-fill btn-info">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection