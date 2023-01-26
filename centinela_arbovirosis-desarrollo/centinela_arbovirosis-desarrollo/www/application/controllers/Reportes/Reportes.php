<?php

defined('BASEPATH') or exit('No direct script access allowed');
// require FCPATH . 'vendor/autoload.php';

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reportes extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		/*cache control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
		date_default_timezone_set('America/Lima');
		if ($this->session->userdata('sesionIniciada') != true) {
			redirect('login', 'refresh');
		}
		$this->load->library('form_validation');
		$this->load->helper('menu');
		$this->data['aplicacion'] = 'Noti';
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


	public function index()
	{
		$data['title'] 				= 'Arvovirosis';
		$data['titulo'] 			= 'Bienvenido';
		$data['page_name'] 			= "Reportes/Reportes_view.php";
		$data['page'] 				= "";
		$data['establecimientos'] 	= $this->getEstablecimientos();
		$data['diresas'] 			= $this->getDiresas();
		$data['enfermedades'] 		= $this->obtenerEnfermedades_f();
		$data['pruebas'] 			= $this->obtenerPruebas_f();
		$data['resultados'] 		= $this->obtenerResultados_f();
		$data['serotipos'] 			= $this->obtenerSerotipos_f();

		$this->load->view('plantilla', $data);
	}

	public function miReporteFichas()
	{
		$data['type'] = $this->input->get("type");
		$data['establecimiento'] = $this->input->get("establecimiento");
		$data['diresa'] = $this->input->get("diresa");
		$data['dni'] = $this->input->get("dni");
		$data['negativa'] = $this->input->get("negativa");
		$data['fecha_notificacion_inicio'] = $this->input->get("fecha_notificacion_inicio");
		$data['fecha_notificacion_fin'] = $this->input->get("fecha_notificacion_fin");
		$data['fecha_inicio_enfermedad_inicio'] = $this->input->get("fecha_inicio_enfermedad_inicio");
		$data['fecha_inicio_enfermedad_fin'] = $this->input->get("fecha_inicio_enfermedad_fin");
		$data['fecha_muestra_inicio'] = $this->input->get("fecha_muestra_inicio");
		$data['fecha_muestra_fin'] = $this->input->get("fecha_muestra_fin");
		// aqui agregar el token de sesion

		// $this->generarExcel($data);
	}
	
	public function miReporteLaboratorio()
	{
		$data['type'] = $this->input->get('type');
		$data['conFichas'] = $this->input->get('conFichas');
		$data['nro_muestra'] = $this->input->get('nro_muestra');
		$data['mis_enfermedades'] = $this->input->get('mis_enfermedades');
		$data['mis_pruebas'] = $this->input->get('mis_pruebas');
		$data['mis_resultados'] = $this->input->get('mis_resultados');
		$data['mis_serotipos'] = $this->input->get('mis_serotipos');
		$data['fecha_resultados_inicio'] = $this->input->get('fecha_resultados_inicio');
		$data['fecha_resultados_fin'] = $this->input->get('fecha_resultados_fin'); 
		$data['fecha_recepcion_lrr_inicio'] = $this->input->get('fecha_recepcion_lrr_inicio');
		$data['fecha_recepcion_lrr_fin'] = $this->input->get('fecha_recepcion_lrr_fin');
		$data['fecha_envio_ins_inicio'] = $this->input->get('fecha_envio_ins_inicio');
		$data['fecha_envio_ins_fin'] = $this->input->get('fecha_envio_ins_fin');
		$data['fecha_recepcion_ins_inicio'] = $this->input->get('fecha_recepcion_ins_inicio');
		$data['fecha_recepcion_ins_fin'] = $this->input->get('fecha_recepcion_ins_fin');
		// aqui agregar el token de sesion

		// $this->generarExcel($data);
	}

	public function agregarCola()
    {
		$data['type'] 							= $this->input->post("type");
		$data['establecimiento'] 				= $this->input->post("establecimiento");
		$data['diresa'] 						= $this->input->post("diresa");
		$data['dni'] 							= $this->input->post("dni");
		$data['negativa'] 						= $this->input->post("negativa");
		$data['fecha_notificacion_inicio'] 		= $this->input->post("fecha_notificacion_inicio");
		$data['fecha_notificacion_fin'] 		= $this->input->post("fecha_notificacion_fin");
		$data['fecha_inicio_enfermedad_inicio'] = $this->input->post("fecha_inicio_enfermedad_inicio");
		$data['fecha_inicio_enfermedad_fin'] 	= $this->input->post("fecha_inicio_enfermedad_fin");
		$data['fecha_muestra_inicio'] 			= $this->input->post("fecha_muestra_inicio");
		$data['fecha_muestra_fin'] 				= $this->input->post("fecha_muestra_fin");
		
		$this->load->model('Fichas_model', 'fichas_model');
        $datos =  $this->fichas_model->getDatos($data,1);
        if ($datos) {
            $this->api_return(['status' => true, 'data' => $datos], 200);
        } else {
            $this->api_return(['status' => false, 'type' => 'error_bd', 'mensaje' => json_encode($datos)], 400);
        }
    }
	
	public function agregarColaLab()
    {
		$data['type'] 						= $this->input->post('type');
		$data['conFichas'] 					= $this->input->post('conFichas');
		$data['nro_muestra'] 				= $this->input->post('nro_muestra');
		$data['mis_enfermedades'] 			= $this->input->post('mis_enfermedades');
		$data['mis_pruebas'] 				= $this->input->post('mis_pruebas');
		$data['mis_resultados'] 			= $this->input->post('mis_resultados');
		$data['mis_serotipos'] 				= $this->input->post('mis_serotipos');
		$data['fecha_resultados_inicio'] 	= $this->input->post('fecha_resultados_inicio');
		$data['fecha_resultados_fin'] 		= $this->input->post('fecha_resultados_fin'); 
		$data['fecha_recepcion_lrr_inicio'] = $this->input->post('fecha_recepcion_lrr_inicio');
		$data['fecha_recepcion_lrr_fin'] 	= $this->input->post('fecha_recepcion_lrr_fin');
		$data['fecha_envio_ins_inicio'] 	= $this->input->post('fecha_envio_ins_inicio');
		$data['fecha_envio_ins_fin'] 		= $this->input->post('fecha_envio_ins_fin');
		$data['fecha_recepcion_ins_inicio'] = $this->input->post('fecha_recepcion_ins_inicio');
		$data['fecha_recepcion_ins_fin'] 	= $this->input->post('fecha_recepcion_ins_fin');
		
		$this->load->model('Fichas_model', 'fichas_model');
        $datos =  $this->fichas_model->getDatos($data,2);
        if ($datos) {
            $this->api_return(['status' => true, 'data' => $datos], 200);
        } else {
            $this->api_return(['status' => false, 'type' => 'error_bd', 'mensaje' => json_encode($datos)], 400);
        }
    }

	// public function generarExcel($data)
	// {		
	// 	$name = date('d-m-Y_H:i:s');
	// 	$nt = $data['type'];
	// 	$usuarioActualNombre = $this->session->userdata('nombres');
	// 	header('Content-Type: application/vnd.ms-excel');
	// 	header("Content-Disposition: attachment;filename=$nt $name.xlsx");
	// 	header('Cache-Control: max-age=0');
	// 	$spreadsheet = new Spreadsheet();
	// 	$sheet = $spreadsheet->getActiveSheet();		
	// 	$spreadsheet->getProperties()
	// 				->setCreator("CDC")
	// 				->setLastModifiedBy($usuarioActualNombre)
	// 				->setTitle("Reporte de $nt")
	// 				->setSubject("Reporte de $nt creado por $usuarioActualNombre el día $name")
	// 				->setDescription(
	// 					"Este documento es un reporte de $nt creado por $usuarioActualNombre el día $name"
	// 				)
	// 				->setKeywords("cdc JR reporte $nt php")
	// 				->setCategory("cdc reporte file $nt");

	// 	switch ($data['type']) {
	// 		case 'Fichas':
	// 						// CABECERA EN ARRAY
	// 			$cabecera 	= ['NRO_FICHA','NOMBRE_DIRESA','NOMBRE_ESTABLECIMIENTO','NEGATIVA','FECHA_NOTIFICACION','FECHA_INICIO_ENFERMEDAD','FECHA_TOMA_MUESTRA','AÑO','SEMANA','RESPONSABLE_LABORATORIO','RESPONSABLE_EPIDEMIOLOGIA','DNI','NOMBRES','APELLIDO_PATERNO','APELLIDO_MATERNO','EDAD','TIPO_EDAD','SEXO','PAIS','DEPARTAMENTO','PROVINCIA','DISTRITO','LOCALIDAD','TIPO_ZONA','DIRECCION','TIPO_VIA','NOMBRE_VIA','NUMERO_PUERTA','NUMERO_MANZANA','LOTE','NOMBRE_ASOCIACION','TIPO_ASOCIACION','TELEFONO','GESTANTE','FIEBRE','RASH','CONJUNTIVITIS','ARTRALGIA','MIALGIA','OTROS','OTRO_SINTOMA','EVALUACION_PACIENTE','AREA_CAPTACION','DIAGNOSTICO_CAPTACION','ID_USUARIO_REGISTRA','NOMBRE_USUARIO_REGISTRA','FECHA_REGISTRO'];
	// 						  $spreadsheet->getActiveSheet()->fromArray($cabecera, NULL, 'A1');
	// 						  $sheet->setTitle($data['type']);
	// 						  $this->load->model('Fichas_model', 'fichas_model');
	// 			$datos 		= $this->fichas_model->getFichasReporte_Filtro(0,$data['establecimiento'],$data['diresa'], $data['dni'], $data['negativa'], $data['fecha_notificacion_inicio'], $data['fecha_notificacion_fin'], $data['fecha_inicio_enfermedad_inicio'],$data['fecha_inicio_enfermedad_fin'], $data['fecha_muestra_inicio'], $data['fecha_muestra_fin']);
	// 			$midata 	= $datos['data'];
				
	// 						foreach ($midata as $key => $d) {
	// 							$indice = $key + 2;
	// 							$miArr = [
	// 								$d->id, $d->Nombre_Diresa, $d->Nombre_Establecimiento, $d->Negativa, $d->Fecha_Notificacion, $d->Fecha_Inicio_Enfermedad, $d->Fecha_Toma_Muestra, (int)$d->Año, (int)$d->Semana, $d->Responsable_Laboratorio, $d->Responsable_Epidemiologia, strval($d->Dni), $d->Nombres, $d->Apellido_Paterno, $d->Apellido_Materno, (int)$d->Edad, $d->Tipo_Edad, $d->Sexo, $d->Pais, $d->Departamento, $d->Provincia, $d->Distrito, $d->Localidad, $d->Tipo_Zona, $d->Direccion, $d->Tipo_Via, $d->Nombre_Via, $d->Numero_Puerta, $d->Numero_Manzana, $d->Lote, $d->Nombre_Asociacion, $d->Tipo_Asociacion, strval($d->Telefono), $d->Gestante, $d->Fiebre, $d->Rash, $d->Conjuntivitis, $d->Artralgia, $d->Mialgia, $d->Otros, $d->Otro_Sintoma, $d->Evaluacion_Paciente, $d->Area_Captacion, $d->Diagnostico_Captacion, $d->Id_Usuario_Registra, $d->Nombre_usuario_Registra, $d->Fecha_Registro
	// 							];
	// 							$sheet->fromArray($miArr, NULL, "A$indice");
	// 						}
	// 			break;
			
	// 		case 'Laboratorio':
	// 						// CABECERA EN ARRAY
	// 						$cabecera = [];
	// 						$data['conFichas'] == 1
	// 						? $cabecera 	= ['NOMBRE_ESTABLECIMIENTO','NOMBRE_DIRESA','NEGATIVA','FECHA_NOTIFICACION','FECHA_INICIO_ENFERMEDAD','FECHA_TOMA_MUESTRA','AÑO','SEMANA','RESPONSABLE_LABORATORIO','RESPONSABLE_EPIDEMIOLOGIA','DNI','NOMBRES','APELLIDO_PATERNO','APELLIDO_MATERNO','EDAD','TIPO_EDAD','SEXO','DIRECCION','TIPO_VIA','NOMBRE_VIA','NUMERO_PUERTA','NUMERO_MANZANA','LOTE','NOMBRE_ASOCIACION','TIPO_ASOCIACION','TELEFONO','GESTANTE','FIEBRE','RASH','CONJUNTIVITIS','ARTRALGIA','MIALGIA','OTROS','OTRO_SINTOMA','EVALUACION_PACIENTE','AREA_CAPTACION','DIAGNOSTICO_CAPTACION','PAIS','DEPARTAMENTO','PROVINCIA','DISTRITO','LOCALIDAD','TIPO_ZONA','ID_USUARIO_REGISTRA','NOMBRE_USUARIO_REGISTRA','FECHA_REGISTRO','IDMUESTRA','IDPACIENTE','NROMUESTRA','ENFERMEDAD','PRUEBA','SEROTIPO','RESULTADO','FECHA_RESULTADO','FECHA_RECEPCION_LRR','FECHA_ENVIO_INS','FECHA_RECEPCION_INS','FECHA_REGISTRO','DIAS_FECHA_RESULTADO_Y_RECEPCION_LRR']
	// 						: $cabecera 	= ['ID_MUESTRA','ID_PACIENTE','NRO_MUESTRA','ENFERMEDAD','PRUEBA','SEROTIPO','RESULTADO','FECHA_RESULTADO','FECHA_RECEPCION_LRR','FECHA_ENVIO_INS','FECHA_RECEPCION_INS','FECHA_REGISTRO','DIAS_FECHA_RESULTADO_Y_RECEPCION_LRR'];
							
	// 						  $spreadsheet->getActiveSheet()->fromArray($cabecera, NULL, 'A1');

	// 						  $sheet->setTitle($data['type']);
	// 						  $this->load->model('Fichas_model', 'fichas_model');
	// 			$datos 		= $this->fichas_model->getFichasReporte_Filtro_Lab(0,$data['conFichas'],$data['nro_muestra'],$data['mis_enfermedades'],$data['mis_pruebas'],$data['mis_resultados'],$data['mis_serotipos'],$data['fecha_resultados_inicio'],$data['fecha_resultados_fin'],$data['fecha_recepcion_lrr_inicio'],$data['fecha_recepcion_lrr_fin'],$data['fecha_envio_ins_inicio'],$data['fecha_envio_ins_fin'],$data['fecha_recepcion_ins_inicio'],$data['fecha_recepcion_ins_fin']);
	// 			$midata 	= $datos['data'];
				
	// 						if($data['conFichas'] == 1){
	// 							foreach ($midata as $key => $d) {
	// 								$indice = $key + 2;
	// 								$miArr = [$d->Nombre_Establecimiento,$d->Nombre_Diresa,$d->Negativa,$d->Fecha_Notificacion,$d->Fecha_Inicio_Enfermedad,$d->Fecha_Toma_Muestra,$d->Año,$d->Semana,$d->Responsable_Laboratorio,$d->Responsable_Epidemiologia,$d->Dni,$d->Nombres,$d->Apellido_Paterno,$d->Apellido_Materno,$d->Edad,$d->Tipo_Edad,$d->Sexo,$d->Direccion,$d->Tipo_Via,$d->Nombre_Via,$d->Numero_Puerta,$d->Numero_Manzana,$d->Lote,$d->Nombre_Asociacion,$d->Tipo_Asociacion,$d->Telefono,$d->Gestante,$d->Fiebre,$d->Rash,$d->Conjuntivitis,$d->Artralgia,$d->Mialgia,$d->Otros,$d->Otro_Sintoma,$d->Evaluacion_Paciente,$d->Area_Captacion,$d->Diagnostico_Captacion,$d->Pais,$d->Departamento,$d->Provincia,$d->Distrito,$d->Localidad,$d->Tipo_Zona,$d->Id_Usuario_Registra,$d->Nombre_usuario_Registra,$d->Fecha_Registro,$d->idMuestra,$d->idPaciente,$d->nroMuestra,$d->Enfermedad,$d->Prueba,$d->Serotipo,$d->Resultado,$d->Fecha_resultado,$d->Fecha_recepcion_LRR,$d->Fecha_envio_INS,$d->Fecha_recepcion_INS,$d->Fecha_registro,$d->dias_FechasResultado_y_RecepcionLRR];
	// 								$sheet->fromArray($miArr, NULL, "A$indice");
	// 							}
	// 						}else{
	// 							foreach ($midata as $key => $d) {
	// 								$indice = $key + 2;
	// 								$miArr = [
	// 									$d->idMuestra,$d->idPaciente,$d->nroMuestra,$d->Enfermedad,$d->Prueba,$d->Serotipo,$d->Resultado,$d->Fecha_resultado,$d->Fecha_recepcion_LRR,$d->Fecha_envio_INS,$d->Fecha_recepcion_INS,$d->Fecha_registro,$d->dias_FechasResultado_y_RecepcionLRR];
	// 								$sheet->fromArray($miArr, NULL, "A$indice");
	// 							}
	// 						}
							
	// 			break;

			
	// 	}
		
	// 	// autosize por clumnas
	// 	foreach ($sheet->getColumnIterator() as $column) {
	// 		$sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);			
	// 	}

	// 	$writer = new Xlsx($spreadsheet);
	// 	$writer->save('php://output');
	// }


	public function listarResultados()
	{
		$this->load->model('Resultados_model', 'resultados_model');
		$data = $this->resultados_model->getResultados();
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}

	public function listarFichasFiltro()
	{
		$establecimiento = $this->input->post("establecimiento");
		$diresa = $this->input->post("diresa");
		$dni = $this->input->post("dni");
		$negativa = $this->input->post("negativa");
		$fecha_notificacion_inicio = $this->input->post("fecha_notificacion_inicio");
		$fecha_notificacion_fin = $this->input->post("fecha_notificacion_fin");
		$fecha_inicio_enfermedad_inicio = $this->input->post("fecha_inicio_enfermedad_inicio");
		$fecha_inicio_enfermedad_fin = $this->input->post("fecha_inicio_enfermedad_fin");
		$fecha_muestra_inicio = $this->input->post("fecha_muestra_inicio");
		$fecha_muestra_fin = $this->input->post("fecha_muestra_fin");

		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->getFichasReporte_Filtro(1,$establecimiento, $diresa, $dni, $negativa, $fecha_notificacion_inicio, $fecha_notificacion_fin, $fecha_inicio_enfermedad_inicio, $fecha_inicio_enfermedad_fin, $fecha_muestra_inicio, $fecha_muestra_fin);
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}

	public function listarFichasFiltro_Lab()
	{
		$conFichas = $this->input->post("conFichas");
		$nro_muestra = $this->input->post("nro_muestra");
		$mis_enfermedades = $this->input->post("mis_enfermedades");
		$mis_pruebas = $this->input->post("mis_pruebas");
		$mis_resultados = $this->input->post("mis_resultados");
		$mis_serotipos = $this->input->post("mis_serotipos");
		$fecha_resultados_inicio = $this->input->post("fecha_resultados_inicio");
		$fecha_resultados_fin = $this->input->post("fecha_resultados_fin");
		$fecha_recepcion_lrr_inicio = $this->input->post("fecha_recepcion_lrr_inicio");
		$fecha_recepcion_lrr_fin = $this->input->post("fecha_recepcion_lrr_fin");
		$fecha_envio_ins_inicio = $this->input->post("fecha_envio_ins_inicio");
		$fecha_envio_ins_fin = $this->input->post("fecha_envio_ins_fin");
		$fecha_recepcion_ins_inicio = $this->input->post("fecha_recepcion_ins_inicio");
		$fecha_recepcion_ins_fin = $this->input->post("fecha_recepcion_ins_fin");
		// print_r('as');
		// print_r($mis_enfermedades);
		// die();
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->getFichasReporte_Filtro_Lab(1,$conFichas, $nro_muestra, $mis_enfermedades, $mis_pruebas, $mis_resultados, $mis_serotipos, $fecha_resultados_inicio, $fecha_resultados_fin, $fecha_recepcion_lrr_inicio, $fecha_recepcion_lrr_fin, $fecha_envio_ins_inicio, $fecha_envio_ins_fin, $fecha_recepcion_ins_inicio, $fecha_recepcion_ins_fin);
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}

	public function getEstablecimientos()
	{
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->getEstablecimientos();
		if ($data['estado']) {
			return $data['data'];
			// $this->api_return(['status' => true, 'departamentos' => $depts['data']], 200);
		} else {
			return null;
			// $this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($depts)], 200);
		}
	}

	public function getTipoVia()
	{
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->getTipoVia();
		if ($data['estado']) {
			return $data['data'];
			// $this->api_return(['status' => true, 'departamentos' => $depts['data']], 200);
		} else {
			return null;
			// $this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($depts)], 200);
		}
	}

	function obtenerEnfermedades_f()
	{
		$this->load->model('Enfermedades_model', 'enfermedades_model');
		$depts = $this->enfermedades_model->getEnfermedades_filtro();
		if ($depts['estado']) {
			return $depts['data'];
			// $this->api_return(['status' => true, 'departamentos' => $depts['data']], 200);
		} else {
			return null;
			// $this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($depts)], 200);
		}
	}

	function obtenerPruebas_f()
	{
		$this->load->model('Pruebas_model', 'pruebas_model');
		$data = $this->pruebas_model->getPruebas_filtro();
		if ($data['estado']) {
			return $data['data'];
			// $this->api_return(['status' => true, 'departamentos' => $depts['data']], 200);
		} else {
			return null;
			// $this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($depts)], 200);
		}
	}

	function obtenerResultados_f()
	{
		$this->load->model('Resultados_model', 'resultados_model');
		$depts = $this->resultados_model->getResultados_filtro();
		if ($depts['estado']) {
			return $depts['data'];
			// $this->api_return(['status' => true, 'departamentos' => $depts['data']], 200);
		} else {
			return null;
			// $this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($depts)], 200);
		}
	}

	function obtenerSerotipos_f()
	{
		$this->load->model('Serotipos_model', 'serotipos_model');
		$depts = $this->serotipos_model->getSerotipos_filtro();
		if ($depts['estado']) {
			return $depts['data'];
			// $this->api_return(['status' => true, 'departamentos' => $depts['data']], 200);
		} else {
			return null;
			// $this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($depts)], 200);
		}
	}

	public function getTipoAsociacion()
	{
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->getTipoAsociacion();
		if ($data['estado']) {
			return $data['data'];
			// $this->api_return(['status' => true, 'departamentos' => $depts['data']], 200);
		} else {
			return null;
			// $this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($depts)], 200);
		}
	}

	public function getDiresas()
	{
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->getDiresas();
		if ($data['estado']) {
			return $data['data'];
			// $this->api_return(['status' => true, 'departamentos' => $depts['data']], 200);
		} else {
			return null;
			// $this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($depts)], 200);
		}
	}

	public function listarFichas()
	{
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->getFichasReporte();
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}
}
