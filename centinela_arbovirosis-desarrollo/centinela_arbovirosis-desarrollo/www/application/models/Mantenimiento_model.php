<?php 
/*
Autor: Anibal Urbiola Ayquipa
Fecha: 07/10/2020

En este modelo se administrará métodos específicos para el mantenimiento general de los componentes de la aplicación
*/

class Mantenimiento_model extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }

    function auditoria($dato = null)
    {
        
        $registro = "";

        $ejecuta = $_SERVER['REQUEST_URI'];

        $last_page = $_SERVER['HTTP_REFERER'];
        
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        if (!empty($_SERVER['HTTP_CLIENT_IP']))   
        {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
        {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }

        $data = array(
	        		"ipentrada"=>$ip_address, 
	        		"usuario"=>$dato['usuario'], 
	        		"fecha"=>date("Y-m-d H:m:s"), 
	        		"browser"=>$user_agent, 
                    "ejecuta"=>$ejecuta,
	        		"pagina"=>$last_page, 
	        		"accion"=>$dato['accion'],
	        		"id"=>$dato['registroid'],
	        		"anio"=>date("Y"),
	        		"mes"=>date("m")
        		);

        $this->db->insert("auditoria", $data);

        return true;
    }

    public function arreglarFechas($param1){
        $fecha1=substr($param1,0,2);
        $fecha2=substr($param1,3,2);
        $fecha3=substr($param1,6,4);
        $fecha=$fecha3."-".$fecha2."-".$fecha1;
        if($fecha=='--'){$fecha=null;}
        return $fecha;
    }
    
    public function modificarFechas($param1){
        $fecha1=substr($param1,0,4);
        $fecha2=substr($param1,5,2);
        $fecha3=substr($param1,8,2);
        $fecha=$fecha3."-".$fecha2."-".$fecha1;
        if($fecha=='--'){$fecha=null;}
        return $fecha;
    } 

    function validarFecha($date, $format = 'Y-m-d H:i:s')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public function getAnioSem($fecha = null)
    {
        $dato = $this->arreglarFechas($fecha);

        $strquery="SELECT YEAR('".$dato."') anio, WEEK('".$dato."',6) AS semana";

        $query = $this->db->query($strquery);

        return $query->row();    
    }

    function eliminacion_logica_ficha($id)
    {

        $datos = array( 
            'usuario_eli'=>$this->session->userdata("usuario"),
            'fecha_eli'=>date("Y-m-d H:i:s")
        );
         
        $this->db->where('id', $id); 
        $this->db->update('coronavirus', $datos);
    }   

    public function getAllforDropdown($tabla, $c1, $c2, $_where='', $_order_by='', $textSelect, $index0, $base="")
    {
        $where = ($_where == '') ? '' : " WHERE $_where ";
        $order_by = ($_order_by == '') ? '' : " ORDER BY $_order_by";
        $sentencia = "SELECT $c1, $c2 FROM $base.$tabla $where $order_by";
//echo $sentencia;
        $data = $this->db->query($sentencia);
        $result = null;
        ($index0 == 1)? $result[""] = $textSelect : '';

        if(!empty($data)){
            foreach ($data->result() as $val) {
                $result[$val->$c1] = $val->$c2;
            }
        }else{
            
//            $result = array($c1=>'', $c2=>'');
        }

        return $result;
    }

    public function getAllforValue($tabla, $c1, $c2, $_where='', $_order_by='', $textSelect, $index0, $base="")
    {
        $where = ($_where == '') ? '' : " WHERE $_where ";
        $order_by = ($_order_by == '') ? '' : " ORDER BY $_order_by";
        $sentencia = "SELECT $c1, $c2 FROM $base.$tabla $where $order_by";

        $data = $this->db->query($sentencia);

        ($index0 == 1)? $result[""] = $textSelect : '';

        if($data->num_rows() > 0){
            $result = $data;
        }else{
            $result = array();
        }

        return $result;
    }

    public function _listarUpss()
    {
        
        $query = $this->db->get('iaas_upss');

        return $query;
    }

 

    public function getUpss($id)
    {
        $where = array("id"=>$id);
        
        $query = $this->db->get_where('iaas_upss', $where);

        return $query->row();
    }    

    public function getUpssEst($id)
    {
        $where = array("id"=>$id);
        
        $query = $this->db->get_where('iaas_upss_est', $where);

        return $query->row();
    }    

    public function insUpss($datos = array())
    {
        $this->db->insert("iaas_upss", $datos);
        return true;
    }

    

    public function insUpssEst($datos = array())
    {
        $this->db->insert("iaas_upss_est", $datos);
        return true;
    }
    
    public function modUpss($modificar=array(), $id)
    {
        $where = array("id"=>$id);

        $query = $this->db->where($where)
                        ->update('iaas_upss',$modificar);
        return true;
    }

    public function modUpssEst($modificar=array(), $id)
    {
        $where = array("id"=>$id);

        $query = $this->db->where($where)
                        ->update('iaas_upss_est',$modificar);
        return true;
    }

    public function delUpss($id = null)
    {
        $where = array('id'=>$id);

        $this->db->delete('iaas_upss', $where);

        return true;
    }

    public function delUpssEst($data,$id)
    {
        
             $this->db->where('id', $id);
       
            return $this->db->update('iaas_upss_est', $data);
        
    }

  

    public function getServicios($id)
    {
        $where = array("id"=>$id);
        
        $query = $this->db->get_where('iaas_servicio', $where);

        return $query->row();
    }    

    public function insServicios($datos = array())
    {
        $this->db->insert("iaas_servicio", $datos);
        return true;
    }
    
    public function modServicios($modificar=array(), $id)
    {
        $where = array("id"=>$id);

        $query = $this->db->where($where)
                        ->update('iaas_servicio',$modificar);
        return true;
    }

    public function delServicios($data,$id)
    {
   

        $this->db->where('id', $id);
       
        return $this->db->update('iaas_servicio', $data);
    }

   

    public function getSalas($id)
    {
        $where = array("id"=>$id);
        
        $query = $this->db->get_where('iaas_sala', $where);

        return $query->row();
    }    

    public function insSalas($datos = array())
    {
        $this->db->insert("iaas_sala", $datos);
        return true;
    }
    
    public function modSalas($modificar=array(), $id)
    {
        $where = array("id"=>$id);

        $query = $this->db->where($where)
                        ->update('iaas_sala',$modificar);
        return true;
    }

    public function delSalas($data,$id)
    {
        $this->db->where('id', $id);
       
        return $this->db->update('iaas_sala', $data);
    }

    public function get_registros_establec()
    {
        ini_set('max_execution_time', -1); 
        ini_set("memory_limit", "4024M");
		
		$sql = "select r.cod_est as Id, raz_soc as Nombre, Categoria, Renaes, (case when ifnull(ipressID,0) = 0 then 'DESACTIVADO' else 'ACTIVADO' end) as Estado
				from notiweb.renace r
					left join iaas_ipress i on r.cod_est = i.ipressID
				where r.categoria = 'I-4' or left(r.categoria,2) = 'II'";
		
		$demas = " order by r.cod_est asc";
		
		$query = $this->db->query( $sql.$demas );
		
		return $query;

    }

    public function numRegistrosEstablec()
    {
        $sql = "select count(*) as cantidad from notiweb.renace
				where categoria = 'I-4' or left(categoria,2) = 'II'";

		$query = $this->db->query( $sql );            

        return $query->row();
    }

    public function _listarEstablec($limit,$start,$col,$dir)
    {
        ini_set('max_execution_time', -1); 
        ini_set("memory_limit", "4024M");
		
		$sql = "select r.cod_est as id, raz_soc as nombre, categoria, renaes, (case when ifnull(ipressID,0) = 0 then 'DESACTIVADO' else 'ACTIVADO' end) as estado
				from notiweb.renace r
					left join iaas_ipress i on r.cod_est = i.ipressID
				where r.categoria = 'I-4' or left(r.categoria,2) = 'II'";
		
		$demas = " order by ".$col." ".$dir." limit ".$start.",".$limit;
		
		$query = $this->db->query( $sql.$demas );
		
		return $query->result();

    }

    public function listarEstablecSearch($limit,$start,$search,$col,$dir)
    {
        ini_set('max_execution_time', -1); 
        ini_set("memory_limit", "4024M");

		$sql = "select cod_est as id, raz_soc as nombre, categoria, renaes, (case when ifnull(ipressID,0) = 0 then 'DESACTIVADO' else 'ACTIVADO' end) as estado
				from notiweb.renace r
					left join iaas_ipress i on r.cod_est = i.ipressID
				where (r.categoria = 'I-4' or left(r.categoria,2) = 'II')";

        $searchQuery = " and (cod_est like '".$search."%' or raz_soc like '%".$search."%' or categoria like '".$search."%')";

        $demas = " order by ".$col." ".$dir." limit ".$start.",".$limit;        

		$query = $this->db->query( $sql.$searchQuery.$demas );

        return $query->result();
    }

    public function listarEstablecSearchCount($search)
    {
        ini_set('max_execution_time', -1); 
        ini_set("memory_limit", "4024M");

		$sql = "select cod_est as id, raz_soc as nombre, categoria, renaes, (case when ifnull(ipressID,0) = 0 then 'DESACTIVADO' else 'ACTIVADO' end) as estado
				from notiweb.renace r
					left join iaas_ipress i on r.cod_est = i.ipressID
				where (r.categoria = 'I-4' or left(r.categoria,2) = 'II')";

        $searchQuery = " and (cod_est like '".$search."%' or raz_soc like '%".$search."%' or categoria like '".$search."%')";

        $demas = $searchQuery;

		$query = $this->db->query( $sql.$demas );

        return $query->num_rows();
    }    

    public function insEstablec($datos = array())
    {
        $this->db->insert("iaas_ipress", $datos);
        return true;
    }

    public function delEstablec($id = null)
    {
        $where = array('ipressID'=>$id);

        $this->db->delete('iaas_ipress', $where);

        return true;
    }

    public function numRegistrosUsuarios()
    {
        $sql = "select count(*) as cantidad from notiweb.tablaccesos
        where aplicacion = 32";

		$query = $this->db->query( $sql );            

        return $query->row();
    }

    public function _listarUsuarios($limit,$start,$col,$dir)
    {
        //				where r.cod_est = '130101A101'
        ini_set('max_execution_time', -1); 
        ini_set("memory_limit", "4024M");
		
		/*$sql = "select usuario as id, nombres as nombre, dni, email, celular, caduca, (case when ifnull(userID,0) = 0 then 'DESACTIVADO' else 'ACTIVADO' end) as estado
				from notiweb.usuarios_frontend r	
				where estado = 1";*/
                $sql= "SELECT u.usuario as id, u.nombres as nombre, u.dni, u.email, u.celular, u.caduca, (case when a.estado = 0 then 'DESACTIVADO' else 'ACTIVADO' end) as estado 
                FROM notiweb.tablaccesos a
                inner join notiweb.usuarios_frontend u on u.usuario = a.usuario
                where a.aplicacion = '32' ";

                //left join iaas_usuario i on r.usuario = i.userID
		
		$demas = " order by ".$col." ".$dir." limit ".$start.",".$limit;
		
		$query = $this->db->query( $sql.$demas );
		
		return $query->result();

    }

    public function listarUsuariosSearch($limit,$start,$search,$col,$dir)
    {
        ini_set('max_execution_time', -1); 
        ini_set("memory_limit", "4024M");

		/*$sql = "select usuario as id, nombres as nombre, dni, email, celular, caduca, (case when ifnull(userID,0) = 0 then 'DESACTIVADO' else 'ACTIVADO' end) as estado
				from notiweb.usuarios_frontend r
					left join iaas_usuario i on r.usuario = i.userID
				where estado = 1";*/

                $sql= "SELECT u.usuario as id, u.nombres as nombre, u.dni, u.email, u.celular, u.caduca, (case when a.estado = 0 then 'DESACTIVADO' else 'ACTIVADO' end) as estado 
                FROM notiweb.tablaccesos a
                inner join notiweb.usuarios_frontend u on u.usuario = a.usuario
                where a.aplicacion = '32' ";

        $searchQuery = " and (u.usuario like '".$search."%' or u.nombres like '%".$search."%' or u.dni like '".$search."%' or u.email like '".$search."%' or u.celular like '".$search."%')";

        $demas = " order by ".$col." ".$dir." limit ".$start.",".$limit;        

		$query = $this->db->query( $sql.$searchQuery.$demas );

        return $query->result();
    }

    public function listarUsuariosSearchCount($search)
    {
        ini_set('max_execution_time', -1); 
        ini_set("memory_limit", "4024M");

        $sql= "SELECT u.usuario as id, u.nombres as nombre, u.dni, u.email, u.celular, u.caduca, (case when a.estado = 0 then 'DESACTIVADO' else 'ACTIVADO' end) as estado 
        FROM notiweb.tablaccesos a
        inner join notiweb.usuarios_frontend u on u.usuario = a.usuario
        where a.aplicacion = '32' ";

        $searchQuery = " and (u.usuario like '".$search."%' or u.nombres like '%".$search."%' or u.dni like '".$search."%' or u.email like '".$search."%' or u.celular like '".$search."%')";

        $demas = $searchQuery;

		$query = $this->db->query( $sql.$demas );

        return $query->num_rows();
    }    

    public function insUsuarioIaas($datos = array())
    {
        $this->db->insert("iaas_usuario", $datos);
        return true;
    }

    public function insUsuarioAccesos($datos = array())
    {
        $this->db->insert("notiweb.tablaccesos", $datos);
        return true;
    }

    public function desactivarUsuIaas($data,$id)
    {
   
        $this->db->where('userID', $id);
		return $this->db->update('iaas_usuario', $data);

        
    }

    public function desactivarUsuAcceso($data,$id)
	{

         $this->db->where(array('usuario' => $id,'aplicacion' => '32'));
		return $this->db->update('notiweb.tablaccesos', $data);
	}

    public function _listarUpssEstablec()
    {
        $insti = $this->session->userdata("insti");
		$ipress = $this->session->userdata("establec");
		
		$query = $this->db
                    ->select('iaas_upss.id as id, iaas_upss.nombre as nombre')
                    ->from('iaas_ipress_upss')
                    ->join('iaas_upss', 'iaas_ipress_upss.upssID = iaas_upss.id')
					->where("iaas_ipress_upss.institucionID = '$insti' and iaas_ipress_upss.ipressID = '$ipress'")
					->order_by('iaas_upss.nombre')
                    ->get();

        return $query;
    }

    public function insUpssEstablec($datos = array())
    {
        $this->db->insert("iaas_ipress_upss", $datos);
        return true;
    }

    public function delUpssEstablec($id = null)
    {
        $where = array('upssID'=>$id, 'institucionID'=>$this->session->userdata("insti"), 'ipressID'=>$this->session->userdata("establec"));

        $this->db->delete('iaas_ipress_upss', $where);

        return true;
    }

    public function _listarDispTipoIaas()
    {
		$query = $this->db
                    ->select("CONCAT(iaas_tipo_dispositivo_medico.tipo_iaas_ID,'-',iaas_tipo_dispositivo_medico.dispositivo_medico_ID) as id, iaas_tipo.nombre as tipo, iaas_dispositivo_medico.nombre as dispo")
                    ->from('iaas_tipo_dispositivo_medico')
                    ->join('iaas_tipo', 'iaas_tipo_dispositivo_medico.tipo_iaas_ID = iaas_tipo.id')
                    ->join('iaas_dispositivo_medico', 'iaas_tipo_dispositivo_medico.dispositivo_medico_ID = iaas_dispositivo_medico.id')
					->order_by('iaas_tipo.nombre, iaas_dispositivo_medico.nombre')
                    ->get();

        return $query;
    }

    public function insDispTipoIaas($datos = array())
    {
        $this->db->insert("iaas_tipo_dispositivo_medico", $datos);
        return true;
    }

    public function delDispTipoIaas($id = null)
    {
        $where = array("CONCAT(tipo_iaas_ID,'-',dispositivo_medico_ID)"=>$id);

        $this->db->delete('iaas_tipo_dispositivo_medico', $where);

        return true;
    }

    public function _listarTipoIaasUpss()
    {
        $where = array("iaas_upss_tipoiass_dispositivo.estado" => '1');
		$query = $this->db
                    ->select("registroID as id, iaas_tipo.nombre as tipo, iaas_upss.nombre as upss,iaas_dispositivo_medico.nombre as dispositivo,ipm.nombre as procedimiento,itc.nombre as cirugia")
                    ->from('iaas_upss_tipoiass_dispositivo')
                    ->join('iaas_tipo', 'iaas_upss_tipoiass_dispositivo.tipo_iaas_ID = iaas_tipo.id')
                    ->join('iaas_upss', 'iaas_upss_tipoiass_dispositivo.upssID = iaas_upss.id')
                    ->join('iaas_dispositivo_medico', 'iaas_upss_tipoiass_dispositivo.dispositivo_medico_ID = iaas_dispositivo_medico.id','left')
                    ->join('iaas_procedimiento_medico ipm', 'iaas_upss_tipoiass_dispositivo.iCodProMedico = ipm.id','left')
                    ->join('iaas_tipo_cirugia itc', 'iaas_upss_tipoiass_dispositivo.iCodTipoCirugia = itc.id','left')
					->order_by('iaas_upss.id, iaas_tipo.id')
                    ->where($where)
                    ->get();

        return $query;
    }

    public function insTipoIaasUpss($datos = array())
    {
        $this->db->insert("iaas_upss_tipoiass_dispositivo", $datos);
        return true;
    }

    public function delUppsTipoIaasDispositivos($data,$id)
    {
   
        $this->db->where('registroID', $id);
		return $this->db->update('iaas_upss_tipoiass_dispositivo', $data);

        
    }

    public function delTipoIaasUpss($id = null)
    {
        $where = array("CONCAT(tipo_iaas_ID,'-',upssID)"=>$id);

        $this->db->delete('iaas_tipo_upss', $where);

        return true;
    }

    public function _listarTipoiaas()
    {
        $query = $this->db->get('iaas_tipo');

        return $query;
    }

    public function getTipoiaas($id)
    {
        $where = array("id"=>$id);
        
        $query = $this->db->get_where('iaas_tipo', $where);

        return $query->row();
    }    

    public function insTipoiaas($datos = array())
    {
        $this->db->insert("iaas_tipo", $datos);
        return true;
    }
    
    public function modTipoiaas($modificar=array(), $id)
    {
        $where = array("id"=>$id);

        $query = $this->db->where($where)
                        ->update('iaas_tipo',$modificar);
        return true;
    }

    public function delTipoiaas($id = null)
    {
        $where = array('id'=>$id);

        $this->db->delete('iaas_tipo', $where);

        return true;
    }

    public function _listarEventos()
    {
		$query = $this->db
                    ->select('CONCAT(iaas_upss.id,"-",iaas_tipo_upss.tipo_iaas_ID,"-",iaas_tipo_dispositivo_medico.dispositivo_medico_ID) as id, iaas_upss.nombre as upss, iaas_tipo.nombre as iaas, iaas_dispositivo_medico.nombre as disp, (CASE WHEN i.upssID is null THEN "ACTIVADO" ELSE "DESACTIVADO" END) as estado')
                    ->from('iaas_upss')
                    ->join('iaas_tipo_upss', 'iaas_upss.id = iaas_tipo_upss.upssID')
                    ->join('iaas_tipo', 'iaas_tipo.id = iaas_tipo_upss.tipo_iaas_ID')
                    ->join('iaas_tipo_dispositivo_medico', 'iaas_tipo_upss.tipo_iaas_ID = iaas_tipo_dispositivo_medico.tipo_iaas_ID')
					->join('iaas_dispositivo_medico', 'iaas_dispositivo_medico.id = iaas_tipo_dispositivo_medico.dispositivo_medico_ID')
					->join('iaas_dispositivo_inactivo_establecimiento i', 'i.upssID = iaas_tipo_upss.upssID', 'left')
					->order_by('iaas_upss.nombre, iaas_tipo.nombre, iaas_dispositivo_medico.nombre')
                    ->get();

        return $query;

    }

    public function getEventos($id)
    {
      $where = array('CONCAT(iaas_upss.id,"-",iaas_tipo_upss.tipo_iaas_ID,"-",iaas_tipo_dispositivo_medico.dispositivo_medico_ID)'=>$id);

//        $query = $this->db->get_where('iaas_upss', $where);

		$query = $this->db
                    ->select('CONCAT(iaas_upss.id,"-",iaas_tipo_upss.tipo_iaas_ID,"-",iaas_tipo_dispositivo_medico.dispositivo_medico_ID) as id, iaas_upss.id as upssID, iaas_tipo_upss.tipo_iaas_ID, iaas_tipo_dispositivo_medico.dispositivo_medico_ID, iaas_upss.nombre as upss, iaas_tipo.nombre as iaas, iaas_dispositivo_medico.nombre as disp, (CASE WHEN i.upssID is null THEN "1" ELSE "2" END) as estado')
                    ->from('iaas_upss')
                    ->join('iaas_tipo_upss', 'iaas_upss.id = iaas_tipo_upss.upssID')
                    ->join('iaas_tipo', 'iaas_tipo.id = iaas_tipo_upss.tipo_iaas_ID')
                    ->join('iaas_tipo_dispositivo_medico', 'iaas_tipo_upss.tipo_iaas_ID = iaas_tipo_dispositivo_medico.tipo_iaas_ID')
					->join('iaas_dispositivo_medico', 'iaas_dispositivo_medico.id = iaas_tipo_dispositivo_medico.dispositivo_medico_ID')
					->join('iaas_dispositivo_inactivo_establecimiento i', 'i.upssID = iaas_tipo_upss.upssID', 'left')
					->where($where)
                    ->get();

        return $query->row();
    }    

    public function insEventos($datos = array(), $id, $estado_ant, $estado_act)
    {
        if ($estado_ant == $estado_act)		return true;

		if ($estado_act == 1){
			$where = array('CONCAT(upssID,"-",tipo_iaas_ID,"-",dispositivo_medico_ID)'=>$id, 'ipressID'=>$this->session->userdata("establec"));

			$this->db->delete('iaas_dispositivo_inactivo_establecimiento', $where);			
		}
		
		if ($estado_act == 2){
//			$where = array('CONCAT(upssID,"-",tipo_iaas_ID,"-",dispositivo_medico_ID)'=>$id, 'ipressID'=>$this->session->userdata("establec"));

//			$this->db->delete('iaas_dispositivo_inactivo_establecimiento', $where);			

			$this->db->insert("iaas_dispositivo_inactivo_establecimiento", $datos);
		}
        return true;
    }
    
    public function delEventos($id = null)
    {
        $where = array('id'=>$id);

        $this->db->delete('iaas_servicio_dispositivo_medico', $where);

        return true;
    }



    public function listarAntimicrobianos()
    {
        $query = $this->db->get('iaas_antimicrobiano');

        return $query;
    }

    public function getAntimicrobianos($id)
    {
        $where = array("id"=>$id);
        
        $query = $this->db->get_where('iaas_antimicrobiano', $where);

        return $query->row();
    }    

    public function insAntimicrobiano($datos = array())
    {
        $this->db->insert("iaas_antimicrobiano", $datos);
        return true;
    }
    
    public function modAntimicrobiano($modificar=array(), $id)
    {
        $where = array("id"=>$id);

        $query = $this->db->where($where)
                        ->update('iaas_antimicrobiano',$modificar);
        return true;
    }

    public function delAntimicrobiano($id = null)
    {
        $where = array('id'=>$id);

        $this->db->delete('iaas_antimicrobiano', $where);

        return true;
    }

    public function listarDispmedicos()
    {
        $query = $this->db->get('iaas_dispositivo_medico');

        return $query;
    }

    public function getDispmedicos($id)
    {
        $where = array("id"=>$id);
        
        $query = $this->db->get_where('iaas_dispositivo_medico', $where);

        return $query->row();
    }    

    public function insDispmedicos($datos = array())
    {
        $this->db->insert("iaas_dispositivo_medico", $datos);
        return true;
    }
    
    public function modDispmedicos($modificar=array(), $id)
    {
        $where = array("id"=>$id);

        $query = $this->db->where($where)
                        ->update('iaas_dispositivo_medico',$modificar);
        return true;
    }

    public function delDispmedicos($id = null)
    {
        $where = array('id'=>$id);

        $this->db->delete('iaas_dispositivo_medico', $where);

        return true;
    }

    public function listarClasesasas()
    {
        $query = $this->db->get('iaas_clase_asa');

        return $query;
    }

    public function getClasesasa($id)
    {
        $where = array("id"=>$id);
        
        $query = $this->db->get_where('iaas_clase_asa', $where);

        return $query->row();
    }    

    public function insClasesasa($datos = array())
    {
        $this->db->insert("iaas_clase_asa", $datos);
        return true;
    }
    
    public function modClasesasa($modificar=array(), $id)
    {
        $where = array("id"=>$id);

        $query = $this->db->where($where)
                        ->update('iaas_clase_asa',$modificar);
        return true;
    }

    public function delClasesasa($id = null)
    {
        $where = array('id'=>$id);

        $this->db->delete('iaas_clase_asa', $where);

        return true;
    }

    public function listarClasesheridas()
    {
        $query = $this->db->get('iaas_clase_herida');

        return $query;
    }

    public function getClasesheridas($id)
    {
        $where = array("id"=>$id);
        
        $query = $this->db->get_where('iaas_clase_herida', $where);

        return $query->row();
    }    

    public function insClasesheridas($datos = array())
    {
        $this->db->insert("iaas_clase_herida", $datos);
        return true;
    }
    
    public function modClasesheridas($modificar=array(), $id)
    {
        $where = array("id"=>$id);

        $query = $this->db->where($where)
                        ->update('iaas_clase_herida',$modificar);
        return true;
    }

    public function delClasesheridas($id = null)
    {
        $where = array('id'=>$id);

        $this->db->delete('iaas_clase_herida', $where);

        return true;
    }

    public function listarTiposCirugias()
    {
        $query = $this->db->get('iaas_tipo_cirugia');

        return $query;
    }

    public function getTiposCirugias($id)
    {
        $where = array("id"=>$id);
        
        $query = $this->db->get_where('iaas_tipo_cirugia', $where);

        return $query->row();
    }    

    public function insTiposCirugias($datos = array())
    {
        $this->db->insert("iaas_tipo_cirugia", $datos);
        return true;
    }
    
    public function modTiposCirugias($modificar=array(), $id)
    {
        $where = array("id"=>$id);

        $query = $this->db->where($where)
                        ->update('iaas_tipo_cirugia',$modificar);
        return true;
    }

    public function delTiposCirugias($id = null)
    {
        $where = array('id'=>$id);

        $this->db->delete('iaas_tipo_cirugia', $where);

        return true;
    }

    public function listarProcedimientos()
    {
        $query = $this->db->get('iaas_procedimiento_medico');

        return $query;
    }

    public function getProcedimientos($id)
    {
        $where = array("id"=>$id);
        
        $query = $this->db->get_where('iaas_procedimiento_medico', $where);

        return $query->row();
    }   

    public function insProcedimientos($datos = array())
    {
        $this->db->insert("iaas_procedimiento_medico", $datos);
        return true;
    }
    
    public function modProcedimientos($modificar=array(), $id)
    {
        $where = array("id"=>$id);

        $query = $this->db->where($where)
                        ->update('iaas_procedimiento_medico',$modificar);
        return true;
    }

    public function delProcedimientos($id = null)
    {
        $where = array('id'=>$id);

        $this->db->delete('iaas_procedimiento_medico', $where);

        return true;
    }

    public function _listarCriterios()
    {
        
        $query = $this->db
                    ->select('iaas_criterio.id as id, iaas_criterio.nombre, iaas_tipo.nombre as iaas, iaas_criterio.estado as estado')
                    ->from('iaas_criterio')
                    ->join('iaas_tipo', 'iaas_criterio.tipo_iaas_ID=iaas_tipo.id')
					->order_by('iaas_tipo.id, iaas_criterio.id')
                    ->get();

        return $query;
    }

    public function getCriterios($id)
    {
        $where = array("id"=>$id);
        
        $query = $this->db->get_where('iaas_criterio', $where);

        return $query->row();
    }    

    public function insCriterios($datos = array())
    {
        $this->db->insert("iaas_criterio", $datos);
        return true;
    }
    
    public function modCriterios($modificar=array(), $id)
    {
        $where = array("id"=>$id);

        $query = $this->db->where($where)
                        ->update('iaas_criterio',$modificar);
        return true;
    }

    public function delCriterios($id = null)
    {
        $where = array('id'=>$id);

        $this->db->delete('iaas_criterio', $where);

        return true;
    }












    public function listarOpciones()
    {
        $query = $this->db
                    ->select('opciones.id, preguntas.descripcion as pregunta, opciones.descripcion, opciones.estado')
                    ->from('opciones')
                    ->join('preguntas', 'preguntas.id=opciones.pregunta')
                    ->get();

        return $query;
    }

    public function getOpciones($id)
    {
        $where = array("id"=>$id);
        
        $query = $this->db->get_where('opciones', $where);

        return $query->row();
    }    

    public function insOpciones($datos = array())
    {
        $this->db->insert("opciones", $datos);
        return true;
    }
    
    public function modOpciones($modificar=array(), $id)
    {
        $where = array("id"=>$id);

        $query = $this->db->where($where)
                        ->update('opciones',$modificar);
        return true;
    }

    public function delOpciones($id = null)
    {
        $where = array('id'=>$id);

        $this->db->delete('opciones', $where);

        return true;
    }

    public function listarGeneral()
    {
        $query = $this->db->get('signo_sintoma_general');

        return $query;
    }

    public function getGeneral($id)
    {
        $where = array("id"=>$id);
        
        $query = $this->db->get_where('signo_sintoma_general', $where);

        return $query->row();
    }    

    public function insGeneral($datos = array())
    {
        $this->db->insert("signo_sintoma_general", $datos);
        return true;
    }
    
    public function modGeneral($modificar=array(), $id)
    {
        $where = array("id"=>$id);

        $query = $this->db->where($where)
                        ->update('signo_sintoma_general',$modificar);
        return true;
    }

    public function delGeneral($id = null)
    {
        $where = array('id'=>$id);

        $this->db->delete('signo_sintoma_general', $where);

        return true;
    }

    public function listarEspecifico()
    {
        $query = $this->db
                    ->select('signo_sintoma_especifico.id, signo_sintoma_general.descripcion as general, signo_sintoma_especifico.descripcion, signo_sintoma_especifico.estado')
                    ->from('signo_sintoma_especifico')
                    ->join('signo_sintoma_general', 'signo_sintoma_general.id=signo_sintoma_especifico.id_general')
                    ->get();

        return $query;
    }

    public function getEspecifico($id)
    {
        $where = array("id"=>$id);
        
        $query = $this->db->get_where('signo_sintoma_especifico', $where);

        return $query->row();
    }    

    public function insEspecifico($datos = array())
    {
        $this->db->insert("signo_sintoma_especifico", $datos);
        return true;
    }
    
    public function modEspecifico($modificar=array(), $id)
    {
        $where = array("id"=>$id);

        $query = $this->db->where($where)
                        ->update('signo_sintoma_especifico',$modificar);
        return true;
    }

    public function delEspecifico($id = null)
    {
        $where = array('id'=>$id);

        $this->db->delete('signo_sintoma_especifico', $where);

        return true;
    }

    public function getTutoriales($id)
    {
        $where = array("id"=>$id);
        
        $query = $this->db->get_where('tutoriales', $where);

        return $query->row();
    }    

    public function insTutoriales($datos = array())
    {
        $this->db->insert("tutoriales", $datos);
        return true;
    }
    
    public function modTutoriales($modificar=array(), $id)
    {
        $where = array("id"=>$id);

        $query = $this->db->where($where)
                        ->update('tutoriales',$modificar);
        return true;
    }

    public function delTutoriales($id = null)
    {
        $where = array('id'=>$id);

        $this->db->delete('tutoriales', $where);

        return true;
    }

    public function listarCodigos()
    {
        $query = $this->db->get('codigos');

        return $query;
    }

    public function getCodigos($id)
    {
        $where = array("id"=>$id);
        
        $query = $this->db->get_where('codigos', $where);

        return $query->row();
    }    

    public function insCodigos($datos = array())
    {
        $this->db->insert("codigos", $datos);
        return true;
    }
    
    public function modCodigos($modificar=array(), $id)
    {
        $where = array("id"=>$id);

        $query = $this->db->where($where)
                        ->update('codigos',$modificar);
        return true;
    }

    public function delCodigos($id = null)
    {
        $where = array('id'=>$id);

        $this->db->delete('codigos', $where);

        return true;
    }

    public function listarTipoIaas($dato_serv = null, $dato_disp = null)
    {
		if ($dato_serv != null && $dato_disp != null){
			$sql = "select id, nombre from iaas_servicio_dispositivo_medico e
					inner join iaas_tipo t on e.tipo_iaas_ID = t.id
					where servicioID = '".$dato_serv."' and dispositivo_medico_ID = '".$dato_disp."'";		
		}
		else{
			$sql = "select id, nombre from iaas_tipo";
		}

		$query = $this->db->query( $sql );


        return $query->result();
    }

    public function listarServicios($dato = null)
    {
		$sql = "select * from iaas_servicio where upssID = '".$dato."'";

		$query = $this->db->query( $sql );

        return $query->result();
    }

    public function listarSalas($dato = null)
    {
//        $where = array("nivel"=>$dato);
		$ipress = $this->session->userdata("establec");
		$sql = "select * from iaas_sala where servicioID = '".$dato."' and e_salud = '".$ipress."'";

		$query = $this->db->query( $sql );
		
        return $query->result();

    }

    public function listarCriterios($dato = null)
    {
//		$ipress = $this->session->userdata("establec");
		$sql = "select id, nombre from iaas_criterio
				where tipo_iaas_ID = '".$dato."'";

		$query = $this->db->query( $sql );


        return $query->result();
    }

    public function listarDispositivos($dato = null)
    {
		if ($dato != null){
			$sql = "select id, nombre from iaas_servicio_dispositivo_medico sd
					inner join iaas_dispositivo_medico d on sd.dispositivo_medico_ID = d.id
					where servicioID = '".$dato."'";
		}
		else{
			$sql = "select id, nombre from iaas_dispositivo_medico";				
		}

		$query = $this->db->query( $sql );

        return $query->result();
    }

    public function listarProcMed($dato = null)
    {
/*		$sql = "select id, nombre from iaas_dispositivo_procedimiento_medico d
				inner join iaas_procedimiento_medico p on d.procedimiento_medico_ID = p.id
				where dispositivo_medico_ID = '".$dato."'";
*/

		$sql = "select id, nombre from iaas_procedimiento_medico";

		$query = $this->db->query( $sql );

        return $query->result();
    }

    public function listarTipoCirugia()
    {
        $query = $this->db->get('iaas_tipo_cirugia');

        return $query->result();
    }

    public function listarClaseHerida()
    {
        $query = $this->db->get('iaas_clase_herida');

        return $query->result();
    }

    public function listarClaseAsa()
    {
        $query = $this->db->get('iaas_clase_asa');

        return $query->result();
    }

    public function listarCultivo()
    {
        $query = $this->db->get('iaas_cultivo');

        return $query->result();
    }

    public function listarMicro()
    {
        $query = $this->db->get('iaas_germen');

        return $query->result();
    }

    public function listarDiagnostico($dato = '')
    {
		$sql = "select id, nombre as text from iaas_diagnostico where (nombre like '%".$dato."%' or id like '".$dato."%') order by nombre asc";

		$query = $this->db->query( $sql );

        return $query->result();
    }

    public function getCierreVigilancia($anio)
    {
        $where = array("anio"=>$anio);
        
        $query = $this->db->get_where('iaas_cierre', $where);

        return $query->row();
    }    

    public function insCierreVigilancia($datos = array())
    {
        $this->db->insert("iaas_cierre", $datos);
        return true;
    }

	    public function numRegistrosAuditorias()
    {
        $sql = "select count(*) as cantidad from auditoria
				where usuario <> ''";

		$query = $this->db->query( $sql );            

        return $query->row();
    }

    public function _listarAuditorias($limit,$start,$col,$dir)
    {
        ini_set('max_execution_time', -1); 
        ini_set("memory_limit", "4024M");
		
		$sql = "select a.registroID as id, fecha, a.usuario, nombres, accion, a.id as idreg
				from auditoria a
					left join notiweb.usuarios_frontend u on a.usuario = u.usuario
				where a.usuario <> ''";
		
		$demas = " order by ".$col." ".$dir." limit ".$start.",".$limit;
		
		$query = $this->db->query( $sql.$demas );
		
		return $query->result();

    }

    public function listarAuditoriaSearch($limit,$start,$search,$col,$dir)
    {
        ini_set('max_execution_time', -1); 
        ini_set("memory_limit", "4024M");

		$sql = "select a.registroID as id, fecha, a.usuario, nombres, accion, a.id as idreg
				from auditoria a
					left join notiweb.usuarios_frontend u on a.usuario = u.usuario
				where a.usuario <> ''";

        $searchQuery = " and (fecha like '".$search."%' or a.usuario like '%".$search."%' or nombres like '%".$search."%' or accion like '%".$search."%')";

        $demas = " order by ".$col." ".$dir." limit ".$start.",".$limit;        

		$query = $this->db->query( $sql.$searchQuery.$demas );

        return $query->result();
    }

    public function listarAuditoriaSearchCount($search)
    {
        ini_set('max_execution_time', -1); 
        ini_set("memory_limit", "4024M");

		$sql = "select a.registroID as id, fecha, a.usuario, nombres, accion, a.id as idreg
				from auditoria a
					left join notiweb.usuarios_frontend u on a.usuario = u.usuario
				where a.usuario <> ''";

        $searchQuery = " and (fecha like '".$search."%' or a.usuario like '%".$search."%' or nombres like '%".$search."%' or accion like '%".$search."%')";

        $demas = $searchQuery;

		$query = $this->db->query( $sql.$demas );

        return $query->num_rows();
    }   


    public function getEstablecimientosIaas($codDiresa)
	{
		
			
                $where = array('i.activo' => 1,'i.diresa' => $codDiresa);
		
	

                $query = $this->db
				->select('i.codigo,r.raz_soc,r.renaes,d.nombre as diresa,i.cod_est')
				->from('iaas_ipress i')
				->join('notiweb.renace r', 'r.cod_est = i.cod_est')
				->join('notiweb.diresas d', 'd.codigo = i.diresa')
				->where($where)
                ->order_by('i.codigo','desc')
				->get();
                return $query->result();
	}


    public function getUpssIaas($cod_est)
	{
		$where = array('iaas_upss_est.cod_est' => $cod_est,'iaas_upss_est.estado'=>1);

        $query = $this->db
        ->select('iaas_upss_est.upssID,u.nombre')
        ->from('iaas_upss_est')
        ->join('iaas_upss u', 'iaas_upss_est.upssID = u.id')
        ->where($where)
        ->get();
		
		
				return $query->result();
	}

    public function getServiciosIaas($cod_est,$upssID)
	{
		$where = array('iaas_servicio.cod_est' => $cod_est,'iaas_servicio.upssID' => $upssID,'iaas_servicio.estado' => 1);
		
		$query = $this->db
                ->select("*")
				->where($where)
				->get('iaas_servicio');
				return $query->result();
	}

    public function getSalasIaas($cod_est,$upssID,$servicioID)
	{
		$where = array('iaas_sala.cod_est' => $cod_est,'iaas_sala.upssID' => $upssID,'iaas_sala.servicioID' => $servicioID,'iaas_sala.estado'=>1);
		
		$query = $this->db
                ->select("*")
				->where($where)
				->get('iaas_sala');
				return $query->result();
	}


    public function listarUsuarios($dato = '')
    {
		$sql = "select usuario as id, concat(usuario,' - ',nombres) as text from notiweb.usuarios_frontend where (nombres like '%".$dato."%' or usuario like '".$dato."%') and estado = '1' order by nombres asc limit 20";

		$query = $this->db->query( $sql );

        return $query->result();
    }

    public function getDispositivosMedxTipoIaas($tipoiaas,$upssID)
    {
        $sql = "SELECT d.id,d.nombre
		FROM iaas.iaas_upss_tipoiass_dispositivo a
	   inner join iaas.iaas_dispositivo_medico d on d.id = a.dispositivo_medico_ID
	   where a.tipo_iaas_ID = '$tipoiaas' and a.upssID= '$upssID' and d.estado = 1 and a.estado=1 ";

		$query = $this->db->query( $sql );            

        return $query->result();
    }

    public function getProcedimientosXDispositivoGen($where)
    {
       

        $query = $this->db
        ->select('p.id,p.nombre')
        ->from('iaas.iaas_upss_tipoiass_dispositivo a')
        ->join('iaas.iaas_procedimiento_medico p', 'p.id = a.iCodProMedico')
        ->where($where)
        ->get();
        return $query->result();
    }

    public function getTipCirXProcedimientoGen($where)
    {
       

        $query = $this->db
        ->select('t.id,t.nombre')
        ->from('iaas.iaas_upss_tipoiass_dispositivo a')
        ->join('iaas.iaas_tipo_cirugia t', 't.id = a.iCodTipoCirugia')
        ->where($where)
        ->get();
        return $query->result();
    }


    public function ifExistsData($tabla,$where)
	{
		//$where = array('cod_est' => $cod_est,'upssID' => $upssID,'servicioID' => $servicioID);
		
		$query = $this->db
                ->select("*")
				->where($where)
				->get($tabla);
				return $query->result();
	}


    public function getUsuariosIaas($where)
    {

        $query = $this->db
        ->select('u.usuario,(case u.nivel when 1 then "Admin" when 4 then "Nacional" when 5 then "Diresa" when 6 then "Red" when 7 then "MicroRed" when 8 then "Establec." end) as nivel,r.raz_soc as establecimiento,d.nombre as diresa,u.usuario as id, u.nombres as nombre, u.dni, u.email, u.celular, u.caduca, (case when a.estado = 0 then "DESACTIVADO" else "ACTIVADO" end) as estado,a.estado as activo ')
        ->from('notiweb.tablaccesos a')
        ->join('notiweb.usuarios_frontend u', 'u.usuario = a.usuario')
        ->join('notiweb.renace r', 'r.cod_est = u.establecimiento')
        ->join('notiweb.diresas d', 'd.codigo = u.diresa')
        ->where($where)
        ->order_by('u.registroId','desc')
        ->limit(20)
        ->get();
        return $query->result();

    }

    public function getUsuariosIaasFiltros($where,$like)
	{
		
		
				$query = $this->db
				->select('u.usuario,(case u.nivel when 1 then "Admin" when 4 then "Nacional" when 5 then "Diresa" when 6 then "Red" when 7 then "MicroRed" when 8 then "Establec." end) as nivel,r.raz_soc as establecimiento,d.nombre as diresa,u.usuario as id, u.nombres as nombre, u.dni, u.email, u.celular, u.caduca, (case when a.estado = 0 then "DESACTIVADO" else "ACTIVADO" end) as estado,a.estado as activo ')
				->from('notiweb.tablaccesos a')
                ->join('notiweb.usuarios_frontend u', 'u.usuario = a.usuario')
                ->join('notiweb.renace r', 'r.cod_est = u.establecimiento')
                ->join('notiweb.diresas d', 'd.codigo = u.diresa')
				->where($where)
				->like($like)
                ->order_by('u.registroId','desc')
				->get();

				//echo $this->db->queries[0];die();
				return $query->result();
	}

    public function getUsuariosIaasExcel($where)
    {

        $query = $this->db
        ->select('d.nombre as diresa,r.raz_soc as establecimiento,(case u.nivel when 1 then "Admin" when 4 then "Nacional" when 5 then "Diresa" when 6 then "Red" when 7 then "MicroRed" when 8 then "Establec." end) as nivel, u.dni,u.nombres as nombre, u.email, u.celular, (case when a.estado = 0 then "DESACTIVADO" else "ACTIVADO" end) as estado')
        ->from('notiweb.tablaccesos a')
        ->join('notiweb.usuarios_frontend u', 'u.usuario = a.usuario')
        ->join('notiweb.renace r', 'r.cod_est = u.establecimiento')
        ->join('notiweb.diresas d', 'd.codigo = u.diresa')
        ->where($where)
        ->order_by('u.nombres','asc')
        ->get();
        return $query->result();

    }

    public function _listarUpssEst()
    {
        
        $query = $this->db
        ->select('ue.id,ue.estado as activo,d.nombre as diresa,concat(r.renaes," - ",r.raz_soc)as establecimiento,u.nombre as upss')
        ->from('iaas_upss_est ue')
        ->join('iaas_upss u', 'ue.upssID=u.id')
        ->join('notiweb.diresas d', 'ue.diresa =d.codigo')
        ->join('notiweb.renace r', 'ue.cod_est=r.cod_est')
        ->order_by('ue.id','desc')
        ->limit(20)
        ->get();

        return $query->result();
    }

    public function _listarUpssEstFiltros($where)
    {
        
        $query = $this->db
        ->select('ue.id,ue.estado as activo,d.nombre as diresa,concat(r.renaes," - ",r.raz_soc)as establecimiento,u.nombre as upss')
        ->from('iaas_upss_est ue')
        ->join('iaas_upss u', 'ue.upssID=u.id')
        ->join('notiweb.diresas d', 'ue.diresa =d.codigo')
        ->join('notiweb.renace r', 'ue.cod_est=r.cod_est')
        ->where($where)
        ->order_by('ue.id','desc')
        ->get();

        return $query->result();
    }


    public function getUpssEstIaasExcel()
    {

        $query = $this->db
        ->select('d.nombre as diresa,concat(r.renaes," - ",r.raz_soc)as establecimiento,u.nombre as upss,(case when ue.estado = 0 then "DESACTIVADO" else "ACTIVADO" end) as estado')
        ->from('iaas_upss_est ue')
        ->join('iaas_upss u', 'ue.upssID=u.id')
        ->join('notiweb.diresas d', 'ue.diresa =d.codigo')
        ->join('notiweb.renace r', 'ue.cod_est=r.cod_est')
        ->order_by('ue.id','desc')
        ->get();

        return $query->result();

    }


    public function _listarServicios($where)
    {
        
        $query = $this->db
                    ->select('s.id as id, iaas_upss.nombre as upss, s.nombre as nombre, s.estado as activo,d.nombre as diresa,concat(r.renaes," - ",r.raz_soc)as establecimiento')
                    ->from('iaas_servicio s')
                    ->join('iaas_upss', 's.upssID=iaas_upss.id')
                    ->join('notiweb.diresas d', 's.diresa =d.codigo')
                    ->join('notiweb.renace r', 's.cod_est=r.cod_est')
                    ->where($where)
					->order_by('s.id','desc')
                    ->limit(20)
                    ->get();

        return $query->result();
    }


    public function _listarServiciosFiltros($where,$like)
    {
        
        $query = $this->db
                    ->select('s.id as id, iaas_upss.nombre as upss, s.nombre as nombre, s.estado as activo,d.nombre as diresa,concat(r.renaes," - ",r.raz_soc)as establecimiento')
                    ->from('iaas_servicio s')
                    ->join('iaas_upss', 's.upssID=iaas_upss.id')
                    ->join('notiweb.diresas d', 's.diresa =d.codigo')
                    ->join('notiweb.renace r', 's.cod_est=r.cod_est')
                    ->where($where)
                    ->like($like)
					->order_by('s.id','desc')
                    ->get();

        return $query->result();
    }


    public function _listarServiciosExcel($where)
    {
        
        $query = $this->db
                    ->select('d.nombre as diresa,concat(r.renaes," - ",r.raz_soc)as establecimiento,iaas_upss.nombre as upss, s.nombre as nombre,(case when s.estado = 0 then "DESACTIVADO" else "ACTIVADO" end) as estado')
                    ->from('iaas_servicio s')
                    ->join('iaas_upss', 's.upssID=iaas_upss.id')
                    ->join('notiweb.diresas d', 's.diresa =d.codigo')
                    ->join('notiweb.renace r', 's.cod_est=r.cod_est')
                    ->where($where)
					->order_by('s.id','desc')
                    ->get();

        return $query->result();
    }


    public function _listarSalas($where)
    {
		

        $query = $this->db
                    ->select('s.id, iaas_upss.nombre as upss, iaas_servicio.nombre as servi, s.nombre as nombre, s.estado as activo,d.nombre as diresa,concat(r.renaes," - ",r.raz_soc)as establecimiento')
                    ->from('iaas_sala s')
                    ->join('iaas_upss', 's.upssID=iaas_upss.id')
					->join('iaas_servicio', 's.servicioID=iaas_servicio.id')
                    ->join('notiweb.diresas d', 's.diresa =d.codigo')
                    ->join('notiweb.renace r', 's.cod_est=r.cod_est')
					->where($where)
					->order_by('s.id','desc')
                    ->limit(20)
                    ->get();

        return $query->result();
    }


    public function _listarSalasFiltros($where,$like)
    {
        
        $query = $this->db
                    ->select('s.id, iaas_upss.nombre as upss, iaas_servicio.nombre as servi, s.nombre as nombre, s.estado as activo,d.nombre as diresa,concat(r.renaes," - ",r.raz_soc)as establecimiento')
                    ->from('iaas_sala s')
                    ->join('iaas_upss', 's.upssID=iaas_upss.id')
                    ->join('iaas_servicio', 's.servicioID=iaas_servicio.id')
                    ->join('notiweb.diresas d', 's.diresa =d.codigo')
                    ->join('notiweb.renace r', 's.cod_est=r.cod_est')
                    ->where($where)
                    ->like($like)
					->order_by('s.id','desc')
                    ->get();

        return $query->result();
    }

    public function _listarSalasExcel($where)
    {
		

        $query = $this->db
                    ->select('d.nombre as diresa,concat(r.renaes," - ",r.raz_soc)as establecimiento, iaas_upss.nombre as upss, iaas_servicio.nombre as servicio, s.nombre as nombre,(case when s.estado = 0 then "DESACTIVADO" else "ACTIVADO" end) as estado')
                    ->from('iaas_sala s')
                    ->join('iaas_upss', 's.upssID=iaas_upss.id')
					->join('iaas_servicio', 's.servicioID=iaas_servicio.id')
                    ->join('notiweb.diresas d', 's.diresa =d.codigo')
                    ->join('notiweb.renace r', 's.cod_est=r.cod_est')
					->where($where)
					->order_by('s.id','desc')
                    ->get();

        return $query->result();
    }

    public function getInstitucion($dato = null)
    {
        $where = array("insti_id"=>$dato);

        $query = $this->db->get_where("institucion", $where);

        return $query->row();
    }

}