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

  public function eliminar_documentos($id)
  {
  $this->db->where("id",$id);
  return $this->db->delete("detalle_solicitud");
  }

    public function eliminar_docs($num)
  {
  $this->db->where("num_solicitud",$num);
  return $this->db->delete("detalle_solicitud");
  }

     public function get_requisito($val,$num)
    {
      $this->db->like('nombre_adj',$val);
      $this->db->where('num_solicitud',$num);
      $resultados = $this->db->get("detalle_solicitud");
          if ($resultados->num_rows() > 0) {
            return $resultados->row();
          }
          else{
            return false;
          }
    }

    public function get_valor($tipo)
    {
    $this->db->from("tipo_solicitud");
    $this->db->where('cod_tipo_solicitud',$tipo);
    $query = $this->db->get();
 
    return $query->row();
    }

    public function guardar_comprobante($data)
  {
    return $this->db->insert('comprobantes', $data);
  }

  public function get_compro($num){
    $this->db->where("cod_referencia", $num);
    $this->db->order_by("num_solicitud","desc");
    $resultados = $this->db->get("comprobantes");
    if ($resultados->num_rows() > 0) {
      return $resultados->row();
    }
    else{
      return false;
    }
  }
      public function get_bauches(){
    $this->db->select('*');
      $this->db->from('comprobantes');
      $this->db->order_by('num_solicitud', 'desc');
      $consulta = $this->db->get();
      $resultado = $consulta->result();
      return $resultado;
  }
      public function update_comprobante($referencia,$data)
    {
      $this->db->where("cod_referencia",$referencia);
      return $this->db->update("comprobantes",$data);
    }

}
