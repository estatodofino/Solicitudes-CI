<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class Solicitudes extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Usuarios_model');
        $this->load->model('Solicitud_model');
        $this->form_validation->set_message('required', '%s es obligatorio.');
        $this->form_validation->set_message('numeric', '%s debe ser numérico.');
    }
    public function index()
    {$ci=$this->session->userdata("id");
      $data = array('solicitudes' =>$this->Solicitud_model->get_solicitudes($ci) );
      $this->load->view('overall/header');
      $this->load->view('overall/menuSoles');
      $this->load->view('activo/solicitudes/list');
      $this->load->view('overall/footer');
    }
    public function traslado_aviso()
    {
      $this->load->view('overall/header');
      $this->load->view('overall/menuSoles');
      $this->load->view('especiales/cartas/aviso_traslado');
      $this->load->view('overall/footer');
    }
    public function equivalencias_aviso()
    {
      $this->load->view('overall/header');
      $this->load->view('overall/menuSoles');
      $this->load->view('especiales/cartas/aviso_equivalencias');
      $this->load->view('overall/footer');
    }
    public function cambio_aviso()
    {
      $this->load->view('overall/header');
      $this->load->view('overall/menuSoles');
      $this->load->view('especiales/cartas/aviso_cambio');
      $this->load->view('overall/footer');
    }

    public function cambio()
    {
      $this->load->view('overall/header');
      $this->load->view('overall/menuSoles');
      $this->load->view('especiales/cartas/cambio');
      $this->load->view('overall/footer');
    }
    public function equivalencias()
    {
      $this->load->view('overall/header');
      $this->load->view('overall/menuSoles');
      $this->load->view('especiales/cartas/equivalencias');
      $this->load->view('overall/footer');
    }
    public function traslado()
    {
      $this->load->view('overall/header');
      $this->load->view('overall/menuSoles');
      $this->load->view('especiales/cartas/traslado');
      $this->load->view('overall/footer');
    }
    public function postulacion_store()
    {
      $numSol = $this->input->post("numero");
      $empresa = $this->input->post("empresa");
      $rif = $this->input->post("rif");
      $telefono = $this->input->post("telefono");
      $direccion = $this->input->post("direccion");
      $tutor_e = $this->input->post("tutor_e");
      $tutor_e_ci = $this->input->post("tutor_e_ci");
      $profesion = $this->input->post("profesion");
      $tutor_a = $this->input->post("tutor_a");
      $tutor_a_ci = $this->input->post("tutor_a_ci");
      $documento = $this->input->post("userFile");
      $solicitante=$this->session->userdata("id");

      $this->form_validation->set_rules("numero","Numero","required|is_unique[bienes.num_bien]");
      $this->form_validation->set_rules("empresa","Empresa","required");
      $this->form_validation->set_rules("rif","RIF","required");
      $this->form_validation->set_rules("telefono","Telefono","required");
      $this->form_validation->set_rules("direccion","Direccion","required");
      $this->form_validation->set_rules("tutor_e","Tutor empresarial","required");
      $this->form_validation->set_rules("tutor_e_ci","Cedula del tutor empresarial","required");
      $this->form_validation->set_rules("profesion","Profesion del tutor empresarial","required");
      $this->form_validation->set_rules("tutor_a","Tutor academico","required");
      $this->form_validation->set_rules("tutor_a_ci","Cedula Tutor Academico","required");
      $this->form_validation->set_rules("userFile","Documento","required");
      if ($this->form_validation->run()== TRUE) {

      }else {
        $this->postulacion();
      }

    }
}
