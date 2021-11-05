<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        
    }

    public function editar($id){
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user]);
    }

    public function edit(Request $request, $id)
    {
        dd($request);
        
    }

}
