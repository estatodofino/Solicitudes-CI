<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitud_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
  public function get_solicitudes($ci)
  {
    $this->db->select("s.*,ts.nombre_solicitud");
    $this->db->from("solicitud_general s");
		$this->db->join("tipo_solicitud ts","s.tipo_solicitud = ts.cod_tipo_solicitud");
		$this->db->where("s.ci_solicitante",$ci);
    //$this->db->where("estado",1);
    $resultados = $this->db->get();
    if ($resultados->num_rows() > 0) {
      return $resultados->result();
    }else
    {
      return false;
    }
  }

	public function get_postulaciones($ci)
	{
		$this->db->select("s.*,ts.nombre_solicitud");
		$this->db->from("solicitud_postulacion s");
		$this->db->join("tipo_solicitud ts","s.cod_tipo_solicitud = ts.cod_tipo_solicitud");
		$this->db->where("s.ci_solicitante",$ci);
		//$this->db->where("estado",1);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}

	public function subir($data)
  {
    return $this->db->insert("solicitud_general",$data);
  }

  public function subir_postulacion($data)
  {
    return $this->db->insert("solicitud_postulacion",$data);
  }

    public function save_detalle_solicitud($data)
  {
    return $this->db->insert("detalle_solicitud",$data);
  }

    public function save_datos_asesor($data)
  {
    return $this->db->insert("asesor_empresarial",$data);
  }

    public function save_datos_empresa($data)
  {
    return $this->db->insert("empresas",$data);
  }

		public function updateSolicitud($idsolicitud,$data){
		$this->db->where("cod_tipo_solicitud",$idsolicitud);
		$this->db->update("tipo_solicitud",$data);
		}

		public function getSolicitud($tipo){
			$this->db->where("cod_tipo_solicitud",$tipo);
			$resultado = $this->db->get("tipo_solicitud");
			return $resultado->row();
		}
		public function getSec()
		{
		$this->db->select("secuencia");
			$query=$this->db->get("solicitud");
			return $query->row();
		}
		public function updateSec($data){
		$this->db->update("solicitud",$data);
		}
}
