<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of User
 *
 * @author roytuts.com
 */
class Enfermedades_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        // $this->notiweb = $this->load->database('notiweb', TRUE);
        // $this->arbocentinela = $this->load->database('arbocentinela', TRUE);
    }


    public function getEnfermedades()
    {
        $this->db->db_select('arbocentinela');
        $sql = "SELECT e.id,e.denominacion,e.estado,( select count(*) from arbocenti_lab l inner join arbocenti a on a.id = l.paciente where l.enfermedad = e.id and l.estado = 1 and a.eliminado = 0 and l.enfermedad = e.id )as cantidad_casos  
        FROM arbocenti_enf e order by e.denominacion;";
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
    
    public function getEnfermedades_filtro()
    {
        $this->db->db_select('arbocentinela');
        $sql = "SELECT * FROM arbocenti_enf where estado = 1 order by denominacion";
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
