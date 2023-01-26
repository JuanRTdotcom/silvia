<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of User
 *
 * @author roytuts.com
 */
class Serotipos_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        // $this->notiweb = $this->load->database('notiweb', TRUE);
        // $this->arbocentinela = $this->load->database('arbocentinela', TRUE);
    }


    public function getSerotipos()
    {
        $this->db->db_select('arbocentinela');
        $sql = "SELECT e.denominacion as enfermedad,p.denominacion as prueba,s.denominacion as serotipo,s.estado FROM arbocenti_ser s
        inner join arbocenti_enf e on e.id = s.enfermedad
        inner join arbocenti_pru p on p.id = s.prueba
        order by e.denominacion, p.denominacion,s.denominacion";
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

        $data = $query->result();
        $query->free_result();
        return array(
            'estado' => true,
            'data' => $data
        );
    }
    public function getSerotipos_filtro()
    {
        $this->db->db_select('arbocentinela');
        $sql = "SELECT distinct denominacion from arbocenti_ser where estado = 1 order by denominacion";
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

        $data = $query->result();
        $query->free_result();
        return array(
            'estado' => true,
            'data' => $data
        );
    }

}
