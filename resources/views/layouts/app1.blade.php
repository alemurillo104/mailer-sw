<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="/css/alerts.css"> 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link type="text/css" rel="stylesheet" href="{{'/css/materialize.min.css'}}"  media="screen,projection"/>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" class="">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <style>
        header, main, footer, nav {
        padding-left: 300px;
        }
        @media only screen and (max-width : 992px) {
        header, main, footer, nav {
            padding-left: 0;
        }
       
    </style>

</head>
<body>
    <div id="app">
        <div class="navbar-fixed">
            <nav id="navitem" class="#000000 black">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="#" class="brand-logo left" id="tituloTaller1" style="font-size:1.5vw">Mailer SA</a>
                    </div>
                </div>
            </nav> 
        </div>
        {{-- Side nav --}}
        
        <ul id="slide-out" class="sidenav sidenav-fixed" >
        {{-- <ul id="slide-out" style="font-family:courier; background-color: #E0E0E0" class="sidenav sidenav-fixed"> --}}
            <li><div class="user-view">
                <div class="background">
                    <img src="/img/banner.png">
                </div>
                <a href="#user"><img class="circle" src="/img/userlogo.png"></a>
                <a href="#name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
                <a href="#email"><span class="white-text email">{{ Auth::user()->email }}</span></a>
            </div></li>
            <li><a href="/home">Mi perfil</a></li>
            <li><div class="divider"></div></li>
            {{-- <li><a class="subheader">OPCIONES</a></li> --}}
            <!-- Dropdown Trigger -->
            <li><a class='dropdown-trigger' href='#' data-target='dropdownWelcome'>OPCIONES</a></li>
            
            <!-- Dropdown Structure -->
            <ul id='dropdownWelcome' class='dropdown-content'>
                <li><a href="/">Inicio</a></li>
                <li class="divider" tabindex="-1"></li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Cerrar Sesion') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
       


            <li><div class="divider"></div></li>
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li>
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}">{{ __('Registrarme') }}</a>
                    </li>
                @endif
            @else
            
                  {{-- Sesion iniciada --}}
                {{-- <li><button onclick="return clicks();">Click me</button></li> --}}
                @if(Auth::user()->id_role == 1)
                    <li><a href="{{ route('admin.user.index') }}">Usuarios</a></li>
                    
                @endif
                <li><a href="/emails">Emails</a></li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Cerrar Sesion') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            @endguest
            
        </ul>
        {{-- TODO: Solucionar --}}
        <a href="#" data-target="slide-out" id="botonh" class="sidenav-trigger hide"><i class="material-icons">menu</i></a>

        <main class="py-4">
            <div style="padding-right: 5%; padding-left: 5%">
                @yield('content')
            </div>
        </main>

    </div>
  

<script src="/js/main.js"></script>
<script src="/js/validaciones.js"></script>
<!--Iniciando Javascript-->

<script src="/js/materialize.js"></script>
<script src="/js/materialize.min.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/cylinder.js"></script>


<script>
   document.addEventListener('DOMContentLoaded', function() {
       M.AutoInit();
       var elemsPicker = document.querySelectorAll('.datepicker');
       var instances = M.Datepicker.init(elemsPicker, {
           "format": "yyyy-mm-dd",
           "yearRange" :20
       });
       var elems1 = document.querySelectorAll('.parallax');
       var instances = M.Parallax.init(elems1, {
       "responsiveThreshold": 1
       });
       var elems = document.querySelectorAll('.slider');
       var instances = M.Slider.init(elems, );
       
       
       var elems3 = document.querySelectorAll('select');
       var instances3 = M.FormSelect.init(elems3);
       
       var elems4 = document.querySelectorAll('.sidenav');
       var instances4 = M.Sidenav.init(elems4);
   });
   
</script>
@stack('script2')

</body>
</html>