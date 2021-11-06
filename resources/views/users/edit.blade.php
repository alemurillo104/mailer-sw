@extends('layouts.app1')

@section('content')
@if ($msj != '')
    <div class="alert alert-danger">
        {{ $msj }}
    </div>
@endif

<div class="col s6">
    <a href="{{route('admin.user.index')}}" class="btn btn-#1e88e5 blue darken-1"><i class="material-icons">arrow_back</i></a>
</div>
<div class="card" style="margin-left: 80px; margin-right: 90px;">
    <div class="container">
        <h4 class="center-align">Editar Usuario</h4>
        <form action="{{route('admin.user.edit',[$user->id])}}" method="POST">
            @csrf
            @method("PUT")

            <div class="form-group">
                <label for="name" >Nombre: <sup>*</sup></label>
                <input type="text" name="name"  value="{{$user->name}}">
                {!! $errors->first('name','<span class="help-block red-text">Esta información es obligatoria.') !!}
            </div>
            
            <div class="form-group">
                <label for="email">Email: <sup>*</sup></label>
                <input type="text" name="email"  value="{{$user->email}}" disabled>
            </div>

            <div class="form-group">
                <label for="password">Contraseña: <sup>*</sup></label>
                <input type="password" name="password" value="{{ $user->password }}" minlength="8">
            </div>

            <div class="form-group">
                <label for="cellphone">Telefono: <sup>*</sup></label>
                <input type="text" name="cellphone" value="{{$user->cellphone}}" maxlength="10" minlength="10">
            </div>
            
            <div class="form-group">
                <label for="id_card">Cedula: <sup>*</sup></label>
                <input type="text" name="id_card" value="{{$user->id_card}}" disabled>
            </div>

            <div class="form-group">
                <label for="date_born">Fecha de Nacimiento: <sup>*</sup></label>
                <input type="date" name="date_born" value="{{ $user->date_born }}">
            </div>

            <div class="form-group">
                <label for="city_cod">Codigo de ciudad: <sup>*</sup></label>
                <input type="number" minlength="1000" name="city_cod" value="{{strval($user->city_cod) }}">
            </div>

            @if(Auth::user()->id_role == 1)
                
                <p>Cambiar rol:</p>
                <p>
                    <label>
                        <input name="id_role" type="radio" <?php if($user->id_role == 2) { ?>
                            checked value="{{ 2 }}" 
                        <?php }else{?>
                            value="{{ 2 }}" 
                        <?php }?>
                        />
                        <span>Cliente</span>
                    </label>
                    </p>
                
                <p>
                    <label>
                        <input name="id_role" type="radio" <?php if($user->id_role == 1) { ?>
                            checked value="{{ 1 }}" 
                        <?php }else{?>
                            value="{{ 1 }}" 
                        <?php }?>
                        />
                        <span>Admin</span>
                    </label>
                </p>
            @endif

            <div class="row">
                <div class="col s12 right-align">
                    <input type="submit" class="btn btn-success #01579b light-blue darken-4" value="Actualizar">
                    <a href="{{route('admin.user.index')}}" class="btn negative-primary-color" type="submit">cancelar</a>
                </div>
            </div>

        </form>
    </div>
    <br><br>
</div>


@endsection