<?php

namespace App\Controllers;

use App\Models\Usuario_model;

class Login extends BaseController
{
    public function index()
    {
        return view('Login/Login_view');
    }

    public function iniciarSesion()
    {
        $user        = $this->request->getPost('user');
        $pass        = $this->request->getPost('pass');
        $usuario_model = new Usuario_model();

        $res = $usuario_model->validarLogin($user, $pass);

        if (count($res['data'])>0) {
            $id                             = $res['data'][0]->idUsuario;
            $user_datos                     = $usuario_model->obtenerInfoUsuario($id);
            $datauser = [
                'isLogged'                  => true,
                'user_id'                   => $user_datos['data'][0]->idUsuario,
                'user_usuario'              => $user_datos['data'][0]->usuario,
                'user_nivel'                => $user_datos['data'][0]->fidNivel,
                'user_nombre_nivel'         => $user_datos['data'][0]->nivel_usuario,
                'user_nombre'               => $user_datos['data'][0]->nombres,
                'user_apellido_paterno'     => $user_datos['data'][0]->apellido_paterno,
                'user_apellido_materno'     => $user_datos['data'][0]->apellido_materno,
                'user_foto'                 => $user_datos['data'][0]->foto,
                'user_correo'               => $user_datos['data'][0]->correo,
                'user_telefono1'            => $user_datos['data'][0]->telefono1,
                'user_telefono2'            => $user_datos['data'][0]->telefono2,
                'user_sexo'                 => $user_datos['data'][0]->sexo,
                'user_direccion'            => $user_datos['data'][0]->direccion,
                'user_dni'                  => $user_datos['data'][0]->dni,

            ];

            session()->set($datauser);
            $datos['mensaje']           = 'Bienvenido';
            $datos['status']             = true;
        } else {
            $datos['mensaje']           = 'Usuario o contraseña incorrecto';
            $datos['status']             = false;
        }

        echo json_encode($datos);
    }


    public function cerrarSesion()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
