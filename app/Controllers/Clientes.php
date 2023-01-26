<?php

namespace App\Controllers;

use App\Models\Cliente_model;

class Clientes extends BaseController
{
    public function index()
    {
        $data['pagina'] = 'Principal/Clientes_view';
        return view('Pagina_view', $data);
    }

    const HEADER_STATUS_STRINGS = [
        '405' => 'HTTP/1.1 405 Method Not Allowed',
        '400' => 'BAD REQUEST',
        '408' => 'Request Timeout',
        '404' => 'NOT FOUND',
        '401' => 'UNAUTHORIZED',
        '200' => 'OK',
    ];


    public function api_return($data = NULL, $http_code = NULL)
    {
        ob_start();
        header('content-type:application/json; charset=UTF-8');
        header(self::HEADER_STATUS_STRINGS[$http_code], true, $http_code);
        print_r(json_encode($data));
        ob_end_flush();
    }

    public function listarClientes()
    {
        $clienteModel = new Cliente_model();
        $data = $clienteModel->listarClientes();
        $this->api_return(['status' => true, 'data' => $data], 200);
    }
    
    public function listarTotalClientes()
    {
        $clienteModel = new Cliente_model();
        $data = $clienteModel->listarTotalClientes();
        $this->api_return(['status' => true, 'data' => $data], 200);
    }
    
    public function buscarClientes()
    {
        $buscador =  $this->request->getPost('buscador');
        $clienteModel = new Cliente_model();
        $data = $clienteModel->buscarCliente($buscador);
        $this->api_return(['status' => true, 'data' => $data], 200);
    }
    
    public function buscarClientesId()
    {
        $id =  $this->request->getPost('id');
        $clienteModel = new Cliente_model();
        $data = $clienteModel->buscarClienteId($id);
        if($data['estado']){
            $this->api_return(['status' => true, 'data' => $data], 200);
            
        }else{
            $this->api_return(['status' => false, 'data' => []], 400);

        }
    }

    // public function listarServicioId()
    // {
    //     $id             = $this->request->getPost('id');
    //     $servicioModel  = new Servicio_model();
    //     $data = $servicioModel->listarServicioId($id);
    //     $this->api_return(['status' => true, 'data' => $data], 200);
    // }

    public function eliminarClientesId()
    {
        $id             = $this->request->getPost('id');
        $clienteModel = new Cliente_model();
        $data = $clienteModel->eliminarClienteId($id);
        if($data['estado']){
            $this->api_return(['status' => true, 'data' => $data], 200);
        }else{
            $this->api_return(['status' => false, 'data' => []], 400);
        }
    }

    public function crearClientes()
    {
        $foto               = $this->request->getFile('foto');
        $nombre             = $this->request->getPost('nombre');
        $apellido_paterno   = $this->request->getPost('apellido_paterno');
        $apellido_materno   = $this->request->getPost('apellido_materno');
        $sexo               = $this->request->getPost('sexo');
        $edad               = $this->request->getPost('edad');
        $direccion          = $this->request->getPost('direccion');
        $dni                = $this->request->getPost('dni');
        $fecha_nacimiento   = $this->request->getPost('fecha_nacimiento');
        $correo             = $this->request->getPost('correo');
        $telefono1          = $this->request->getPost('telefono1');
        $telefono2          = $this->request->getPost('telefono2');
        $usuario            = session()->get('user_id');

        if (!$this->validate('cliente')) {
            $errores            = $this->validator->getErrors();
            $data['mensaje']    = reset($errores);
            $data['data']       = $errores;
            $this->api_return(['status' => false, 'data' => $data], 200);
        } else {
            $clienteModel = new Cliente_model();
            if ($foto) {
                if ($foto->isValid() && !$foto->hasMoved()) {
                    $foto_nombre = $foto->getRandomName();
                    $foto->move('./public/upload/clientes', $foto_nombre);
                    $rutaFoto = 'upload/clientes/' . $foto_nombre;

                    $res = $clienteModel->crearCliente(
                        $rutaFoto,
                        $nombre,
                        $apellido_paterno,
                        $apellido_materno,
                        $sexo,
                        $edad,
                        $direccion,
                        $dni,
                        $fecha_nacimiento,
                        $correo,
                        $telefono1,
                        $telefono2,
                        $usuario,
                    );

                    if($res['estado']){
                        $data['mensaje']    = 'Cliente creado correctamente';
                        $this->api_return(['status' => true, 'data' => $data], 200);
                    }else{
                        $data['mensaje']    = 'Error, no se pudo registrar cliente';
                        $this->api_return(['status' => false, 'data' => $data], 200);
                    }
                } else {
                    $data['mensaje']    = 'La imagen ha sido removida';
                    $this->api_return(['status' => false, 'data' => $data], 400);
                }
            } else {
                $res = $clienteModel->crearCliente(
                    '',
                    $nombre,
                    $apellido_paterno,
                    $apellido_materno,
                    $sexo,
                    $edad,
                    $direccion,
                    $dni,
                    $fecha_nacimiento,
                    $correo,
                    $telefono1,
                    $telefono2,
                    $usuario,
                );

                if($res['estado']){
                    $data['mensaje']    = 'Cliente creado correctamente';
                    $this->api_return(['status' => true, 'data' => $data], 200);
                }else{
                    $data['mensaje']    = 'Error, no se pudo registrar cliente';
                    $this->api_return(['status' => false, 'data' => $data], 200);
                }
            }
        }
    }

