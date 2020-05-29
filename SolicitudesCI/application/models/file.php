<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class File extends CI_Model{
 
    public function getRows($id = ''){
        $this->db->select('id,title_name,file_name,created');
        $this->db->from('imagenes');
        if($id){
            $this->db->where('id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('created','desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    
    public function insert($data = array()){
        $insert = $this->db->insert_batch('imagenes',$data);
        return $insert?true:false;
    }
    
}