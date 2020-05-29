<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class Documentos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Documentos_model');
    }
    public function index()
    {
      $ci=$this->session->userdata("id");

      $this->load->view('overall/header');
      $this->load->view('overall/menuActivo');
      $this->load->view('activo/documentos/list',$data);
      $this->load->view('overall/footer');
    }
    public function delete_documento($id){
     $this->Documentos_model->eliminar($id);
     redirect('informes');
    }
}
