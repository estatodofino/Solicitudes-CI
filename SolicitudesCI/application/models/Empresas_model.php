<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Empresas_model extends CI_Model{

   public function __construct()
   {
   parent::__construct();
   }

   public function get_empresas()
   {
     $this->db->order_by('nombre_empresa','asc');
     $resultado = $this->db->get('empresas');
     if($resultado->num_rows()>0)
     {
     return $resultado->result();
     }
   }

   public function get_empresa($rif)
    {
    $this->db->select("*");
      $query=$this->db->get("empresas");
     $this->db->where('rif_empresa',$rif);
      return $query->row();
    }

}
