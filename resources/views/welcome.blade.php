@extends('layouts.app')

@section('content')



<div class="container" >
    <div class="col s12">
        <div class="slider black">
            <ul class="slides">
                
                <li>
                    <img src="/img/p1.jpg">
                    <div class="caption center-align">
                        <div class="container">
                        <h3 class="white-text text-accent-2">Mailer S.A.</h3>
                        </div>
                        
                        <h5 class="light grey-text text-lighten-3">Te apoyo para tu bien!</h5>
                    </div>
                </li>
        
                <li>
                    <img src="/img/p2.jpg">
                    <div class="caption left-align">
                        <h3>¿Necesitas un servicio automotriz?</h3>
                        <h5 class="light grey-text text-lighten-3">Consúltanos!</h5>
                    </div>
                </li>
        
                <li>
                    <img src="/img/p3.jpg">
                    <div class="caption right-align">
                        <h3>Clientes satisfechos!</h3>
                        <h5 class="light grey-text text-lighten-3">Porque tu opinión ¡cuenta!</h5>
                    </div>
                </li>  
                <li>
                    <img class="responsive-img" src="/img/p2.jpg" >
                </li>
            </ul>
        
        </div>            
        <br><br>
    </div>
    {{-- bodys --}}
    <div class="container">
        <div class="row">
        
            <div class="col s12 ">
                <div class="card-panel #d32f2f red darken-2" style="border-radius: 20px;">
                    <p align="center">
                        <span style="align:center;width:200px;font-size:180%" class="white-text">
                        Empresa de Servicios en Santa Cruz de Sierra
                        </span>
                    </p>
                </div>
            </div>    
        
            <div class="row s12 center">
        
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-image">
                            <img src="/img/p1.jpg">
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 center">
                <br><br><br><br>
        
                    <?php 
                    if(!isset($_SESSION)){ session_start(); }
        
                    if(!isset($_SESSION['user'])){
                    ?>
                        <a href="#" class="waves-effect waves-light btn-large #263238 blue-grey darken-4">
                            <i class="material-icons left">cloud</i>
                            Registrate!
                        </a>
                    <?php }else{?>
                        <a href="/materia/listarxMateria" class="waves-effect waves-light btn-large #0d47a1 blue darken-4">
                            <i class="material-icons left">cloud</i>
                            Ver mis materias
                        </a>
                    <?php }?>
                </div>
                
            </div>

         
        </div>
    </div>
    
    {{-- //footer --}}
    <div class="col s12">

        <footer class="page-footer #212121 grey darken-4">
            <div class="container">
                <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Mailer S.A.</h5>
                    <p class="grey-text text-lighten-4">Desarrollador: Alejandra Murillo</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Redes Sociales</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#">Facebook</a></li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                © 2021 Copyright - Visitas a la página: 
                </div>
            </div>
        </footer>
    </div>
  
</div>
@endsection