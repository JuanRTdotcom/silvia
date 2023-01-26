<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
Autor: Anibal Urbiola Ayquipa
Fecha: 07/10/2020

En este modelo se trabajaran todos los métodos que tienen que ver con el trabajo de acceso de usuarios.
Login, manejo de sesiones, captcha, etc.
*/
class Usuarios_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->db_noti = $this->load->database('notiweb', true);
    }

    /*
    Autor: Anibal Urbiola
    Fecha: 07/10/2020
    Método para el logeo del usuario
    */
    function getLogin($usuario, $clave)
    {
    	$datoValidar = array(
            'usuario'       => $usuario,
            'clave'         => $clave,
            'estado'        => '1'
    	); 

    	$validado = $this->db_noti->get_where('usuarios_frontend', $datoValidar);

    	if ($validado->num_rows() == 1){
        	foreach ($this->credencial($usuario)->result() as $usuarioValidado) {
                switch ($usuarioValidado->nivel) {
                    case '1':
                        $nivelUsuario = "Administrador";
                        break;
                     case '4':
                        $nivelUsuario = "Nacional";
                        break;
                     case '5':
                        $nivelUsuario = "DIRESA";
                        break;
                     case '6':
                        $nivelUsuario = "Red";
                        break;
                     case '7':
                        $nivelUsuario = "Microred";
                        break;
                     case '8':
                        $nivelUsuario = "Establecimiento";
                        break;
                }

                $idusuario      = $usuarioValidado->registroId;
				$usuario        = $usuarioValidado->usuario;
                $nivel          = $usuarioValidado->nivel;
                $nivelUsuario   = $nivelUsuario;
                $institucion    = $usuarioValidado->institucion;
                $insti          = $usuarioValidado->insti;
                $diresa         = $usuarioValidado->diresa;
                $red            = $usuarioValidado->red;
                $microred       = $usuarioValidado->microred;
                $establec       = $usuarioValidado->establecimiento;
				$nombres        = $usuarioValidado->nombres;
				$correo         = $usuarioValidado->email;
                $celular        = $usuarioValidado->celular;
				$estado         = $usuarioValidado->estado;
			}
			
			$datoSesion = array(
                'usuario'      => $usuario,
                'nombres'      => $nombres,
                'nivel'        => $nivel,
                'nivelUsuario' => $nivelUsuario,
                'institucion'  => $institucion,
                'insti'        => $insti,
                'diresa'       => $diresa,
                'red'          => $red,
                'microred'     => $microred,
                'establec'     => $establec,
                'correo'       => $correo,
                'celular'      => $celular,
                'estado'       => $estado,
				'id_usuario'   => $idusuario
			);

            $this->session->set_userdata($datoSesion);
			
            return TRUE;
    	}else{
            return FALSE;
    	}
    }

    /*
    Autor: Anibal Urbiola
    Fecha: 07/10/2020
    Método para verificar que la sesión esté activa
    */
	function _sesionIniciada() 
	{
		$usuario = $this->session->userdata('usuario');
		$sesionIniciada = $this->session->userdata('sesionIniciada');

		if( ! isset($sesionIniciada) || $sesionIniciada === FALSE || ! isset($usuario) || $usuario == '' ) 
		{
			return FALSE;			
		}
		else 
		{
			return TRUE;
		}
	}

    /*
    Autor: Anibal Urbiola
    Fecha: 07/10/2020
    Método para la verificación de las credenciales del usuario
    */
	function credencial($usuario)
    {
    	return $this->db_noti
                ->select("*")
    			->from('usuarios_frontend')
    			->where('usuario', $usuario)
    			->get();
    }  

    /*
    Autor: Anibal Urbiola
    Fecha: 07/10/2020
    Método para obtener los datos del usuarios cuando se haya olvidado de ellos
    */
    function olvido($dato = null)
    {
        $where = array("email"=>$dato, "estado"=>"1");

        $query = $this->db_noti
                ->select("usuario, codigo, nombres")
                ->from('usuarios_frontend')
                ->where($where)
                ->get();

        return $query->row();

    }

    /*
    Autor: Anibal Urbiola
    Fecha: 07/10/2020
    Método para verificar la autorización de acceso del usuario a la ficha de investigación
    */
    function loginAccesoFichas($usuario=null, $aplicacion=null)
    {
        $where = array("usuario"=>$usuario, "aplicacion"=>$aplicacion, "estado"=>"1");
        
        $query = $this->db_noti
                ->select("*")
                ->from('tablaccesos')
                ->where($where)
                ->get();

        $permisos = $query->row();

        if ($query->num_rows() == 1){
            $grabar = $permisos->grabar;
            $ver = $permisos->ver;
            $modificar = $permisos->modificar;
            $eliminar = $permisos->eliminar;
            $descarga = $permisos->descargar;
            
            $datoSesion = array(
            'grabar' => $grabar,
            'ver' => $ver,
            'modificar' => $modificar,
            'eliminar' => $eliminar,
            'descarga' => $descarga
            );

            $this->session->set_userdata($datoSesion);
            
            return TRUE;
        }else{
            return FALSE;
        }

        return $query->num_rows();
    }

    /*
    Autor: Anibal Urbiola
    Fecha: 07/10/2020
    Método para el cambio de la contraseña a solicitud del usuario
    */
    function modificarAcceso($id, $data)
    {
        $this->db_noti->where(array("usuario"=>$id));
        $this->db_noti->update("usuarios_frontend", $data);

        return true;
    }

    /*
    Autor: Anibal Urbiola
    Fecha: 07/10/2020
    Método para verificar el estado del aplicativo
    */
    public function estado($id)
    {
        $modulo = array("aplicacion" => $id);

        $query = $this->db_noti->get_where('aplicaciones', $modulo);

        return $query->row();
    }


    /*
    Autor: Anibal Urbiola
    Fecha: 07/10/2020
    Método para el registro del código captcha en la base de datos y en la carpeta asignada a estos archivos
    */
    public function insert_captcha($cap)
    {
        //insertamos el captcha en la bd
        $data = array(
            'captcha_time' => $cap['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $cap['word']
            );

        $query = $this->db_noti->insert_string('captcha', $data);
        $this->db_noti->query($query);
 
    }
 
    /*
    Autor: Anibal Urbiola
    Fecha: 07/10/2020
    Método para remover los códigos captcha ya vencidos de la base de datos y la carpeta
    */
    public function remove_old_captcha($expiration)
    {
        //eliminamos los registros de la base de datos cuyo 
        //captcha_time sea menor a expiration
        $this->db_noti->where('captcha_time <',$expiration);
        $this->db_noti->delete('captcha');
 
    }
 
    /*
    Autor: Anibal Urbiola
    Fecha: 07/10/2020
    Método que verifica la existencia del código captcha
    */
    public function check($ip,$expiration,$captcha)
    {
        //comprobamos si existe un registro con los datos
        //envíados desde el formulario
        $this->db_noti->where('word',$captcha);
        $this->db_noti->where('ip_address',$ip);
        $this->db_noti->where('captcha_time >',$expiration);
 
        $query = $this->db_noti->get('captcha');
        //devolvemos el número de filas que coinciden
        return $query->num_rows();
    }

    /*
    Autor: Anibal Urbiola
    Fecha: 07/10/2020
    Método para obtener los datos del usuario
    */
    public function usuario($dato = null)
    {
        $where = array('usuario'=>$dato);

        $query =  $this->db_noti
                            ->select("usuario, nombres")
                            ->from('usuarios_frontend')
                            ->where($where)
                            ->get();

        return $query->row();
    }
}