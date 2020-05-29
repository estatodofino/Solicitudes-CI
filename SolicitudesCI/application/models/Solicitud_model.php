<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitud_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	} 
  public function solicitudes($ci,$periodo,$tabla,$tipo,$code)
  {
   $this->db->select("*");
   $this->db->from($tabla);
    $this->db->where("ci_solicitante",$ci);
    $this->db->where("periodo",$periodo);
    $this->db->where($code,$tipo);
    $this->db->where("estado","1");
    $resultados = $this->db->get();
    if ($resultados->num_rows() > 0) { 
      return $resultados->result();
    }else
    {
      return false;
    } 
  }
  public function get_solicitudes($ci)
  {
    $this->db->select("s.*,ts.nombre_solicitud");
    $this->db->from("solicitud_general s");
		$this->db->join("tipo_solicitud ts","s.tipo_solicitud = ts.cod_tipo_solicitud");
		$this->db->where("s.ci_solicitante",$ci);
    $this->db->where("s.estado",1);
    $resultados = $this->db->get();
    if ($resultados->num_rows() > 0) {
      return $resultados->result();
    }else
    {
      return false;
    }
  }


	public function get_postulaciones($ci)//usuarios activos
	{
		$this->db->select("s.*,ts.nombre_solicitud");
		$this->db->from("solicitud_postulacion s");
		$this->db->join("tipo_solicitud ts","s.cod_tipo_solicitud = ts.cod_tipo_solicitud");
		$this->db->where("s.ci_solicitante",$ci);
		$this->db->where("s.estado",1);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}

      public function get_generales($id)
  {
    $this->db->select("s.*,ts.nombre_solicitud,u.nom_usuario as nombre,u.ape_usuario as apellido");
    $this->db->from("solicitud_general s");
    $this->db->join("tipo_solicitud ts","s.tipo_solicitud = ts.cod_tipo_solicitud");
    $this->db->join("usuarios u","s.ci_solicitante = u.ci_usuario");
    $this->db->where("s.tipo_solicitud",$id);
    $this->db->where("u.estado >= 1");
    $this->db->where("s.estado = 1");
    $resultados = $this->db->get();
    if ($resultados->num_rows() > 0) {
      return $resultados->result();
    }else
    {
      return false;
    }
  }

     public function get_egresados()
  {
    $this->db->select("ts.*,tu.*,u.*,u.nom_usuario as nombre,u.ape_usuario as apellido,sg.*");
    $this->db->from("tipo_usuario tu");
    $this->db->join("usuarios u","u.cod_tipo_usuario = tu.cod_tipo_usuario");
    $this->db->join("solicitud_general sg","sg.ci_solicitante = u.ci_usuario");
    $this->db->join("tipo_solicitud ts","ts.cod_tipo_solicitud = sg.tipo_solicitud");
    $this->db->where("tu.cod_tipo_usuario","3");
    $this->db->where("u.estado >= 1");
    $resultados = $this->db->get();
    if ($resultados->num_rows() > 0) {
      return $resultados->result();
    }else
    {
      return false;
    }
  }   

       public function get_eespeciales()
  {
    $this->db->select("ts.*,tu.*,u.*,u.nom_usuario as nombre,u.ape_usuario as apellido,sg.*");
    $this->db->from("tipo_usuario tu");
    $this->db->join("usuarios u","u.cod_tipo_usuario = tu.cod_tipo_usuario");
    $this->db->join("solicitud_especiales sg","sg.ci_solicitante = u.ci_usuario");
    $this->db->join("tipo_solicitud ts","ts.cod_tipo_solicitud = sg.tipo_solicitud");
    $this->db->where("tu.cod_tipo_usuario","4");
    $this->db->where("u.estado >= 1");
    $resultados = $this->db->get();
    if ($resultados->num_rows() > 0) {
      return $resultados->result();
    }else
    {
      return false;
    }
  }

         public function get_eequivalencias()
  {
    $this->db->select("ts.*,tu.*,u.*,u.nom_usuario as nombre,u.ape_usuario as apellido,sg.*");
    $this->db->from("tipo_usuario tu");
    $this->db->join("usuarios u","u.cod_tipo_usuario = tu.cod_tipo_usuario");
    $this->db->join("solicitud_equivalencias sg","sg.ci_solicitante = u.ci_usuario");
    $this->db->join("tipo_solicitud ts","ts.cod_tipo_solicitud = sg.tipo_solicitud");
    $this->db->where("tu.cod_tipo_usuario","4");
    $this->db->where("u.estado >= 1");
    $resultados = $this->db->get();
    if ($resultados->num_rows() > 0) {
      return $resultados->result();
    }else
    {
      return false;
    }
  }

    public function get_All_postulaciones()
  {
    $this->db->select("s.*,ts.nombre_solicitud,u.nom_usuario as nombre,u.ape_usuario as apellido");
    $this->db->from("solicitud_postulacion s");
    $this->db->join("tipo_solicitud ts","s.cod_tipo_solicitud = ts.cod_tipo_solicitud");
    $this->db->join("usuarios u","s.ci_solicitante = u.ci_usuario");
    $this->db->where("u.estado >= 1");
    $this->db->where("s.estado = 1");
    $resultados = $this->db->get();
    if ($resultados->num_rows() > 0) {
      return $resultados->result();
    }else
    {
      return false;
    }
  }

      public function get_All_especiales($id)
  {
    $this->db->select("s.*,ts.nombre_solicitud,u.nom_usuario as nombre,u.ape_usuario as apellido");
    $this->db->from("solicitud_especiales s");
    $this->db->join("tipo_solicitud ts","s.tipo_solicitud = ts.cod_tipo_solicitud");
    $this->db->join("usuarios u","s.ci_solicitante = u.ci_usuario");
    $this->db->where("u.estado >= 1");
    $this->db->where("s.estado = 1");
    $resultados = $this->db->get();
    if ($resultados->num_rows() > 0) {
      return $resultados->result();
    }else
    {
      return false;
    }
  }


	  public function get_especiales($ci)//usuarios especiales
  {
    $this->db->select("s.*,ts.nombre_solicitud");
    $this->db->from("solicitud_especiales s");
		$this->db->join("tipo_solicitud ts","s.tipo_solicitud = ts.cod_tipo_solicitud");
		$this->db->where("s.ci_solicitante",$ci);
    $this->db->where("s.estado",1);
    $resultados = $this->db->get();
    if ($resultados->num_rows() > 0) {
      return $resultados->result();
    }else 
    {
      return false;
    }
  }

  	  public function get_equivalencias($ci)//usuarios especiales
  {
    $this->db->select("s.*,ts.nombre_solicitud");
    $this->db->from("solicitud_equivalencias s");
		$this->db->join("tipo_solicitud ts","s.tipo_solicitud = ts.cod_tipo_solicitud");
		$this->db->where("s.ci_solicitante",$ci);
    $this->db->where("s.estado",1);
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
  	public function subir_especial($data)
  {
    return $this->db->insert("solicitud_especiales",$data);
  }
  	public function subir_equivalencias($data)
  {
    return $this->db->insert("solicitud_equivalencias",$data);
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
    public function save_modificacion($data)
  {
    return $this->db->insert("solicitud_modificacion",$data);
  }
      public function save_modificacion_detalle($data)
  {
    return $this->db->insert("modificacion_materias",$data);
  }
      public function save_justificacion($data)
  {
    return $this->db->insert("justificaciones",$data);
  }
  
		public function updateSolicitud($idsolicitud,$data){
		$this->db->where("cod_tipo_solicitud",$idsolicitud);
		$this->db->update("tipo_solicitud",$data);
		}
    public function update_id($id,$tabla,$data){
    $this->db->where("num_solicitud",$id);
    return $this->db->update($tabla,$data);
    }

		public function getSolicitud($tipo){
			$this->db->where("cod_tipo_solicitud",$tipo);
			$resultado = $this->db->get("tipo_solicitud");
			return $resultado->row();
		}
    public function tipo_solicitud_by($tipo){
      $this->db->like("tipo_solicitud",$tipo);
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
    public function getOrdenesbyDate($fechainicio,$fechafin,$tipo){
       $this->db->select("o.num_solicitud,o.fecha_solicitud as fechas,o.*,o.estado_solicitud as estado,u.nom_usuario as nombre, u.ape_usuario as apellido,te.nombre_solicitud as solicitud");
       $this->db->from($tipo);
       $this->db->join("usuarios u","o.ci_solicitante = u.ci_usuario");
       $this->db->join("tipo_solicitud te","o.cod_tipo_solicitud = te.cod_tipo_solicitud");
        $this->db->where("o.fecha_solicitud >=",$fechainicio);
        $this->db->where("o.fecha_solicitud <=",$fechafin);        
        $this->db->where("u.estado >= 1");
        $resultados = $this->db->get();
        if ($resultados->num_rows() > 0) {
          return $resultados->result();
        }else
        {
          return false;
        }
      }
      public function get_OrdenesbyDate($fechainicio,$fechafin,$tipo,$tipo_solicitud){
       $this->db->select("o.num_solicitud,o.fecha_solicitud as fechas,o.*,o.estatus_solicitud as estado,u.nom_usuario as nombre, u.ape_usuario as apellido,te.nombre_solicitud as solicitud");
       $this->db->from($tipo);
       $this->db->join("usuarios u","o.ci_solicitante = u.ci_usuario");
       $this->db->join("tipo_solicitud te","o.tipo_solicitud = te.cod_tipo_solicitud");
        $this->db->where("o.fecha_solicitud >=",$fechainicio);
        $this->db->where("o.fecha_solicitud <=",$fechafin);
        $this->db->where("o.tipo_solicitud",$tipo_solicitud);
        $this->db->where("u.estado >= 1");
        $resultados = $this->db->get();
        if ($resultados->num_rows() > 0) {
          return $resultados->result();
        }else
        {
          return false;
        }
      }

       public function get_OrdenesbyState($tabla,$estado){
       $this->db->select("o.num_solicitud,o.fecha_solicitud as fechas,o.*,o.estatus_solicitud as estado,u.nom_usuario as nombre, u.ape_usuario as apellido,te.nombre_solicitud as solicitud");
       $this->db->from($tabla);
       $this->db->join("usuarios u","o.ci_solicitante = u.ci_usuario");
       $this->db->join("tipo_solicitud te","o.tipo_solicitud = te.cod_tipo_solicitud");
        $this->db->like("o.estatus_solicitud",$estado);
        $this->db->where("u.estado >= 1");
        $resultados = $this->db->get();
        if ($resultados->num_rows() > 0) {
          return $resultados->result();
        }else
        {
          return false;
        }
      }
      //postulaciones
       public function get_Ordenes_byState($estado){
       $this->db->select("o.num_solicitud,o.fecha_solicitud as fechas,o.*,o.estado_solicitud as estado,u.nom_usuario as nombre, u.ape_usuario as apellido,te.nombre_solicitud as solicitud");
       $this->db->from("solicitud_postulacion o");
       $this->db->join("usuarios u","o.ci_solicitante = u.ci_usuario");
       $this->db->join("tipo_solicitud te","o.cod_tipo_solicitud = te.cod_tipo_solicitud");
        $this->db->like("o.estado_solicitud",$estado);
        $this->db->where("u.estado >= 1");
        $resultados = $this->db->get();
        if ($resultados->num_rows() > 0) {
          return $resultados->result();
        }else
        {
          return false;
        }
      }

             public function get_OrdenesbyTipo($tabla,$tipo){
       $this->db->select("o.num_solicitud,o.fecha_solicitud as fechas,o.*,o.estatus_solicitud as estado,u.nom_usuario as nombre, u.ape_usuario as apellido,te.nombre_solicitud as solicitud");
       $this->db->from($tabla);
       $this->db->join("usuarios u","o.ci_solicitante = u.ci_usuario");
       $this->db->join("tipo_solicitud te","o.tipo_solicitud = te.cod_tipo_solicitud");
       $this->db->where("o.tipo_solicitud",$tipo);
       $this->db->where("u.estado >= 1");
        $resultados = $this->db->get();
        if ($resultados->num_rows() > 0) {
          return $resultados->result();
        }else
        {
          return false;
        }
      }
      //postulaciones
       public function get_Ordenes_byTipo(){
       $this->db->select("o.num_solicitud,o.fecha_solicitud as fechas,o.*,o.estado_solicitud as estado,u.nom_usuario as nombre, u.ape_usuario as apellido,te.nombre_solicitud as solicitud");
       $this->db->from("solicitud_postulacion o");
       $this->db->join("usuarios u","o.ci_solicitante = u.ci_usuario");
       $this->db->join("tipo_solicitud te","o.cod_tipo_solicitud = te.cod_tipo_solicitud");
       $this->db->where("u.estado >= 1");
        $resultados = $this->db->get();
        if ($resultados->num_rows() > 0) {
          return $resultados->result();
        }else
        {
          return false;
        }
      }
    public function postulacion($id){ //usuario activo
    $this->db->select("o.*,ts.nombre_solicitud as tipoOrden,CONCAT(u.nom_usuario,u.ape_usuario) as solicitante,em.*,ae.*");
    $this->db->from("solicitud_postulacion o");
    $this->db->join("usuarios u","o.ci_solicitante = u.ci_usuario");
    $this->db->join("tipo_solicitud ts","o.cod_tipo_solicitud = ts.cod_tipo_solicitud");
    $this->db->join("empresas em","o.rif_empresa = em.rif");
    $this->db->join("asesor_empresarial ae","o.ci_asesor = ae.ci_asesor");   
    $this->db->where("o.num_solicitud",$id);
    $this->db->where("o.estado",1);
    $resultado = $this->db->get();
    return $resultado->row();
  }
      public function general($id){ //varios usuarios
    $this->db->select("o.*,ts.nombre_solicitud as tipoOrden,CONCAT(u.nom_usuario,u.ape_usuario) as solicitante");
    $this->db->from("solicitud_general o");
    $this->db->join("usuarios u","o.ci_solicitante = u.ci_usuario");
    $this->db->join("tipo_solicitud ts","o.tipo_solicitud = ts.cod_tipo_solicitud");
    $this->db->where("o.num_solicitud",$id);
    $this->db->where("o.estado",1);
    $resultado = $this->db->get();
    return $resultado->row();
  }
        public function especial($id){// usuario especial
    $this->db->select("o.*,ts.nombre_solicitud as tipoOrden,CONCAT(u.nom_usuario,u.ape_usuario) as solicitante");
    $this->db->from("solicitud_especiales o");
    $this->db->join("usuarios u","o.ci_solicitante = u.ci_usuario");
    $this->db->join("tipo_solicitud ts","o.tipo_solicitud = ts.cod_tipo_solicitud");
    $this->db->where("o.num_solicitud",$id);
    $this->db->where("o.estado",1);
    $resultado = $this->db->get();
    return $resultado->row();
  }

           public function equivalencias()
  {
    $this->db->select("ts.*,tu.*,u.*,u.nom_usuario as nombre,u.ape_usuario as apellido,sg.*");
    $this->db->from("tipo_usuario tu");
    $this->db->join("usuarios u","u.cod_tipo_usuario = tu.cod_tipo_usuario");
    $this->db->join("solicitud_equivalencias sg","sg.ci_solicitante = u.ci_usuario");
    $this->db->join("tipo_solicitud ts","ts.cod_tipo_solicitud = sg.tipo_solicitud");
    $this->db->where("tu.cod_tipo_usuario","4");
    $this->db->where("u.estado","1");    
    $resultados = $this->db->get();
    if ($resultados->num_rows() > 0) {
      return $resultados->result();
    }else
    {
      return false;
    }
  }
    public function equivalencia($id){ //usuarios especiales
    $this->db->select("o.*,ts.nombre_solicitud as tipoOrden,CONCAT(u.nom_usuario,u.ape_usuario) as solicitante");
    $this->db->from("solicitud_equivalencias o");
    $this->db->join("usuarios u","o.ci_solicitante = u.ci_usuario");
    $this->db->join("tipo_solicitud ts","o.tipo_solicitud = ts.cod_tipo_solicitud");
    $this->db->where("o.num_solicitud",$id);
    $this->db->where("o.estado",1);  
    $resultado = $this->db->get();
    return $resultado->row();
  }

  public function modificacion($ci,$periodo)
  {
   $this->db->select("*");
   $this->db->from("solicitud_modificacion");
    $this->db->where("ci_solicitante",$ci);
    $this->db->where("cod_modificacion",$periodo);
    $this->db->where("estado","1");
    $resultados = $this->db->get();
    if ($resultados->num_rows() > 0) {
      return $resultados->result();
    }else
    {
      return false;
    } 
  }

}
