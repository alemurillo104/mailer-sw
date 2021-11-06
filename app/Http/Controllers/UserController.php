<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::simplePaginate(3);
        // $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $msj = '';
        return view('users.create', compact('msj'));
    }
    
    public function store(Request $request)
    {
        // dd($request);
        
        $pass1 = $request->password;
        $pass2 = $request->password_verified;
        // dd(!strcmp($pass1, $pass2));
        $msj = "";
        // dd($pass1, $pass2, $msj);
        if (strcmp($pass1, $pass2)) {
            
            $msj = 'Las contraseñas no son iguales';
        }
        $us = User::getUserByEmail($request->email);

        if(sizeof($us) > 0){
            
            $msj = 'ERROR! Correo existente!';
        }
        
        // dd($pass1, $pass2, $msj);
        if ($msj != '') {
            return view('users.create', compact('msj'));
        }

        //verificando la edad 
        // $birthDate = strval($user->date_born);

        // $currentDate = date("d-m-Y");

        // $age = date_diff(date_create($birthDate), date_create($currentDate));
        // if ($age->y <) {
        //     # code...
        // }
        // dd($age->y)

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

    public function editar($id){
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user]);
    }

    public function edit(Request $request, $id)
    {
        // dd($request);

        $usuario = User::findOrFail($id);
        $usuario->name = $request->name;
        if ( strlen($usuario->password) != strlen($request->password)) {
            $usuario->password = bcrypt($request->password);
        }

        if(Auth::user()->id_role == 1){
    
            if ($usuario->id_role != $request->id_role) {
                $usuario->id_role = $request->id_role;
            }

        }

        $usuario->cellphone = $request->cellphone;
        $usuario->city_cod = $request->city_cod;
        $usuario->date_born = $request->date_born;
       
        $usuario->save();
        
        if (Auth::user()->id_role == 2) {
            return redirect()->route('home');
        }

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
