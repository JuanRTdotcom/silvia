<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuario_model extends Model
{

    public function validarLogin($usuario, $password)
    {
        $sql = "select * from usuario where usuario = '$usuario' and clave = '$password'";
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

    public function obtenerInfoUsuario($id)
    {
        $sql = "select 
        u.idUsuario,
        u.usuario,
        u.fidNivel,
        nu.descripcion as nivel_usuario,
        u.estado,
        p.nombres,
        p.apellido_paterno,
        p.apellido_materno,
        p.correo,
        p.telefono1,
        p.telefono2,
        p.sexo,
        p.foto,
        p.direccion,
        p.dni 
        from usuario u 
        inner join usuario_persona up on u.idUsuario = up.fidUsuario 
        inner join persona p on p.idPersona = up.fidPersona 
        inner join nivel_usuario nu on nu.idNivelUsuario = u.fidNivel 
        where u.idUsuario = $id and u.estado = 1";
        
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
}
