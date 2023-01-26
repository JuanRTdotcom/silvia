<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of User 
 *
 * @author roytuts.com
 */
class Negativa_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->bd_notiweb = $this->load->database('notiweb', TRUE);
        $this->bd_arbocentinela = $this->load->database('arbocentinela', TRUE);
    }


    public function getFichasNegativas()
    {
        if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 4) {
            $where = " r.estado = 1";
          } else if ($_SESSION['nivel'] == 5) {
            $where = " r.subregion = '" . $_SESSION['diresa']."'"."and r.estado = 1";
          } else if ($_SESSION['nivel'] == 6) {
            $where = " r.subregion = '" . $_SESSION['diresa'] . "' and r.red = '" . $_SESSION['red'] . "'"."and r.estado = 1";
          } else if ($_SESSION['nivel'] == 7) {
            $where = " r.subregion = '" . $_SESSION['diresa'] . "' and r.red = '" . $_SESSION['red'] . "' and r.microred = '" . $_SESSION['microred'] ."'"."and r.estado = 1";
          } else {
            $where = " r.subregion = '" . $_SESSION['diresa'] . "' and r.red = '" . $_SESSION['red'] . "' and r.microred = '" . $_SESSION['microred'] . "' and r.cod_est = '" . $_SESSION['establec'] ."'"."and r.estado = 1";
          }

        $sql = "select * from arbocenti a 
        left join notiweb.renace r on r.cod_est = a.e_salud 
        where a.negativa = 1  and eliminado = 0 and $where order by a.id desc limit 100";
        if (!$query = $this->bd_arbocentinela->query($sql)) {
            $error = $this->bd_arbocentinela->error();
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

    public function agregarFichaNegativa(
        $esNegativa,
        $responsable_epidemiologia,
        $fecha_notificacion,
        $observacion
    ) {

        $date = new DateTime($fecha_notificacion);
        $semana = $date->format("W");
        $anio = $date->format("Y");

        $diresa = $_SESSION['diresa'];
        $establecimiento = $_SESSION['establec'];
        $usuario = $_SESSION['usuario'];

        $this->db->db_select('arbocentinela');
        $sql = " 
              insert into arbocenti
              (
                  diresa,
                  e_salud,
                  epidemio_res,
                  fecha_not,
                  anio,
                  semana,                
                  negativa,
                  observaciones,                
                  fecha_reg,
                  usuario_reg,
                  eliminado
              )
              values(
                  '$diresa',
                  '$establecimiento',
                  '$responsable_epidemiologia',
                  '$fecha_notificacion',
                  '$anio',
                  '$semana',                
                  $esNegativa,
                  '$observacion',                
                  now(),
                  '$usuario',
                  '0'
              )        
          ";

        if (!$query = $this->bd_arbocentinela->query($sql)) {
            $error = $this->bd_arbocentinela->error();
            return array(
                'estado' => false,
                'code' => 'error',
                'message' => 'Ha ocurrido un error!',
                'description' => $error["message"]
            );
            exit();
        }

        // $data = $query->result();
        // $query->free_result();
        return array(
            'estado' => true,
            'data' => []
        );
    }

    public function editarFichaNegativa(
        $id,
        $responsable_epidemiologia,
        $fecha_notificacion,
        $observacion
    ) {

        $date = new DateTime($fecha_notificacion);
        $semana = $date->format("W");
        $anio = $date->format("Y");

        $diresa = $_SESSION['diresa'];
        $establecimiento = $_SESSION['establec'];
        $usuario = $_SESSION['usuario'];

        $this->db->db_select('arbocentinela');
        $sql = " 
              update arbocenti
              set diresa = '$diresa',
                  e_salud = '$establecimiento',
                  epidemio_res = '$responsable_epidemiologia',
                  fecha_not = '$fecha_notificacion',
                  anio = '$anio',
                  semana = '$semana',
                  observaciones = '$observacion',
                  fecha_mod = now(),
                  usuario_mod = '$usuario'  
                where id = $id  
          ";

        if (!$query = $this->bd_arbocentinela->query($sql)) {
            $error = $this->bd_arbocentinela->error();
            return array(
                'estado' => false,
                'code' => 'error',
                'message' => 'Ha ocurrido un error!',
                'description' => $error["message"]
            );
            exit();
        }

        // $data = $query->result();
        // $query->free_result();
        return array(
            'estado' => true,
            'data' => []
        );
    }

    public function getFicha_x_Id($id)
    {
        if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 4) {
            $where = " r.estado = 1";
          } else if ($_SESSION['nivel'] == 5) {
            $where = " r.subregion = '" . $_SESSION['diresa']."'";
          } else if ($_SESSION['nivel'] == 6) {
            $where = " r.subregion = '" . $_SESSION['diresa'] . "' and r.red = '" . $_SESSION['red'] . "'";
          } else if ($_SESSION['nivel'] == 7) {
            $where = " r.subregion = '" . $_SESSION['diresa'] . "' and r.red = '" . $_SESSION['red'] . "' and r.microred = '" . $_SESSION['microred'] ."'";
          } else {
            $where = " r.subregion = '" . $_SESSION['diresa'] . "' and r.red = '" . $_SESSION['red'] . "' and r.microred = '" . $_SESSION['microred'] . "' and r.cod_est = '" . $_SESSION['establec'] ."'";
          }

        $sql = "select * from arbocenti a 
        left join notiweb.renace r on r.cod_est = a.e_salud 
        where $where and a.id = $id ";
        if (!$query = $this->bd_arbocentinela->query($sql)) {
            $error = $this->bd_arbocentinela->error();
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
