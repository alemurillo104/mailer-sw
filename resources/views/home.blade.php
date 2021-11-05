@extends('layouts.app1')

@section('content')


{{-- <div class="container"> --}}
    <div class="col">
        <div class="card">
            <div class="card-header">Bienvenido!</div>
            <div class="card-body">

                <div class="col s12" style="color:black" >
                    <h4>Perfil de Usuario</h4>
                </div>
                <div class="container">
                    <div class="row" style="align-items: center">
                        <div class="col s12 m6 l3">
                            <img class="responsive-img circle" style="max-width: 100%;height:auto"src="/img/userlogo.png">
                        </div>
                        <div class="col s12 m6 l3">
                            <div class="card" style="padding: 10%">
                                    <p>Nombre: @php echo Auth::user()->name @endphp </p> 
                                    <p>Email: @php echo Auth::user()->email @endphp </p> 
                                    {{-- <input type="password" value="@php echo Auth::user()->password @endphp"> --}}
                                    <p>Password: 
                                    @php 
                                        $lng = strlen(strval(Auth::user()->password));
                                        $pass = '';
                                        for ($i=0; $i < $lng; $i++) $pass .='*';
                                        echo $pass;
                                    @endphp </p> 
                                    <p>Celular: @php echo Auth::user()->cellphone @endphp </p> 
                                    <p>Cedula: @php echo Auth::user()->id_card @endphp </p>
                                    <p>Fecha Nacimiento: @php echo Auth::user()->date_born @endphp </p>
                                    <p>Codigo de Ciudad: @php echo Auth::user()->city_cod @endphp </p>
                            </div>
                        </div>

                    </div>
                    <div class="row" style="justify-content: right; " >
                        <a href="{{ route('admin.user.editar', Auth::user()->id) }}" class="waves-effect waves-light btn " style="margin-right: 10px">Edit</a>
                        <a href="#" class="waves-effect waves-light btn ">Cerrar Sesion</a>
                    </div>
                </div>

                {{-- <div class="row" style="padding: 5%;">
                    <div class="col s6" style="background-color: blue; ">
                        {{-- <div class="card" style="border-radius: 50%; width: 60% ; height: 56%;" > --}}
                        {{-- <img style="border-radius: 50%; width: 60% ; height: 62%;" src="/img/userlogo.png" alt=""> --}}
                        {{-- </div> --}}
                        
                    {{-- </div>
                    <div class="col s6" style="background-color: red">
                        <div class="card" style="border-radius: 15%; padding: 15%">
                            <p>omg</p>
                            <p>omg</p>
                            <p>omg</p>
                            <p>omg</p>
                        </div>
                        
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

@endsection
