<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class Backend extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Backend_model');
        $this->form_validation->set_message('required', '%s es obligatorio.');
        $this->form_validation->set_message('numeric', '%s debe ser numérico.');
        $this->form_validation->set_message('is_unique', '%s ya existe en la base de datos.');
    }
    public function index()
    {
      $ci=$this->session->userdata("id");
      $data = array(
        'solicitudes' =>$this->Solicitud_model->get_solicitudes($ci),
        'especiales' =>$this->Solicitud_model->get_postulaciones($ci)
       );
      $this->load->view('overall/header');
      $this->load->view('overall/menuActivo');
      $this->load->view('activo/solicitudes/list',$data);
      $this->load->view('overall/footer');
    }
    public function nueva_empresa()
    {
      $ci=$this->session->userdata("id");
      // $data = array(
      //   'solicitudes' =>$this->Solicitud_model->get_solicitudes($ci),
      //   'especiales' =>$this->Solicitud_model->get_postulaciones($ci)
      //  );
      $this->load->view('overall/header');
      $this->load->view('overall/menuActivo');
      $this->load->view('activo/extra/empresa_add');
      $this->load->view('overall/footer');
    }

    public function store_empresa()
    {
       $nombre = $this->input->post("nombre");
       $rif = $this->input->post("rif");
       $telefono = $this->input->post("telefono");
       $direccion = $this->input->post("direccion");

      $this->form_validation->set_rules("nombre","Nombre de la empresa","required|is_unique[empresas.nombre_empresa]");
      $this->form_validation->set_rules("rif","RIF De la empresa","required|is_unique[empresas.rif]");
      $this->form_validation->set_rules("telefono","Telefono","required");
      $this->form_validation->set_rules("direccion","Direccion","required");

      if ($this->form_validation->run() == TRUE) {
        $data = array(
          'nombre_empresa' =>$nombre ,
          'rif' =>$rif ,
          'telefono_empresa' =>$telefono ,
          'direccion_empresa' =>$direccion  );

          if ($this->Backend_model->subir_empresa($data)) {
            $this->session->set_flashdata("success","Se ha guardado la correctamente");
            redirect(base_url()."activos/solicitudes/postulacion");
          } else {
            $this->session->set_flashdata("error","No se ha guardado la informacion");
            redirect(base_url()."activos/solicitudes/postulacion");
          }
      }else{
        $this->nueva_empresa();
      }

    }
    public function get_asesor()
  {
    $id = $this->input->post('id');
    $data = $this->Backend_model->get_asesor($id);
    echo json_encode($data);
  }
  }
