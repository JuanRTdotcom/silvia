<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Fichas extends CI_Controller
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
		$data['title'] 			= 'Arvovirosis';
		$data['titulo'] 		= 'Bienvenido';
		$data['page_name'] 		= "Vigilancia/Fichas_view.php";
		$data['page'] 			= "Ingreso de fichas de vigilancia";

		$this->load->view('plantilla', $data);
	}

	public function Agregar()
	{
		$data['title'] 			= 'Nuevo Arvovirosis';
		$data['titulo'] 		= 'Bienvenido';
		$data['page_name'] 		= "Vigilancia/Nueva_Fichas_view.php";
		$data['page'] 			= "Ingreso de fichas de vigilancia";
		$data['paises'] 		= $this->obtenerPaises();
		$data['departamentos'] 	= $this->obtenerDepartamentos();
		$data['tipo_via'] 		= $this->obtenerTipoVia();
		$data['tipo_asociacion']= $this->obtenerTipoAsociacion();

		$this->load->view('plantilla', $data);
	}
	
	public function Ver()
	{
		$idFicha = $this->uri->segment(4);
		$data['title'] 			= 'Nuevo Arvovirosis';
		$data['titulo'] 		= 'Bienvenido';
		$data['page_name'] 		= "Vigilancia/Ver_Fichas_view.php";
		$data['page'] 			= "Ingreso de fichas de vigilancia";
		$miFicha 				= $this->obtenerinformacionFicha($idFicha);
		$data['inf_ficha'] 		= $miFicha[0];

		$this->load->view('plantilla', $data);
	}
	
	public function Editar()
	{
		$idFicha = $this->uri->segment(4);
		$data['title'] 			= 'Nuevo Arvovirosis';
		$data['titulo'] 		= 'Bienvenido';
		$data['page_name'] 		= "Vigilancia/Editar_Fichas_view.php";
		$data['page'] 			= "Ingreso de fichas de vigilancia";
		$data['paises'] 		= $this->obtenerPaises();
		$miFicha 				= $this->obtenerinformacionFicha($idFicha);
		$data['inf_ficha'] 		= $miFicha[0];

		$data['departamentos'] 	= $this->obtenerDepartamentos();
		$data['provincias'] 	= $this->obtenerProvincias_x_distrito($miFicha[0]->distrito);
		$data['distritos'] 		= $this->obtenerDistritos_x_distrito($miFicha[0]->distrito);
		
		$data['mi_departamento'] 	= $this->obtenerDepartamento_e($miFicha[0]->distrito);
		$data['mi_provincia'] 	= $this->obtenerProvincia_e($miFicha[0]->distrito);
		
		$data['tipo_via'] 		= $this->obtenerTipoVia();
		$data['tipo_asociacion']= $this->obtenerTipoAsociacion();

		$this->load->view('plantilla', $data);
	}

	public function obtenerinformacionFicha($id){
		$this->load->model('Fichas_model', 'fichas_model');
		$depts = $this->fichas_model->getFicha_x_Id($id);
		if ($depts['estado']) {
			return $depts['data'];
			// $this->api_return(['status' => true, 'departamentos' => $depts['data']], 200);
		} else {
			return null;
			// $this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($depts)], 200);
		}
	}
	
	public function Laboratorio()
	{
		$idFicha = $this->uri->segment(4);
		if($idFicha == ''){
			redirect('Vigilancia/Fichas');
		}else{
			$val = $this->validaFicha($idFicha);
			if(count($val) == 0){
				redirect('Vigilancia/Fichas');
			}else{

				// aqui hago logica
				$data['title'] 			= 'Nuevo Arvovirosis';
				$data['titulo'] 		= 'Bienvenido';
				$data['page_name'] 		= "Vigilancia/Laboratorio_view.php";
				$data['page'] 			= "Ingreso de fichas de vigilancia";
				$miFicha 				= $this->obtenerinformacionFicha($idFicha);
				$data['inf_ficha'] 		= $miFicha[0];
				$data['resultados'] 	= $this->obtenerResultados();
				$data['enfermedades'] 	= $this->obtenerEnfermedades();

				$data['pruebas_f'] 		= $this->obtenerPruebas_f();
				$data['resultados_f'] 	= $this->obtenerResultados_f();
				$data['enfermedades_f'] = $this->obtenerEnfermedades_f();
		
				$this->load->view('plantilla', $data);

			}
		}
	}

	function listarPruebas(){
		$enf = $this->input->post("enf");
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->getPruebas($enf);
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}

	}
	
	function eliminarPruebas(){
		$id = $this->input->post("id");
		$usuario = $this->session->userdata('usuario');
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->eliminarPruebas($id,$usuario);
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}

	}
	
	function verPruebas(){
		$id = $this->input->post("id");
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->verPruebas($id);
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}

	}
	
	function listarserotipo(){
		$enf = $this->input->post("enf");
		$pru = $this->input->post("pru");
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->getSerotipos($enf,$pru);
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}

	}

	function listarLaboratorio_x_idFicha()
	{
		$id = $this->input->post("id");
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->obtenerLaboratorio_x_idFicha($id);
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}
	
	function listarLaboratorio_x_idFicha_filtro()
	{
		$idFicha = $this->input->post("idFicha");
		$muestra = $this->input->post("muestra");
		$enfermedad = $this->input->post("enfermedad");
		$prueba = $this->input->post("prueba");
		$resultado = $this->input->post("resultado");
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->obtenerLaboratorio_x_idFicha_filtro($idFicha,$muestra,$enfermedad,$prueba,$resultado);
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}

	public function validaFicha($idFicha){
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->validaFichas($idFicha);
		return $data['data'];
	}


	public function listarFichas()
	{
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->getFichas();
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}
	
	public function listarFichasFiltro()
	{
		$nombres = $this->input->post("nombres");
		$ape_pat = $this->input->post("ape_pat");
		$ape_mat = $this->input->post("ape_mat");
		$dni = $this->input->post("dni");
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->getFichas_filtro($nombres,$ape_pat,$ape_mat,$dni);
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}
	
	public function listarFichasFiltroNegativa()
	{
		$responsable = $this->input->post("responsable");
		$anio = $this->input->post("anio");
		$semana = $this->input->post("semana");
		$observacion = $this->input->post("observacion");
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->getFichasNegativas_filtro($responsable,$anio,$semana,$observacion);
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}
	
	public function eliminarFicha()
	{
		$id_ficha = $this->input->post("idFicha");
		$usuario = $this->session->userdata('usuario');
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->eliminarFicha($id_ficha,$usuario);
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}

	public function registrarMuestra()
	{
		// informacion general
		$id_ficha 				= $this->input->post("id_ficha");
		$nro_muestra 			= $this->input->post("nro_muestra");
		$fecha_resultado 		= $this->input->post("fecha_resultado"); 
		$mis_enfermedades 		= $this->input->post("mis_enfermedades");
		
		$fecha_recepcion_lrr 	= $this->input->post("fecha_recepcion_lrr");
		$ins_si 				= $this->input->post("ins_si");
		$fecha_envio_ins 		= $this->input->post("fecha_envio_ins");
		$fecha_recepcion_ins 	= $this->input->post("fecha_recepcion_ins");
		// aqui falta nuevos campos para enviar a modelo

		$mis_pruebas 			= $this->input->post("mis_pruebas");
		$mis_serotipos 			= $this->input->post("mis_serotipos");
		$mis_resultados 		= $this->input->post("mis_resultados");
		
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->agregarMuestra($id_ficha,$nro_muestra,$fecha_resultado,$fecha_recepcion_lrr,$ins_si,$fecha_envio_ins,$fecha_recepcion_ins,$mis_enfermedades,$mis_pruebas,$mis_serotipos,$mis_resultados);
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}
	
	public function editarMuestra()
	{
		// informacion general
		$id_muestra 				= $this->input->post("id_muestra");
		$id_ficha 				= $this->input->post("id_ficha");
		$nro_muestra 			= $this->input->post("nro_muestra");
		$fecha_resultado 		= $this->input->post("fecha_resultado"); 

		$fecha_recepcion_lrr_editar 	= $this->input->post("fecha_recepcion_lrr_editar");
		$ins_si_editar 				= $this->input->post("ins_si_editar");
		$fecha_envio_ins_editar 		= $this->input->post("fecha_envio_ins_editar");
		$fecha_recepcion_ins_editar 	= $this->input->post("fecha_recepcion_ins_editar");


		$mis_enfermedades 		= $this->input->post("mis_enfermedades");
		$mis_pruebas 			= $this->input->post("mis_pruebas");
		$mis_serotipos 			= $this->input->post("mis_serotipos");
		$mis_resultados 		= $this->input->post("mis_resultados");
		
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->editarMuestra($id_muestra,$id_ficha,$nro_muestra,$fecha_recepcion_lrr_editar,$ins_si_editar,$fecha_envio_ins_editar,$fecha_recepcion_ins_editar,$fecha_resultado,$mis_enfermedades,$mis_pruebas,$mis_serotipos,$mis_resultados);
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}
	
	public function vlidarUsuarioDni()
	{
		// informacion general
		$dni 					= $this->input->post("dni");
		$fecha_notificacion 	= $this->input->post("fecha_notificacion"); 
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->vlidarUsuarioDni($dni,$fecha_notificacion);
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}

	public function registrarFicha()
	{
		// informacion general
		$responsable_laboratorio 	= $this->input->post("responsable_laboratorio");
		$responsable_epidemiologia 	= $this->input->post("responsable_epidemiologia"); 
		$fecha_notificacion 		= $this->input->post("fecha_notificacion");

		// persona
		$dni 						= $this->input->post("dni");
		$nombres 					= $this->input->post("nombres");
		$apellido_paterno 			= $this->input->post("apellido_paterno");
		$apellido_materno			= $this->input->post("apellido_materno");
		$sexo 						= $this->input->post("sexo");
		$edad 						= $this->input->post("edad");
		$tipo_edad 					= $this->input->post("tipo_edad");
		$telefono 					= $this->input->post("telefono");
		$pais 						= $this->input->post("pais");
		$departamento 				= $this->input->post("departamento");
		$provincia 					= $this->input->post("provincia");
		$distrito 					= $this->input->post("distrito");
		$localidad 					= $this->input->post("localidad");
		$tipo_zona 					= $this->input->post("tipo_zona");
		$direccion 					= $this->input->post("direccion");
		$tipo_via 					= $this->input->post("tipo_via");
		$nombre_via 				= $this->input->post("nombre_via");
		$nro_puerta 				= $this->input->post("nro_puerta");
		$nro_manzana 				= $this->input->post("nro_manzana");
		$lote 						= $this->input->post("lote");
		$tipo_asociacion 			= $this->input->post("tipo_asociacion");
		$nombre_asociacion 			= $this->input->post("nombre_asociacion");

		// aspectos clínicos
		$fecha_muestra 				= $this->input->post("fecha_muestra");
		$fecha_inicio_enfermedad 	= $this->input->post("fecha_inicio_enfermedad");
		$gestante 					= $this->input->post("gestante");
		$fiebre 					= $this->input->post("fiebre");
		$rash 						= $this->input->post("rash");
		$conjuntivitis 				= $this->input->post("conjuntivitis");
		$artralgia 					= $this->input->post("artralgia");
		$mialgia 					= $this->input->post("mialgia");
		$otro 						= $this->input->post("otro");
		$nombre_otro 				= $this->input->post("nombre_otro");
		$evaluacion_paciente 		= $this->input->post("evaluacion_paciente");
		$area_captacion 			= $this->input->post("area_captacion");
		$diagnostico_captacion 		= $this->input->post("diagnostico_captacion");

		// adicional
		$observacion = $this->input->post("observacion");


		$esNegativa = 0; // 0 - no es negativa    1- es negativa
		
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->agregarFicha(
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
		);
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}

	public function editarFicha()
	{
		// informacion general
		$id 						= $this->input->post("id");
		$responsable_laboratorio 	= $this->input->post("responsable_laboratorio");
		$responsable_epidemiologia 	= $this->input->post("responsable_epidemiologia"); 
		$fecha_notificacion 		= $this->input->post("fecha_notificacion");

		// persona
		$dni 						= $this->input->post("dni");
		$nombres 					= $this->input->post("nombres");
		$apellido_paterno 			= $this->input->post("apellido_paterno");
		$apellido_materno			= $this->input->post("apellido_materno");
		$sexo 						= $this->input->post("sexo");
		$edad 						= $this->input->post("edad");
		$tipo_edad 					= $this->input->post("tipo_edad");
		$telefono 					= $this->input->post("telefono");
		$pais 						= $this->input->post("pais");
		$departamento 				= $this->input->post("departamento");
		$provincia 					= $this->input->post("provincia");
		$distrito 					= $this->input->post("distrito");
		$localidad 					= $this->input->post("localidad");
		$tipo_zona 					= $this->input->post("tipo_zona");
		$direccion 					= $this->input->post("direccion");
		$tipo_via 					= $this->input->post("tipo_via");
		$nombre_via 				= $this->input->post("nombre_via");
		$nro_puerta 				= $this->input->post("nro_puerta");
		$nro_manzana 				= $this->input->post("nro_manzana");
		$lote 						= $this->input->post("lote");
		$tipo_asociacion 			= $this->input->post("tipo_asociacion");
		$nombre_asociacion 			= $this->input->post("nombre_asociacion");

		// aspectos clínicos
		$fecha_muestra 				= $this->input->post("fecha_muestra");
		$fecha_inicio_enfermedad 	= $this->input->post("fecha_inicio_enfermedad");
		$gestante 					= $this->input->post("gestante");
		$fiebre 					= $this->input->post("fiebre");
		$rash 						= $this->input->post("rash");
		$conjuntivitis 				= $this->input->post("conjuntivitis");
		$artralgia 					= $this->input->post("artralgia");
		$mialgia 					= $this->input->post("mialgia");
		$otro 						= $this->input->post("otro");
		$nombre_otro 				= $this->input->post("nombre_otro");
		$evaluacion_paciente 		= $this->input->post("evaluacion_paciente");
		$area_captacion 			= $this->input->post("area_captacion");
		$diagnostico_captacion 		= $this->input->post("diagnostico_captacion");

		// adicional
		$observacion = $this->input->post("observacion");


		$esNegativa = 0; // 0 - no es negativa    1- es negativa
		
		$this->load->model('Fichas_model', 'fichas_model');
		$data = $this->fichas_model->editarFicha(
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
		);
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}

	function obtenerResultados()
	{
		$this->load->model('Resultados_model', 'resultados_model');
		$depts = $this->resultados_model->getResultados();
		if ($depts['estado']) {
			return $depts['data'];
			// $this->api_return(['status' => true, 'departamentos' => $depts['data']], 200);
		} else {
			return null;
			// $this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($depts)], 200);
		}
	}
	
	
	function obtenerEnfermedades()
	{
		$this->load->model('Enfermedades_model', 'enfermedades_model');
		$depts = $this->enfermedades_model->getEnfermedades();
		if ($depts['estado']) {
			return $depts['data'];
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

	function obtenerPaises()
	{
		$this->load->model('Fichas_model', 'fichas_model');
		$depts = $this->fichas_model->getPaises();
		if ($depts['estado']) {
			return $depts['data'];
			// $this->api_return(['status' => true, 'departamentos' => $depts['data']], 200);
		} else {
			return null;
			// $this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($depts)], 200);
		}
	}

	function obtenerDepartamentos()
	{
		$this->load->model('Fichas_model', 'fichas_model');
		$depts = $this->fichas_model->getDepartamentos();
		if ($depts['estado']) {
			return $depts['data'];
			// $this->api_return(['status' => true, 'departamentos' => $depts['data']], 200);
		} else {
			return null;
			// $this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($depts)], 200);
		}
	}
	function obtenerProvincias_x_distrito($id)
	{
		$this->load->model('Fichas_model', 'fichas_model');
		$depts = $this->fichas_model->getProvincias_x_distrito($id);
		if ($depts['estado']) {
			return $depts['data'];
			// $this->api_return(['status' => true, 'departamentos' => $depts['data']], 200);
		} else {
			return null;
			// $this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($depts)], 200);
		}
	}
	function obtenerDistritos_x_distrito($id)
	{
		$this->load->model('Fichas_model', 'fichas_model');
		$depts = $this->fichas_model->getDistritos_x_distrito($id);
		if ($depts['estado']) {
			return $depts['data'];
			// $this->api_return(['status' => true, 'departamentos' => $depts['data']], 200);
		} else {
			return null;
			// $this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($depts)], 200);
		}
	}
	function obtenerDepartamento_e($id)
	{
		$this->load->model('Fichas_model', 'fichas_model');
		$depts = $this->fichas_model->getDepartamento_editar($id);
		if ($depts['estado']) {
			return $depts['data'];
			// $this->api_return(['status' => true, 'departamentos' => $depts['data']], 200);
		} else {
			return null;
			// $this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($depts)], 200);
		}
	}
	function obtenerProvincia_e($id)
	{
		$this->load->model('Fichas_model', 'fichas_model');
		$depts = $this->fichas_model->getProvincia_editar($id);
		if ($depts['estado']) {
			return $depts['data'];
			// $this->api_return(['status' => true, 'departamentos' => $depts['data']], 200);
		} else {
			return null;
			// $this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($depts)], 200);
		}
	}

	function obtenerTipovia()
	{
		$this->load->model('Fichas_model', 'fichas_model');
		$depts = $this->fichas_model->getTipoVia();
		if ($depts['estado']) {
			return $depts['data'];
			// $this->api_return(['status' => true, 'departamentos' => $depts['data']], 200);
		} else {
			return null;
			// $this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($depts)], 200);
		}
	}
	function obtenerTipoAsociacion()
	{
		$this->load->model('Fichas_model', 'fichas_model');
		$depts = $this->fichas_model->getTipoAsociacion();
		if ($depts['estado']) {
			return $depts['data'];
			// $this->api_return(['status' => true, 'departamentos' => $depts['data']], 200);
		} else {
			return null;
			// $this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($depts)], 200);
		}
	}
	
	function obtenerProvincias()
	{
		$cod_dept = $this->input->post("dept");
		$this->load->model('Fichas_model', 'fichas_model');
		$provs = $this->fichas_model->getProvincias(array($cod_dept));
		if ($provs['estado']) {
			$this->api_return(['status' => true, 'data' => $provs['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($provs)], 200);
		}
	}

	function obtenerDistritos()
	{
		$cod_dist = $this->input->post("dist");
		$this->load->model('Fichas_model', 'fichas_model');
		$dists = $this->fichas_model->getDistritos(array($cod_dist));
		if ($dists['estado']) {
			$this->api_return(['status' => true, 'data' => $dists['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($dists)], 200);
		}
	}
}
