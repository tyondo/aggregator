<header class="header" role="banner">
    <!-- Navbar -->
    <nav class="navbar navbar-toggleable-sm fixed-top navbar-inverse faded" role="navigation" style="background-color: #75975c">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--<a class="navbar-brand align-self-center pt-0" href="index-cards.html">Outsider</a>-->
            <!-- Navbar Brand image
            <a class="navbar-brand align-self-center pt-0" href="index-cards.html">
                <img src="img/otsdr-logo.svg" width="auto" height="30" alt="logo">
            </a>-->
            <!-- Navbar Brand sprite -->
            <a class="navbar-brand align-self-center pt-0 sprite" href="{{url('/')}}" >
                {{--<img src="{{asset('')}}vendor/blog/front/img/otsdr-sprite.svg" width="auto" height="60" alt="logo">--}}
                <span style="width: inherit">{{config('app.name')}}</span>
            </a>
            <div class="collapse navbar-collapse align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a href="{{url('/')}}" class="nav-link">All Policies</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{route('admin.posts.manage')}}">Admin</a>
                            <a class="dropdown-item" href="{{route('frontend.user.profile')}}">Account</a>
                            <a class="dropdown-item" data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </a>
                        </div>
                    </li>
                </ul>
                <!---
                Enable Search on the website
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#" id="menu-button" class="nav-link mdi mdi-magnify" title="Menu" aria-expanded="false" aria-label="Side navigation"></a>
                    </li>
                </ul>
                -->
            </div>
        </div>
    </nav>
</header>