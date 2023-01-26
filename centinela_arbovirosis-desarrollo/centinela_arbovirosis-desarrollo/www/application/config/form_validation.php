<?php
$config = array(
	'login'	=>
	array(
		array(
			'field'		=>	'txtUsuario',
			'label'		=>	'Usuario',
			'rules'		=>	'required|numeric'
		),
		array(
			'field'		=>	'txtPassword',
			'label'		=>	'Contraseña',
			'rules'		=>	'trim|required'
		),
		array(
			'field'		=>	'captcha',
			'label'		=>	'Código captcha',
			'rules'		=>	'required|numeric|max_length[4]'
		)
	)

);
?>