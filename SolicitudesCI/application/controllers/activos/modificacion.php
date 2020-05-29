<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

    class Modificacion extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('download');
        $this->load->model('Backend_model');
        $this->load->model('Documentos_model');
        $this->load->model('Usuarios_model');
        $this->load->model('Solicitud_model');
        $this->load->model('upload_model');
        $this->form_validation->set_message('required', '%s es obligatorio.');
        $this->form_validation->set_message('numeric', '%s debe ser numérico.');
    }

    public function index()
    {
    	# code...
    }

        public function subirDoc()
    {
      $sec=$this->Backend_model->getSec();
      $num = $sec->secuencia+1;
      $numSol = $this->input->post("id");
      $nombre = $this->input->post("titulo");
      $direccion = $this->input->post("direccion"); 
      $direcciones = $this->input->post("direccion2");
      $this->form_validation->set_rules('fileImagen','required');
      $this->form_validation->set_rules('titulo','required');


      $res=$this->Documentos_model->get_documento($numSol,$nombre);
      // if ($this->form_validation->run() == TRUE) {
      $config['upload_path'] = './uploads/files/';
      $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
      $config['max_size'] = '2048';
      $config['max_width'] = '2024';
      $config['max_height'] = '2008';
        if ($res) {
               $this->session->set_flashdata("error",$nombre." Ya ha sido cargado");
               $data = array('control' =>$this->Backend_model->getSec(),
                             'errorArch'=>"",
                    'documentos'=>$this->Documentos_model->get_documentos($num)
                           );
               $this->load->view('overall/header');
               $this->load->view('overall/menuEgresado');
               $this->load->view($direcciones,$data);
               $this->load->view('overall/footer');
             }else{
              $this->load->library('upload',$config);

              if (!$this->upload->do_upload("fileImagen")) {
                $data = array('control' =>$this->Backend_model->getSec(),
                              'errorArch'=>$this->upload->display_errors(),
                    'documentos'=>$this->Documentos_model->get_documentos($num)
                            );
                $this->load->view('overall/header');
                $this->load->view('overall/menuEgresado');
                $this->load->view($direcciones,$data);
                $this->load->view('overall/footer');

              } else {

              $file_info = $this->upload->data();

              //$this->_create_thumbnail($file_info['file_name']);
              //$id = $this->input->post('id');
              //$titulo = $this->input->post('titulo');
              $imagen = $file_info['file_name'];
              $fecha = date("Y-m-d");
                $data = array(
                  'num_solicitud' =>$numSol ,
                  'nombre_adj' =>$nombre,
                  'ruta_adj' =>$imagen,
                  'fecha'=>$fecha
                 );
             if ($this->Documentos_model->save_detalle_solicitud($data)) {
               $this->session->set_flashdata("success","Se guardo el documento");
               redirect(base_url().$direccion);

                }else {
               $this->session->set_flashdata("error","Error al cargar el documento");
               redirect(base_url().$direccion);
             }
          }
       }
    }

}
