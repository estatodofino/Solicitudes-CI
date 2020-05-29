<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materias_model extends CI_Model {
	public function getID($link){
		$this->db->like("link",$link);
		$resultado = $this->db->get("menus");
		return $resultado->row();
	}
	public function get_materias()
	{
	$this->db->select("*");
    $this->db->from("materias");
    //$this->db->where("u.estado","0");
    $resultados = $this->db->get();
    return $resultados->result(); 
	}

	public function get_materia_name($nombre){
	$this->db->where("nombre_materia",$nombre);
	$resultados = $this->db->get("materias");
	if ($resultados->num_rows() > 0) {
		return $resultados->row();
	}
	else{
		return false; 
	}
	} 
	public function get_by_code($id){
	$this->db->where("cod_materia",$id);
	$resultados = $this->db->get("materias");
	if ($resultados->num_rows() > 0) {
		return $resultados->row();
	}
	else{
		return false;
	}
	}

	public function materia_add($data)
	{
		$this->db->insert('materias', $data);
		return $this->db->insert_id();
	}
	public function update($id,$data){
    $this->db->where("cod_materia",$id);
    return $this->db->update("materias",$data);
    }
}