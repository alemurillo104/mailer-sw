<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    {{-- Mis estilos --}}
    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{'/css/materialize.min.css'}}"  media="screen,projection"/>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" class="">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
  

</head>
<body>
    <div id="app">
        {{-- <nav> --}}
        <nav class="#000000 black">
            <div class="container">
                <div class="nav-wrapper">
                    
                    <a href="#" class="brand-logo" id="tituloTaller" style="font-size:1.5vw" >Mailer S.A.</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                         <!-- Authentication Links -->
                        @guest
                            <a class='dropdown-trigger' href='#' data-target='dropdown4545'> <i class="material-icons right">arrow_drop_down</i>Opciones</a>
                            <ul id='dropdown4545' class='dropdown-content'>
                                {{-- <li><a href="/">Inicio</a></li> --}}
                                <li><a href="<?php echo config('url')?>/">Inicio</a></li>
                                
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
                            </ul>
                        @else
                            <li class="nav-item dropdown">
                                <a class='dropdown-trigger btn #000000 black' href='#' data-target='dropdown4545'> <i class="material-icons right">arrow_drop_down</i> {{ Auth::user()->name }}</a>
                                <ul id='dropdown4545' class='dropdown-content'>

                                    <li><a href="/home">Dashboard</a></li>
                                    <li class="divider" tabindex="-1"></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar sesion') }}
                                        </a>
                
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
            
                                </ul>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav> 
        

      
        {{-- Side nav --}}
        
        <ul id="slide-out" class="sidenav">
            <li><div class="user-view">
                <div class="background">
                    <img src="img/banner.png">
                </div>
                <a href="#user"><img class="circle" src="img/userlogo.png"></a>
                @guest
                    <a href="#name"><span class="white-text name">No Usuario</span></a>
                    <a href="#email"><span class="white-text email">No Email</span></a>
                @else
                    <a href="#name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
                    <a href="#email"><span class="white-text email">{{ Auth::user()->email }}</span></a>
                    
                @endguest
            </div></li>
            <li><a href="/"><i class="material-icons">home</i>Inicio</a></li>
            <li><div class="divider"></div></li>
            <li><a class="subheader">OPCIONES</a></li>
            <li><div class="divider"></div></li>
            {{-- <li><a class="waves-effect" href="#!">Iniciar Sesion</a></li> --}}
            @guest
            {{-- <h1>omg</h1> --}}
            
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
                <li><a href="/home">Dashboard</a></li>
                <li class="divider" tabindex="-1"></li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Cerrar sesion') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @endguest
            
        </ul>

        
        <a href="#" data-target="slide-out" id="botoncito" class="sidenav-trigger hide"><i class="material-icons">menu</i></a>
         
        {{-- dropdown  --}}

          <!-- Dropdown Structure -->
        <ul id='dropdown1' class='dropdown-content'>
            <li><a href="/">Log out</a></li>           
        </ul> 
       
        <main class="py-4">
            @yield('content')
        </main>
    </div>

<!-- Scripts -->

<script src="/js/resize.js"></script>

<!--Iniciando Javascript-->
<script src="/js/materialize.js"></script>
<script src="/js/materialize.min.js"></script>

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


</body>
</html>
{{-- </body>
</html> --}}
