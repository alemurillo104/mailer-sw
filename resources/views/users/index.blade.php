@extends('layouts.app1')

@section('content')

@if(Auth::user()->id_role == 2)

    {{-- Cuando se actualiza el rol del usuario administrador a cliente, pierde privilegios de acceso --}}
    <div class="card">
        <div class="card-header"> Ups! Al parecer ya no eres administrador! </div>
        <div class="card-body">
            <a href="{{ route('home') }}">Volver a mi perfil</button>
        </div>
    </div>

@else

    @if (session('msj'))
        <div class="alert alert-success">
            {{ session('msj') }}
        </div>
    @endif

    <div class="col s12 ">
        <div class="card" style="background-color:#deeaee;padding-left: 60px;padding-right: 60px; padding-top: 30px; padding-bottom: 30px;" >

            <div class="row s12 valign-wrapper">
                <div class="col s6">
                    <h5>Usuarios Disponible</h5>
                </div>

                @if(Auth::user()->id_role == 1)
                    <div class="col s6 right-align ">
                        <a href="{{ route('admin.user.create') }}" role="button" class="btn btn-#01579b light-blue darken-4 ">Añadir cliente</a>
                    </div>
                @endif
            </div>

            <table class="responsive-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Cedula</th>
                        <th>Edad</th>
                        <th>Cod de Ciudad</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                    {{-- Obtener la edad por cada usuario mientras el array esta iterando --}}
                    @php 
                        $birthDate = strval($user->date_born);
                        $currentDate = date("d-m-Y");
                        $age = date_diff(date_create($birthDate), date_create($currentDate));
                        
                    @endphp
                    <tr>
                        <td> <?php echo $user->id ; ?></td>
                        <td> <?php echo $user->name ; ?></td>
                        <td> <?php echo $user->email ; ?></td>
                        <td> <?php echo $user->cellphone ; ?></td>
                        <td> <?php echo $user->id_card ; ?></td>
                        <td> <?php echo $age->y ; ?></td>
                        <td> <?php echo $user->city_cod ; ?></td>
                        <td> <?php echo ($user->id_role == 1) ?'Admin' : 'Cliente' ; ?></td>
                        @if(Auth::user()->id_role != $user->id)
                        <td> 
                            <a style="padding-right: 10px;"  href="{{route('admin.user.editar', [$user->id])}}">Editar</a>
                            <a href="{{route('admin.user.delete', [$user->id])}}">Borrar</a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            
            <div class="row" style="justify-content: center;">
                {{ $users->links('vendor.pagination.materialize', ['elements' => $users]) }}
            </div>
          
        </div>
    </div>
@endif


@endsection