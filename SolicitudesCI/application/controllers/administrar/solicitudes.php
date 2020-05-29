<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class Solicitudes extends CI_Controller {

    function __construct() { 
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('download');
        $this->load->model('Backend_model');
        $this->load->model('Documentos_model');
        $this->load->model('Usuarios_model');
        $this->load->model('Solicitud_model');
        $this->load->model('Empresas_model');
        $this->load->model('upload_model');
        $this->form_validation->set_message('required', '%s es obligatorio.');
        $this->form_validation->set_message('numeric', '%s debe ser numérico.');
    }
    public function index()
    {
      // $ci=$this->session->userdata("id");
      // $data = array(
      //   'solicitudes' =>$this->Solicitud_model->get_solicitudes($ci),
      //   'especiales' =>$this->Solicitud_model->get_postulaciones($ci)
      //  );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/solicitudes/list'/*,$data*/);
      $this->load->view('overall/footer');
    }
    //Usuarios activos 
    public function postulacion()
    { 
      $data = array( 
        'solicitudes' =>$this->Solicitud_model->get_All_postulaciones()
       );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/solicitudes/postulacion',$data);
      $this->load->view('overall/footer');
    }
    public function culminacion()
    {
      $id="11";
      $data = array(
        'solicitudes' =>$this->Solicitud_model->get_generales($id)
       );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/solicitudes/culminacion',$data);
      $this->load->view('overall/footer');
    }
    public function modificacion()
    {
      $data = array(
        'solicitudes' =>$this->Solicitud_model->get_All_postulaciones()
       );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/solicitudes/modificacion',$data);
      $this->load->view('overall/footer');
    }
    //Egresados
    public function posicion()
    {
      $id="12";
      $data = array(
        'solicitudes' =>$this->Solicitud_model->get_generales($id)
       );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/solicitudes/posicion',$data);
      $this->load->view('overall/footer');
    }

    public function modalidad()
    {
      $id="13";
      $data = array(
        'solicitudes' =>$this->Solicitud_model->get_generales($id)
       );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/solicitudes/modalidad',$data);
      $this->load->view('overall/footer');
    }

    public function certificacion_Pensum()
    {
      $id="15";
      $data = array(
        'solicitudes' =>$this->Solicitud_model->get_generales($id)
       );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/solicitudes/pensum',$data);
      $this->load->view('overall/footer');
    }

    public function certificacion_Programas()
    {
      $id="14";
      $data = array(
        'solicitudes' =>$this->Solicitud_model->get_generales($id)
       );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/solicitudes/programas',$data);
      $this->load->view('overall/footer');
    }
    //Especiales
    public function cambio()
    {
      $id="9";
      $data = array(
        'solicitudes' =>$this->Solicitud_model->get_all_especiales($id)
       );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/solicitudes/cambio',$data);
      $this->load->view('overall/footer');
    }

    public function traslado()
    {
      $data = array(
        'solicitudes' =>$this->Solicitud_model->get_All_postulaciones()
       );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/solicitudes/traslado',$data);
      $this->load->view('overall/footer');
    }

    public function reincorporacion()
    {
      $id="8";
      $data = array(
        'solicitudes' =>$this->Solicitud_model->get_all_especiales($id)
       );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/solicitudes/reincorporacion',$data);
      $this->load->view('overall/footer');
    }
    public function equivalencias()
    {
      $data = array(
        'solicitudes' =>$this->Solicitud_model->equivalencias()
       );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/solicitudes/equivalencias',$data);
      $this->load->view('overall/footer');
    }
    public function ver_postulacion($num_sol)
    {
      $data = array('ordenes' =>$this->Solicitud_model->postulacion($num_sol),
      'documentos' =>$this->Documentos_model->get_documentos($num_sol), );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/solicitud/ver_postulacion',$data);
      $this->load->view('overall/footer');
    }
        public function ver_solicitud($num_sol)
    {
      $data = array('ordenes' =>$this->Solicitud_model->general($num_sol),
      'documentos' =>$this->Documentos_model->get_documentos($num_sol), );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('solicitud/solicitud_general',$data);
      $this->load->view('overall/footer');
    }
            public function ver_especiales($num_sol)
    {
      $data = array('ordenes' =>$this->Solicitud_model->especial($num_sol),
      'documentos' =>$this->Documentos_model->get_documentos($num_sol), );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('solicitud/solicitud_especial',$data);
      $this->load->view('overall/footer');
    }
                public function ver_equivalencias($num_sol)
    {
      $data = array('ordenes' =>$this->Solicitud_model->equivalencia($num_sol),
      'documentos' =>$this->Documentos_model->get_documentos($num_sol), );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('solicitud/solicitud_equivalencia',$data);
      $this->load->view('overall/footer');
    }
}