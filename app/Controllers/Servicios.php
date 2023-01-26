<?php

namespace App\Controllers;

use App\Models\Servicio_model;

class Servicios extends BaseController
{
    public function index()
    {
        $data['pagina'] = 'Principal/Servicios_view';
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

    public function listarServicios()
    {
        $servicioModel = new Servicio_model();
        $data = $servicioModel->listarServicio();
        $this->api_return(['status' => true, 'data' => $data], 200);
    }
    
    public function listarServicioId()
    {
        $id             = $this->request->getPost('id');
        $servicioModel  = new Servicio_model();
        $data = $servicioModel->listarServicioId($id);
        $this->api_return(['status' => true, 'data' => $data], 200);
    }
    
    public function eliminarServicio()
    {
        $id             = $this->request->getPost('id');
        $servicioModel  = new Servicio_model();
        $data = $servicioModel->eliminarServicioId($id);
        $this->api_return(['status' => true, 'data' => $data], 200);
    }

    public function guardarServicio()
    {
        $foto               = $this->request->getFile('foto_servicio');
        $descripcion        = $this->request->getPost('nombre_servicio');
        $detalle            = $this->request->getPost('descripcion_servicio');
        $monto_sugerido     = $this->request->getPost('monto_servicio');
        $usuario            = session()->get('user_id');

        if (!$this->validate('servicio')) {
            $errores            = $this->validator->getErrors();
            $data['mensaje']    = 'Error';
            $data['data']       = $errores;
            $this->api_return(['status' => false, 'data' => $data], 200);
        } else {
            if ($foto->isValid() && !$foto->hasMoved()) {
                $foto_nombre = $foto->getRandomName();
                $foto->move('./public/upload/servicios', $foto_nombre);
                $rutaFoto = 'upload/servicios/' . $foto_nombre;

                $servicioModel                      = new Servicio_model();
                $servicioModel->registrarServicio($rutaFoto, $descripcion, $detalle, $monto_sugerido, $usuario);


                $data['mensaje']    = 'Servicio creado correctamente';
                $this->api_return(['status' => true, 'data' => $data], 200);
            } else {
                $data['mensaje']    = 'La imagen ha sido removida';
                $this->api_return(['status' => false, 'data' => $data], 400);
            }
        }
    }

    public function editarServicio()
    {
        $foto               = $this->request->getFile('foto_servicio');
        $descripcion        = $this->request->getPost('nombre_servicio');
        $detalle            = $this->request->getPost('descripcion_servicio');
        $monto_sugerido     = $this->request->getPost('monto_servicio');
        $id                 = $this->request->getPost('id');
        $usuario            = session()->get('user_id');

        if (!$this->validate('editarServicio')) {
            $errores            = $this->validator->getErrors();
            $data['mensaje']    = 'Error';
            $data['data']       = $errores;
            $this->api_return(['status' => false, 'data' => $data], 200);
        } else {
            if($foto){
                if ($foto->isValid() && !$foto->hasMoved()) {
                    $foto_nombre = $foto->getRandomName();
                    $foto->move('./public/upload/servicios', $foto_nombre);
                    $rutaFoto = 'upload/servicios/' . $foto_nombre;
    
                    $servicioModel                      = new Servicio_model();
                    $servicioModel->editarServicio($rutaFoto, $descripcion, $detalle, $monto_sugerido, $usuario,$id);
    
    
                    $data['mensaje']    = 'Servicio modificado correctamente';
                    $this->api_return(['status' => true, 'data' => $data], 200);
                } else {
                    $data['mensaje']    = 'La imagen ha sido removida';
                    $this->api_return(['status' => false, 'data' => $data], 400);
                }

            }else{
    
                    $servicioModel                      = new Servicio_model();
                    $servicioModel->editarServicio('', $descripcion, $detalle, $monto_sugerido, $usuario,$id);
    
    
                    $data['mensaje']    = 'Servicio modificado correctamente';
                    $this->api_return(['status' => true, 'data' => $data], 200);
                
            }
        }
    }
}
