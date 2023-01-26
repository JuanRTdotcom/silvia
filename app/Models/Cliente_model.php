<?php

namespace App\Models;

use CodeIgniter\Model;

class Cliente_model extends Model
{

    public function crearCliente(
        $foto,
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
        $usuario
    ) {
        $nombre_completo = $nombre . ' ' . $apellido_paterno . ' ' . $apellido_materno;
        $miedad = $edad==''?'NULL':$edad;
        $SQLinsertarPersona = "INSERT INTO persona(nombres, apellido_paterno, apellido_materno, nombre_completo, sexo, telefono1, telefono2, correo, foto, direccion, dni, fecha_nacimiento, edad, usuario_registra)
        VALUES(
        '" . str_replace("'", '\\\'', $nombre) . "',
        '" . str_replace("'", '\\\'', $apellido_paterno) . "',
        '" . str_replace("'", '\\\'', $apellido_materno) . "',
        '" . str_replace("'", '\\\'', $nombre_completo) . "',
        '" . str_replace("'", '\\\'', $sexo) . "',
        '" . str_replace("'", '\\\'', $telefono1) . "',
        '" . str_replace("'", '\\\'', $telefono2) . "',
        '" . str_replace("'", '\\\'', $correo) . "',
        '" . str_replace("'", '\\\'', $foto) . "',
        '" . str_replace("'", '\\\'', $direccion) . "',
        '" . str_replace("'", '\\\'', $dni) . "',
        '" . str_replace("'", '\\\'', $fecha_nacimiento) . "',
        $miedad,
        $usuario)";
        $this->db->transStart();
        $this->db->query($SQLinsertarPersona);
        $id = $this->db->insertID();
        
        $SQLinsertarCliente = " INSERT INTO cliente(fidCategoria, fidPersona, usuario_registra) 
        VALUES (
            2,
            $id,
            $usuario
        )
        ";
        $this->db->query($SQLinsertarCliente);
        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            // generate an error... or use the log_message() function to log your error
            return array(
                'estado' => false,
                'code' => 'error',
                'message' => 'Ha ocurrido un error!',
                'description' => 'Error al insertar cliente'
            );
        } else {
            return array(
                'estado' => true,
                'data' => []
            );
        }
    }
    
    public function editarCliente(
        $foto,
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
    ) {
        $nombre_completo = $nombre . ' ' . $apellido_paterno . ' ' . $apellido_materno;
        $miedad = $edad==''?'NULL':$edad;
        $miFoto = '';
        if($foto==''){
            if($is_foto == 'S'){
                $miFoto = '';
            }else{
                $miFoto = "foto = '',";
            }
        }else{
            $miFoto = "foto = '". str_replace("'", '\\\'', $foto)."',";
        }


        $SQLeditarPersona = 
        "UPDATE persona
        SET       
        nombres = '" . str_replace("'", '\\\'', $nombre) . "',
        apellido_paterno = '" . str_replace("'", '\\\'', $apellido_paterno) . "',
        apellido_materno = '" . str_replace("'", '\\\'', $apellido_materno) . "',
        nombre_completo = '" . str_replace("'", '\\\'', $nombre_completo) . "',
        sexo = '" . str_replace("'", '\\\'', $sexo) . "',
        telefono1 = '" . str_replace("'", '\\\'', $telefono1) . "',
        telefono2 = '" . str_replace("'", '\\\'', $telefono2) . "',
        correo = '" . str_replace("'", '\\\'', $correo) . "',
        $miFoto
        direccion = '" . str_replace("'", '\\\'', $direccion) . "',
        dni = '" . str_replace("'", '\\\'', $dni) . "',
        fecha_nacimiento = '" . str_replace("'", '\\\'', $fecha_nacimiento) . "',
        edad = $miedad, 
        usuario_modifica = $usuario,
        fecha_modifica = now() 
        where idPersona = (SELECT fidPersona from cliente c where c.idCliente = $id and c.estado = 1 limit 1) and estado = 1";
        
        $SQLeditarCliente = 
        "UPDATE cliente
        set usuario_modifica = $usuario,
        fecha_modifica = now()
        where idCliente = $id and estado = 1";
        $this->db->transStart();
        $this->db->query($SQLeditarPersona);
        $this->db->query($SQLeditarCliente);
        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            // generate an error... or use the log_message() function to log your error
            return array(
                'estado' => false,
                'code' => 'error',
                'message' => 'Ha ocurrido un error!',
                'description' => 'Error al editar cliente'
            );
        } else {
            return array(
                'estado' => true,
                'data' => []
            );
        }
    }


    public function listarClientes()
    {
        $sql = "SELECT 
        p.idPersona,
        c.idCliente,
        p.nombres,
        p.apellido_paterno,
        p.apellido_materno,
        p.nombre_completo,
        p.sexo,
        p.foto,
        ca.descripcion as categoria_cliente,
        (select IF(sum(ven.total) is null,0,sum(ven.total)) from venta ven where ven.fidEstadoVenta = 1 and ven.estado = 1 and ven.fidCliente = c.idCliente) as gananciaTotal,
        (select IF(sum(hd.monto) is null,0,sum(hd.monto)) from historial_deudas hd where hd.estado = 1 and hd.fidCliente = c.idCliente) as deudaTotal,
        (select count(v.total) from venta v where v.fidEstadoVenta = 1 and v.estado = 1 and v.fidCliente = c.idCliente) as cantidadVisitas,
        (select IF(ve.fechaVenta is null,'',ve.fechaVenta) from venta ve where  ve.fidEstadoVenta = 1 and ve.estado = 1 and ve.fidCliente = c.idCliente order by ve.fechaVenta desc limit 1) as ultimaVisita
        from cliente c 
        inner join persona p on c.fidPersona = p.idPersona
        inner join categoria ca on ca.idCategoria = c.fidCategoria
        where c.estado = 1 and p.estado = 1
        order by c.idCliente desc limit 9";
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
    
    public function listarTotalClientes()
    {
        $sql = "SELECT 
        count(c.idCliente) as total
        from cliente c 
        inner join persona p on c.fidPersona = p.idPersona
        inner join categoria ca on ca.idCategoria = c.fidCategoria
        where c.estado = 1 and p.estado = 1";
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

    public function buscarCliente($buscador)
    {
        $dato = str_replace("'", '\\\'', $buscador);
        $sql = "SELECT 
        p.idPersona,
        c.idCliente,
        p.nombres,
        p.apellido_paterno,
        p.apellido_materno,
        p.nombre_completo,
        p.sexo,
        p.foto,
        ca.descripcion as categoria_cliente,
        (select IF(sum(ven.total) is null,0,sum(ven.total)) from venta ven where ven.fidEstadoVenta = 1 and ven.estado = 1 and ven.fidCliente = c.idCliente) as gananciaTotal,
        (select IF(sum(hd.monto) is null,0,sum(hd.monto)) from historial_deudas hd where hd.estado = 1 and hd.fidCliente = c.idCliente) as deudaTotal,
        (select count(v.total) from venta v where v.fidEstadoVenta = 1 and v.estado = 1 and v.fidCliente = c.idCliente) as cantidadVisitas,
        (select IF(ve.fechaVenta is null,'',ve.fechaVenta) from venta ve where  ve.fidEstadoVenta = 1 and ve.estado = 1 and ve.fidCliente = c.idCliente order by ve.fechaVenta desc limit 1) as ultimaVisita
        from cliente c 
        inner join persona p on c.fidPersona = p.idPersona
        inner join categoria ca on ca.idCategoria = c.fidCategoria
        where c.estado = 1 and p.estado = 1 and p.nombre_completo like '%$dato%'
        order by c.idCliente desc limit 9";
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
    
    public function buscarClienteId($id)
    {
        $sql = "SELECT 
        p.*,
        c.idCliente
        from cliente c 
        inner join persona p on c.fidPersona = p.idPersona
        where c.estado = 1 and p.estado = 1 and c.idcliente = $id
        ";
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

    public function eliminarClienteId($id)
    {

        $this->db->transStart();
        $this->db->query("UPDATE persona p set p.estado = 0 where p.idPersona = (SELECT fidPersona from cliente c where c.idCliente = $id and c.estado = 1 limit 1)");
        $this->db->query("UPDATE cliente set estado = 0 where idCliente = $id");
        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return array(
                'estado' => false,
                'code' => 'error',
                'message' => 'Ha ocurrido un error!',
                'description' => 'Error al eliminar cliente'
            );
        } else {
            return array(
                'estado' => true,
                'data' => []
            );
        }
    }
}
