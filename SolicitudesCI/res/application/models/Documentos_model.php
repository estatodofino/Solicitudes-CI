<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentos_model extends CI_Model {

  public function get_documento($numSol,$titulo)
  {
      $this->db->where('num_solicitud',$numSol);
      $this->db->where('nombre_adj',$titulo);
      $resultados = $this->db->get("detalle_solicitud");
          if ($resultados->num_rows() > 0) {
            return $resultados->row();
          }
          else{
            return false;
          }
  }
  public function get_documentos($numSol)
  {
    $this->db->select("*");
    $this->db->from("detalle_solicitud");
		$this->db->where("num_solicitud",$numSol);
    //$this->db->where("estado",1);
    $resultados = $this->db->get();
    if ($resultados->num_rows() > 0) {
      return $resultados->result();
    }else
    {
      return false;
    }
  }
  public function save_detalle_solicitud($data)
  {
    return $this->db->insert('detalle_solicitud', $data);
  }

  public function eliminar_documentos($num)
  {
  $this->db->where("num_solicitud",$num);
  return $this->db->delete("detalle_solicitud");
  }

}
