@extends('layouts.app1')

@section('content')

<div class="col">
    <div class="card">
        <div class="card-header">Bienvenido!</div>
        <div class="card-body">

            <div class="col s12" style="color:black" >
                <h4>Perfil de Usuario</h4>
            </div>
            <div class="container">
                <div class="row" style="align-items: center;">
                    <div class="col s12 m6 l3">
                        <img class="responsive-img circle" style="max-width: 100%;height:auto"src="/img/userlogo.png">
                    </div>
                    
                    <div class="col s12 m6 l3">
                        <div class="card" style="padding: 10%">
                            <p><b>Nombre:   </b> @php echo Auth::user()->name  @endphp </p> 
                            <p><b>Email:    </b> @php echo Auth::user()->email @endphp </p> 
                            <p><b>Password: </b>
                            @php 
                                $lng = strlen(strval(Auth::user()->password));
                                $pass = '';
                                for ($i=0; $i < $lng; $i++) $pass .='*';
                                echo $pass;
                            @endphp </p> 
                            <p><b>Celular:          </b> @php echo Auth::user()->cellphone @endphp </p> 
                            <p><b>Cedula:           </b> @php echo Auth::user()->id_card   @endphp </p>
                            <p><b>Fecha Nacimiento: </b> @php echo Auth::user()->date_born @endphp </p>
                            <p><b>Codigo de Ciudad: </b> @php echo Auth::user()->city_cod  @endphp </p>
                        </div>
                    </div>

                </div>
                <div class="row" style="justify-content: right; " >
                    <a href="{{ route('admin.user.editar', Auth::user()->id) }}" class="waves-effect waves-light btn " style="margin-right: 10px">Editar</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="waves-effect waves-light btn ">Cerrar Sesion</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

            
        </div>
    </div>
</div>

@endsection
