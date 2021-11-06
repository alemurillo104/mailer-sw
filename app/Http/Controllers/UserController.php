<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
    
    // Listar usuarios utilizando paginacion
    public function index()
    {
        $users = User::simplePaginate(3);

        return view('users.index', compact('users'));
    }


    // Redireccionar a vista crear usuario
    public function create()
    {
        $msj = ''; //$msj = '' es para evitar lanzar un alert
        return view('users.create', compact('msj'));
    }
    

    public function store(Request $request)
    {
        $pass1 = $request->password;
        $pass2 = $request->password_verified;
        $msj = "";

        // Verificamos que las contraseñas sean iguales
        if (strcmp($pass1, $pass2)) {
            $msj = 'Las contraseñas no son iguales';
        }

        // Verificamos la unicidad del email dentro de nuestra base de datos con ayuda del modelo
        $us = User::getUserByEmail($request->email);

        if(sizeof($us) > 0){
            $msj = 'ERROR! Correo existente!';
        }
        
        //Verificamos la edad > 18 para ser registrado
        $age = $this->getAge($request->date_born);
        // dd($age);
        if ($age < 18) {
            $msj = 'Ups! No puedes registrarte si tienes menos de 18 años';
        }
       
        // Si se ha encontrado algun error, se redirecciona a la misma vista 
        // y se activa el alert con el mensaje correspondiente del error
        if ($msj != '') {
            return view('users.create', compact('msj'));
        }

        // Si todo esta bien, se procede a almacenar el nuevo usuario

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'cellphone' => $request->cellphone,
            'id_card' => $request->id_card,
            'city_cod' => $request->city_cod,
            'date_born' => $request->date_born,
            'password' => bcrypt($request->password),
            'password_verified' => bcrypt($request->password_verified),
            'id_role' => $request->id_role,
        ])->save();

        return redirect()->route('admin.user.index');
    }


    //Funcion para obtener la edad a partir de la fecha de nacimiento
    private function getAge($date)
    {
         $birthDate = strval($date);
        
         $currentDate = date("d-m-Y");
 
         $age = date_diff(date_create($birthDate), date_create($currentDate));
         return $age->y;
    }


    public function editar($id){
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user, 'msj' => '']);
    }


    public function edit(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->name = $request->name;
        //Verificamos si la contraseña ha cambiado

        if ( strlen($usuario->password) != strlen($request->password)) {
            $usuario->password = bcrypt($request->password);
        }

        //Si el usuario loggeado es admin, puedo verificar si cambie el rol a algun usuario
        if(Auth::user()->id_role == 1){
    
            if ($usuario->id_role != $request->id_role) {
                $usuario->id_role = $request->id_role;
            }
        }

        $usuario->cellphone = $request->cellphone;
        $usuario->city_cod = $request->city_cod;

        //Verificamos la edad > 18 para ser registrado
        $age = $this->getAge($request->date_born);

        $msj = '';

        if ($age < 18) $msj = 'Ups! Al parecer tu edad es menor de 18 años, verifica porfavor';

        // Si se ha encontrado algun error, se redirecciona a la misma vista 
        if ($msj != '') {
            return view('users.edit', ['user' => $usuario, 'msj' => $msj]);
        }

        $usuario->date_born = $request->date_born;
       
        $usuario->save();
        
        //Si el usuario actual es Cliente, redirecciono a la pantalla de mi perfil home
        if (Auth::user()->id_role == 2) {
            return redirect()->route('home');
        }
        //Sino, redirecciono a la lista de usuarios
        return redirect()->route('admin.user.index');
        
    }


    public function eliminar($id){

        $user = User::findOrFail($id);
        return View('users.delete', ['user' => $user]);
    }


    public function delete(Request $request, $id){

        if(strtolower($request['eliminar']) == 'si'){
            $user = User::findOrFail($id);

            $user->delete();

            return redirect()->route('admin.user.index');
        }
        return redirect()->route('admin.user.eliminar', [$id]);
    }
}
