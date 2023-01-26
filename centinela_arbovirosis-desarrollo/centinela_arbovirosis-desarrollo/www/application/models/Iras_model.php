<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of User
 *
 * @author roytuts.com
 */
class Iras_model extends CI_Model {

    
 

    function __construct()
    {
        parent::__construct();
      
        $this->notiweb = $this->load->database('notiweb', TRUE);
    }






    public function insIra($data){
      /* $this->db->insert('ficha_brotes', $data);
       $insert_id = $this->db->insert_id();
       return  $insert_id;*/

       return $this->db->insert('iras', $data);
   }

   public function updIra ($data,$id){
    $this->db->where('registroId', $id);
    return  $this->db->update('iras', $data);
}

public function delIra ($data,$id){
  $this->db->where('registroId', $id);
  return  $this->db->update('iras', $data);
}


   public function getListado($filtros)
   {
    
                 $query = $this->db
         ->select("i.registroId as id,i.ano as anio,i.semana,di.nombre as diresa,r2.raz_soc as establecimiento,dist.vNombre as ubigeo")
         ->from('iras i')
                 ->join('distrito dist', 'dist.iCodDist = i.ubigeo')
                 //->join('departamento dept', 'dept.iCodDept = dist.iCodDept')
               //  ->join('provincia prov', 'prov.iCodProv = dist.iCodProv')
                // ->join('notiweb.usuarios_frontend uf', 'f.vUsuReg = uf.usuario')
                 ->join('notiweb.diresas di', 'di.codigo = i.sub_reg_nt','left')
                 ->join('notiweb.redes r', 'r.subregion = i.sub_reg_nt and r.codigo = i.red','left')
                 ->join('notiweb.microred m', 'm.subregion = i.sub_reg_nt and m.red = i.red and m.codigo = i.microred','left')
                 ->join('notiweb.renace r2', 'r2.subregion = i.sub_reg_nt and r2.red = i.red and r2.microred = i.microred and r2.cod_est = i.e_salud','left')
                 ->where($filtros)
                 ->order_by('i.registroId', 'DESC')
         ->get();
                 return $query->result();
   }


   public function getFicha($id)
	{
                $where = array('i.registroId' => $id);
                $query = $this->db
				->select("*")
				->from('iras i')
				->where($where)
				->get();
                return $query->result();
	}


  public function checkIfExiste($diresa,$red,$microred,$eess,$anio,$sem,$ubig)
	{
                $where = array('e.sub_reg_nt' => $diresa,
                'e.red' => $red,
                'e.microred' => $microred,
                'e.e_salud' => $eess,
                'e.ano' => $anio,
                'e.semana' => $sem,
                'e.ubigeo' => $ubig,
                'e.estado' => 1);
                $query = $this->db
				->select("*")
				->from('iras e')
				->where($where)
				->get();
                return $query->result();
	}






}