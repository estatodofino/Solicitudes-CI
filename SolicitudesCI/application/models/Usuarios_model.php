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
    public function save_detalles($data)
  {
  return $this->db->insert("usuario_data",$data);
  }
  public function save_periodo($data)
  {
  return $this->db->insert("usuario_periodo",$data);
  }

    public function get_all_users()
  {
    $this->db->select("u.*,tu.tipo_usuario as tipo");
    $this->db->from("usuarios u");
    $this->db->join("tipo_usuario tu","u.cod_tipo_usuario = tu.cod_tipo_usuario");
    $this->db->where("u.estado","0");
    $resultados = $this->db->get();
    return $resultados->result();
  }

  public function get_user($ci)
  {
    $this->db->select("u.*,,tu.tipo_usuario as tipo,ud.*");
    $this->db->from("usuarios u");
    $this->db->join("tipo_usuario tu","u.cod_tipo_usuario = tu.cod_tipo_usuario");
    $this->db->join("usuario_data ud","ud.ci_usuario = u.ci_usuario");
    $this->db->where('u.ci_usuario',$ci);
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
  return $this->db->update("usuario_data",$data);
  }
  public function update_id($id,$data){
  $this->db->where("ci_usuario",$id);
  return $this->db->update("usuarios",$data);
  }
  public function getUser($id){
  $this->db->select("*");
  $this->db->from("usuario_data");
  $this->db->where("ci_usuario",$id);
  //$this->db->where("estado","1");
  $resultado = $this->db->get();
  return $resultado->row();
}
  public function getUser_pass($id){
  $this->db->select("*");
  $this->db->from("usuarios");
  $this->db->where("ci_usuario",$id);
  //$this->db->where("estado","1");
  $resultado = $this->db->get();
  return $resultado->row();
}

public function getUsuarios() 
  {
    $this->db->select("u.*,tu.tipo_usuario as tipo");
    $this->db->from("usuarios u");
    $this->db->join("tipo_usuario tu","u.cod_tipo_usuario = tu.cod_tipo_usuario");
    $this->db->where("u.estado",1);
    $resultados = $this->db->get();
    return $resultados->result();
  }

  public function get_Usuarios($nombre)
  {
    $this->db->select("u.*,tu.tipo_usuario as tipo");
    $this->db->from("tipo_usuario tu");
    $this->db->join("usuarios u","u.cod_tipo_usuario = tu.cod_tipo_usuario");
    $this->db->where("tu.tipo_usuario",$nombre);    
    $this->db->where("u.estado","1");
    $resultados = $this->db->get();
    return $resultados->result();
  }

  public function get_tipo_user($id)
  {
    $this->db->select("tu.tipo_usuario as tipo,u.*");
    $this->db->from("tipo_usuario tu");
    $this->db->join("usuarios u","u.cod_tipo_usuario = tu.cod_tipo_usuario");
    $this->db->like('tu.tipo_usuario',$id);
    $this->db->where("u.estado","1");
    $consulta = $this->db->get();
  $resultado = $consulta->result();
  return $resultado;
  }

  public function tipo_user_ci($id){
  $this->db->select("*");
  $this->db->from("usuarios");
  $this->db->where("ci_usuario",$id);
  //$this->db->where("estado","1");
  $resultado = $this->db->get();
  return $resultado->row();
}
  public function getRoles(){
  $resultados = $this->db->get("tipo_usuario");
  return $resultados->result();
  }


}
