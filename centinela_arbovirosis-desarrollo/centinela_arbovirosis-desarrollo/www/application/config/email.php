<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['protocol'] = 'smtp';
$config['smtp_host'] = '192.168.200.8'; // Cambiar el host
$config['smtp_port'] = 25;                         // Cambiar el puerto
$config['smtp_user'] = 'notificacion@dge.gob.pe';     // Cambiar el correo
$config['smtp_pass'] = 'notifica';              // Cambiar el pasword
$config['smtp_timeout'] = '7';
$config['mailtype'] = 'html'; 
$config['validation'] = TRUE; 

//$this->email->initialize($config); // esta linea usar cuando se hace cambio de configuracion desde un controlador

/*
$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'notificacion.peru@gmail.com',
			'smtp_pass' => '07082008&',
				
		//	'smtp_host' => 'ssl://smtp.googlemail.com',
		//	'smtp_port' => 465,
		//	'smtp_user' => 'xxx',
		//	'smtp_pass' => 'xxx',
			'smtp_timeout'=>'7',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1'
		);
*/
