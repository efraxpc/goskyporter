<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Goskyporter</title>

    <style>
        #loader {
            transition: all 0.3s ease-in-out;
            opacity: 1;
            visibility: visible;
            position: fixed;
            height: 100vh;
            width: 100%;
            background: #fff;
            z-index: 90000;
        }

        #loader.fadeOut {
            opacity: 0;
            visibility: hidden;
        }

        .spinner {
            width: 40px;
            height: 40px;
            position: absolute;
            top: calc(50% - 20px);
            left: calc(50% - 20px);
            background-color: #333;
            border-radius: 100%;
            -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
            animation: sk-scaleout 1.0s infinite ease-in-out;
        }

        @-webkit-keyframes sk-scaleout {
            0% { -webkit-transform: scale(0) }
            100% {
                -webkit-transform: scale(1.0);
                opacity: 0;
            }
        }

        @keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
            } 100% {
                  -webkit-transform: scale(1.0);
                  transform: scale(1.0);
                  opacity: 0;
              }
        }
    </style>
    <link href="{{ asset('css/1.css') }}" rel="stylesheet">
    <link href="{{ asset('css/2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body class="app app w-100 p-0">
<!-- @TOC -->
<!-- =================================================== -->
<!--
  + @Page Loader
  + @App Content
      - #Left Sidebar
          > $Sidebar Header
          > $Sidebar Menu

      - #Main
          > $Topbar
          > $App Screen Content
-->

<!-- @Page Loader -->
<!-- =================================================== -->
<div id='loader'>
    <div class="spinner"></div>
</div>

<script>
    window.addEventListener('load', function load() {
        const loader = document.getElementById('loader');
        setTimeout(function() {
            loader.classList.add('fadeOut');
        }, 300);
    });
</script>

<!-- @App Content -->
<!-- =================================================== -->
<div>
    <!-- #Left Sidebar ==================== -->
    <div class="sidebar">
        <div class="sidebar-inner">
            <!-- ### $Sidebar Header ### -->
            <div class="sidebar-logo">
                <div class="peers ai-c fxw-nw">
                    <div class="peer peer-greed">
                        <a class="sidebar-link td-n" href="#">
                            <div class="peers ai-c fxw-nw">
                                <div class="peer">
                                    <div class="logo">
                                        <img src="{{ asset('static/images/Book-flights.png') }}" alt="" style="max-height: 56px;">
                                    </div>
                                </div>
                                <div class="peer peer-greed">
                                    <h5 class="lh-1 mB-0 logo-text">Adminator</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="peer">
                        <div class="mobile-toggle sidebar-toggle">
                            <a href="" class="td-n">
                                <i class="ti-arrow-circle-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ### $Sidebar Menu ### -->
            <ul class="sidebar-menu scrollable pos-r">
                <li class="nav-item mT-30 actived">
                    <a class="sidebar-link" href="{{ route('customer_create_home') }}">
                <span class="icon-holder">
                  <i class="far fa-plus-square"></i>
                </span>
                        <span class="title">New Query</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle click_info_icon" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="fas fa-tasks"></i>
                </span>
                        <span class="title"> Manage CRM</span>
                        <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class='sidebar-link' href="{{ route('airlines.index') }}"><i class="fas fa-plane"></i> Airlines</a>
                        </li>
                        <li>
                            <a class='sidebar-link' href="{{ route('airports.index') }}"><i class="fas fa-building"></i> Airports</a>
                        </li>
                        <li>
                            <a class='sidebar-link' href="{{ route('visastatus.index') }}"><i class="fas fa-passport"></i> Visa Status</a>
                        </li>
                        <li>
                            <a class='sidebar-link' href="{{ route('bookingsources.index') }}"><i class="fas fa-book-open"></i> Booking Sources</a>
                        </li>
                        <li>
                            <a class='sidebar-link' href="{{ route('querytypes.index') }}"><i class="fas fa-route"></i> Query Types</a>
                        </li>
                        <li>
                            <a class='sidebar-link' href="{{ route('bookingtypes.index') }}"><i class="fas fa-bookmark"></i> Booking Types</a>
                        </li>
                        <li>
                            <a class='sidebar-link' href="{{ route('querystatuses.index') }}"><i class="fas fa-shield-alt"></i> Query Statuses</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- #Main ============================ -->
    <div class="page-container">
        <!-- ### $Topbar ### -->
        <div class="row">
            <div class="col-4">
                <a class="btn btn-success" role="button" href="{{ route('customer_create_home') }}">Add Query</a>
            </div>
            <div class="col-2">
                <ul class="nav justify-content mobile_menu d-sm-none">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Manage CRM</a>
                        <div class="dropdown-menu">
                            <a class='dropdown-item' href="{{ route('airlines.index') }}"><i class="fas fa-plane"></i> Airlines</a>
                            <a class='dropdown-item' href="{{ route('airports.index') }}"><i class="fas fa-building"></i> Airports</a>
                            <a class='dropdown-item' href="{{ route('visastatus.index') }}"><i class="fas fa-passport"></i> Visa Status</a>
                            <a class='dropdown-item' href="{{ route('bookingsources.index') }}"><i class="fas fa-book-open"></i> Booking Sources</a>
                            <a class='dropdown-item' href="{{ route('querytypes.index') }}"><i class="fas fa-route"></i> Query Types</a>
                            <a class='dropdown-item' href="{{ route('bookingtypes.index') }}"><i class="fas fa-bookmark"></i> Booking Types</a>
                            <a class='dropdown-item' href="{{ route('querystatuses.index') }}"><i class="fas fa-shield-alt"></i> Query Statuses</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-10">
                <ul class="nav justify-content-end">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profile</a>
                        <div class="dropdown-menu">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12 pr-0">
                <!-- ### $App Screen Content ### -->
                <main class='main-content bgc-grey-100'>
                    <div id='mainContent'>
                        @yield('content')
                    </div>
                </main>

            </div>
        </div>

        <!-- ### $App Screen Footer ### -->
        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
            <span>Copyright © 2019 Designed by <a href="https://colorlib.com" target='_blank' title="Colorlib">Colorlib</a>. All rights reserved.</span>
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    $( document ).ready(function() {
        $( ".click_info_icon" ).click(function() {
            var className = $(this).parent().attr('class')

            if(className === 'nav-item dropdown')
            {
                $(this).parent().removeClass().addClass('nav-item dropdown open')
            }else
            {
                $(this).parent().removeClass().addClass('nav-item dropdown')
            }
        });
    });
</script>
</body>
</html>
