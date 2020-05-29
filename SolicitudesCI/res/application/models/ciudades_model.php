<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ciudades_model extends CI_Model{ 
 
 public function __construct()
 {
 parent::__construct();
 }
 
 public function provincias()
 {
 $this->db->order_by('nombre_destino','asc');
 $provincia = $this->db->get('destino');
 if($provincia->num_rows()>0)
 {
 return $provincia->result();
 }
 }
 
 public function localidades($provincia)
 {
 $this->db->where('id_destino',$provincia);
 $this->db->order_by('nombre_ruta','asc');
 $localidades = $this->db->get('ruta');
 if($localidades->num_rows()>0)
 {
 return $localidades->result();
 }
 }
}