@extends('layouts.app1')
@section('content')

<div class="col s12 m10 offset-m1 l6 offset-l3">

    <form action="{{route('admin.user.delete',[$user->id])}}" method="post">
        @csrf
        @method('delete')
        <div class="card z-depth-4">
            <div class="card-content">
                <span class="card-title center-align">¿Desea Eliminar el usuario? </span>

                <div class="row">
                    <div class="col s12 input-field">
                        <input id="eliminar" name="eliminar" type="text" class="validate">
                        <label for="eliminar">Confirmar escribiendo 'Si': :</label>
                        {!! $errors->first('eliminar','<span class="help-block red-text">:message</span>') !!}
                    </div>


                    <div class="row">
                        <div class="col s12 right-align">
                            <button class="btn positive-primary-color" type="submit">aceptar</button>
                            <a href="{{route('admin.user.index')}}" class="btn negative-primary-color" type="submit">cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


</div>

@endsection