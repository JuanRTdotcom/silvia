<?php

namespace App\Models;

use CodeIgniter\Model;

class Servicio_model extends Model
{

    public function registrarServicio($foto, $nombre, $detalle, $monto, $usuario)
    {
        $sql = "INSERT INTO servicio(descripcion, detalle, monto_sugerido, foto,usuario_registra)
        VALUES('" . str_replace("'", '\\\'', $nombre) . "','" . str_replace("'", '\\\'', $detalle) . "',$monto,'$foto',$usuario)";
        if (!$query = $this->db->query($sql)) {
            $error = $this->db->error();
            return array(
                'estado' => false,
                'code' => 'error',
                'message' => 'Ha ocurrido un error!',
                'description' => $error["message"]
            );
            exit();
        }

        // $data = $query->getResult();
        return array(
            'estado' => true,
            'data' => []
        );
    }

    public function editarServicio($foto, $nombre, $detalle, $monto, $usuario, $id)
    {
        $db = db_connect();
        $miFoto = $foto != '' ? "foto = '$foto'," : '';
        $sql = "
        UPDATE servicio
        set descripcion = '" . str_replace("'", '\\\'', $nombre) . "',
        detalle = '" . str_replace("'", '\\\'', $detalle) . "',
        monto_sugerido = $monto,
        $miFoto
        usuario_modifica = $usuario,
        fecha_modifica = now()
        where idServicio = $id
        ";
        // print_r($sql);
        // die();
        if (!$query = $this->db->query($sql)) {
            $error = $this->db->error();
            return array(
                'estado' => false,
                'code' => 'error',
                'message' => 'Ha ocurrido un error!',
                'description' => $error["message"]
            );
            exit();
        }

        // $data = $query->getResult();
        return array(
            'estado' => true,
            'data' => []
        );
    }

    public function listarServicio()
    {
        $sql = "SELECT * FROM servicio where estado = 1 order by descripcion asc";
        if (!$query = $this->db->query($sql)) {
            $error = $this->db->error();
            return array(
                'estado' => false,
                'code' => 'error',
                'message' => 'Ha ocurrido un error!',
                'description' => $error["message"]
            );
            exit();
        }

        $data = $query->getResult();
        return array(
            'estado' => true,
            'data' => $data
        );
    }

    public function listarServicioId($id)
    {
        $sql = "SELECT * FROM servicio where estado = 1 and idServicio = $id";
        if (!$query = $this->db->query($sql)) {
            $error = $this->db->error();
            return array(
                'estado' => false,
                'code' => 'error',
                'message' => 'Ha ocurrido un error!',
                'description' => $error["message"]
            );
            exit();
        }

        $data = $query->getResult();
        return array(
            'estado' => true,
            'data' => $data
        );
    }

    public function eliminarServicioId($id)
    {
        $sql = "UPDATE servicio set estado = 0 where idServicio = $id";
        if (!$query = $this->db->query($sql)) {
            $error = $this->db->error();
            return array(
                'estado' => false,
                'code' => 'error',
                'message' => 'Ha ocurrido un error!',
                'description' => $error["message"]
            );
            exit();
        }

        // $data = $query->getResult();
        return array(
            'estado' => true,
            'data' => []
        );
    }
}
