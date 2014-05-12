<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <title>@yield('title', 'Admin')</title>

        {{HTML::style('backend/css/bootstrap.min.css')}}
        {{HTML::style('backend/font-awesome/css/font-awesome.css')}}
        {{HTML::style('backend/css/data-table-bootstrap.css')}}
        @yield('styles')
        {{HTML::style('backend/css/admin.css')}}

    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{URL::route('admin.index')}}">Admin</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Account
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="navbar-content">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <img src="{{asset('backend/img/avatar.jpg')}}"
                                                 alt="Alternate Text" class="img-responsive" />
                                            <p class="text-center small">
                                                <a href="#">Change Photo</a></p>
                                        </div>
                                        <div class="col-md-7">
                                            <span>{{Sentry::getUser()->first_name}}</span>
                                            <p class="text-muted small">
                                                {{Sentry::getUser()->email}}</p>
                                            <div class="divider">
                                            </div>
                                            <a href="#" class="btn btn-primary btn-sm active">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="navbar-footer">
                                    <div class="navbar-footer-content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="#" class="btn btn-default btn-sm">Change Passowrd</a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="{{URL::route('admin.logout')}}" class="btn btn-default btn-sm pull-right">Sign Out</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default navbar-static-side" role="navigation">
                    <div class="sidebar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="{{URL::route('admin.index')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{URL::route('admin.users.index')}}">Users list</a>
                                    </li>
                                    <li>
                                        <a href="#">Groups</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                        <!-- /#side-menu -->
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                @yield('content')
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
        {{HTML::script('backend/js/jquery.js')}}
        {{HTML::script('backend/js/bootstrap.min.js')}}
        {{HTML::script('backend/js/data-tables.js')}}
        {{HTML::script('backend/js/data-table-bootstrap.js')}}
        @yield('scripts')
        {{HTML::script('backend/js/admin.js')}}
        @yield('custom_scripts')
    </body>

</html>
