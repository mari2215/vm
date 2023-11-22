<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Museum') }}</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link href="{{ asset('assets/theme/plugins/owl-carousel/assets/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/theme/plugins/owl-carousel/assets/owl.theme.default.css')}}" rel="stylesheet" />


    <link href="{{ asset('assets/theme/plugins/material/css/materialdesignicons.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/theme/plugins/simplebar/simplebar.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/style_mono.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style_mono.css.map')}}">
    <link href="{{ asset('assets/theme/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/theme/plugins/prism/prism.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/theme/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css')}}" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

</head>
<body class="navbar-fixed sidebar-fixed" id="body">
<div class="wrapper">
      
      
        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="/admin/index">
                <span class="brand-name">Dashboard</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-left" data-simplebar style="height: 100%;">
              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                  <li
                   class=""
                   >
                    <a class="sidenav-item-link" href="/admin/index">
                      <i class="mdi mdi-briefcase-account-outline"></i>
                      <span class="nav-text">Головна сторінка</span>
                    </a>
                  </li>

                
                  <li class="section-title">
                    Apps
                  </li>

                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#email"
                      aria-expanded="false" aria-controls="email">
                      <i class="mdi mdi-email"></i>
                      <span class="nav-text">Події</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="email"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                            <li >
                              <a class="sidenav-item-link" href="{{ url('admin/event') }}">
                                <span class="nav-text">Усі події</span>
                              </a>
                            </li>
                            <li >
                              <a class="sidenav-item-link" href="{{ url('admin/add-event') }}">
                                <span class="nav-text">Додати нову подію</span>
                              </a>
                            </li>
                      </div>
                    </ul>
                  </li>
                

                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#users"
                      aria-expanded="false" aria-controls="users">
                      <i class="mdi mdi-google-maps"></i>
                      <span class="nav-text">Мапа</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="users"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">

                            <li >
                              <a class="sidenav-item-link"  href="{{ url('admin/map') }}">
                                <span class="nav-text">Головна</span>
                              </a>
                            </li>

                            <li >
                              <a class="sidenav-item-link" href="{{ url('admin/places') }}">
                                <span class="nav-text">Маркери</span>
                              </a>
                            </li>

                            <li >
                              <a class="sidenav-item-link" href="{{ url('/admin/add-place') }}?longitude=26.987133&latitude=49.422983">
                                <span class="nav-text">Додати маркер</span>
                              </a>
                            </li>
                          
                      </div>
                    </ul>
                  </li>

                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#people"
                      aria-expanded="false" aria-controls="people">
                      <i class="mdi mdi-email"></i>
                      <span class="nav-text">Учасники війни</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="people"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                            <li >
                              <a class="sidenav-item-link" href="{{ url('admin/figure') }}">
                                <span class="nav-text">Усі учасники</span>
                              </a>
                            </li>
                            <li >
                              <a class="sidenav-item-link" href="{{ url('admin/add-figure') }}">
                                <span class="nav-text">Додати нового учасника</span>
                              </a>
                            </li>
                      </div>
                    </ul>
                  </li>
              </ul>

            </div>

            <div class="sidebar-footer">
              <div class="sidebar-footer-content">
                <ul class="d-flex">
                  <li class="py-3">
                  <a class="py-3"  href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              <i class="mdi mdi-logout pl-5"  style="font-size: 20px; 
    margin-left: 5px;"></i>
                              <span class="nav-text pl-3 pb-4">{{ __('LOG OUT') }}</span>
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>

                  </li>
                </ul>
              </div>
            </div>
          </div>
        </aside>
      <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
      <div class="page-wrapper bg-white">
        
          <!-- Header -->
          <header class="main-header" id="header">
            <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>

              <span class="page-title" href="{{ route('home') }}">dashboard</span>

              <div class="navbar-right ">

               

                <ul class="nav navbar-nav">
                  <!-- User Account -->
                  <li class="dropdown user-menu">
                  <a class="dropdown my-custom-class" role="button"   style="font-size: 40px; 
    margin-left: 5px;" 
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                    <i class="mdi mdi-home"></i>
                    </a>


                    <ul class="dropdown-menu dropdown-menu-right">
                      <li class="dropdown">
                      <button type="button" class="btn btn-sm">
                          <a class="dropdown-item-link" href="/home">
                              <i class="mdi mdi-newspaper"></i>
                              <span class="nav-text">HOME</span>
                          </a>
                        </button>
                        <button type="button" class="btn btn-sm">
                          <a class="dropdown-item-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              <i class="mdi mdi-logout"></i>
                              <span class="nav-text">{{ __('Log Out') }}</span>
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                        </button>
                      </li>
                  </ul>

                  </li>
                </ul>
              </div>
            </nav>


          </header>

        <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
        <div class="content-wrapper">
          <div class="content">                


                
          <main class="">
            @yield('content')
         </main>


                
            </div>
          
        </div>
      </div>
    </div>





       


        



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{ asset('assets/js/calendar.js')}}"></script>
<script src="{{ asset('assets/js/custom.js')}}"></script>
<script src="{{ asset('assets/js/chart.js')}}"></script>
<script src="{{ asset('assets/js/map.js')}}"></script>
<script src="{{ asset('assets/js/mono.js')}}"></script>

<script src="{{ asset('assets/theme/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('assets/theme/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/theme/plugins/simplebar/simplebar.min.js')}}"></script>
<script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
                   
<script src="{{ asset('assets/theme/plugins/owl-carousel/owl.carousel.min.js')}}"></script>     
                
<script src="{{ asset('assets/theme/plugins/prism/prism.js')}}"></script>        
<script src="{{ asset('assets/theme/plugins/nprogress/nprogress.js')}}"></script>
                   
                    
                

</body>
</html>
