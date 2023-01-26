<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Enfermedades extends CI_Controller
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
		$data['page_name'] 		= "Configuracion/Enfermedades_view.php";
		$data['page'] 			= "";

		$this->load->view('plantilla', $data);
	}

	public function listarEnfermedades()
	{
		$this->load->model('Enfermedades_model', 'enfermedades_model');
		$data = $this->enfermedades_model->getEnfermedades();
		if ($data['estado']) {
			$this->api_return(['status' => true, 'data' => $data['data']], 200);
		} else {
			$this->api_return(['status' => false, 'tipo' => 'error_bd', 'mensaje' => json_encode($data)], 200);
		}
	}

}
