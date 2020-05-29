<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {
	public function getID($link){
		$this->db->like("link",$link);
		$resultado = $this->db->get("menus");
		return $resultado->row();
	}
	public function LastID()
	{
	   $this->db->select_MAX('id');
	   $this->db->from("solicitud_modificacion");
	   $query = $this->db->get();
	   return $query->row();
	}
	public function get_user_t()
	{
		$this->db->select("*");
		$this->db->from("tipo_usuario");
		$this->db->where("nivel > 1");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
	public function update($id,$data){
	$this->db->where("cod_periodo",$id);
	$this->db->update("periodos",$data);
	} 

	public function getPermisos($menu,$rol){
		$this->db->where("menu_id",$menu);
		$this->db->where("rol_id",$rol);
		$resultado = $this->db->get("permisos");
		return $resultado->row();
	}

	public function getPeriodo(){
		$this->db->where("estado",1);
		$resultado = $this->db->get("periodos");
		return $resultado->row();
	}
	public function get_periodo_name($nombre){
		$this->db->where("nom_periodo",$nombre);
		$resultados = $this->db->get("periodos");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}
	public function periodo_get_by_id($id){
		$this->db->from("periodos");
		$this->db->where('cod_periodo',$id);
		$query = $this->db->get();

		return $query->row();
	}
		public function getModificacion_by($id,$periodo){
		$this->db->where("cod_modificacion",$id);	
		$this->db->where("periodo",$periodo);
		$resultados = $this->db->get("modificacion");
		return $resultados->row();
	}
		public function get_periodos(){
		$this->db->select("*");
		$this->db->from("periodos");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
	public function getModificacion($id){
		$this->db->where("periodo",$id);
		$resultados = $this->db->get("modificacion");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}
	public function rowCount($tabla){
			$this->db->where("estado","1");
		$resultados = $this->db->get($tabla);
		return $resultados->num_rows();
	}
	public function get_correos()
	{
		$this->db->select("*");
		$this->db->from("mensajes");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
	public function get_mensajes()
	{
		$this->db->select("num_orden,respuesta_solic,fecha_resp,comentario_final");
		$this->db->from("orden");
		$this->db->where("fecha_resp !=","0000-00-00");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
	public function correGet($id)
	{
		$this->db->select("*");
		$this->db->from("mensajes");
		$this->db->where("id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}
		public function getSec()
		{
		$this->db->select("secuencia");
	    $query=$this->db->get("solicitud");
	    return $query->row();
		}
		public function subir_empresa($data)
		{
			$this->db->insert('empresas', $data);
			return $this->db->insert_id();
		}

		public function subir_tutor($data)
		{
			$this->db->insert('asesor_empresarial', $data);
			return $this->db->insert_id();
		}

		public function periodo_add($data)
		{
			$this->db->insert('periodos', $data);
			return $this->db->insert_id();
		}

		public function modificacion_add($data)
		{
			$this->db->insert('modificacion', $data);
			return $this->db->insert_id();
		}

		public function get_asesor($id)
		{
		 $this->db->select('*');
		 $this->db->from('asesor_empresarial');
		 $this->db->where('rif_empresa',$id);
		 $resultados = $this->db->get();
		 if ($resultados->num_rows() > 0) {
			 return $resultados->result();
		 }else{
			 return false;
		 }
		}

		public function get_asesor_byCi($ci)
		{
		$this->db->select("*");
	    $query=$this->db->get("asesor_empresarial");
		 $this->db->where('ci_asesor',$ci);
	    return $query->row();
		}
		public function geDoc($id)
		{
		 $this->db->select('*');
		 $this->db->from('detalle_solicitud');
		 $this->db->where('num_solicitud',$num);
		 $resultados = $this->db->get();
		 if ($resultados->num_rows() > 0) {
			 return $resultados->result();
		 }else{
			 return false;
		 }
		}
				public function get_docs()
		{
		 $this->db->select('*');
		 $this->db->from('detalle_solicitud');
		 //$this->db->where('num_solicitud',$num);
		 $resultados = $this->db->get();
		 if ($resultados->num_rows() > 0) {
			 return $resultados->result();
		 }else{
			 return false;
		 }
		}

		public function get_tipo_solicitud()
	{
	$this->db->select('*');
	$this->db->from('tipo_solicitud');
	$this->db->order_by('cod_tipo_solicitud','asc');
    $query=$this->db->get();
    return $query->result();
	}
		public function get_tipo_user()
	{
	$this->db->select('*');
	$this->db->from('tipo_usuario');
	$this->db->order_by('tipo_usuario','asc');
    $query=$this->db->get();
    return $query->result();
	}
}
