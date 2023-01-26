<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        /*cache control*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");

        date_default_timezone_set('America/Lima');

        $this->load->library('form_validation');  

        $this->load->model("usuarios_model");

        $this->rand = rand(0, 10000);

        $this->modulo = 'principal/';  

        $this->data['title'] = 'Arbovirosis';
        $this->data['titulo'] = ''; 
        $this->data['aplicacion'] = 'Arbovirus'; 

     

	}

	public function index()
	{
        if($this->session->userdata('sesionIniciada') == true)
        {
            redirect("principal", "refresh");
        }

        if($this->input->post())
        {
           
            if($this->form_validation->run("login"))
            {
                //Obtenemos los datos del formulario de registro
                $userPOST = $this->input->post("txtUsuario"); 

               
                $passPOST = base64_decode($this->input->post("txtPassword"));

                $usuario = htmlspecialchars($userPOST);
                            
                $clave = $this->encrypt_password_callback($passPOST);

                $datos = $this->usuarios_model->getLogin($this->input->post("txtUsuario"), $clave);



                if($datos == true)
                {
                   
                    $this->form_validation->set_rules('captcha', 'Captcha', 'callback_validate_captcha');

                    $expiration = time()-600; 
                    $ip = $this->input->ip_address();
                    $captcha = $this->input->post('captcha');
                  
                    $this->usuarios_model->remove_old_captcha($expiration);
                    
                    $check = $this->usuarios_model->check($ip,$expiration,$captcha);

                    

                    if($check <> 1)
                    {
                        $this->session->set_userdata(array('sesionIniciada' => false));

                        $data = array('titulo' => 'Titulo','captcha' => $this->captcha());
                 
                        $this->session->set_userdata('captcha', $this->rand);

                        $this->session->set_flashdata('error', 'Check: No ha registrado correctamente los digitos de la imagen o la misma a expirado.');
                        redirect('login', 301);
                    }

                    $acceso = $this->usuarios_model->loginAccesoFichas($this->session->userdata('usuario'), '32');

                    if($acceso == true)
                    {
                        $auditor = array("usuario"=>$this->session->userdata('usuario'), "registroid"=>"0", "accion"=>"Login");

                        $this->load->model("Mantenimiento_model");

                        $this->Mantenimiento_model->auditoria($auditor);

                        $this->session->set_userdata('sesionIniciada', true);
                        $this->session->set_flashdata('success', 'Bienvenido (a) '.$this->session->userdata('nombres').': <br> Sesi&oacute;n iniciada con &eacute;xito.');

                        redirect('inicio', 301);
                    }else{
                        $this->session->set_flashdata('error', 'Usted no tiene acceso al módulo elegido.');
                        redirect('login', 301);
                    }
                }else{
                    $this->session->set_flashdata('error', 'El usuario no ha sido encontrado.');
                    redirect('login', 301);
                }
            }else{
                $this->data['captcha'] = $this->captcha();
         
                $this->session->set_userdata('captcha', $this->rand);

                $this->load->view($this->modulo.'login2.php', $this->data);   
            }
        }else{
            $modulo = "51";
            $estado = $this->usuarios_model->estado($modulo);

            if($estado->estado != '1'){
                $this->load->view($this->modulo.'mantenimiento.php');
            }else{
                $this->data['captcha'] = $this->captcha();
         
                $this->session->set_userdata('captcha', $this->rand);

                $this->load->view($this->modulo.'login.php', $this->data);                
            }            
        }
	}

    public function olvido()
    {
        if($this->input->post())
        {
            $resultado = $this->usuarios_model->olvido($this->input->post('txtEmail'));

            if($resultado == NULL)
            {
                $this->session->set_flashdata('error', 'La cuenta de correo ingresada no existe en nuestros registros.');
                redirect('login', 301);
            }

            if($this->recuperaClave($resultado,$this->input->post('txtEmail')) == true)
            {
                $this->session->set_flashdata('success', 'Se han enviado los resultados a su cuenta de correo.');
                redirect('login', 301);
            }else{
                $this->session->set_flashdata('error', 'Ha ocurrido un error, verifique que esté ingresando correctamente su cuenta de correo registrada.');
                redirect('login', 301);
            }
        }

        $this->load->view($this->modulo.'olvido.php');
    }

    public function logout()
    {

        $auditor = array("usuario"=>$this->session->userdata('usuario'), "registroid"=>"0", "accion"=>"Logout");

        $this->load->model("mantenimiento_model");

        $this->mantenimiento_model->auditoria($auditor);

        $sesiones = array('usuario', 'nombres', 'sesionIniciada', 'nivel', 'correo', 'estado');
        $this->session->unset_userdata($sesiones);
        $this->session->sess_destroy();
        
        $this->session->set_flashdata('success', 'Se cerró la sesión con éxito.');
        redirect('login', 'refresh');
    }

    public function sendMail($Asunto,$emailPara,$nombrePara,$email_de,$nombre_de, $body)
    {
        //cargamos la libreria email de ci
         $this->load->library("email");
         
         $this->email->from($email_de);
         $this->email->to($emailPara);
         $this->email->subject($Asunto);
         $this->email->message($body);
         $this->email->send();
    }

    public function recuperaClave($dato = null, $correo = null)
    {
        $body = "
        Saludos cordiales ".$dato->nombres.":<br/><br/>
        Recibe este mensaje como respuesta a su envío con motivo del olvido de su contraseña de acceso, de no haberlo solicitado comun&iacute;quelo 
        urgentemente al Centro Nacional de Epidemiolog&iacute;a, Prevención y Control de Enfermedades.
        <br/><br/>
        Agradecemos inmensamente vuestra siempre gentil colaboraci&oacute;n.<br/><br/>
        Usuario: <b>".$dato->usuario."</b><br/><br/>
        Contraseña: <b>".$dato->codigo."</b><br/><br/>
        Así mismo le sugerimos que confirme con los administradores del sistema, si su usuario cuenta con autorización de acceso a este aplicativo..<br/><br/>
        ESTE ES UN ENVIO AUTOMATICO, POR FAVOR NO RESPONDA A ESTE MENSAJE DE CORREO, PUEDE QUE 
        NO TENGA RESPUESTA ALGUNA.";
        
        $asunto = "Usted ha recibido un mensaje del Centro Nacional de Epidemiolog&iacute;a, Prevención y Control de Enfermedades.";
        $From = "notificacion@dge.gob.pe";
        $FromName = "Centro Nacional de Epidemiolog&iacute;a, Prevención y Control de Enfermedades";

        $this->sendMail($asunto,$correo,'',$From,$FromName,$body);

        return true;
    }  

    public function captcha()
    {

     /*   $path = './assets/captcha/';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }*/


        $conf_captcha = array(
            'word'   => $this->rand,
            'img_path' => './assets/captcha/',
            'img_url' =>  base_url('assets/captcha/'),
            'font_path' => realpath('assets/fonts/AlfaSlabOne-Regular.ttf'),
            'font_size' => 32,
            'img_width' => '210',
            'img_height' => 60, 
            'expiration' => 600
        );

        $cap = create_captcha($conf_captcha);
        
       
        $this->usuarios_model->insert_captcha($cap);
        
        return $cap;
    }

    public function validate_captcha()
    {
 
        if($this->input->post('captcha') != $this->session->userdata('captcha'))
        {
            $this->form_validation->set_message('validate_captcha', 'Error');
            return false;
        }else{
            return true;
        }
    }

    public function encrypt_password_callback($id = null) 
    {
        $clave = md5($id);

        return $clave;
    }

    public function get_nombre_usuario()
    {
        $usuario = $this->input->post("dni");

        $datos = $this->usuarios_model->usuario($usuario);

        echo json_encode($datos);
    }
}
