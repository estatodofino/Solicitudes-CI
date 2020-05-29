<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class Solicitudes extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Usuarios_model');
        $this->load->model('Solicitud_model');
        $this->load->model('Documentos_model');
        $this->load->model('Backend_model');
        $this->form_validation->set_message('required', '%s es obligatorio.');
        $this->form_validation->set_message('numeric', '%s debe ser numérico.');
    }
    public function index()
    {
      $ci=$this->session->userdata("id");
      $data = array('solicitudes' =>$this->Solicitud_model->get_solicitudes($ci) );
      $this->load->view('overall/header');
      $this->load->view('overall/menuEgresado');
      $this->load->view('egresado/solicitudes/list');
      $this->load->view('overall/footer');
    }

    public function sol_certificacion()
    {
      $this->load->view('overall/header');
      $this->load->view('overall/menuEgresado');
      $this->load->view('egresado/cartas/certi_aviso');
      $this->load->view('overall/footer');
    }

    public function sol_modalidad()
    {
      $this->load->view('overall/header');
      $this->load->view('overall/menuEgresado');
      $this->load->view('egresado/cartas/aviso_modal');
      $this->load->view('overall/footer');
    }

    public function sol_pensum()
    {
      $this->load->view('overall/header');
      $this->load->view('overall/menuEgresado');
      $this->load->view('egresado/cartas/aviso_pensum');
      $this->load->view('overall/footer');
    }
    public function sol_posicion_rango()
    {
      $this->load->view('overall/header');
      $this->load->view('overall/menuEgresado');
      $this->load->view('egresado/cartas/aviso_posicion');
      $this->load->view('overall/footer');
    }
    public function Certificacion()
    {
      $id = "000010";
      $data = array('control' =>$this->Backend_model->getSec(),
                    'documentos'=>$this->Documentos_model->get_documentos($id));
      $this->load->view('overall/header');
      $this->load->view('overall/menuEgresado');
      $this->load->view('egresado/cartas/Certificacion',$data);
      $this->load->view('overall/footer');
    }
    public function modalidad()
    {
      $data = array('control' =>$this->Backend_model->getSec() );
      $this->load->view('overall/header');
      $this->load->view('overall/menuEgresado');
      $this->load->view('egresado/cartas/modalidad',$data);
      $this->load->view('overall/footer');
    }
    public function posicion()
    {
      $control = $this->Backend_model->getSec();
      $data = array('control' =>$this->Backend_model->getSec(),
                    'errorArch'=>"",
                    //'documentos'=>$this->Documentos_model->get_documentos
                  );
      $this->load->view('overall/header');
      $this->load->view('overall/menuEgresado');
      $this->load->view('egresado/cartas/posicion',$data);
      $this->load->view('overall/footer');
    }

    public function posicion_store()
    {
      $config['upload_path'] = './uploads/archivos/';
      $config['allowed_types'] = 'pdf|xlsx|docx';
      $config['max_size'] = '20048';

      $this->form_validation->set_rules("numero","Numero","required|is_unique[solicitud_postulacion.num_solicitud]");
      $this->form_validation->set_rules("egreso","Periodo de egreso","required");
      // $this->form_validation->set_rules("fileCI","Fotocopia de ci","required");
      // $this->form_validation->set_rules("filePay","Comprobante de pago","required");

      if ($this->form_validation->run()== TRUE) {



      }else {
        $this->session->set_flashdata("error","UPS! x_x");
        $this->posicion();
      }
    }

    public function pensum()
    {
      $data = array('control' =>$this->Backend_model->getSec() );
      $this->load->view('overall/header');
      $this->load->view('overall/menuEgresado');
      $this->load->view('egresado/cartas/pensum',$data);
      $this->load->view('overall/footer');
    }

    public function subirDoc()
    {
      $numSol = $this->input->post("id");
      $nombre = $this->input->post("titulo");
      $this->form_validation->set_rules('fileImagen','required');
      $this->form_validation->set_rules('titulo','required');


      $res=$this->Documentos_model->get_documento($numSol,$nombre);
      // if ($this->form_validation->run() == TRUE) {
      $config['upload_path'] = './uploads/files/';
      $config['allowed_types'] = 'gif|jpg|png|pdf';
      $config['max_size'] = '2048';
      $config['max_width'] = '2024';
      $config['max_height'] = '2008';
        if ($res) {
               $this->session->set_flashdata("error",$nombre." Ya ha sido cargado");
               $data = array('control' =>$this->Backend_model->getSec(),
                             'errorArch'=>""
                           );
               $this->load->view('overall/header');
               $this->load->view('overall/menuEgresado');
               $this->load->view('egresado/cartas/posicion',$data);
               $this->load->view('overall/footer');
             }else{
              $this->load->library('upload',$config);

              if (!$this->upload->do_upload("fileImagen")) {
                $data = array('control' =>$this->Backend_model->getSec(),
                              'errorArch'=>$this->upload->display_errors()
                            );
                $this->load->view('overall/header');
                $this->load->view('overall/menuEgresado');
                $this->load->view('egresado/cartas/posicion',$data);
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
               redirect(base_url()."egresado/solicitudes/posicion");

                }else {
               $this->session->set_flashdata("error","Error al cargar el documento");
               redirect(base_url()."egresado/solicitudes/posicion");
             }
          }
       }
    }

    public function get_documentos()
    {
     $numSol = $this->input->post("id");
     $data = $this->Documentos_model->get_documentos($numSol);
     echo json_encode($data);
    }

    public function delete_documento(){
      $num = $this->input->post("num");
      $data = $this->Documentos_model->eliminar_documentos($num);
 	    echo json_encode($data);
   }
}
