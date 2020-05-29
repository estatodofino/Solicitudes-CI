<?php
class Usuarios_model extends CI_Model {
   public function __construct() {
      parent::__construct();
   }

  public function login($cedula, $password){
    $this->db->where("ci_usuario", $cedula);
    $this->db->where("password", $password);

    $resultados = $this->db->get("usuarios");
    if ($resultados->num_rows() > 0) {
      return $resultados->row();
    }
    else{
      return false;
    }
  }

  public function save($data)
  {
  return $this->db->insert("usuarios",$data);
  }

  public function save_periodo($data)
  {
  return $this->db->insert("usuario_periodo",$data);
  }

  public function get_user($ci)
  {
    $this->db->select("*");
    $this->db->from("usuarios");
    $this->db->where('ci_usuario',$ci);
    $resultados = $this->db->get();
    if ($resultados->num_rows() > 0) {
      return $resultados->row();
    }
    else{
      return false;
    }
  }
  public function send_mensaje($data)
  {
  return $this->db->insert("mensajes",$data);
  }
  public function update($id,$data){
  $this->db->where("ci_usuario",$id);
  return $this->db->update("usuarios",$data);
  }
  public function getUser($id){
  $this->db->select("*");
  $this->db->from("usuarios");
  $this->db->where("ci_usuario",$id);
  //$this->db->where("estado","1");
  $resultado = $this->db->get();
  return $resultado->row();
}
}
