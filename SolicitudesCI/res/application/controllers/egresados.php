<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class Egresados extends CI_Controller {

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
    $this->load->view('overall/menuEgresado');
    $this->load->view('egresado/welcome',$data);
    $this->load->view('overall/footer');
  }
  public function contacto()
  {
    $this->load->view('overall/header');
    $this->load->view('overall/menuEgresado');
    $this->load->view('egresado/contacto');
    $this->load->view('overall/footer');
  }
  public function send_mensaje()
    {
    $nombres = $this->input->post("nombres");
    $asunto = $this->input->post("asunto");
    $correo = $this->input->post("email");
    $mensaje = $this->input->post("mensaje");
    $fecha = date("Y-m-d");

    $this->form_validation->set_rules("nombres","Nombres","required");
    $this->form_validation->set_rules("asunto","Asunto","required");
    $this->form_validation->set_rules("email","Email","required");
    $this->form_validation->set_rules("mensaje","Mensaje","required");

    if ($this->form_validation->run()) {
      $data = array(
        'nombres' => $nombres,
        'asunto' => $asunto,
        'correo' => $correo,
        'fecha' => $fecha,
        'mensaje' => $mensaje
      );
      if ($this->Usuarios_model->send_mensaje($data)) {
        $this->session->set_flashdata("success","Su correo se envio satisfactoriamente");
        redirect(base_url()."egresados/");
      }else {
        $this->session->set_flashdata("error","Su correo no se pudo enviar!!");
        redirect(base_url()."egresado/contacto/");
      }
    }
    else{
      $this->contacto();
    }
  }


}
