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
                            <h4 class="title">Welcome! You have been selected to be an admin!</h4>
                            <p class="category">To access your account please set a new password!</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <form method="POST" action="password/change">
                                {{ csrf_field() }}
                                <div class="content">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input placeholder="Enter password" class="form-control" type="password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm New Password</label>
                                        <input placeholder="Enter password" class="form-control" type="password" name="password_confirmation">
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