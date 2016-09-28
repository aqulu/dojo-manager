@extends('layouts.base')

@section('navigation')
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    和道会
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/categories') }}">Übersicht</a></li>
										<li><a href="{{ url('/media') }}">Videos</a></li>
                    <li><a href="{{ url('/syllabus') }}">Prüfungsprogramm</a></li>
										@if(Auth::user()->admin)
		                    <li><a href="{{ url('/users') }}">Mitglieder</a></li>
		                    <li><a href="{{ url('/groups') }}">Gruppen</a></li>
										@endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Registrieren</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
																<svg height="20px" style="margin-bottom: -10px;" viewbox="0 0 100 75">
																	<path d="M 0 20 q 50 10 100 0" style="stroke: {{ (Auth::user()->belt) ? Auth::user()->belt->color_hex : '#FFFFFF' }}" stroke-width="7" fill="none" />
																	<path d="M 10 75 q 40 -100 80 0" style="stroke: {{ (Auth::user()->belt) ? Auth::user()->belt->color_hex : '#FFFFFF' }}" stroke-width="7" fill="none" />
																	<circle cx="50" cy="25" r="10" style="fill: {{ (Auth::user()->belt) ? Auth::user()->belt->color_hex : '#FFFFFF' }}"  />
																</svg>
																{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/media') }}"><i class="fa fa-btn fa-upload"></i>Meine Uploads</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endsection
