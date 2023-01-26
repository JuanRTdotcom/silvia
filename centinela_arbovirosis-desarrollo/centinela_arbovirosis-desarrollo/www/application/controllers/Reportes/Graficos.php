<?php

defined('BASEPATH') or exit('No direct script access allowed');
// require FCPATH . 'vendor/autoload.php';

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Graficos extends CI_Controller
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
		$data['page_name'] 			= "Reportes/Graficos_view.php";
		$data['page'] 				= "";

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


	public function listarMuestrasPorSemana()
	{
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->getReporte_listarMuestraPorSemana();
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}
	
	public function listarEdades()
	{
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->getReporte_listarEdades();
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}
	
	public function listarGenero()
	{
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->getReporte_listarGenero();
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}
	
	public function listarCaptacionAnual()
	{
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->getReporte_listarCaptacion();
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}
	
	public function listarCaptacionVigilanciaAnual()
	{
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->listarCaptacionVigilanciaAnual();
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}
	
	public function listarCaptacionVigilanciaSemanal()
	{
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->listarCaptacionVigilanciaSemanal();
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}

	
}
