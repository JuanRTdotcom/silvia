<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of User
 *
 * @author roytuts.com
 */
class Edas_model extends CI_Model
{

  var $cancer;


  function __construct()
  {
    parent::__construct();

    $this->notiweb = $this->load->database('notiweb', TRUE);
  }


  function getDepartamentos()
  {
    $this->db->reconnect();
    $sql = "select * from departamento d order by d.vNombre asc";
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
    //    $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }
  // function getDepartamentos()
  // {
  //   $this->db->reconnect();
  //   $sql = "select * from departamento d order by d.vNombre asc";
  //   if (!$query = $this->db->query($sql)) {
  //     $error = $this->db->error();
  //     return array(
  //       'estado' => false,
  //       'code' => 'error',
  //       'message' => 'Ha ocurrido un error!',
  //       'description' => $error["message"]
  //     );
  //     exit();
  //   }

  //   $data = $query->result();
  //   $query->free_result();
  //   //    $query->next_result();
  //   return array(
  //     'estado' => true,
  //     'data' => $data
  //   );
  // }

  function getProvincias($parametros)
  {
    $this->db->reconnect();
    if ($this->db->conn_id === FALSE) {
      $this->db->initialize();
    }
    $sql = "select * from provincia p where p.iCodDept = ? order by p.vNombre asc";
    if (!$query = $this->db->query($sql, $parametros)) {
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
    //  $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }
  // function getProvincias($parametros)
  // {
  //   $this->db->reconnect();
  //   if ($this->db->conn_id === FALSE) {
  //     $this->db->initialize();
  //   }
  //   $sql = "select * from provincia p where p.iCodDept = ? order by p.vNombre asc";
  //   if (!$query = $this->db->query($sql, $parametros)) {
  //     $error = $this->db->error();
  //     return array(
  //       'estado' => false,
  //       'code' => 'error',
  //       'message' => 'Ha ocurrido un error!',
  //       'description' => $error["message"]
  //     );
  //     exit();
  //   }

  //   $data = $query->result();
  //   $query->free_result();
  //   //  $query->next_result();
  //   return array(
  //     'estado' => true,
  //     'data' => $data
  //   );
  // }

  function getDistritos($parametros)
  {
    $this->db->reconnect();
    if ($this->db->conn_id === FALSE) {
      $this->db->initialize();
    }
    $sql = "select * from distrito d  where  d.iCodProv = ? order by d.vNombre asc";
    if (!$query = $this->db->query($sql, $parametros)) {
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
    //   $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }
  // function getDistritos($parametros)
  // {
  //   $this->db->reconnect();
  //   if ($this->db->conn_id === FALSE) {
  //     $this->db->initialize();
  //   }
  //   $sql = "select * from distrito d  where  d.iCodProv = ? order by d.vNombre asc";
  //   if (!$query = $this->db->query($sql, $parametros)) {
  //     $error = $this->db->error();
  //     return array(
  //       'estado' => false,
  //       'code' => 'error',
  //       'message' => 'Ha ocurrido un error!',
  //       'description' => $error["message"]
  //     );
  //     exit();
  //   }

  //   $data = $query->result();
  //   $query->free_result();
  //   //   $query->next_result();
  //   return array(
  //     'estado' => true,
  //     'data' => $data
  //   );
  // }






  function getEstablecimientos($codigo, $tabla, $filtro, $filtro2, $valor, $filtro3, $valor3)
  {

    $this->notiweb->reconnect();
    if ($this->notiweb->conn_id === FALSE) {
      $this->notiweb->initialize();
    }


    $sql = "SELECT * from " . $tabla;
    if ($codigo != null) {
      $sql .= " where " . $filtro . " = '$codigo' ";
    }

    if ($filtro2 != null) {
      $sql .= " and " . $filtro2 . " = '$valor' ";
    }

    if ($filtro3 != null) {
      $sql .= " and " . $filtro3 . " = '$valor3' ";
    }






    if (!$query = $this->notiweb->query($sql)) {
      $error = $this->notiweb->error();
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
    // print_r($data);
    //    $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }


  function getRedes($parametros)
  {
    $sql = "select * from redes r where r.subregion = ? order by r.nombre asc";
    if (!$query = $this->notiweb->query($sql, $parametros)) {
      $error = $this->notiweb->error();
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
    //  $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }

  function getMicroRedes($parametros)
  {
    $sql = "select * from microred m  where m.red =  ? and m.subregion = ?   order by m.nombre asc";
    if (!$query = $this->notiweb->query($sql, $parametros)) {
      $error = $this->notiweb->error();
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
    //  $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }


  function getEstablecimientosByMicrored($parametros)
  {
    $sql = "select * from renace r  where r.subregion = ? and r.red =  ? and r.microred = ? order by r.raz_soc asc";
    if (!$query = $this->notiweb->query($sql, $parametros)) {
      $error = $this->notiweb->error();
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
    //  $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }



  function getEtnias()
  {
    $this->notiweb->reconnect();
    $sql = "select * from etnias e order by e.nombre asc";
    if (!$query = $this->notiweb->query($sql)) {
      $error = $this->notiweb->error();
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
    //    $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }

  function getGrupoEtnicos($parametros)
  {
    $this->notiweb->reconnect();
    if ($this->notiweb->conn_id === FALSE) {
      $this->notiweb->initialize();
    }
    $sql = "select * from etniaproc e where e.tipo = ?  order by e.nombre asc";
    if (!$query = $this->notiweb->query($sql, $parametros)) {
      $error = $this->notiweb->error();
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
    //  $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }


  function getProcedencia()
  {
    $this->db->reconnect();
    $sql = "select * from procedencia";
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
    //    $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }


  public function insEda($data)
  {
    /* $this->db->insert('ficha_brotes', $data);
       $insert_id = $this->db->insert_id();
       return  $insert_id;*/

    return $this->db->insert('edas', $data);
  }

  public function updEda($data, $id)
  {
    $this->db->where('registroId', $id);
    return  $this->db->update('edas', $data);
  }

  public function delEda($data, $id)
  {
    $this->db->where('registroId', $id);
    return  $this->db->update('edas', $data);
  }


  public function getListado($filtros)
  {

    $query = $this->db
      ->select("e.registroId as id,e.ano as anio,e.semana,di.nombre as diresa,r2.raz_soc as establecimiento,dist.vNombre as ubigeo")
      ->from('edas e')
      ->join('distrito dist', 'dist.iCodDist = e.ubigeo')
      //->join('departamento dept', 'dept.iCodDept = dist.iCodDept')
      //  ->join('provincia prov', 'prov.iCodProv = dist.iCodProv')
      // ->join('notiweb.usuarios_frontend uf', 'f.vUsuReg = uf.usuario')
      ->join('notiweb.diresas di', 'di.codigo = e.sub_reg_nt', 'left')
      ->join('notiweb.redes r', 'r.subregion = e.sub_reg_nt and r.codigo = e.red', 'left')
      ->join('notiweb.microred m', 'm.subregion = e.sub_reg_nt and m.red = e.red and m.codigo = e.microred', 'left')
      ->join('notiweb.renace r2', 'r2.subregion = e.sub_reg_nt and r2.red = e.red and r2.microred = e.microred and r2.cod_est = e.e_salud', 'left')
      ->where($filtros)
      ->order_by('e.registroId', 'DESC')
      ->get();
    return $query->result();
  }


  public function getFicha($id)
  {
    $where = array('e.registroId' => $id);
    $query = $this->db
      ->select("*")
      ->from('edas e')
      ->where($where)
      ->get();
    return $query->result();
  }



  public function checkIfExiste($diresa, $red, $microred, $eess, $anio, $sem, $ubig)
  {
    $where = array(
      'e.sub_reg_nt' => $diresa,
      'e.red' => $red,
      'e.microred' => $microred,
      'e.e_salud' => $eess,
      'e.ano' => $anio,
      'e.semana' => $sem,
      'e.ubigeo' => $ubig,
      'e.estado' => 1
    );
    $query = $this->db
      ->select("*")
      ->from('edas e')
      ->where($where)
      ->get();
    return $query->result();
  }



  // juan
  function _getDiresas($nivel)
  {
    switch ($nivel) {
      case 1;
        $query = $this->db
          ->select("*")
          ->from('diresas d')
          ->get();
        break;
      case 4:
        $query = $this->db
          ->select("*")
          ->from('diresas d')
          ->get();
        break;
      default:
        $where = array('d.codigo' => $_SESSION['diresa']);
        $query = $this->db
          ->select("*")
          ->from('diresas d')
          ->where($where)
          ->get();
        break;
    }
    return $query->result();
  }

  function _getRedes($diresa)
  {
    
    if($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 4){
      $where = array(
        'r.subregion' => $diresa,
        'r.estado' => 1
      );
    }else if($_SESSION['nivel'] == 5){
      $where = array(
        'r.subregion' => $_SESSION['diresa'],
        'r.estado' => 1
      );
    }else{
      $where = array(
        'r.subregion' => $_SESSION['diresa'],
        'r.codigo' => $_SESSION['red'],
        'r.estado' => 1
      );
    }

    if (!$query = $this->db->select("*")->from('redes r')->where($where)->get()) {
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

  function _getMicroRedes($diresa,$red)
  {
    if($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 4){
      $where = array(
        'm.subregion' => $diresa,
        'm.red' => $red,
        'm.estado' => 1
      );
    }else if($_SESSION['nivel'] == 5){
      $where = array(
        'm.subregion' => $_SESSION['diresa'],
        'm.red' => $red,
        'm.estado' => 1
      );
    }else if($_SESSION['nivel'] == 6){
      $where = array(
        'm.subregion' => $_SESSION['diresa'],
        'm.red' => $_SESSION['red'],
        'm.estado' => 1
      );
    }else{
      $where = array(
        'm.subregion' => $_SESSION['diresa'],
        'm.red' => $_SESSION['red'],
        'm.codigo' => $_SESSION['microred'],
        'm.estado' => 1
      );
    }
    if (!$query = $this->db->select("*")->from('microred m')->where($where)->get()) {
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

  function _getEstablecimientos($diresa, $red, $microred)
  {
    if($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 4){
      $where = array(
        'r.subregion' => $diresa,
        'r.red' => $red,
        'r.microred' => $microred,
        'r.estado' => 1
      );
    }else if($_SESSION['nivel'] == 5){
      $where = array(
        'r.subregion' => $_SESSION['diresa'],
        'r.red' => $red,
        'r.microred' => $microred,
        'r.estado' => 1
      );
    }else if($_SESSION['nivel'] == 6){
      $where = array(
        'r.subregion' => $_SESSION['diresa'],
        'r.red' => $_SESSION['red'],
        'r.microred' => $microred,
        'r.estado' => 1
      );
    }else if($_SESSION['nivel'] == 7){
      $where = array(
        'r.subregion' => $_SESSION['diresa'],
        'r.red' => $_SESSION['red'],
        'r.microred' => $_SESSION['microred'],
        'r.estado' => 1
      );
    }else{
      $where = array(
        'r.subregion' => $_SESSION['diresa'],
        'r.red' => $_SESSION['red'],
        'r.microred' => $_SESSION['microred'],
        'r.cod_est' => $_SESSION['establec'],
        'r.estado' => 1
      );
    }

    if (!$query = $this->db->select("*")->from('renace r')->where($where)->get()) {
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

  function _getTodaDataEdas()
  {
    $sql = "SELECT e.ano,
    (sum(e.daa_c1)+sum(e.daa_c1_4)+sum(e.daa_c5_11)+sum(e.daa_c12_17)+
    sum(e.daa_c18_29)+sum(e.daa_c30_59)+sum(e.daa_c60)+sum(e.dis_c1)+sum(e.dis_c1_4)+sum(e.dis_c5_11)+sum(e.dis_c12_17)+
    sum(e.dis_c18_29)+sum(e.dis_c30_59)+sum(e.dis_c60)) as Casos,
    
    (sum(e.daa_d1)+sum(e.daa_d1_4)+sum(e.daa_d5_11)+sum(e.daa_d12_17)+
    sum(e.daa_d18_29)+sum(e.daa_d30_59)+sum(e.daa_d60)+sum(e.dis_d1)+sum(e.dis_d1_4)+sum(e.dis_d5_11)+sum(e.dis_d12_17)+
    sum(e.dis_d18_29)+sum(e.dis_d30_59)+sum(e.dis_d60)) as Defunciones,
    
    (sum(e.daa_h1)+sum(e.daa_h1_4)+sum(e.daa_h5_11)+sum(e.daa_h12_17)+
    sum(e.daa_h18_29)+sum(e.daa_h30_59)+sum(e.daa_h60)+sum(e.dis_h1)+sum(e.dis_h1_4)+sum(e.dis_h5_11)+sum(e.dis_h12_17)+
    sum(e.dis_h18_29)+sum(e.dis_h30_59)+sum(e.dis_h60)) as Hospitalizaciones,
    
    
    (sum(e.daa_c1)+sum(e.daa_c1_4)+sum(e.daa_c5_11)+sum(e.daa_c12_17)+
    sum(e.daa_c18_29)+sum(e.daa_c30_59)+sum(e.daa_c60)+
    sum(e.daa_d1)+sum(e.daa_d1_4)+sum(e.daa_d5_11)+sum(e.daa_d12_17)+
    sum(e.daa_d18_29)+sum(e.daa_d30_59)+sum(e.daa_d60)+
    sum(e.daa_h1)+sum(e.daa_h1_4)+sum(e.daa_h5_11)+sum(e.daa_h12_17)+
    sum(e.daa_h18_29)+sum(e.daa_h30_59)+sum(e.daa_h60)+
    sum(e.dis_c1)+sum(e.dis_c1_4)+sum(e.dis_c5_11)+sum(e.dis_c12_17)+
    sum(e.dis_c18_29)+sum(e.dis_c30_59)+sum(e.dis_c60)+                        
    sum(e.dis_h1)+sum(e.dis_h1_4)+sum(e.dis_h5_11)+sum(e.dis_h12_17)+
    sum(e.dis_h18_29)+sum(e.dis_h30_59)+sum(e.dis_h60)+
    sum(e.dis_d1)+sum(e.dis_d1_4)+sum(e.dis_d5_11)+sum(e.dis_d12_17)+
    sum(e.dis_d18_29)+sum(e.dis_d30_59)+sum(e.dis_d60)) as total
    
    from edas e 
    where e.estado='1' and e.ano in (select distinct ano from edas)
    group by e.ano";
    
    if (!$query = $this->notiweb->query($sql)) {
      $error = $this->notiweb->error();
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
    //  $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }

  function _getTodaDataEdasConSemanas()
  {
    $sql = "SELECT e.ano,e.semana,
    (sum(e.daa_c1)+sum(e.daa_c1_4)+sum(e.daa_c5_11)+sum(e.daa_c12_17)+
    sum(e.daa_c18_29)+sum(e.daa_c30_59)+sum(e.daa_c60)+sum(e.dis_c1)+sum(e.dis_c1_4)+sum(e.dis_c5_11)+sum(e.dis_c12_17)+
    sum(e.dis_c18_29)+sum(e.dis_c30_59)+sum(e.dis_c60)) as Casos,
    
    (sum(e.daa_d1)+sum(e.daa_d1_4)+sum(e.daa_d5_11)+sum(e.daa_d12_17)+
    sum(e.daa_d18_29)+sum(e.daa_d30_59)+sum(e.daa_d60)+sum(e.dis_d1)+sum(e.dis_d1_4)+sum(e.dis_d5_11)+sum(e.dis_d12_17)+
    sum(e.dis_d18_29)+sum(e.dis_d30_59)+sum(e.dis_d60)) as Defunciones,
    
    (sum(e.daa_h1)+sum(e.daa_h1_4)+sum(e.daa_h5_11)+sum(e.daa_h12_17)+
    sum(e.daa_h18_29)+sum(e.daa_h30_59)+sum(e.daa_h60)+sum(e.dis_h1)+sum(e.dis_h1_4)+sum(e.dis_h5_11)+sum(e.dis_h12_17)+
    sum(e.dis_h18_29)+sum(e.dis_h30_59)+sum(e.dis_h60)) as Hospitalizaciones,
    
    
    (sum(e.daa_c1)+sum(e.daa_c1_4)+sum(e.daa_c5_11)+sum(e.daa_c12_17)+
    sum(e.daa_c18_29)+sum(e.daa_c30_59)+sum(e.daa_c60)+
    sum(e.daa_d1)+sum(e.daa_d1_4)+sum(e.daa_d5_11)+sum(e.daa_d12_17)+
    sum(e.daa_d18_29)+sum(e.daa_d30_59)+sum(e.daa_d60)+
    sum(e.daa_h1)+sum(e.daa_h1_4)+sum(e.daa_h5_11)+sum(e.daa_h12_17)+
    sum(e.daa_h18_29)+sum(e.daa_h30_59)+sum(e.daa_h60)+
    sum(e.dis_c1)+sum(e.dis_c1_4)+sum(e.dis_c5_11)+sum(e.dis_c12_17)+
    sum(e.dis_c18_29)+sum(e.dis_c30_59)+sum(e.dis_c60)+                        
    sum(e.dis_h1)+sum(e.dis_h1_4)+sum(e.dis_h5_11)+sum(e.dis_h12_17)+
    sum(e.dis_h18_29)+sum(e.dis_h30_59)+sum(e.dis_h60)+
    sum(e.dis_d1)+sum(e.dis_d1_4)+sum(e.dis_d5_11)+sum(e.dis_d12_17)+
    sum(e.dis_d18_29)+sum(e.dis_d30_59)+sum(e.dis_d60)) as total
    
    from edas e 
    where e.estado='1' and e.ano in (select distinct ano from edas)
    group by e.ano,e.semana";
    if (!$query = $this->notiweb->query($sql)) {
      $error = $this->notiweb->error();
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
    //  $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }

  function _getTiempoLugarProbableInfeccion($departamento, $provincia, $distrito)
  {
    $mivalidacion = '';
    if ($departamento != '' && $provincia != '' && $distrito != '') {
      $mivalidacion = "and e.ubigeo = $distrito";
    } else if ($departamento != '' && $provincia != '' && $distrito == '') {
      $mivalidacion = "and e.ubigeo in (SELECT di.iCodDist from departamento d 
      inner join provincia p on d.iCodDept = p.iCodDept
      inner join distrito di on di.iCodProv = p.iCodProv
      where di.iCodProv = $provincia)";
    } else if ($departamento != '' && $provincia == '' && $distrito == '') {
      $mivalidacion = "and e.ubigeo in (SELECT di.iCodDist from departamento d 
      inner join provincia p on d.iCodDept = p.iCodDept
      inner join distrito di on di.iCodProv = p.iCodProv
      where di.iCodDept = $departamento)";
    }

    $sql = "SELECT e.ano,e.semana,
    (sum(e.daa_c1)+sum(e.daa_c1_4)+sum(e.daa_c5_11)+sum(e.daa_c12_17)+
    sum(e.daa_c18_29)+sum(e.daa_c30_59)+sum(e.daa_c60)+sum(e.dis_c1)+sum(e.dis_c1_4)+sum(e.dis_c5_11)+sum(e.dis_c12_17)+
    sum(e.dis_c18_29)+sum(e.dis_c30_59)+sum(e.dis_c60)) as Casos,
    
    (sum(e.daa_d1)+sum(e.daa_d1_4)+sum(e.daa_d5_11)+sum(e.daa_d12_17)+
    sum(e.daa_d18_29)+sum(e.daa_d30_59)+sum(e.daa_d60)+sum(e.dis_d1)+sum(e.dis_d1_4)+sum(e.dis_d5_11)+sum(e.dis_d12_17)+
    sum(e.dis_d18_29)+sum(e.dis_d30_59)+sum(e.dis_d60)) as Defunciones,
    
    (sum(e.daa_h1)+sum(e.daa_h1_4)+sum(e.daa_h5_11)+sum(e.daa_h12_17)+
    sum(e.daa_h18_29)+sum(e.daa_h30_59)+sum(e.daa_h60)+sum(e.dis_h1)+sum(e.dis_h1_4)+sum(e.dis_h5_11)+sum(e.dis_h12_17)+
    sum(e.dis_h18_29)+sum(e.dis_h30_59)+sum(e.dis_h60)) as Hospitalizaciones,
    
    
    (sum(e.daa_c1)+sum(e.daa_c1_4)+sum(e.daa_c5_11)+sum(e.daa_c12_17)+
    sum(e.daa_c18_29)+sum(e.daa_c30_59)+sum(e.daa_c60)+
    sum(e.daa_d1)+sum(e.daa_d1_4)+sum(e.daa_d5_11)+sum(e.daa_d12_17)+
    sum(e.daa_d18_29)+sum(e.daa_d30_59)+sum(e.daa_d60)+
    sum(e.daa_h1)+sum(e.daa_h1_4)+sum(e.daa_h5_11)+sum(e.daa_h12_17)+
    sum(e.daa_h18_29)+sum(e.daa_h30_59)+sum(e.daa_h60)+
    sum(e.dis_c1)+sum(e.dis_c1_4)+sum(e.dis_c5_11)+sum(e.dis_c12_17)+
    sum(e.dis_c18_29)+sum(e.dis_c30_59)+sum(e.dis_c60)+                        
    sum(e.dis_h1)+sum(e.dis_h1_4)+sum(e.dis_h5_11)+sum(e.dis_h12_17)+
    sum(e.dis_h18_29)+sum(e.dis_h30_59)+sum(e.dis_h60)+
    sum(e.dis_d1)+sum(e.dis_d1_4)+sum(e.dis_d5_11)+sum(e.dis_d12_17)+
    sum(e.dis_d18_29)+sum(e.dis_d30_59)+sum(e.dis_d60)) as total
    
    from edas e 
    where e.estado='1' and e.ano in (select distinct ano from edas)
    $mivalidacion
     group by e.ano,e.semana";
    if (!$query = $this->notiweb->query($sql)) {
      $error = $this->notiweb->error();
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
    //  $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }
  
  function _getTiempoUnidadNotificante($diresas,$redes,$microredes,$establecimientos)
  {
    if($_SESSION['nivel'] == 8){
			$diresas 			= $_SESSION['diresa'];
			$redes 				= $_SESSION['red'];
			$microredes 		= $_SESSION['microred'];
			$establecimientos 	= $_SESSION['establec'];
		}else if($_SESSION['nivel'] == 7){
			$diresas 			= $_SESSION['diresa'];
			$redes 				= $_SESSION['red'];
			$microredes 		= $_SESSION['microred'];
		}else if($_SESSION['nivel'] == 6){
			$diresas 			= $_SESSION['diresa'];
			$redes 				= $_SESSION['red'];
		}else if($_SESSION['nivel'] == 5){
			$diresas 			= $_SESSION['diresa'];
		}
    $mivalidacion = 'and';
    $mi_diresa_sesion = $_SESSION['diresa'];
    if ($diresas == '' && $redes == '' && $microredes == '' && $establecimientos == '' ) {
      $mivalidacion = $mivalidacion." e.sub_reg_nt = $mi_diresa_sesion";
    } else if ($diresas != '' && $redes == '' && $microredes == '' && $establecimientos == '') {
      $mivalidacion = $mivalidacion." e.sub_reg_nt = $diresas";
    } else if ($diresas != '' && $redes != '' && $microredes == '' && $establecimientos == '') {
      $mivalidacion = $mivalidacion." e.sub_reg_nt = $diresas and e.red = $redes";
    } else if ($diresas != '' && $redes != '' && $microredes != '' && $establecimientos == '') {
      $mivalidacion = $mivalidacion." e.sub_reg_nt = $diresas and e.red = $redes and e.microred = $microredes";
    } else if ($diresas != '' && $redes != '' && $microredes != '' && $establecimientos != '') {
      $mivalidacion = $mivalidacion." e.sub_reg_nt = $diresas and e.red = $redes and e.microred = $microredes and e.e_salud = '$establecimientos'";
    }

    $sql = "SELECT e.ano,e.semana,
    (sum(e.daa_c1)+sum(e.daa_c1_4)+sum(e.daa_c5_11)+sum(e.daa_c12_17)+
    sum(e.daa_c18_29)+sum(e.daa_c30_59)+sum(e.daa_c60)+sum(e.dis_c1)+sum(e.dis_c1_4)+sum(e.dis_c5_11)+sum(e.dis_c12_17)+
    sum(e.dis_c18_29)+sum(e.dis_c30_59)+sum(e.dis_c60)) as Casos,
    
    (sum(e.daa_d1)+sum(e.daa_d1_4)+sum(e.daa_d5_11)+sum(e.daa_d12_17)+
    sum(e.daa_d18_29)+sum(e.daa_d30_59)+sum(e.daa_d60)+sum(e.dis_d1)+sum(e.dis_d1_4)+sum(e.dis_d5_11)+sum(e.dis_d12_17)+
    sum(e.dis_d18_29)+sum(e.dis_d30_59)+sum(e.dis_d60)) as Defunciones,
    
    (sum(e.daa_h1)+sum(e.daa_h1_4)+sum(e.daa_h5_11)+sum(e.daa_h12_17)+
    sum(e.daa_h18_29)+sum(e.daa_h30_59)+sum(e.daa_h60)+sum(e.dis_h1)+sum(e.dis_h1_4)+sum(e.dis_h5_11)+sum(e.dis_h12_17)+
    sum(e.dis_h18_29)+sum(e.dis_h30_59)+sum(e.dis_h60)) as Hospitalizaciones,
    
    
    (sum(e.daa_c1)+sum(e.daa_c1_4)+sum(e.daa_c5_11)+sum(e.daa_c12_17)+
    sum(e.daa_c18_29)+sum(e.daa_c30_59)+sum(e.daa_c60)+
    sum(e.daa_d1)+sum(e.daa_d1_4)+sum(e.daa_d5_11)+sum(e.daa_d12_17)+
    sum(e.daa_d18_29)+sum(e.daa_d30_59)+sum(e.daa_d60)+
    sum(e.daa_h1)+sum(e.daa_h1_4)+sum(e.daa_h5_11)+sum(e.daa_h12_17)+
    sum(e.daa_h18_29)+sum(e.daa_h30_59)+sum(e.daa_h60)+
    sum(e.dis_c1)+sum(e.dis_c1_4)+sum(e.dis_c5_11)+sum(e.dis_c12_17)+
    sum(e.dis_c18_29)+sum(e.dis_c30_59)+sum(e.dis_c60)+                        
    sum(e.dis_h1)+sum(e.dis_h1_4)+sum(e.dis_h5_11)+sum(e.dis_h12_17)+
    sum(e.dis_h18_29)+sum(e.dis_h30_59)+sum(e.dis_h60)+
    sum(e.dis_d1)+sum(e.dis_d1_4)+sum(e.dis_d5_11)+sum(e.dis_d12_17)+
    sum(e.dis_d18_29)+sum(e.dis_d30_59)+sum(e.dis_d60)) as total
    
    from edas e 
    where e.estado='1' and e.ano in (select distinct ano from edas)
    $mivalidacion
     group by e.ano,e.semana";
    if (!$query = $this->notiweb->query($sql)) {
      $error = $this->notiweb->error();
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
    //  $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }

}
