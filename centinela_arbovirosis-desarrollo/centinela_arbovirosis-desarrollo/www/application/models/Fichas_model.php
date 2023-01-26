<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of User
 *
 * @author roytuts.com
 */
class Fichas_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();

    $this->bd_notiweb = $this->load->database('notiweb', TRUE);
    $this->bd_arbocentinela = $this->load->database('arbocentinela', TRUE);
    $this->colas = $this->load->database('colas', true);
  }


  function getPaises()
  {
    $sql = "select * from paises p order by p.nombre asc";
    if (!$query = $this->bd_notiweb->query($sql)) {
      $error = $this->bd_notiweb->error();
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


  function getPruebas($enfermedad)
  {
    $sql = "SELECT a.* FROM arbocenti_pru a where enfermedad = $enfermedad and a.estado = 1";
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
    //    $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }

  function eliminarPruebas($id, $usuario)
  {
    $sql = "update arbocenti_lab set estado = 0,fecha_eli = now(),usuario_eli = '$usuario'  where id=$id";
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
    //    $query->next_result();
    return array(
      'estado' => true,
      'data' => []
    );
  }

  function eliminarFicha($id, $usuario)
  {
    $sql = "update arbocenti set eliminado = 1, fecha_eli = now(), usuario_eli = '$usuario' where id=$id";
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
    //    $query->next_result();
    return array(
      'estado' => true,
      'data' => []
    );
  }

  function verPruebas($id)
  {
    // $this->db->db_select('arbocentinela');
    $sql = "select * from arbocenti_lab where id=$id";
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

  function getSerotipos($enfermedad, $prueba)
  {
    // $this->db->db_select('arbocentinela');
    $sql = "SELECT a.* FROM arbocenti_ser a where a.enfermedad = $enfermedad and a.prueba = $prueba and a.estado = 1";
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
    //    $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }

  function getTipoVia()
  {
    // $this->db->db_select('arbocentinela');
    $sql = "SELECT * FROM tipovia where eliminado = 0";
    if (!$query = $this->bd_notiweb->query($sql)) {
      $error = $this->bd_notiweb->error();
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

  function getTipoAsociacion()
  {
    // $this->db->db_select('arbocentinela');
    $sql = "SELECT * FROM tipo_asociacion where eliminado = 0";
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
    //    $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }

  function getDepartamentos()
  {
    // $this->db->db_select('arbocentinela');
    $sql = "select * from departamento d order by d.nombre asc";
    if (!$query = $this->bd_notiweb->query($sql)) {
      $error = $this->bd_notiweb->error();
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
  function getDepartamento_editar($id)
  {
    // $this->db->db_select('arbocentinela');
    $sql = "select * from departamento d where ubigeo = SUBSTRING('$id',1,2) order by d.nombre asc limit 1";
    if (!$query = $this->bd_notiweb->query($sql)) {
      $error = $this->bd_notiweb->error();
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
  function getProvincia_editar($id)
  {
    // $this->db->db_select('arbocentinela');
    $sql = "select * from provincia d where ubigeo = SUBSTRING('$id',1,4) order by d.nombre asc limit 1";
    if (!$query = $this->bd_notiweb->query($sql)) {
      $error = $this->bd_notiweb->error();
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
  
  function getProvincias_x_distrito($id)
  {
    // $this->db->db_select('arbocentinela');
    $sql = "select * from provincia d where departamento = SUBSTRING('$id',1,2) order by d.nombre asc";
    if (!$query = $this->bd_notiweb->query($sql)) {
      $error = $this->bd_notiweb->error();
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
  
  function getDistritos_x_distrito($id)
  {
    // $this->db->db_select('arbocentinela');
    $sql = "select * from distrito d where departamento = SUBSTRING('$id',1,2) and provinci = SUBSTRING('$id',1,4) order by d.nombre asc";
    if (!$query = $this->bd_notiweb->query($sql)) {
      $error = $this->bd_notiweb->error();
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


  function getProvincias($parametros)
  {
    // $this->db->db_select('arbocentinela');
    $sql = "select * from provincia p where p.departamento = ? order by p.nombre asc";
    if (!$query = $this->bd_notiweb->query($sql, $parametros)) {
      $error = $this->bd_notiweb->error();
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
  function getDistritos($parametros)
  {
    // $this->db->db_select('arbocentinela');
    $sql = "select * from distrito d  where  d.provinci = ? order by d.nombre asc";
    if (!$query = $this->bd_notiweb->query($sql, $parametros)) {
      $error = $this->bd_notiweb->error();
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

  public function getFichas()
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
    where $where and a.negativa = 0 and eliminado = 0 order by a.id desc limit 100";
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

  public function getFichasReporte()
  {
    // $this->db->db_select('arbocentinela');
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

    $sql = "SELECT 
    a.id,
    r.raz_soc as Nombre_Establecimiento,
    d.nombre as Nombre_Diresa, 
    IF(a.negativa = 1, 'SI', 'NO') as Negativa,
    DATE_FORMAT(a.fecha_not,'%d/%m/%Y') as Fecha_Notificacion,
    DATE_FORMAT(a.fecha_fie,'%d/%m/%Y') as Fecha_Inicio_Enfermedad,
    DATE_FORMAT(a.fecha_mue,'%d/%m/%Y') as Fecha_Toma_Muestra,
    a.anio as Año,
    a.semana as Semana,
    a.laboratorio_res as Responsable_Laboratorio,
    a.epidemio_res as Responsable_Epidemiologia,
    a.dni as Dni,
    a.nombres as Nombres,
    a.apepat as Apellido_Paterno,
    a.apemat as Apellido_Materno,
    a.edad as Edad,
    if(a.tipo_edad = 'A','Años','Meses') as Tipo_Edad,
    a.sexo as Sexo,
    a.direccion as Direccion,
    tv.denominacion as Tipo_Via,
    a.direccion_nombre_via as Nombre_Via,
    a.direccion_numero_puerta as Numero_Puerta,
    a.direccion_numero_manzana as Numero_Manzana,
    a.direccion_lote as Lote,
    a.direccion_nombre_asociacion as Nombre_Asociacion,
    asoc.denominacion as Tipo_Asociacion,
    a.telefono as Telefono,
    IF(a.gestante = 1, 'SI', 'NO') as Gestante,
    IF(a.fiebre = 1, 'SI', 'NO') as Fiebre,
    IF(a.rash = 1, 'SI', 'NO') as Rash,
    IF(a.conjuntivitis = 1, 'SI', 'NO') as Conjuntivitis,
    IF(a.artralgia = 1, 'SI', 'NO') as Artralgia,
    IF(a.mialgia = 1, 'SI', 'NO') as Mialgia,
    IF(a.otros = 1, 'SI', 'NO') as Otros,
    a.otros_nombre as Otro_Sintoma,
    ep.cNombre as Evaluacion_Paciente,
    ac.cNombre as Area_Captacion,
    a.diagnostico_captacion as Diagnostico_Captacion,
    p.nombre as Pais,
    dep.nombre as Departamento,
    prov.nombre as Provincia,
    dis.nombre as Distrito,
    a.localidad as Localidad,
    tz.cNombre as Tipo_Zona,
    a.usuario_reg as Id_Usuario_Registra,
    uf.nombres as Nombre_usuario_Registra,
    DATE_FORMAT(a.fecha_reg,'%d/%m/%Y') as Fecha_Registro
    FROM arbocenti a
    left join notiweb.diresas d on d.codigo = a.diresa
    left join notiweb.renace r on r.cod_est = a.e_salud
    left join evaluacion_paciente ep on ep.idEvaluacionPaciente = a.evaluacion_paciente
    left join area_captacion ac on ac.idAreaCaptacion = a.area_captacion
    left join notiweb.paises p on p.codigo = a.pais
    left join notiweb.departamento dep on dep.ubigeo = a.departamento
    left join notiweb.provincia prov on prov.ubigeo = a.provincia
    left join notiweb.distrito dis on dis.ubigeo = a.distrito
    left join tipo_zona tz on tz.idTipoZona = a.tipo_zona
    left join notiweb.tipovia tv on tv.id = a.direccion_tipo_via
    left join tipo_asociacion asoc on asoc.id = a.direccion_tipo_asociacion
    left join notiweb.usuarios_frontend uf on uf.usuario = a.usuario_reg
    where a.eliminado = 0 $where
    order by id desc limit 50";
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
  public function getFichasReporte_Filtro($tieneLimite, $establecimiento, $diresa, $dni, $negativa, $fecha_notificacion_inicio, $fecha_notificacion_fin, $fecha_inicio_enfermedad_inicio, $fecha_inicio_enfermedad_fin, $fecha_muestra_inicio, $fecha_muestra_fin)
  {
    $Nlimite = '';
    $Nestablecimiento = '';
    $Ndiresa = '';
    $Ndni = '';
    $Nnegativo = "";
    $NfechaNotificacion = '';
    $Nfecha_inicio_enfermedad = '';
    $Nfecha_muestra = '';
    if ($tieneLimite == 1) {
      $Nlimite = " limit 50";
    }
    if ($negativa == 1) {
      $Nnegativo = " and a.negativa = $negativa";
    }
    if ($establecimiento != '') {
      $Nestablecimiento = " and a.e_salud = '$establecimiento'";
    }
    if ($diresa != '') {
      $Ndiresa = " and a.diresa = '$diresa'";
    }
    if ($dni != '') {
      $Ndni = " and a.dni = '$dni'";
    }
    if ($fecha_notificacion_inicio != '') {
      $NfechaNotificacion = " and a.fecha_not BETWEEN '$fecha_notificacion_inicio' and '$fecha_notificacion_fin'";
    }
    if ($fecha_inicio_enfermedad_inicio != '') {
      $Nfecha_inicio_enfermedad = " and a.fecha_fie BETWEEN '$fecha_inicio_enfermedad_inicio' and '$fecha_inicio_enfermedad_fin'";
    }
    if ($fecha_muestra_inicio != '') {
      $Nfecha_muestra = " and a.fecha_mue BETWEEN '$fecha_muestra_inicio' and '$fecha_muestra_fin'";
    }
    // $this->db->db_select('arbocentinela');

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


    $sql = "SELECT 
    a.id,
    r.raz_soc as Nombre_Establecimiento,
    d.nombre as Nombre_Diresa, 
    IF(a.negativa = 1, 'SI', 'NO') as Negativa,
    DATE_FORMAT(a.fecha_not,'%d/%m/%Y') as Fecha_Notificacion,
    DATE_FORMAT(a.fecha_fie,'%d/%m/%Y') as Fecha_Inicio_Enfermedad,
    DATE_FORMAT(a.fecha_mue,'%d/%m/%Y') as Fecha_Toma_Muestra,
    a.anio as Año,
    a.semana as Semana,
    a.laboratorio_res as Responsable_Laboratorio,
    a.epidemio_res as Responsable_Epidemiologia,
    a.dni as Dni,
    a.nombres as Nombres,
    a.apepat as Apellido_Paterno,
    a.apemat as Apellido_Materno,
    a.edad as Edad,
    if(a.tipo_edad = 'A','Años','Meses') as Tipo_Edad,
    a.sexo as Sexo,
    a.direccion as Direccion,
    tv.denominacion as Tipo_Via,
    a.direccion_nombre_via as Nombre_Via,
    a.direccion_numero_puerta as Numero_Puerta,
    a.direccion_numero_manzana as Numero_Manzana,
    a.direccion_lote as Lote,
    a.direccion_nombre_asociacion as Nombre_Asociacion,
    asoc.denominacion as Tipo_Asociacion,
    a.telefono as Telefono,
    IF(a.gestante = 1, 'SI', 'NO') as Gestante,
    IF(a.fiebre = 1, 'SI', 'NO') as Fiebre,
    IF(a.rash = 1, 'SI', 'NO') as Rash,
    IF(a.conjuntivitis = 1, 'SI', 'NO') as Conjuntivitis,
    IF(a.artralgia = 1, 'SI', 'NO') as Artralgia,
    IF(a.mialgia = 1, 'SI', 'NO') as Mialgia,
    IF(a.otros = 1, 'SI', 'NO') as Otros,
    a.otros_nombre as Otro_Sintoma,
    ep.cNombre as Evaluacion_Paciente,
    ac.cNombre as Area_Captacion,
    a.diagnostico_captacion as Diagnostico_Captacion,
    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.estado = 1) as 'Dengue',
    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 1 and al.estado = 1) as 'Dengue_aislamiento_tipificacion',
    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.estado = 1 limit 1) as 'Zika',
    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.estado = 1 limit 1) as 'Chikungunya',
    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.estado = 1 limit 1) as 'Oropuche',
    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.estado = 1 limit 1) as 'Mayaro',
    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.estado = 1 limit 1) as 'Fiebre Amarilla',
    p.nombre as Pais,
    dep.nombre as Departamento,
    prov.nombre as Provincia,
    dis.nombre as Distrito,
    a.localidad as Localidad,
    tz.cNombre as Tipo_Zona,
    a.usuario_reg as Id_Usuario_Registra,
    uf.nombres as Nombre_usuario_Registra,
    DATE_FORMAT(a.fecha_reg,'%d/%m/%Y') as Fecha_Registro
    FROM arbocenti a
    left join notiweb.diresas d on d.codigo = a.diresa
    left join notiweb.renace r on r.cod_est = a.e_salud
    left join evaluacion_paciente ep on ep.idEvaluacionPaciente = a.evaluacion_paciente
    left join area_captacion ac on ac.idAreaCaptacion = a.area_captacion
    left join notiweb.paises p on p.codigo = a.pais
    left join notiweb.departamento dep on dep.ubigeo = a.departamento
    left join notiweb.provincia prov on prov.ubigeo = a.provincia
    left join notiweb.distrito dis on dis.ubigeo = a.distrito
    left join tipo_zona tz on tz.idTipoZona = a.tipo_zona
    left join notiweb.tipovia tv on tv.id = a.direccion_tipo_via
    left join tipo_asociacion asoc on asoc.id = a.direccion_tipo_asociacion
    left join notiweb.usuarios_frontend uf on uf.usuario = a.usuario_reg
    where a.eliminado = 0 and $where $Nestablecimiento $Ndiresa $Ndni $Nnegativo $NfechaNotificacion $Nfecha_inicio_enfermedad $Nfecha_muestra
    order by id desc $Nlimite";
    // print_r($sql);
    // die();
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

  public function getFichasReporte_Filtro_Lab($tieneLimite, $conFichas, $nro_muestra, $mis_enfermedades, $mis_pruebas, $mis_resultados, $mis_serotipos, $fecha_resultados_inicio, $fecha_resultados_fin, $fecha_recepcion_lrr_inicio, $fecha_recepcion_lrr_fin, $fecha_envio_ins_inicio, $fecha_envio_ins_fin, $fecha_recepcion_ins_inicio, $fecha_recepcion_ins_fin)
  {
    $Nlimite = '';
    if ($tieneLimite == 1) {
      $Nlimite = " limit 50";
    }
    $siesConFichas = '';
    $siesConFichasFroms = '';
    if ($conFichas == 1) {
      $siesConFichas = " 
      r.raz_soc as Nombre_Establecimiento,
      d.nombre as Nombre_Diresa,
      IF(a.negativa = 1, 'SI', 'NO') as Negativa,
      DATE_FORMAT(a.fecha_not,'%d/%m/%Y') as Fecha_Notificacion,
      DATE_FORMAT(a.fecha_fie,'%d/%m/%Y') as Fecha_Inicio_Enfermedad,
      DATE_FORMAT(a.fecha_mue,'%d/%m/%Y') as Fecha_Toma_Muestra,
      a.anio as Año,
      a.semana as Semana,
      a.laboratorio_res as Responsable_Laboratorio,
      a.epidemio_res as Responsable_Epidemiologia,
      a.dni as Dni,
      a.nombres as Nombres,
      a.apepat as Apellido_Paterno,
      a.apemat as Apellido_Materno,
      a.edad as Edad,
      if(a.tipo_edad = 'A','Años','Meses') as Tipo_Edad,
      a.sexo as Sexo,
      a.direccion as Direccion,
      tv.denominacion as Tipo_Via,
      a.direccion_nombre_via as Nombre_Via,
      a.direccion_numero_puerta as Numero_Puerta,
      a.direccion_numero_manzana as Numero_Manzana,
      a.direccion_lote as Lote,
      a.direccion_nombre_asociacion as Nombre_Asociacion,
      asoc.denominacion as Tipo_Asociacion,
      a.telefono as Telefono,
      IF(a.gestante = 1, 'SI', 'NO') as Gestante,
      IF(a.fiebre = 1, 'SI', 'NO') as Fiebre,
      IF(a.rash = 1, 'SI', 'NO') as Rash,
      IF(a.conjuntivitis = 1, 'SI', 'NO') as Conjuntivitis,
      IF(a.artralgia = 1, 'SI', 'NO') as Artralgia,
      IF(a.mialgia = 1, 'SI', 'NO') as Mialgia,
      IF(a.otros = 1, 'SI', 'NO') as Otros,
      a.otros_nombre as Otro_Sintoma,
      ep.cNombre as Evaluacion_Paciente,
      ac.cNombre as Area_Captacion,
      a.diagnostico_captacion as Diagnostico_Captacion,
      p.nombre as Pais,
      dep.nombre as Departamento,
      prov.nombre as Provincia,
      dis.nombre as Distrito,
      a.localidad as Localidad,
      tz.cNombre as Tipo_Zona,
      a.usuario_reg as Id_Usuario_Registra,
      uf.nombres as Nombre_usuario_Registra,
      DATE_FORMAT(a.fecha_reg,'%d/%m/%Y') as Fecha_Registro,
       ";

      $siesConFichasFroms = " 
      left join notiweb.diresas d on d.codigo = a.diresa
      left join notiweb.renace r on r.cod_est = a.e_salud
      left join evaluacion_paciente ep on ep.idEvaluacionPaciente = a.evaluacion_paciente
      left join area_captacion ac on ac.idAreaCaptacion = a.area_captacion
      left join notiweb.paises p on p.codigo = a.pais
      left join notiweb.departamento dep on dep.ubigeo = a.departamento
      left join notiweb.provincia prov on prov.ubigeo = a.provincia
      left join notiweb.distrito dis on dis.ubigeo = a.distrito
      left join tipo_zona tz on tz.idTipoZona = a.tipo_zona
      left join notiweb.tipovia tv on tv.id = a.direccion_tipo_via
      left join tipo_asociacion asoc on asoc.id = a.direccion_tipo_asociacion
      left join notiweb.usuarios_frontend uf on uf.usuario = a.usuario_reg ";
    }


    $Nnro_muestra = '';
    $Nmis_enfermedades = '';
    $Nmis_pruebas = '';
    $Nmis_resultados = "";
    $Nmis_serotipos = '';
    $Nfecha_resultados = '';
    $Nfecha_recepcion_lrr = '';
    $Nfecha_envio_ins = '';
    $Nfecha_recepcion_ins = '';

    if ($nro_muestra != '') {
      $Nnro_muestra = " and al.muestra like '%$nro_muestra%'";
    } else {
    }
    if ($mis_enfermedades != '') {
      $Nmis_enfermedades = " and ae.id = $mis_enfermedades";
    }
    if ($mis_pruebas != '') {
      $Nmis_pruebas = " and ap.denominacion = '$mis_pruebas'";
    }
    if ($mis_resultados != '') {
      $Nmis_resultados = " and res.id = $mis_resultados";
    }
    if ($mis_serotipos != '') {
      $Nmis_serotipos = " and ase.denominacion = '$mis_serotipos'";
    }
    if ($fecha_resultados_inicio != '') {
      $Nfecha_resultados = " and al.fecha_res BETWEEN '$fecha_resultados_inicio' and '$fecha_resultados_fin'";
    }
    if ($fecha_recepcion_lrr_inicio != '') {
      $Nfecha_recepcion_lrr = " and al.dtRecepcionLRR BETWEEN '$fecha_recepcion_lrr_inicio' and '$fecha_recepcion_lrr_fin'";
    }
    if ($fecha_envio_ins_inicio != '') {
      $Nfecha_envio_ins = " and al.dtFechaEnvioINS BETWEEN '$fecha_envio_ins_inicio' and '$fecha_envio_ins_fin'";
    }
    if ($fecha_recepcion_ins_inicio != '') {
      $Nfecha_recepcion_ins = " and al.dtFechaEnvioINS BETWEEN '$fecha_recepcion_ins_inicio' and '$fecha_recepcion_ins_fin'";
    }

    // $this->db->db_select('arbocentinela');
    // if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 4) {
    //   $where = " r.estado = 1";
    // } else if ($_SESSION['nivel'] == 5) {
    //   $where = " r.subregion = '" . $_SESSION['diresa']."'";
    // } else if ($_SESSION['nivel'] == 6) {
    //   $where = " r.subregion = '" . $_SESSION['diresa'] . "' and r.red = '" . $_SESSION['red'] . "'";
    // } else if ($_SESSION['nivel'] == 7) {
    //   $where = " r.subregion = '" . $_SESSION['diresa'] . "' and r.red = '" . $_SESSION['red'] . "' and r.microred = '" . $_SESSION['microred'] ."'";
    // } else {
    //   $where = " r.subregion = '" . $_SESSION['diresa'] . "' and r.red = '" . $_SESSION['red'] . "' and r.microred = '" . $_SESSION['microred'] . "' and r.cod_est = '" . $_SESSION['establec'] ."'";
    // }

    $sql = "SELECT
      $siesConFichas
      al.id as idMuestra,
      al.paciente idPaciente,
      al.muestra nroMuestra,
      ae.denominacion as Enfermedad,
      ap.denominacion as Prueba,
      ase.denominacion as Serotipo,
      res.resultado as Resultado,
      DATE_FORMAT(al.fecha_res,'%d/%m/%Y') as Fecha_resultado,
      DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') as Fecha_recepcion_LRR,
      DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') as Fecha_envio_INS,
      DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') as Fecha_recepcion_INS,
      DATE_FORMAT(al.fecha_reg,'%d/%m/%Y') as Fecha_registro,
      DATEDIFF(al.dtRecepcionLRR,al.fecha_res) as dias_FechasResultado_y_RecepcionLRR
      from arbocenti_lab al
      left join arbocenti_enf ae on ae.id = al.enfermedad
      left join arbocenti_pru ap on ap.id = al.prueba
      left join arbocenti_ser ase on ase.id = al.serotipo
      left join arbocenti_res res on res.id = al.resultado
      left join arbocenti a on a.id = al.paciente
      $siesConFichasFroms
      where al.estado = 1 and a.eliminado = 0 $Nnro_muestra $Nmis_enfermedades $Nmis_pruebas $Nmis_resultados $Nmis_serotipos $Nfecha_resultados $Nfecha_recepcion_lrr $Nfecha_envio_ins $Nfecha_recepcion_ins
      order by al.id desc $Nlimite";
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

  public function getFichas_filtro($nombres, $ape_pat, $ape_mat, $dni)

  {
    $f_nombre = '';
    $f_apePat = '';
    $f_apeMat = '';
    $f_dni = '';
    if ($nombres != '') {
      $f_nombre = " and nombres like '%$nombres%'";
    }
    if ($ape_pat != '') {
      $f_apePat = " and apepat like '%$ape_pat%'";
    }
    if ($ape_mat != '') {
      $f_apeMat = " and apemat like '%$ape_mat%'";
    }
    if ($dni != '') {
      $f_dni = " and dni like '%$dni%'";
    }

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
    
    $sql = "select * from arbocentinela.arbocenti a left join notiweb.renace r on r.cod_est = a.e_salud where $where and a.negativa = 0 and a.eliminado = 0 $f_nombre $f_apePat $f_apeMat $f_dni order by a.id desc limit 100";
    // print_r($sql);
    // die();
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

  public function getFichasNegativas_filtro($responsable, $anio, $semana, $observacion)

  {
    $f_nombre = '';
    $f_anio = '';
    $f_semana = '';
    $f_observacion = '';
    if ($responsable != '') {
      $f_nombre = " and epidemio_res like '%$responsable%'";
    }
    if ($anio != '') {
      $f_anio = " and anio like '%$anio%'";
    }
    if ($semana != '') {
      $f_semana = " and semana like '%$semana%'";
    }
    if ($observacion != '') {
      $f_observacion = " and observaciones like '%$observacion%'";
    }

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

    // $this->db->db_select('arbocentinela');
    $sql = "select * from arbocenti a
    left join notiweb.renace r on r.cod_est = a.e_salud
    where $where and a.negativa = 1 and eliminado = 0 $f_nombre $f_anio $f_semana $f_observacion order by a.id desc limit 100";
    // print_r($dni);
    // die();
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

  public function getFicha_x_Id($id)
  {
    // $this->db->db_select('arbocentinela');
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

    $sql = "select a.*,
    (select nombre from notiweb.paises p where p.codigo = a.pais limit 1) as Npais,
    (select nombre from notiweb.departamento d where d.ubigeo = (select departamento from notiweb.distrito where ubigeo = a.distrito limit 1) limit 1) as Ndepartamento,
    (select nombre from notiweb.provincia where ubigeo = (select provinci from notiweb.distrito where ubigeo = a.distrito limit 1) limit 1) as Nprovincia, 
    (select nombre from notiweb.distrito where ubigeo = a.distrito limit 1) as Ndistrito, 
    tv.denominacion as Ntipovia , 
    ta.denominacion as Ntipoasociacion 
    from arbocenti a    
    left join notiweb.tipovia tv on tv.id = a.direccion_tipo_via
    left join tipo_asociacion ta on ta.id = a.direccion_tipo_asociacion
    left join notiweb.renace r on r.cod_est = a.e_salud
    where $where and a.id = $id";
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

  public function validaFichas($idFicha)
  {
    $sql = "select * from arbocenti a where a.id = $idFicha limit 1";
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

  public function vlidarUsuarioDni($dni, $fecha_notificacion)
  {
    // $this->db->db_select('arbocentinela');
    $sql = "SELECT * FROM `arbocenti` where dni = '$dni' and anio = YEAR('$fecha_notificacion')";
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

  public function agregarMuestra($id_ficha, $nro_muestra, $fecha_resultado, $fecha_LRR, $envioINS, $fechaEnvioINS, $fechaRecepcionINS, $mis_enfermedades, $mis_pruebas, $mis_serotipos, $mis_resultados)
  {

    $misS = $mis_serotipos == '' ? 'NULL' : $mis_serotipos;
    $usuario = $_SESSION['usuario'];
    // $this->db->db_select('arbocentinela');
    $sql = " 
            insert into arbocenti_lab
            (
                paciente,
                muestra,
                enfermedad,
                prueba,
                serotipo,
                resultado,
                estado,
                fecha_res,
                dtRecepcionLRR,
                bEnvioIns,
                dtFechaEnvioINS,
                dtRecepcionINS,                
                fecha_reg,
                usuario_reg
            )
            values(
                $id_ficha,
                '$nro_muestra',
                $mis_enfermedades,
                $mis_pruebas,
                $misS,
                $mis_resultados,
                1,
                '$fecha_resultado',
                '$fecha_LRR',
                $envioINS,
                '$fechaEnvioINS',
                '$fechaRecepcionINS',
                now(),
                $usuario
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
  public function editarMuestra($id_muestra, $id_ficha, $nro_muestra, $fecha_recepcion_lrr_editar, $ins_si_editar, $fecha_envio_ins_editar, $fecha_recepcion_ins_editar, $fecha_resultado, $mis_enfermedades, $mis_pruebas, $mis_serotipos, $mis_resultados)
  {


    $misS = $mis_serotipos == '' ? 'NULL' : $mis_serotipos;
    $usuario = $_SESSION['usuario'];
    // $this->db->db_select('arbocentinela');
    $sql = " 
            update arbocenti_lab
            set
                paciente =  $id_ficha,
                muestra = '$nro_muestra',
                enfermedad = $mis_enfermedades,
                prueba = $mis_pruebas,
                serotipo = $misS,
                resultado = $mis_resultados,
                fecha_res = '$fecha_resultado',
                dtRecepcionLRR = '$fecha_recepcion_lrr_editar',
                bEnvioIns = $ins_si_editar,
                dtFechaEnvioINS = '$fecha_envio_ins_editar',
                dtRecepcionINS = '$fecha_recepcion_ins_editar',
                fecha_mod = now(),
                usuario_reg = $usuario
            where id=$id_muestra  
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
  public function agregarFicha(
    $esNegativa,
    $responsable_laboratorio,
    $responsable_epidemiologia,
    $fecha_notificacion,
    $dni,
    $nombres,
    $apellido_paterno,
    $apellido_materno,
    $sexo,
    $edad,
    $tipo_edad,
    $telefono,
    $pais,
    $departamento,
    $provincia,
    $distrito,
    $localidad,
    $tipo_zona,
    $direccion,
    $tipo_via,
    $nombre_via,
    $nro_puerta,
    $nro_manzana,
    $lote,
    $tipo_asociacion,
    $nombre_asociacion,
    $fecha_muestra,
    $fecha_inicio_enfermedad,
    $gestante,
    $fiebre,
    $rash,
    $conjuntivitis,
    $artralgia,
    $mialgia,
    $otro,
    $nombre_otro,
    $evaluacion_paciente,
    $area_captacion,
    $diagnostico_captacion,
    $observacion
  ) {

    $date = new DateTime($fecha_inicio_enfermedad);
    $semana = $date->format("W");
    $anio = $date->format("Y");

    $diresa = $_SESSION['diresa'];
    $establecimiento = $_SESSION['establec'];
    $usuario = $_SESSION['usuario'];

    // $this->db->db_select('arbocentinela');
    $sql = " 
            insert into arbocenti
            (
                diresa,
                e_salud,
                laboratorio_res,
                epidemio_res,
                fecha_not,
                anio,
                semana,
                fecha_fie,
                fecha_mue,
                dni,
                apepat,
                apemat,
                nombres,
                edad,
                tipo_edad,
                sexo,
                direccion,
                telefono,
                fiebre,
                rash,
                conjuntivitis,
                negativa,
                observaciones,
                gestante,
                artralgia,
                mialgia,
                evaluacion_paciente,
                area_captacion,
                diagnostico_captacion,
                pais,
                departamento,
                provincia,
                distrito,
                localidad,
                tipo_zona,
                direccion_tipo_via,
                direccion_nombre_via,
                direccion_numero_puerta,
                direccion_numero_manzana,
                direccion_lote,
                direccion_tipo_asociacion,
                direccion_nombre_asociacion,
                otros,
                otros_nombre,
                fecha_reg,
                usuario_reg,
                eliminado
            )
            values(
                '$diresa',
                '$establecimiento',
                '$responsable_laboratorio',
                '$responsable_epidemiologia',
                '$fecha_notificacion',
                '$anio',
                '$semana',
                '$fecha_inicio_enfermedad',
                '$fecha_muestra',
                '$dni',
                '$apellido_paterno',
                '$apellido_materno',
                '$nombres',
                $edad,
                '$tipo_edad',
                '$sexo',
                '$direccion',
                '$telefono',
                $fiebre,
                $rash,
                $conjuntivitis,
                $esNegativa,
                '$observacion',
                $gestante,
                $artralgia,
                $mialgia,
                $evaluacion_paciente,
                $area_captacion,
                '$diagnostico_captacion',
                '$pais',
                '$departamento',
                '$provincia',
                '$distrito',
                '$localidad',
                $tipo_zona,
                $tipo_via,
                '$nombre_via',
                '$nro_puerta',
                '$nro_manzana',
                '$lote',
                $tipo_asociacion,
                '$nombre_asociacion',
                '$otro',
                '$nombre_otro',
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


  public function editarFicha(
    $id,
    $esNegativa,
    $responsable_laboratorio,
    $responsable_epidemiologia,
    $fecha_notificacion,
    $dni,
    $nombres,
    $apellido_paterno,
    $apellido_materno,
    $sexo,
    $edad,
    $tipo_edad,
    $telefono,
    $pais,
    $departamento,
    $provincia,
    $distrito,
    $localidad,
    $tipo_zona,
    $direccion,
    $tipo_via,
    $nombre_via,
    $nro_puerta,
    $nro_manzana,
    $lote,
    $tipo_asociacion,
    $nombre_asociacion,
    $fecha_muestra,
    $fecha_inicio_enfermedad,
    $gestante,
    $fiebre,
    $rash,
    $conjuntivitis,
    $artralgia,
    $mialgia,
    $otro,
    $nombre_otro,
    $evaluacion_paciente,
    $area_captacion,
    $diagnostico_captacion,
    $observacion
  ) {

    $date = new DateTime($fecha_notificacion);
    $semana = $date->format("W");
    $anio = $date->format("Y");

    $diresa = $_SESSION['diresa'];
    $establecimiento = $_SESSION['establec'];
    $usuario = $_SESSION['usuario'];

    // $this->db->db_select('arbocentinela');
    $sql = " 
            update arbocenti
                set 
                diresa='$diresa',
                e_salud='$establecimiento',
                laboratorio_res='$responsable_laboratorio',
                epidemio_res='$responsable_epidemiologia',
                fecha_not='$fecha_notificacion',
                anio='$anio',
                semana='$semana',
                fecha_fie= '$fecha_inicio_enfermedad',
                fecha_mue='$fecha_muestra',
                dni='$dni',
                apepat='$apellido_paterno',
                apemat='$apellido_materno',
                nombres='$nombres',
                edad=$edad,
                tipo_edad='$tipo_edad',
                sexo='$sexo',
                direccion='$direccion',
                telefono='$telefono',
                fiebre=$fiebre,
                rash=$rash,
                conjuntivitis=$conjuntivitis,
                negativa=$esNegativa,
                observaciones='$observacion',
                gestante=$gestante,
                artralgia=$artralgia,
                mialgia=$mialgia,
                evaluacion_paciente=$evaluacion_paciente,
                area_captacion=$area_captacion,
                diagnostico_captacion='$diagnostico_captacion',
                pais='$pais',
                departamento='$departamento',
                provincia='$provincia',
                distrito='$distrito',
                localidad='$localidad',
                tipo_zona=$tipo_zona,
                direccion_tipo_via='$tipo_via',
                direccion_nombre_via='$nombre_via',
                direccion_numero_puerta='$nro_puerta',
                direccion_numero_manzana='$nro_manzana',
                direccion_lote='$lote',
                direccion_tipo_asociacion='$tipo_asociacion',
                direccion_nombre_asociacion='$nombre_asociacion',
                otros='$otro',
                otros_nombre='$nombre_otro',
                fecha_mod=now(),
                usuario_mod='$usuario',
                eliminado='0' 
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

  public function obtenerLaboratorio_x_idFicha($idFicha)
  {
    // $this->db->db_select('arbocentinela');
    $sql = "SELECT a.*,ae.denominacion as Nenfermedad,ap.denominacion as Nprueba, ar.resultado as Nresultado 
        FROM arbocenti_lab a 
        inner join arbocenti_enf ae on ae.id = a.enfermedad
        inner join arbocenti_pru ap on ap.id = a.prueba
        inner join arbocenti_res ar on ar.id = a.resultado
        where ae.estado = 1 and ap.estado = 1 and ar.estado = 1 and a.estado = 1  and a.paciente = $idFicha order by a.id desc";

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

  public function obtenerLaboratorio_x_idFicha_filtro($idFicha, $muestra, $enfermedad, $prueba, $resultado)
  {
    $miMuestra = '';
    $miEnfermedad = '';
    $miPrueba = '';
    $miResultado = '';

    if ($muestra != '') {
      $miMuestra = " and a.muestra like '%$muestra%'";
    }
    if ($enfermedad != '') {
      $miEnfermedad = " and a.enfermedad = $enfermedad";
    }
    if ($prueba != '') {
      $miPrueba = " and ap.denominacion = '$prueba'";
    }
    if ($resultado != '') {
      $miResultado = " and a.resultado  = $resultado";
    }

    // $this->db->db_select('arbocentinela');
    $sql = "SELECT a.*,ae.denominacion as Nenfermedad,ap.denominacion as Nprueba, ar.resultado as Nresultado 
        FROM arbocenti_lab a 
        inner join arbocenti_enf ae on ae.id = a.enfermedad
        inner join arbocenti_pru ap on ap.id = a.prueba
        inner join arbocenti_res ar on ar.id = a.resultado
        where ae.estado = 1 and ap.estado = 1 and ar.estado = 1 and a.estado = 1  and a.paciente = $idFicha $miMuestra $miEnfermedad $miPrueba $miResultado order by a.id desc";



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

  function getEstablecimientos()
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

    $sql = "select  distinct r.raz_soc,r.cod_est from arbocenti a left join notiweb.renace r on r.cod_est = a.e_salud where r.estado = 1 and $where order by r.raz_soc";
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
    //    $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }

  function getDiresas()
  {
    $sql = "select * from diresas order by nombre";
    if (!$query = $this->bd_notiweb->query($sql)) {
      $error = $this->bd_notiweb->error();
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

  function getReporte_listarMuestraPorSemana()
  {
    // $this->db->db_select('arbocentinela');
    $sql = "SELECT a.anio,a.semana,count(a.id) as muestras from arbocenti a 
    inner join arbocenti_lab al on al.paciente = a.id 
    where a.eliminado = 0 and al.estado = 1
    GROUP by a.anio,a.semana";
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
    //    $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }
  
  function getReporte_listarEdades()
  {
    // $this->db->db_select('arbocentinela');
    $sql = "SELECT edad , count(id) cantidad
    from arbocenti
    where eliminado = 0 and negativa = 0
    GROUP by edad";
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
    //    $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }
  
  function getReporte_listarGenero()
  {
    // $this->db->db_select('arbocentinela');
    $sql = "SELECT if(sexo='','N/A',sexo) as name,(100*count(id)/(SELECT count(id) from arbocenti where eliminado = 0 and negativa = 0)) as value from arbocenti where eliminado = 0 and negativa = 0 GROUP BY sexo;";
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
    //    $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }
  
  function getReporte_listarCaptacion()
  {
    // $this->db->db_select('arbocentinela');
    $sql = "SELECT a.anio as name,FORMAT((100 * count(al.paciente)/260),2) as value
    from arbocenti_lab al
        inner join arbocenti a on al.paciente = a.id
        where a.eliminado = 0 and al.estado = 1
        GROUP BY a.anio";
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
    //    $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }
  
  function listarCaptacionVigilanciaAnual()
  {
    // $this->db->db_select('arbocentinela');
    $sql = "SELECT a.anio as anio, (select 260) as meta,(select count(*) from arbocenti aa where aa.anio = a.anio and aa.eliminado = 0 and aa.negativa = 0) as cantidad
    from arbocenti a        
        where a.eliminado = 0 and a.negativa = 0
        GROUP BY a.anio";
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
    //    $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }
  
  function listarCaptacionVigilanciaSemanal()
  {
    // $this->db->db_select('arbocentinela');
    $sql = "SELECT a.semana as semana, (select 5) as meta,(select count(*) from arbocenti aa where aa.semana = a.semana and aa.eliminado = 0 and aa.negativa = 0) as cantidad
    from arbocenti a        
        where a.eliminado = 0 and a.negativa = 0
        GROUP BY a.semana";
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
    //    $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }







  // admin
  function get_total_registros_diarios()
  {
    // $this->bd_arbocentinela->count_all_results('arbocenti');  // Produces an integer, like 25
    // $this->bd_arbocentinela->like('usuario_reg', $_SESSION['usuario']);
    // $this->bd_arbocentinela->like('eliminado', 0);
    // $this->bd_arbocentinela->like('eliminado', 0);
    // $this->bd_arbocentinela->from('arbocenti');
    // $data = $this->bd_arbocentinela->count_all_results();

    $sql = "select count(id) as num from arbocenti where usuario_reg = ".$_SESSION['usuario']." and eliminado = 0 and DATE_FORMAT(fecha_reg,'%Y-%m-%d') = CURDATE();";
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
    // $query->free_result();
    //    $query->next_result();
    return array(
      'estado' => true,
      'data' => $data
    );
  }

  public function getArchivosDescarga($usuario){
    $hoy = date("Y-m-d");
    $sql = "select id,vCodUsu,cEstado,fecReg,vProgreso,vRuta,vFiltros,tipo_descarga from colas.colas_querys_arbovirus c where c.vCodUsu = '$usuario' and date(fecReg) = '$hoy' order by c.fecReg desc";

    $data =  $this->colas->query($sql)->result();
    return array(
        'estado' => true,
        'data' => $data
      );
}



public function getDatos($data,$tipo){
  ini_set('max_execution_time', -1); 
  ini_set("memory_limit", "4024M");

  if($tipo == 1){
    // $Nlimite = '';
    $Nestablecimiento = '';
    $Ndiresa = '';
    $Ndni = '';
    $Nnegativo = "";
    $NfechaNotificacion = '';
    $Nfecha_inicio_enfermedad = '';
    $Nfecha_muestra = '';
    // if ($tieneLimite == 1) {
    //   $Nlimite = " limit 50";
    // }
    if ($data['negativa'] == 1) {
      $Nnegativo = " and a.negativa = ".$data['negativa'];
    }
    if ($data['establecimiento'] != '') {
      $Nestablecimiento = " and a.e_salud = '".$data['establecimiento']."'";
    }
    if ($data['diresa'] != '') {
      $Ndiresa = " and a.diresa = '".$data['diresa']."'";
    }
    if ($data['dni'] != '') {
      $Ndni = " and a.dni = '".$data['dni']."'";
    }
    if ($data['fecha_notificacion_inicio'] != '') {
      $NfechaNotificacion = " and a.fecha_not BETWEEN '".$data['fecha_notificacion_inicio']."' and '".$data['fecha_notificacion_fin']."'";
    }
    if ($data['fecha_inicio_enfermedad_inicio'] != '') {
      $Nfecha_inicio_enfermedad = " and a.fecha_fie BETWEEN '".$data['fecha_inicio_enfermedad_inicio']."' and '".$data['fecha_inicio_enfermedad_fin']."'";
    }
    if ($data['fecha_muestra_inicio'] != '') {
      $Nfecha_muestra = " and a.fecha_mue BETWEEN '".$data['fecha_muestra_inicio']."' and '".$data['fecha_muestra_fin']."'";
    }
    // $this->db->db_select('arbocentinela');

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


    $sql = "SELECT 
    a.id,
    d.nombre as Nombre_Diresa, 
    r.raz_soc as Nombre_Establecimiento,
    IF(a.negativa = 1, 'SI', 'NO') as Negativa,
    DATE_FORMAT(a.fecha_not,'%d/%m/%Y') as Fecha_Notificacion,
    DATE_FORMAT(a.fecha_fie,'%d/%m/%Y') as Fecha_Inicio_Enfermedad,
    DATE_FORMAT(a.fecha_mue,'%d/%m/%Y') as Fecha_Toma_Muestra,
    a.anio as Año_fecha_notificacion,
    a.semana as Semana_fecha_notificacion,
    a.laboratorio_res as Responsable_Laboratorio,
    a.epidemio_res as Responsable_Epidemiologia,
    a.dni as Dni,
    a.nombres as Nombres,
    a.apepat as Apellido_Paterno,
    a.apemat as Apellido_Materno,
    IF(a.edad=0,'',a.edad) as Edad,
    If(a.edad=0,'',if(a.tipo_edad = 'A','Años','Meses')) as Tipo_Edad,
    a.sexo as Sexo,
    a.telefono as Telefono,
    tv.denominacion as Tipo_Via,
    a.direccion_nombre_via as Nombre_Via,
    a.direccion_numero_puerta as Numero_Puerta,
    a.direccion_numero_manzana as Numero_Manzana,
    a.direccion_lote as Lote,
    a.direccion_nombre_asociacion as Nombre_Asociacion,
    asoc.denominacion as Tipo_Asociacion,
    IF(a.gestante = 1, 'SI', 'NO') as Gestante,
    IF(a.fiebre = 1, 'SI', 'NO') as Fiebre,
    IF(a.rash = 1, 'SI', 'NO') as Rash,
    IF(a.conjuntivitis = 1, 'SI', 'NO') as Conjuntivitis,
    IF(a.artralgia = 1, 'SI', 'NO') as Artralgia,
    IF(a.mialgia = 1, 'SI', 'NO') as Mialgia,
    IF(a.otros = 1, 'SI', 'NO') as Otros,
    a.otros_nombre as Otro_Sintoma,
    ep.cNombre as Evaluacion_Paciente,
    ac.cNombre as Area_Captacion,
    a.diagnostico_captacion as Diagnostico_Captacion,
    a.observaciones as Observaciones,
    p.nombre as Pais,
    dep.nombre as Departamento,
    prov.nombre as Provincia,
    dis.nombre as Distrito,
    a.localidad as Localidad,
    tz.cNombre as Tipo_Zona,
    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.estado = 1 ) as 'Dengue',

    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 1 and al.estado = 1 limit 1) as 'Dengue - Aislamiento y tipificación viral',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 1 and al.estado = 1 limit 1) as 'Dengue - Aislamiento y tipificación viral - Nro Muestra',
    (select (select denominacion from arbocenti_ser s where s.id = al.serotipo) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 1 and al.estado = 1 limit 1) as 'Dengue - Aislamiento y tipificación viral - Serotipo',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 1 and al.estado = 1 limit 1) as 'Dengue - Aislamiento y tipificación viral - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 1 and al.estado = 1 limit 1) as 'Dengue - Aislamiento y tipificación viral - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 1 and al.estado = 1 limit 1) as 'Dengue - Aislamiento y tipificación viral - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 1 and al.estado = 1 limit 1) as 'Dengue - Aislamiento y tipificación viral - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 1 and al.estado = 1 limit 1) as 'Dengue - Aislamiento y tipificación viral - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 1 and al.estado = 1 limit 1) as 'Dengue - Aislamiento y tipificación viral - Fecha de recepcion INS',


    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 2 and al.estado = 1 limit 1) as 'Dengue - Diagnóstico molecular',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 2 and al.estado = 1 limit 1) as 'Dengue - Diagnóstico molecular - Nro Muestra',
    (select (select denominacion from arbocenti_ser s where s.id = al.serotipo) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 2 and al.estado = 1 limit 1) as 'Dengue - Diagnóstico molecular - Serotipo',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 2 and al.estado = 1 limit 1) as 'Dengue - Diagnóstico molecular - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 2 and al.estado = 1 limit 1) as 'Dengue - Diagnóstico molecular - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 2 and al.estado = 1 limit 1) as 'Dengue - Diagnóstico molecular - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 2 and al.estado = 1 limit 1) as 'Dengue - Diagnóstico molecular - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 2 and al.estado = 1 limit 1) as 'Dengue - Diagnóstico molecular - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 2 and al.estado = 1 limit 1) as 'Dengue - Diagnóstico molecular - Fecha de recepcion INS',


    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 3 and al.estado = 1 limit 1) as 'Dengue - Elisa NS1',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 3 and al.estado = 1 limit 1) as 'Dengue - Elisa NS1 - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 3 and al.estado = 1 limit 1) as 'Dengue - Elisa NS1 - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 3 and al.estado = 1 limit 1) as 'Dengue - Elisa NS1 - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 3 and al.estado = 1 limit 1) as 'Dengue - Elisa NS1 - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 3 and al.estado = 1 limit 1) as 'Dengue - Elisa NS1 - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 3 and al.estado = 1 limit 1) as 'Dengue - Elisa NS1 - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 3 and al.estado = 1 limit 1) as 'Dengue - Elisa NS1 - Fecha de recepcion INS',


    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 4 and al.estado = 1 limit 1) as 'Dengue - qRT PCR tiempo real',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 4 and al.estado = 1 limit 1) as 'Dengue - qRT PCR tiempo real - Nro Muestra',
    (select (select denominacion from arbocenti_ser s where s.id = al.serotipo) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 4 and al.estado = 1 limit 1) as 'Dengue - qRT PCR tiempo real - Serotipo',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 4 and al.estado = 1 limit 1) as 'Dengue - qRT PCR tiempo real - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 4 and al.estado = 1 limit 1) as 'Dengue - qRT PCR tiempo real - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 4 and al.estado = 1 limit 1) as 'Dengue - qRT PCR tiempo real - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 4 and al.estado = 1 limit 1) as 'Dengue - qRT PCR tiempo real - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 4 and al.estado = 1 limit 1) as 'Dengue - qRT PCR tiempo real - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 4 and al.estado = 1 limit 1) as 'Dengue - qRT PCR tiempo real - Fecha de recepcion INS',


    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 5 and al.estado = 1 limit 1) as 'Dengue - Elisa de IGM',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 5 and al.estado = 1 limit 1) as 'Dengue - Elisa de IGM - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 5 and al.estado = 1 limit 1) as 'Dengue - Elisa de IGM - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 5 and al.estado = 1 limit 1) as 'Dengue - Elisa de IGM - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 5 and al.estado = 1 limit 1) as 'Dengue - Elisa de IGM - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 5 and al.estado = 1 limit 1) as 'Dengue - Elisa de IGM - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 5 and al.estado = 1 limit 1) as 'Dengue - Elisa de IGM - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 5 and al.estado = 1 limit 1) as 'Dengue - Elisa de IGM - Fecha de recepcion INS',


    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 6 and al.estado = 1 limit 1) as 'Dengue - Elisa de captura IGA',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 6 and al.estado = 1 limit 1) as 'Dengue - Elisa de captura IGA - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 6 and al.estado = 1 limit 1) as 'Dengue - Elisa de captura IGA - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 6 and al.estado = 1 limit 1) as 'Dengue - Elisa de captura IGA - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 6 and al.estado = 1 limit 1) as 'Dengue - Elisa de captura IGA - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 6 and al.estado = 1 limit 1) as 'Dengue - Elisa de captura IGA - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 6 and al.estado = 1 limit 1) as 'Dengue - Elisa de captura IGA - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 6 and al.estado = 1 limit 1) as 'Dengue - Elisa de captura IGA - Fecha de recepcion INS',


    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 7 and al.estado = 1 limit 1) as 'Dengue - Elisa de captura IGG',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 7 and al.estado = 1 limit 1) as 'Dengue - Elisa de captura IGG - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 7 and al.estado = 1 limit 1) as 'Dengue - Elisa de captura IGG - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 7 and al.estado = 1 limit 1) as 'Dengue - Elisa de captura IGG - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 7 and al.estado = 1 limit 1) as 'Dengue - Elisa de captura IGG - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 7 and al.estado = 1 limit 1) as 'Dengue - Elisa de captura IGG - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 7 and al.estado = 1 limit 1) as 'Dengue - Elisa de captura IGG - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 7 and al.estado = 1 limit 1) as 'Dengue - Elisa de captura IGG - Fecha de recepcion INS',

    
    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 8 and al.estado = 1 limit 1) as 'Dengue - Imunocromatográfica IgG',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 8 and al.estado = 1 limit 1) as 'Dengue - Imunocromatográfica IgG - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 8 and al.estado = 1 limit 1) as 'Dengue - Imunocromatográfica IgG - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 8 and al.estado = 1 limit 1) as 'Dengue - Imunocromatográfica IgG - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 8 and al.estado = 1 limit 1) as 'Dengue - Imunocromatográfica IgG - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 8 and al.estado = 1 limit 1) as 'Dengue - Imunocromatográfica IgG - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 8 and al.estado = 1 limit 1) as 'Dengue - Imunocromatográfica IgG - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 8 and al.estado = 1 limit 1) as 'Dengue - Imunocromatográfica IgG - Fecha de recepcion INS',


    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 9 and al.estado = 1 limit 1) as 'Dengue - Inmunocromatográfica IgM',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 9 and al.estado = 1 limit 1) as 'Dengue - Inmunocromatográfica IgM - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 9 and al.estado = 1 limit 1) as 'Dengue - Inmunocromatográfica IgM - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 9 and al.estado = 1 limit 1) as 'Dengue - Inmunocromatográfica IgM - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 9 and al.estado = 1 limit 1) as 'Dengue - Inmunocromatográfica IgM - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 8 and al.estado = 1 limit 1) as 'Dengue - Inmunocromatográfica IgM - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 9 and al.estado = 1 limit 1) as 'Dengue - Inmunocromatográfica IgM - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 9 and al.estado = 1 limit 1) as 'Dengue - Inmunocromatográfica IgM - Fecha de recepcion INS',


    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 10 and al.estado = 1 limit 1) as 'Dengue - Inmunocromatográfica NS1',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 10 and al.estado = 1 limit 1) as 'Dengue - Inmunocromatográfica NS1 - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 10 and al.estado = 1 limit 1) as 'Dengue - Inmunocromatográfica NS1 - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 10 and al.estado = 1 limit 1) as 'Dengue - Inmunocromatográfica NS1 - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 10 and al.estado = 1 limit 1) as 'Dengue - Inmunocromatográfica NS1 - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 8 and al.estado = 1 limit 1) as 'Dengue - Inmunocromatográfica NS1 - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 10 and al.estado = 1 limit 1) as 'Dengue - Inmunocromatográfica NS1 - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '1' and al.prueba = 10 and al.estado = 1 limit 1) as 'Dengue - Inmunocromatográfica NS1 - Fecha de recepcion INS',



    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.estado = 1) as 'Zika',
    
    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 51 and al.estado = 1 limit 1) as 'Zika - Aislamiento y tipificación viral',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 51 and al.estado = 1 limit 1) as 'Zika - Aislamiento y tipificación viral - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 51 and al.estado = 1 limit 1) as 'Zika - Aislamiento y tipificación viral - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 51 and al.estado = 1 limit 1) as 'Zika - Aislamiento y tipificación viral - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 51 and al.estado = 1 limit 1) as 'Zika - Aislamiento y tipificación viral - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 51 and al.estado = 1 limit 1) as 'Zika - Aislamiento y tipificación viral - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 51 and al.estado = 1 limit 1) as 'Zika - Aislamiento y tipificación viral - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 51 and al.estado = 1 limit 1) as 'Zika - Aislamiento y tipificación viral - Fecha de recepcion INS',


    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 52 and al.estado = 1 limit 1) as 'Zika - Elisa IgG',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 52 and al.estado = 1 limit 1) as 'Zika - Elisa IgG - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 52 and al.estado = 1 limit 1) as 'Zika - Elisa IgG - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 52 and al.estado = 1 limit 1) as 'Zika - Elisa IgG - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 52 and al.estado = 1 limit 1) as 'Zika - Elisa IgG - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 52 and al.estado = 1 limit 1) as 'Zika - Elisa IgG - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 52 and al.estado = 1 limit 1) as 'Zika - Elisa IgG - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 52 and al.estado = 1 limit 1) as 'Zika - Elisa IgG - Fecha de recepcion INS',


    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 53 and al.estado = 1 limit 1) as 'Zika - Elisa IgM',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 53 and al.estado = 1 limit 1) as 'Zika - Elisa IgM - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 53 and al.estado = 1 limit 1) as 'Zika - Elisa IgM - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 53 and al.estado = 1 limit 1) as 'Zika - Elisa IgM - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 53 and al.estado = 1 limit 1) as 'Zika - Elisa IgM - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 53 and al.estado = 1 limit 1) as 'Zika - Elisa IgM - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 53 and al.estado = 1 limit 1) as 'Zika - Elisa IgM - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 53 and al.estado = 1 limit 1) as 'Zika - Elisa IgM - Fecha de recepcion INS',


    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 54 and al.estado = 1 limit 1) as 'Zika - RT-PCR Suero',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 54 and al.estado = 1 limit 1) as 'Zika - RT-PCR Suero - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 54 and al.estado = 1 limit 1) as 'Zika - RT-PCR Suero - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 54 and al.estado = 1 limit 1) as 'Zika - RT-PCR Suero - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 54 and al.estado = 1 limit 1) as 'Zika - RT-PCR Suero - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 54 and al.estado = 1 limit 1) as 'Zika - RT-PCR Suero - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 54 and al.estado = 1 limit 1) as 'Zika - RT-PCR Suero - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 54 and al.estado = 1 limit 1) as 'Zika - RT-PCR Suero - Fecha de recepcion INS',



    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 68 and al.estado = 1 limit 1) as 'Zika - RT-PCR Orina',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 68 and al.estado = 1 limit 1) as 'Zika - RT-PCR Orina - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 68 and al.estado = 1 limit 1) as 'Zika - RT-PCR Orina - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 68 and al.estado = 1 limit 1) as 'Zika - RT-PCR Orina - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 68 and al.estado = 1 limit 1) as 'Zika - RT-PCR Orina - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 68 and al.estado = 1 limit 1) as 'Zika - RT-PCR Orina - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 68 and al.estado = 1 limit 1) as 'Zika - RT-PCR Orina - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '6' and al.prueba = 68 and al.estado = 1 limit 1) as 'Zika - RT-PCR Orina - Fecha de recepcion INS',


    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.estado = 1) as 'Chikungunya',

    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 55 and al.estado = 1 limit 1) as 'Chikungunya - Aislamiento y tipificación viral',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 55 and al.estado = 1 limit 1) as 'Chikungunya - Aislamiento y tipificación viral - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 55 and al.estado = 1 limit 1) as 'Chikungunya - Aislamiento y tipificación viral - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 55 and al.estado = 1 limit 1) as 'Chikungunya - Aislamiento y tipificación viral - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 55 and al.estado = 1 limit 1) as 'Chikungunya - Aislamiento y tipificación viral - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 55 and al.estado = 1 limit 1) as 'Chikungunya - Aislamiento y tipificación viral - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 55 and al.estado = 1 limit 1) as 'Chikungunya - Aislamiento y tipificación viral - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 55 and al.estado = 1 limit 1) as 'Chikungunya - Aislamiento y tipificación viral - Fecha de recepcion INS',



    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 56 and al.estado = 1 limit 1) as 'Chikungunya - RT-PCR',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 56 and al.estado = 1 limit 1) as 'Chikungunya - RT-PCR - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 56 and al.estado = 1 limit 1) as 'Chikungunya - RT-PCR - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 56 and al.estado = 1 limit 1) as 'Chikungunya - RT-PCR - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 56 and al.estado = 1 limit 1) as 'Chikungunya - RT-PCR - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 56 and al.estado = 1 limit 1) as 'Chikungunya - RT-PCR - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 56 and al.estado = 1 limit 1) as 'Chikungunya - RT-PCR - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 56 and al.estado = 1 limit 1) as 'Chikungunya - RT-PCR - Fecha de recepcion INS',



    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 57 and al.estado = 1 limit 1) as 'Chikungunya - Elisa IgG',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 57 and al.estado = 1 limit 1) as 'Chikungunya - Elisa IgG - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 57 and al.estado = 1 limit 1) as 'Chikungunya - Elisa IgG - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 57 and al.estado = 1 limit 1) as 'Chikungunya - Elisa IgG - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 57 and al.estado = 1 limit 1) as 'Chikungunya - Elisa IgG - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 57 and al.estado = 1 limit 1) as 'Chikungunya - Elisa IgG - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 57 and al.estado = 1 limit 1) as 'Chikungunya - Elisa IgG - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 57 and al.estado = 1 limit 1) as 'Chikungunya - Elisa IgG - Fecha de recepcion INS',


    
    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 58 and al.estado = 1 limit 1) as 'Chikungunya - Elisa IgM',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 58 and al.estado = 1 limit 1) as 'Chikungunya - Elisa IgM - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 58 and al.estado = 1 limit 1) as 'Chikungunya - Elisa IgM - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 58 and al.estado = 1 limit 1) as 'Chikungunya - Elisa IgM - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 58 and al.estado = 1 limit 1) as 'Chikungunya - Elisa IgM - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 58 and al.estado = 1 limit 1) as 'Chikungunya - Elisa IgM - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 58 and al.estado = 1 limit 1) as 'Chikungunya - Elisa IgM - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '7' and al.prueba = 58 and al.estado = 1 limit 1) as 'Chikungunya - Elisa IgM - Fecha de recepcion INS',



    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.estado = 1) as 'Oropuche',

    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 59 and al.estado = 1 limit 1) as 'Oropuche - Aislamiento y tipificación viral',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 59 and al.estado = 1 limit 1) as 'Oropuche - Aislamiento y tipificación viral - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 59 and al.estado = 1 limit 1) as 'Oropuche - Aislamiento y tipificación viral - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 59 and al.estado = 1 limit 1) as 'Oropuche - Aislamiento y tipificación viral - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 59 and al.estado = 1 limit 1) as 'Oropuche - Aislamiento y tipificación viral - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 59 and al.estado = 1 limit 1) as 'Oropuche - Aislamiento y tipificación viral - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 59 and al.estado = 1 limit 1) as 'Oropuche - Aislamiento y tipificación viral - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 59 and al.estado = 1 limit 1) as 'Oropuche - Aislamiento y tipificación viral - Fecha de recepcion INS',
    
    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 60 and al.estado = 1 limit 1) as 'Oropuche - Elisa IgM',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 60 and al.estado = 1 limit 1) as 'Oropuche - Elisa IgM - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 60 and al.estado = 1 limit 1) as 'Oropuche - Elisa IgM - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 60 and al.estado = 1 limit 1) as 'Oropuche - Elisa IgM - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 60 and al.estado = 1 limit 1) as 'Oropuche - Elisa IgM - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 60 and al.estado = 1 limit 1) as 'Oropuche - Elisa IgM - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 60 and al.estado = 1 limit 1) as 'Oropuche - Elisa IgM - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 60 and al.estado = 1 limit 1) as 'Oropuche - Elisa IgM - Fecha de recepcion INS',
    
    
    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 61 and al.estado = 1 limit 1) as 'Oropuche - Elisa IgG',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 61 and al.estado = 1 limit 1) as 'Oropuche - Elisa IgG - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 61 and al.estado = 1 limit 1) as 'Oropuche - Elisa IgG - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 61 and al.estado = 1 limit 1) as 'Oropuche - Elisa IgG - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 61 and al.estado = 1 limit 1) as 'Oropuche - Elisa IgG - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 61 and al.estado = 1 limit 1) as 'Oropuche - Elisa IgG - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 61 and al.estado = 1 limit 1) as 'Oropuche - Elisa IgG - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 61 and al.estado = 1 limit 1) as 'Oropuche - Elisa IgG - Fecha de recepcion INS',
    
    
    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 62 and al.estado = 1 limit 1) as 'Oropuche - PCR',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 62 and al.estado = 1 limit 1) as 'Oropuche - PCR - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 62 and al.estado = 1 limit 1) as 'Oropuche - PCR - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 62 and al.estado = 1 limit 1) as 'Oropuche - PCR - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 62 and al.estado = 1 limit 1) as 'Oropuche - PCR - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 62 and al.estado = 1 limit 1) as 'Oropuche - PCR - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 62 and al.estado = 1 limit 1) as 'Oropuche - PCR - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 62 and al.estado = 1 limit 1) as 'Oropuche - PCR - Fecha de recepcion INS',
    
    
    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 63 and al.estado = 1 limit 1) as 'Oropuche - RT-PCR ',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 63 and al.estado = 1 limit 1) as 'Oropuche - RT-PCR - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 63 and al.estado = 1 limit 1) as 'Oropuche - RT-PCR - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 63 and al.estado = 1 limit 1) as 'Oropuche - RT-PCR  - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 63 and al.estado = 1 limit 1) as 'Oropuche - RT-PCR - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 63 and al.estado = 1 limit 1) as 'Oropuche - RT-PCR - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 63 and al.estado = 1 limit 1) as 'Oropuche - RT-PCR - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '8' and al.prueba = 63 and al.estado = 1 limit 1) as 'Oropuche - RT-PCR - Fecha de recepcion INS',
    


    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.estado = 1) as 'Mayaro',

    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 64 and al.estado = 1 limit 1) as 'Mayaro - Aislamiento y tipificación viral',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 64 and al.estado = 1 limit 1) as 'Mayaro - Aislamiento y tipificación viral - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 64 and al.estado = 1 limit 1) as 'Mayaro - Aislamiento y tipificación viral - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 64 and al.estado = 1 limit 1) as 'Mayaro - Aislamiento y tipificación viral - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 64 and al.estado = 1 limit 1) as 'Mayaro - Aislamiento y tipificación viral - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 64 and al.estado = 1 limit 1) as 'Mayaro - Aislamiento y tipificación viral - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 64 and al.estado = 1 limit 1) as 'Mayaro - Aislamiento y tipificación viral - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 64 and al.estado = 1 limit 1) as 'Mayaro - Aislamiento y tipificación viral - Fecha de recepcion INS',


    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 65 and al.estado = 1 limit 1) as 'Mayaro - Elisa IgM',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 65 and al.estado = 1 limit 1) as 'Mayaro - Elisa IgM - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 65 and al.estado = 1 limit 1) as 'Mayaro - Elisa IgM - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 65 and al.estado = 1 limit 1) as 'Mayaro - Elisa IgM - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 65 and al.estado = 1 limit 1) as 'Mayaro - Elisa IgM - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 65 and al.estado = 1 limit 1) as 'Mayaro - Elisa IgM - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 65 and al.estado = 1 limit 1) as 'Mayaro - Elisa IgM - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 65 and al.estado = 1 limit 1) as 'Mayaro - Elisa IgM - Fecha de recepcion INS',


    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 66 and al.estado = 1 limit 1) as 'Mayaro - Elisa IgG',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 66 and al.estado = 1 limit 1) as 'Mayaro - Elisa IgG - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 66 and al.estado = 1 limit 1) as 'Mayaro - Elisa IgG - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 66 and al.estado = 1 limit 1) as 'Mayaro - Elisa IgG - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 66 and al.estado = 1 limit 1) as 'Mayaro - Elisa IgG - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 66 and al.estado = 1 limit 1) as 'Mayaro - Elisa IgG - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 66 and al.estado = 1 limit 1) as 'Mayaro - Elisa IgG - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 66 and al.estado = 1 limit 1) as 'Mayaro - Elisa IgG - Fecha de recepcion INS',


    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 67 and al.estado = 1 limit 1) as 'Mayaro - PCR',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 67 and al.estado = 1 limit 1) as 'Mayaro - PCR - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 67 and al.estado = 1 limit 1) as 'Mayaro - PCR - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 67 and al.estado = 1 limit 1) as 'Mayaro - PCR - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 67 and al.estado = 1 limit 1) as 'Mayaro - PCR - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 67 and al.estado = 1 limit 1) as 'Mayaro - PCR - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 67 and al.estado = 1 limit 1) as 'Mayaro - PCR - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '9' and al.prueba = 67 and al.estado = 1 limit 1) as 'Mayaro - PCR - Fecha de recepcion INS',


    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.estado = 1) as 'Fiebre Amarilla',

    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 69 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Aislamiento y tipificación viral',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 69 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Aislamiento y tipificación viral - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 69 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Aislamiento y tipificación viral - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 69 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Aislamiento y tipificación viral - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 69 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Aislamiento y tipificación viral - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 69 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Aislamiento y tipificación viral - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 69 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Aislamiento y tipificación viral - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 69 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Aislamiento y tipificación viral - Fecha de recepcion INS',


    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 70 and al.estado = 1 limit 1) as 'Fiebre Amarilla - RT-PCR',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 70 and al.estado = 1 limit 1) as 'Fiebre Amarilla - RT-PCR - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 70 and al.estado = 1 limit 1) as 'Fiebre Amarilla - RT-PCR - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 70 and al.estado = 1 limit 1) as 'Fiebre Amarilla - RT-PCR - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 70 and al.estado = 1 limit 1) as 'Fiebre Amarilla - RT-PCR - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 70 and al.estado = 1 limit 1) as 'Fiebre Amarilla - RT-PCR - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 70 and al.estado = 1 limit 1) as 'Fiebre Amarilla - RT-PCR - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 70 and al.estado = 1 limit 1) as 'Fiebre Amarilla - RT-PCR - Fecha de recepcion INS',



    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 71 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Elisa IgM',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 71 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Elisa IgM - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 71 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Elisa IgM - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 71 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Elisa IgM - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 71 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Elisa IgM - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 71 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Elisa IgM - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 71 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Elisa IgM - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 71 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Elisa IgM - Fecha de recepcion INS',

    (select if(count(al.id)=0,'NO','SI') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 72 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Elisa IgG',
    (select al.muestra from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 72 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Elisa IgG - Nro Muestra',
    (select (select resultado from arbocenti_res r where r.id = al.resultado) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 72 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Elisa IgG - Resultado',
    (select DATE_FORMAT(al.fecha_res,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 72 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Elisa IgG - Fecha de resultado',
    (select DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 72 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Elisa IgG - Fecha de recepcion LRR',
    (select DATEDIFF(al.dtRecepcionLRR,al.fecha_res) from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 72 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Elisa IgG - Dias entre FechaResultado y Recepcion LRR',
    (select DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 72 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Elisa IgG - Fecha de envio INS',
    (select DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') from arbocenti_lab al where al.paciente = a.id and al.enfermedad = '10' and al.prueba = 72 and al.estado = 1 limit 1) as 'Fiebre Amarilla - Elisa IgG - Fecha de recepcion INS',


    a.usuario_reg as 'Usuario registra',
    uf.nombres as 'Nombre usuario registra',
    DATE_FORMAT(a.fecha_reg,'%d/%m/%Y') as 'Fecha registro',
    a.usuario_mod as 'Usuario modifica',
    ue.nombres as 'Nombre usuario modifica',
    DATE_FORMAT(a.fecha_mod,'%d/%m/%Y') as 'Fecha modifica'
    FROM arbocentinela.arbocenti a
    left join notiweb.diresas d on d.codigo = a.diresa
    left join notiweb.renace r on r.cod_est = a.e_salud
    left join arbocentinela.evaluacion_paciente ep on ep.idEvaluacionPaciente = a.evaluacion_paciente
    left join arbocentinela.area_captacion ac on ac.idAreaCaptacion = a.area_captacion
    left join notiweb.paises p on p.codigo = a.pais
    left join notiweb.departamento dep on dep.ubigeo = a.departamento
    left join notiweb.provincia prov on prov.ubigeo = a.provincia
    left join notiweb.distrito dis on dis.ubigeo = a.distrito
    left join arbocentinela.tipo_zona tz on tz.idTipoZona = a.tipo_zona
    left join notiweb.tipovia tv on tv.id = a.direccion_tipo_via
    left join arbocentinela.tipo_asociacion asoc on asoc.id = a.direccion_tipo_asociacion
    left join notiweb.usuarios_frontend uf on uf.usuario = a.usuario_reg
    left join notiweb.usuarios_frontend ue on ue.usuario = a.usuario_mod
    where a.eliminado = 0 and $where $Nestablecimiento $Ndiresa $Ndni $Nnegativo $NfechaNotificacion $Nfecha_inicio_enfermedad $Nfecha_muestra
    order by id desc";


      // select * from casos a where e_salud in ( select cod_est from notiweb.renace where subregion=50) or ubigeo in (select ubigeo from notiweb.distrito where diresa=50) limit 10;
      $demas = "";
      
      //  if($nivel == "5"){
      //     if ($this->session->userdata('institucion') == 'A') {
      //         if ($this->session->userdata('usuario') == '09690054') {
      //             $demas  =  " and r.subregion in ('$diresa','31','48') ";
      //         }  elseif ($this->session->userdata('usuario') == '41219208') {
      //             $demas  =  " and r.subregion in ('$diresa','37','38','46') ";
      //         } elseif ($this->session->userdata('usuario') == '42396713') {
      //             $demas  =  " and r.subregion in ('$diresa','34') ";
                 
      //         } else { 
      //             //$where["ndiabetes.diresa"] = $dir;
      //             $demas  =  " and r.subregion = '$diresa' ";
      //         }
      //         } else {
      //             //$where["ndiabetes.diresa"] = $dir;
      //             $demas  =  " and r.subregion = '$diresa' ";
      //         }
      //     $demas = $demas." or ubigeo in (select ubigeo from notiweb.distrito where diresa=$diresa)";
        
      // }else if($nivel == "6"){
      //     $demas  =  " and r.subregion = '$diresa' and r.red = '$red' ";
      // }else if($nivel == "7"){
      //     $demas  =  " and r.subregion = '$diresa' and r.red = '$red' and r.microred = '$microred' ";
      // }else if($nivel == "8"){
      //     $demas  =  " and c.e_salud = '$eess' ";
      // }
      
      // $insti = $this->session->userdata('insti');
      // if ($insti != 1 && $insti != 7) {
      //     $demas = $demas . "  and r.insti_rn = '" . $this->session->userdata("insti") . "'  ";
      // }

      $sql = $sql.$demas;
      $data = array("vFiltros" => '', "vCodUsu" => $this->session->userdata('usuario'), "vQry" => $sql, "cEstado" => "1","tipo_descarga"=>$tipo, "fecReg" => date('Y-m-d H:i:s'), "vProgreso" => "0%", "vRuta" => null);
      // INSERTAR SQL DENTRO TABLA colas_querys_monkey
      /*
      
      
    
      1 = EN COLA
      2 = EN PROCESO
      3 = COMPLETADO
      
        COMENTAR LA LINEA 242
      */

      $this->colas->insert('colas_querys_arbovirus',$data);
      return true;
      // return $this->db->query($sql)->result();
  } else{

    $siesConFichas = '';
    $siesConFichasFroms = '';
    if ($data['conFichas'] == 1) {
      $siesConFichas = " 
      r.raz_soc as Nombre_Establecimiento,
      d.nombre as Nombre_Diresa,
      IF(a.negativa = 1, 'SI', 'NO') as Negativa,
      DATE_FORMAT(a.fecha_not,'%d/%m/%Y') as Fecha_Notificacion,
      DATE_FORMAT(a.fecha_fie,'%d/%m/%Y') as Fecha_Inicio_Enfermedad,
      DATE_FORMAT(a.fecha_mue,'%d/%m/%Y') as Fecha_Toma_Muestra,
      a.anio as Año,
      a.semana as Semana,
      a.laboratorio_res as Responsable_Laboratorio,
      a.epidemio_res as Responsable_Epidemiologia,
      a.dni as Dni,
      a.nombres as Nombres,
      a.apepat as Apellido_Paterno,
      a.apemat as Apellido_Materno,
      a.edad as Edad,
      if(a.tipo_edad = 'A','Años','Meses') as Tipo_Edad,
      a.sexo as Sexo,
      a.direccion as Direccion,
      tv.denominacion as Tipo_Via,
      a.direccion_nombre_via as Nombre_Via,
      a.direccion_numero_puerta as Numero_Puerta,
      a.direccion_numero_manzana as Numero_Manzana,
      a.direccion_lote as Lote,
      a.direccion_nombre_asociacion as Nombre_Asociacion,
      asoc.denominacion as Tipo_Asociacion,
      a.telefono as Telefono,
      IF(a.gestante = 1, 'SI', 'NO') as Gestante,
      IF(a.fiebre = 1, 'SI', 'NO') as Fiebre,
      IF(a.rash = 1, 'SI', 'NO') as Rash,
      IF(a.conjuntivitis = 1, 'SI', 'NO') as Conjuntivitis,
      IF(a.artralgia = 1, 'SI', 'NO') as Artralgia,
      IF(a.mialgia = 1, 'SI', 'NO') as Mialgia,
      IF(a.otros = 1, 'SI', 'NO') as Otros,
      a.otros_nombre as Otro_Sintoma,
      ep.cNombre as Evaluacion_Paciente,
      ac.cNombre as Area_Captacion,
      a.diagnostico_captacion as Diagnostico_Captacion,
      p.nombre as Pais,
      dep.nombre as Departamento,
      prov.nombre as Provincia,
      dis.nombre as Distrito,
      a.localidad as Localidad,
      tz.cNombre as Tipo_Zona,
      a.usuario_reg as Id_Usuario_Registra,
      uf.nombres as Nombre_usuario_Registra,
      DATE_FORMAT(a.fecha_reg,'%d/%m/%Y') as Fecha_Registro,
       ";

      $siesConFichasFroms = " 
      left join notiweb.diresas d on d.codigo = a.diresa
      left join notiweb.renace r on r.cod_est = a.e_salud
      left join evaluacion_paciente ep on ep.idEvaluacionPaciente = a.evaluacion_paciente
      left join area_captacion ac on ac.idAreaCaptacion = a.area_captacion
      left join notiweb.paises p on p.codigo = a.pais
      left join notiweb.departamento dep on dep.ubigeo = a.departamento
      left join notiweb.provincia prov on prov.ubigeo = a.provincia
      left join notiweb.distrito dis on dis.ubigeo = a.distrito
      left join tipo_zona tz on tz.idTipoZona = a.tipo_zona
      left join notiweb.tipovia tv on tv.id = a.direccion_tipo_via
      left join tipo_asociacion asoc on asoc.id = a.direccion_tipo_asociacion
      left join notiweb.usuarios_frontend uf on uf.usuario = a.usuario_reg ";
    }


    $Nnro_muestra = '';
    $Nmis_enfermedades = '';
    $Nmis_pruebas = '';
    $Nmis_resultados = "";
    $Nmis_serotipos = '';
    $Nfecha_resultados = '';
    $Nfecha_recepcion_lrr = '';
    $Nfecha_envio_ins = '';
    $Nfecha_recepcion_ins = '';

    if ($data['nro_muestra'] != '') {
      $Nnro_muestra = " and al.muestra like '%$".$data['nro_muestra']."%'";
    } else {
    }
    if ($data['mis_enfermedades'] != '') {
      $Nmis_enfermedades = " and ae.id = ".$data['mis_enfermedades']."";
    }
    if ($data['mis_pruebas'] != '') {
      $Nmis_pruebas = " and ap.denominacion = '".$data['mis_pruebas'] ."'";
    }
    if ($data['mis_resultados'] != '') {
      $Nmis_resultados = " and res.id = ".$data['mis_resultados']."";
    }
    if ($data['mis_serotipos'] != '') {
      $Nmis_serotipos = " and ase.denominacion = '".$data['mis_serotipos']."'";
    }
    if ($data['fecha_resultados_inicio'] != '') {
      $Nfecha_resultados = " and al.fecha_res BETWEEN '".$data['fecha_resultados_inicio']."' and '".$data['fecha_resultados_fin']."'";
    }
    if ($data['fecha_recepcion_lrr_inicio'] != '') {
      $Nfecha_recepcion_lrr = " and al.dtRecepcionLRR BETWEEN '".$data['fecha_recepcion_lrr_inicio']."' and '".$data['fecha_recepcion_lrr_fin']."'";
    }
    if ($data['fecha_envio_ins_inicio'] != '') {
      $Nfecha_envio_ins = " and al.dtFechaEnvioINS BETWEEN '".$data['fecha_envio_ins_inicio']."' and '".$data['fecha_envio_ins_fin']."'";
    }
    if ($data['fecha_recepcion_ins_inicio'] != '') {
      $Nfecha_recepcion_ins = " and al.dtFechaEnvioINS BETWEEN '".$data['fecha_recepcion_ins_inicio']."' and '".$data['fecha_recepcion_ins_fin']."'";
    }

    // $this->db->db_select('arbocentinela');
    // if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 4) {
    //   $where = " r.estado = 1";
    // } else if ($_SESSION['nivel'] == 5) {
    //   $where = " r.subregion = '" . $_SESSION['diresa']."'";
    // } else if ($_SESSION['nivel'] == 6) {
    //   $where = " r.subregion = '" . $_SESSION['diresa'] . "' and r.red = '" . $_SESSION['red'] . "'";
    // } else if ($_SESSION['nivel'] == 7) {
    //   $where = " r.subregion = '" . $_SESSION['diresa'] . "' and r.red = '" . $_SESSION['red'] . "' and r.microred = '" . $_SESSION['microred'] ."'";
    // } else {
    //   $where = " r.subregion = '" . $_SESSION['diresa'] . "' and r.red = '" . $_SESSION['red'] . "' and r.microred = '" . $_SESSION['microred'] . "' and r.cod_est = '" . $_SESSION['establec'] ."'";
    // }

    $sql = "SELECT
      $siesConFichas
      al.id as idMuestra,
      al.paciente idPaciente,
      al.muestra nroMuestra,
      ae.denominacion as Enfermedad,
      ap.denominacion as Prueba,
      ase.denominacion as Serotipo,
      res.resultado as Resultado,
      DATE_FORMAT(al.fecha_res,'%d/%m/%Y') as Fecha_resultado,
      DATE_FORMAT(al.dtRecepcionLRR,'%d/%m/%Y') as Fecha_recepcion_LRR,
      DATE_FORMAT(al.dtFechaEnvioINS,'%d/%m/%Y') as Fecha_envio_INS,
      DATE_FORMAT(al.dtRecepcionINS,'%d/%m/%Y') as Fecha_recepcion_INS,
      DATE_FORMAT(al.fecha_reg,'%d/%m/%Y') as Fecha_registro,
      DATEDIFF(al.dtRecepcionLRR,al.fecha_res) as dias_FechasResultado_y_RecepcionLRR
      from arbocenti_lab al
      left join arbocenti_enf ae on ae.id = al.enfermedad
      left join arbocenti_pru ap on ap.id = al.prueba
      left join arbocenti_ser ase on ase.id = al.serotipo
      left join arbocenti_res res on res.id = al.resultado
      left join arbocenti a on a.id = al.paciente
      $siesConFichasFroms
      where al.estado = 1 and a.eliminado = 0 $Nnro_muestra $Nmis_enfermedades $Nmis_pruebas $Nmis_resultados $Nmis_serotipos $Nfecha_resultados $Nfecha_recepcion_lrr $Nfecha_envio_ins $Nfecha_recepcion_ins
      order by al.id desc ";

      $sql = $sql;
      $data = array("vFiltros" => '', "vCodUsu" => $this->session->userdata('usuario'), "vQry" => $sql, "cEstado" => "1","tipo_descarga"=>$tipo, "fecReg" => date('Y-m-d H:i:s'), "vProgreso" => "0%", "vRuta" => null);
      // INSERTAR SQL DENTRO TABLA colas_querys_monkey
      /*



      1 = EN COLA
      2 = EN PROCESO
      3 = COMPLETADO

        COMENTAR LA LINEA 242
      */

      $this->colas->insert('colas_querys_arbovirus',$data);
      return true;
  }
    




  }

  public function yaDescargado($id){
    $sql = "update colas.colas_querys_arbovirus set cEstado = '4' where id = $id";
    $data =  $this->colas->query($sql);
    return array(
        'estado' => true,
        'data' => $data
      );
}

}

