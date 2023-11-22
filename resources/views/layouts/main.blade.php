<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Museum') }}</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link href="{{ asset('assets/theme/plugins/material/css/materialdesignicons.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/theme/plugins/simplebar/simplebar.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/style_mono.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style_mono.css.map')}}">
    <link href="{{ asset('assets/theme/plugins/owl-carousel/assets/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/theme/plugins/owl-carousel/assets/owl.theme.default.css')}}" rel="stylesheet" />


    <link href="{{ asset('assets/theme/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/theme/plugins/prism/prism.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/theme/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css')}}" rel="stylesheet" />
  
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
  body{
    font-family: Arial;
  }
</style>
</head>
<div class="wrapper">
    
      <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
      <div class="page-wrapper">
        
          <!-- Header -->
          <header class="main-header " id="header">
            <nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
              <!-- Sidebar toggle button -->

              <div class="page-title ml-5" style = "font-family: Arial Black;"><a href="{{ route('home') }}" class="text-white">Virtual museum</a></div>

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
                      @guest
                      <li>
                          <button type="button" class="btn btn-sm">
                              <a class="dropdown-item-link" href="{{ route('login') }}">
                                  <i class="mdi mdi-login"></i>
                                  <span class="nav-text">{{ __('Login') }}</span>
                              </a>
                          </button>
                      </li>

                      <li>
                        <button type="button" class="btn btn-sm">
                          <a class="dropdown-item-link" href="{{ route('register') }}">
                              <i class="mdi mdi-account-plus"></i>
                              <span class="nav-text">{{ __('Register') }}</span>
                          </a>
                        </button>
                      </li>
                      @else
                      <li class="dropdown">
                      <button type="button" class="btn btn-sm">
                          <a class="dropdown-item-link" href="/admin/index">
                              <i class="mdi mdi-account-check"></i>
                              <span class="nav-text">ADMIN </span>
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
                      @endguest
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
          <!-- <div class="content">                 -->


                
          <main class="my-5">
            @yield('content')
         </main>


                
            </div>
          
        <!-- </div> -->
      </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script src="{{ asset('assets/js/custom.js')}}"></script>
<script src="{{ asset('assets/js/chart.js')}}"></script>
<script src="{{ asset('assets/js/map.js')}}"></script>
<script src="{{ asset('assets/js/mono.js')}}"></script>

<script src="{{ asset('assets/theme/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('assets/theme/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/theme/plugins/simplebar/simplebar.min.js')}}"></script>
<script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
                    
<script src="{{ asset('assets/theme/plugins/prism/prism.js')}}"></script>        
<script src="{{ asset('assets/theme/plugins/nprogress/nprogress.js')}}"></script>
                   
<script src="{{ asset('assets/theme/plugins/owl-carousel/owl.carousel.min.js')}}"></script>     
                

</body>
</html>
