@extends('layouts.plane')

@section('body')
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('') }}">Addis Cars</a>
            </div>
            <!-- /.navbar-header -->


            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!-- Cars menu -->
                        <li>
                            <a href="/cars/"><i class="fa fa-automobile fa-fw"></i> Cars<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*blank') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/index.php/cars/create') }}">New Car</a>
                                </li>
                                <li>
                                    <a href="{{ url ('/index.php/cars') }}">Cars</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!-- Owners menu -->
                        <li>
                            <a href="/owners/"><i class="fa fa-user fa-fw"></i>Owners<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*blank') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/index.php/owners/create') }}">New Owner</a>
                                </li>
                                <li>
                                    <a href="{{ url ('/index.php/owners') }}">Owners</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="/buyers/"><i class="fa fa-user fa-fw"></i>Buyers<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*blank') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/index.php/buyers/create') }}">New Buyer</a>
                                </li>
                                <li>
                                    <a href="{{ url ('/index.php/buyers') }}">Buyer</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="/callrecords/"><i class="fa fa-phone fa-fw"></i>Call record<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*blank') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/index.php/callrecords/create') }}">New Call</a>
                                </li>
                                <li>
                                    <a href="{{ url ('/index.php/callrecords') }}">Call records</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!-- CarRequest menu -->
                        <li>
                            <a href="/requestedcars/"><i class="fa fa-automobile fa-fw"></i>Requested Cars<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*blank') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/index.php/requestedcars/create') }}">New Car Request</a>
                                </li>
                                <li>
                                    <a href="{{ url ('/index.php/requestedcars') }}">Requested Cars</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!-- CarFound menu -->
                        <li>
                            <a href="/foundcars/"><i class="fa fa-automobile fa-fw"></i>Found Cars<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*blank') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/index.php/foundcars/create') }}">New Found Car</a>
                                </li>
                                <li>
                                    <a href="{{ url ('/index.php/foundcars') }}">Found Cars</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header pull-left">@yield('page_heading')</h1>
                    <div class="page-header input-group custom-search-form pull-right">
                        <form class="input-group" role="form" action="@yield('search_page')" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                             <span class="input-group-btn">
                                 <button class="btn btn-default" type="submit">
                                     <i class="fa fa-search"></i>
                                 </button>
                             </span>
                        </form>
                    </div>
                </div>
                 <!-- /.col-lg-12 -->
           </div>

            @yield('filters')

            <div class="row">
				@yield('section')

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@stop