    public function editarClientes()
    {
        $id                 = $this->request->getPost('id');
        $foto               = $this->request->getFile('foto');
        $is_foto            = $this->request->getPost('is_foto');
        $nombre             = $this->request->getPost('nombre');
        $apellido_paterno   = $this->request->getPost('apellido_paterno');
        $apellido_materno   = $this->request->getPost('apellido_materno');
        $sexo               = $this->request->getPost('sexo');
        $edad               = $this->request->getPost('edad');
        $direccion          = $this->request->getPost('direccion');
        $dni                = $this->request->getPost('dni');
        $fecha_nacimiento   = $this->request->getPost('fecha_nacimiento');
        $correo             = $this->request->getPost('correo');
        $telefono1          = $this->request->getPost('telefono1');
        $telefono2          = $this->request->getPost('telefono2');
        $usuario            = session()->get('user_id');
        if (!$this->validate('cliente')) {
            $errores            = $this->validator->getErrors();
            $data['mensaje']    = reset($errores);
            $data['data']       = $errores;
            $this->api_return(['status' => false, 'data' => $data], 200);
        } else {
            $clienteModel = new Cliente_model();
            if ($foto) {
                if ($foto->isValid() && !$foto->hasMoved()) {
                    $foto_nombre = $foto->getRandomName();
                    $foto->move('./public/upload/clientes', $foto_nombre);
                    $rutaFoto = 'upload/clientes/' . $foto_nombre;

                    $res = $clienteModel->editarCliente(
                        $rutaFoto,
                        $nombre,
                        $apellido_paterno,
                        $apellido_materno,
                        $sexo,
                        $edad,
                        $direccion,
                        $dni,
                        $fecha_nacimiento,
                        $correo,
                        $telefono1,
                        $telefono2,
                        $usuario,
                        $id,
                        $is_foto
                    );

                    if($res['estado']){
                        $data['mensaje']    = 'Cliente modificado correctamente';
                        $this->api_return(['status' => true, 'data' => $data], 200);
                    }else{
                        $data['mensaje']    = 'Error, no se pudo modificar cliente';
                        $this->api_return(['status' => false, 'data' => $data], 200);
                    }
                } else {
                    $data['mensaje']    = 'La imagen ha sido removida';
                    $this->api_return(['status' => false, 'data' => $data], 400);
                }
            } else {
                $res = $clienteModel->editarCliente(
                    '',
                    $nombre,
                    $apellido_paterno,
                    $apellido_materno,
                    $sexo,
                    $edad,
                    $direccion,
                    $dni,
                    $fecha_nacimiento,
                    $correo,
                    $telefono1,
                    $telefono2,
                    $usuario,
                    $id,
                    $is_foto
                );

                if($res['estado']){
                    $data['mensaje']    = 'Cliente modificado correctamente';
                    $this->api_return(['status' => true, 'data' => $data], 200);
                }else{
                    $data['mensaje']    = 'Error, no se pudo modificar cliente';
                    $this->api_return(['status' => false, 'data' => $data], 200);
                }
            }
        }
    }

    // public function editarClientes()
    // {
    //     $foto               = $this->request->getFile('foto_servicio');
    //     $descripcion        = $this->request->getPost('nombre_servicio');
    //     $detalle            = $this->request->getPost('descripcion_servicio');
    //     $monto_sugerido     = $this->request->getPost('monto_servicio');
    //     $id                 = $this->request->getPost('id');
    //     $usuario            = session()->get('user_id');

    //     if (!$this->validate('editarServicio')) {
    //         $errores            = $this->validator->getErrors();
    //         $data['mensaje']    = 'Error';
    //         $data['data']       = $errores;
    //         $this->api_return(['status' => false, 'data' => $data], 200);
    //     } else {
    //         if($foto){
    //             if ($foto->isValid() && !$foto->hasMoved()) {
    //                 $foto_nombre = $foto->getRandomName();
    //                 $foto->move('./public/upload/servicios', $foto_nombre);
    //                 $rutaFoto = 'upload/servicios/' . $foto_nombre;

    //                 $servicioModel                      = new Servicio_model();
    //                 $servicioModel->editarServicio($rutaFoto, $descripcion, $detalle, $monto_sugerido, $usuario,$id);


    //                 $data['mensaje']    = 'Servicio modificado correctamente';
    //                 $this->api_return(['status' => true, 'data' => $data], 200);
    //             } else {
    //                 $data['mensaje']    = 'La imagen ha sido removida';
    //                 $this->api_return(['status' => false, 'data' => $data], 400);
    //             }

    //         }else{

    //                 $servicioModel                      = new Servicio_model();
    //                 $servicioModel->editarServicio('', $descripcion, $detalle, $monto_sugerido, $usuario,$id);


    //                 $data['mensaje']    = 'Servicio modificado correctamente';
    //                 $this->api_return(['status' => true, 'data' => $data], 200);

    //         }
    //     }
    // }
}
