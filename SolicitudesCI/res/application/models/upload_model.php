<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload_model extends CI_Model {

    public function construct() {
        parent::__construct();
    }

    //FUNCIÓN PARA INSERTAR LOS DATOS DE LA IMAGEN SUBIDA
    function subir($titulo,$imagen,$doc_name,$fecha)
    {
        $data = array(
            'num_solicitud' => $titulo,
            'nombre_adj' =>$doc_name,
            'ruta_adj' => $imagen,
            'fecha' => $fecha
        );
        return $this->db->insert('detalle_solicitud', $data);
    }
    public function get_archivo($name)
    {
      $this->db->select('*');
      $this->db->from('detalle_solicitud');
      $this->db->where('ruta_adj', $name);
      $consulta = $this->db->get();
      $resultado = $consulta->row();
      return $resultado;
    }
        public function get_archivos(){
      $this->db->select('*');
      $this->db->from('detalle_solicitud');
      $this->db->order_by('fecha', 'asc');
      $resultados = $this->db->get();
      if ($resultados->num_rows() > 0) {
        return $resultados->result();
      }else{
        return false;
      }
   }
}
