<div class="sidebar" data-background-color="black" data-active-color="danger">

<!--
	Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
	Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
-->

	<div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route('dashboard') }}" class="simple-text">
                TCM Logger
            </a>
        </div>

        <ul class="nav">
            @if(Auth::check())
            <li {{ \Request::route()->getName() == 'dashboard' ? 'class=active' : "" }}>
                <a href="{{ route('dashboard') }}">
                    <i class="ti-panel"></i>
                    <p>Manage Other</p>
                </a>
            </li>
            @if(auth()->user()->admin_level > 1)
                <li {{ \Request::route()->getName() == 'manage' ? 'class=active' : "" }}>
                    <a href="{{ route('manage') }}">
                        <i class="ti-user"></i>
                        <p>Manage Admins</p>
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ route('logout') }}">
                    <i class="ti-arrow-left"></i>
                    <p>Logout</p>
                </a>
            </li>
            @else
            <li {{ \Request::route()->getName() == 'login' ? 'class=active' : "" }}>
                <a href="{{ route('login') }}">
                    <i class="ti-user"></i>
                    <p>Login</p>
                </a>
            </li>
            <li {{ \Request::route()->getName() == 'lookup' ? 'class=active' : "" }}>
                <a href="{{ route('lookup') }}">
                    <i class="ti-server"></i>
                    <p>Public Search</p>
                </a>
            </li>
            @endif
        </ul>
	</div>
</div>