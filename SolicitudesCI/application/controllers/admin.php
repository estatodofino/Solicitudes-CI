<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Usuarios_model');
    }
  public function index()
  {
    $ci = $this->session->userdata("id");
    $data = array('usuario' =>$this->Usuarios_model->get_user($ci) );
    $this->load->view('overall/header');
    $this->load->view('overall/menuActivo');
    $this->load->view('admin/administrador',$data);
    $this->load->view('overall/footer');
  }


}
