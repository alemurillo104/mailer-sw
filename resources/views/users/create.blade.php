@extends('layouts.app1')

@section('content')

@if ($msj != '')
    <div class="alert alert-danger">
        {{ $msj }}
    </div>
@endif

<div class="col s6">
    <a href="#" class="btn btn-#1e88e5 blue darken-1"><i class="material-icons">arrow_back</i></a>
</div>
<div class="card" style="margin-left: 80px; margin-right: 90px;">
    <div class="container">
        <h4 class="center-align">Registrar Cliente</h4>
        <form class="form-group" action="{{ route('admin.user.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="id_card">Cedula: <sup>*</sup></label>
                <input type="text" name="id_card" required="" oninvalid="setCustomValidity('Debe colocar una Cedula')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label for="name">Nombre: <sup>*</sup></label>
                <input type="text" name="name" required="" oninvalid="setCustomValidity('Debe colocar un nombre')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label for="email">Email: <sup>*</sup></label>
                <input type="text" name="email" required="" oninvalid="setCustomValidity('Debe colocar un email')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label for="password">Contraseña: <sup>*</sup></label>
                <input type="password" name="password" id="pass1" onchange="return checkVal()" pattern="(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$)" required="" oninvalid="setCustomValidity('Debe colocar un contraseña de 8 o mas caracteres,  debe contener al menos un número, una letra mayúscula, un carácter especial')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label for="password_verified">Confirmar Contraseña: <sup>*</sup></label>
                <input type="password" name="password_verified" id="pass2" onchange="return checkVal()"  pattern="(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$)" required="" oninvalid="setCustomValidity('Debe colocar un contraseña de 8 o mas caracteres!')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label for="cellphone">Telefono: <sup>*</sup></label>
                <input  type="number" min="100000" name="cellphone" required="" oninvalid="setCustomValidity('Debe colocar un telefono')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label for="date_born">Fecha Nac: <sup>*</sup></label>
                <input  type="date" name="date_born" required="" oninvalid="setCustomValidity('Debe colocar una fecha de nacimiento')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label for="city_cod">Codigo de ciudad: <sup>*</sup></label>
                <input  type="number" min="000000" name="city_cod" required=""   oninvalid="setCustomValidity('Debe colocar un codigo de ciudad')" oninput="setCustomValidity('')">
            </div>

            <p>Escoger rol:</p>
            <p>
                <label>
                    <input name="id_role" type="radio" checked value="{{ 2 }}" />
                    <span>Cliente</span>
                </label>
                </p>
            
            <p>
                <label>
                    <input name="id_role" type="radio" value="{{ 1 }}"/>
                    <span>Admin</span>
                </label>
            </p>

            {{-- <a href="#"  onclick="return checkVal(event)"> submit </a> --}}
            <button class="btn waves-effect waves-light  #01579b light-blue darken-4" type="submit" onclick="return checkVal()" name="action">Guardar
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
<br><br>
</div>

@endsection

@push('script2')
    <script>

        function checkVal() {
            // e.preventDefault();
            
            var p1 = document.getElementById('pass1');
            var p2 = document.getElementById('pass2');

            if (p1.value !== p2.value) {
                console.log('no son iguales');
                alert('Las contraseñas no son iguales! Verificar')
            }else{

                console.log('SI son iguales');
                //Ale014%%%%


            }

            // console.log(p1.value);
        }


    </script>
@endpush