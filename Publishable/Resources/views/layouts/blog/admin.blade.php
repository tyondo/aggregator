<!DOCTYPE html>
<html lang="en">
  <head>
    {{--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('')}}" />

    <title>{{ config('app.name') }}</title>--}}
    @include('aggregator::layouts.meta')
    <!-- Bootstrap -->
    <link href="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/DataTables/datatables.min.css')}}" rel="stylesheet">

  @yield('css')
    <!-- Custom Theme Style -->
    <link href="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/custom/css/custom.min.css')}}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-bank"></i> <span>{{ config('app.name') }}</span></a>
            </div>
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('vendor/tyondo/aggregator/images/user.png')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Options</h3>
                <ul class="nav side-menu">
                  <li><a href="{{url('/')}}"><i class="fa fa-home"></i>Home</a></li>
                  <li><a href="{{route('admin.media.manage')}}"><i class="fa fa-film"></i>Media</a></li>
                  <li><a><i class="fa fa-book"></i> Blog<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('admin.posts.index')}}">Posts</a></li>
                      <li><a href="{{route('admin.posts.manage')}}">Manage Posts</a></li>
                      <li><a href="{{route('admin.posts.create')}}">Add Post</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cubes"></i> Metadata<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('admin.categories.index')}}">Metadata</a></li>
                      <li><a href="{{route('admin.categories.create')}}">Add Metadata</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('/logout') }}"
                onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                   <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                   <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                       {{ csrf_field() }}
                   </form>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('vendor/tyondo/aggregator/images/user.png')}}" alt="">{{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{url('/')}}" target="_blank" ><i class="fa fa-globe pull-right"></i> Visit Site</a></li>
                    <li><a href="{{url('admin/users', Auth::user()->id)}}"><i class="fa fa-lock pull-right"></i>
                      Change Password</a></li>
                    {{--<li><a href="javascript:;">Help</a></li>--}}
                    <li>
                      <a href="{{ url('/logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                   <i class="fa fa-sign-out pull-right"></i>Logout
                      </a>
                      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            {{ config('app.name') }} by <a href="https://musoni.co.ke">Musoni Kenya</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/nprogress/nprogress.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/iCheck/icheck.min.js')}}"></script>
    <!-- Datatables -->
    <script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/DataTables/datatables.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/custom/js/custom.min.js')}}"></script>
    @yield('script')

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();


        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
    @if (!empty(\Tyondo\Aggregator\Models\Settings::gaId()))
        @include('aggregator::shared.GoogleAnalytics')
    @endif
  </body>
</html>
