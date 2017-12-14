<?php

namespace App\Repositories;


use App\User;
use Illuminate\Http\Request;

class UserRepository
{
    public function create(Request $request)
    {
        $name = $request->get("name");
        $email = $request->get("email");
        $password1 = $request->get("password1");
        $password2 = $request->get("password2");

        $findUser =  User::where('email', $email)->get() ? User::where('email', $email)->first() : null;

        if($findUser != null){
            return response()->json(["errors" => "Este email ya ha sido registrado"], 403);
        }

        if ($password1 == $password2) {
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password1)
            ];

            $user = User::create($data);
            return $user;
        } else {
            return response()->json(["errors" => "Las contraseñas deben coincidir"], 403);
        }

        return $request;
    }
}