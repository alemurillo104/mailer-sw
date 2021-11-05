@extends('layouts.app1')

@section('content')

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
                <input type="text" name="email"  value="{{$user->email}}">
            </div>

            <div class="form-group">
                <label for="password">Contraseña: <sup>*</sup></label>
                <input type="password" name="password" value="{{ $user->password }}">
            </div>

            <div class="form-group">
                <label for="telefono">Telefono: <sup>*</sup></label>
                <input type="text" name="telefono" value="{{$user->cellphone}}">
            </div>
            
            <div class="form-group">
                <label for="id_card">id_card: <sup>*</sup></label>
                <input type="text" name="id_card" value="{{$user->id_card}}">
            </div>

            <div class="form-group">
                <label for="date_born">date_born: <sup>*</sup></label>
                <input type="text" name="date_born" value="{{$user->date_born}}">
            </div>

            <div class="form-group">
                <label for="city_cod">city_cod: <sup>*</sup></label>
                <input type="text" name="city_cod" value="{{$user->city_cod }}">
            </div>

            @can('admin.admin.rol')
                
                <p>Cambiar rol:</p>
                <p>
                    <label>
                        <input name="tipo" type="radio" <?php if($user->id_role == 2) { ?>
                            checked value="C" 
                        <?php }else{?>
                            value="C" 
                        <?php }?>
                        />
                        <span>Cliente</span>
                    </label>
                    </p>
                
                <p>
                    <label>
                        <input name="tipo" type="radio" value="A"  <?php if($user->id_role == 1) { ?>
                            checked value="A" 
                        <?php }else{?>
                            value="A" 
                        <?php }?>
                        />
                        <span>Admin</span>
                    </label>
                </p>
            @endcan

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