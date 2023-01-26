<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of User
 *
 * @author roytuts.com
 */
class Resultados_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        // $this->notiweb = $this->load->database('notiweb', TRUE);
        // $this->arbocentinela = $this->load->database('arbocentinela', TRUE);
    }


    public function getResultados()
    {
        $this->db->db_select('arbocentinela');
        $sql = "SELECT r.*, (select count(*) from arbocenti_lab l inner join arbocenti a on a.id = l.paciente where l.estado = 1 and a.eliminado = 0 and l.resultado = r.id) as cant_muestras_lab
        from arbocenti_res r
        order by r.resultado;";
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
    
    public function getResultados_filtro()
    {
        $this->db->db_select('arbocentinela');
        $sql = "SELECT * FROM arbocenti_res where estado = 1 order by resultado";
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
