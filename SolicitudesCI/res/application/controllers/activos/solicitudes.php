<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class Solicitudes extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('download');
        $this->load->model('Backend_model');
        $this->load->model('Usuarios_model');
        $this->load->model('Solicitud_model');
        $this->load->model('Empresas_model');
        $this->load->model('upload_model');
        $this->form_validation->set_message('required', '%s es obligatorio.');
        $this->form_validation->set_message('numeric', '%s debe ser numérico.');
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
    public function carta_postulacion()
    {
      $this->load->view('overall/header');
      $this->load->view('overall/menuActivo');
      $this->load->view('activo/cartas/aviso_postulacion');
      $this->load->view('overall/footer');
    }
    public function constancia_culminacion()
    {
      $this->load->view('overall/header');
      $this->load->view('overall/menuActivo');
      $this->load->view('activo/cartas/aviso_culminacion');
      $this->load->view('overall/footer');
    }
    public function postulacion()
    {

      $data = array('control' =>$this->Backend_model->getSec(),
                    'errorArch'=>"",
                    'empresas'=>$this->Empresas_model->get_empresas()
  );
      $this->load->view('overall/header');
      $this->load->view('overall/menuActivo');
      $this->load->view('activo/cartas/postulacion',$data);
      $this->load->view('overall/footer');
    }

    public function culminacion()
    {

      $data = array('control' =>$this->Backend_model->getSec(),
        'errorArch'=>"");
      $this->load->view('overall/header');
      $this->load->view('overall/menuActivo');
      $this->load->view('activo/cartas/culminacion',$data);
      $this->load->view('overall/footer');
    }
    public function postulacion_store()
    {
        $config['upload_path'] = './uploads/archivos/';
        $config['allowed_types'] = 'pdf|xlsx|docx';
        $config['max_size'] = '20048';

      $this->form_validation->set_rules("numero","Numero","required|is_unique[solicitud_postulacion.num_solicitud]");
      $this->form_validation->set_rules("empresa","Empresa","required");
      $this->form_validation->set_rules("rif","RIF","required");
      $this->form_validation->set_rules("telefono","Telefono","required");
      $this->form_validation->set_rules("direccion","Direccion","required");
      $this->form_validation->set_rules("tutor_e","Tutor empresarial","required");
      $this->form_validation->set_rules("tutor_e_ci","Cedula del tutor empresarial","required");
      $this->form_validation->set_rules("profesion","Profesion del tutor empresarial","required");
      $this->form_validation->set_rules("cargo_asesor","Cargo del tutor empresarial","required");
       $this->form_validation->set_rules("userFile","Documento","required");
      if ($this->form_validation->run()== TRUE) {

         $this->load->library('upload',$config);

        if (!$this->upload->do_upload("userFile")) {

        $this->session->set_flashdata("error","La solicitud no puede ser procesada");
          redirect(base_url()."activos/solicitudes/postulacion");
        } else {

            $file_info = $this->upload->data();

            $numSol = $this->input->post('numero');
            $archivo = $file_info['file_name'];

           if ($this->Solicitud_model->subir_postulacion($numSol,$archivo)) {
             $this->session->set_flashdata("success","La solicitud fue procesada");
                redirect(base_url()."activos/solicitudes");
           }

            $this->session->set_flashdata("error","La solicitud no fue procesada");
          redirect(base_url()."activos/solicitudes");

        }

      }else {
        $this->postulacion();
      }

    }

    public function store()
  {

    $this->form_validation->set_rules("numero","Numero","required|is_unique[solicitud_postulacion.num_solicitud]");
    //$this->form_validation->set_rules("fileImagen","Documento","required");
    // $this->form_validation->set_rules("rif","RIF","required");
    // $this->form_validation->set_rules("telefono","Telefono","required");
    // $this->form_validation->set_rules("direccion","Direccion","required");
    // $this->form_validation->set_rules("asesor","Tutor empresarial","required");
    // $this->form_validation->set_rules("tutor_e_ci","Cedula del tutor empresarial","required");
    // $this->form_validation->set_rules("profesion","Profesion del tutor empresarial","required");
    // $this->form_validation->set_rules("cargo_asesor","Cargo del tutor empresarial","required");

    if ($this->form_validation->run()== TRUE) {

      $config['upload_path'] = './uploads/files/';
      $config['allowed_types'] = 'pdf|xlsx|docx|png|jpg';
      $config['max_size'] = '20048';

      $this->load->library('upload',$config);

      if (!$this->upload->do_upload("fileImagen")) {
          $data = array('control' =>$this->Backend_model->getSec(),
                        'errorArch'=>$this->upload->display_errors(),
                        'empresas'=>$this->Empresas_model->get_empresas()
      );
          $this->load->view('overall/header');
          $this->load->view('overall/menuActivo');
          $this->load->view('activo/cartas/postulacion',$data);
          $this->load->view('overall/footer');
      } else {

          $file_info = $this->upload->data();

          $fecha = date("Y-m-d");
          $num = $this->input->post('numero');
          $empresa = $this->input->post('idempresa');
          $tutor = $this->input->post('idtutor');
          $archivo = $file_info['file_name'];
          $doc_name = "Comprobante de Inscripcion";

          $solicitante = $this->session->userdata("id");
          $tipo = 10;
          $estatus = "En espera";

          $datos = array(
            'ci_solicitante' => $solicitante ,
            'fecha_solicitud' =>$fecha ,
            'num_solicitud' =>$num ,
            'cod_tipo_solicitud' =>$tipo ,
            'estado_solicitud' =>$estatus ,
            'rif_empresa' =>$empresa,
            'ci_asesor' =>$tutor
           );
          if ($this->Solicitud_model->subir_postulacion($datos)) {

            $this->updateControl();
            $this->updateSolicitud($tipo);
            $this->detalle_solicitud($num,$archivo,$doc_name,$fecha);
            $this->session->set_flashdata("success","La solicitud fue procesada");
            redirect(base_url()."activos/solicitudes");
          }else{
            $this->session->set_flashdata("error","La solicitud no pudo ser procesada");
            redirect(base_url()."activos/solicitudes/postulacion");
          }
      }

    }else {
       $this->postulacion();
    }
  }

    protected function datos_empresa($rif,$empresa,$telefono,$direccion)
    {
      $data = array(
        'rif' => $rif,
        'nombre_empresa' => $empresa,
        'telefono_empresa' => $telefono,
        'direccion_empresa' => $direccion );
      $this->Solicitud_model->save_datos_empresa($data);
    }

    protected function datos_asesor($rif,$tutor_e_ci,$tutor_e,$profesion,$cargo)
    {
      $data = array(
         'rif_empresa' => $rif,
         'ci_asesor' => $tutor_e_ci,
         'nombre_asesor' => $tutor_e,
         'profesion_asesor' => $profesion,
         'cargo_asesor' => $cargo );
    $this->Solicitud_model->save_datos_asesor($data);
    }

    protected function detalle_solicitud($num,$archivo,$doc_name,$fecha)
    {
      $data = array(
        'num_solicitud' => $num,
        'nombre_adj' => $doc_name,
        'ruta_adj' => $archivo,
        'fecha' => $fecha );
      $this->Solicitud_model->save_detalle_solicitud($data);
    }

    protected function updateSolicitud($tipo){
    $solicitudActual = $this->Solicitud_model->getSolicitud($tipo);
    $data  = array(
      'cantidad' => $solicitudActual->cantidad + 1,
    );
    $this->Solicitud_model->updateSolicitud($tipo,$data);
    }
    protected function updateControl()
    {
      $secuenciaActual = $this->Solicitud_model->getSec();
      $data  = array(
        'secuencia' => $secuenciaActual->secuencia + 1);
    $this->Solicitud_model->updateSec($data);
    }

    public function culminacion_store()
    {
         $config['upload_path'] = './uploads/files/';
         $config['allowed_types'] = 'pdf|xlsx|docx|png|jpg';
         $config['max_size'] = '20048';

         $this->load->library('upload',$config);

         if (!$this->upload->do_upload("fileImagen")) {
             // $data['archivo'] = "";
             // $data['error'] = "";
             $data = array('control' =>$this->Backend_model->getSec());
             $data['estado'] = "Archivo erroneo";
             $data['errorArch'] = $this->upload->display_errors();
             //$data['documentos'] = $this->upload_model->get_archivos();
             $this->load->view('overall/header');
             $this->load->view('overall/menuActivo');
             $this->load->view('activo/cartas/culminacion',$data);
             $this->load->view('overall/footer');
         } else {

             $file_info = $this->upload->data();
             $solicitante = $this->session->userdata("id");
             $fecha = date("Y-m-d");
             $num = $this->input->post('numero');
             $tipo = "11";
             $archivo = $file_info['file_name'];
             $doc_name = "Constancia de culminacion";

             $datos = array(
               'num_solicitud' =>$num ,
               'ci_solicitante' =>$solicitante ,
               'fecha_solicitud' =>$fecha ,
               'tipo_solicitud' =>$tipo
              );

            if ($this->Solicitud_model->subir($datos)) {
              $this->updateControl();
              $this->updateSolicitud($tipo);
              $this->detalle_solicitud($num,$archivo,$doc_name,$fecha);
              $this->session->set_flashdata("success","La solicitud fue procesada");
              redirect(base_url()."activos/solicitudes");
            }else{
              $this->session->set_flashdata("error","La solicitud no pudo ser procesada");
              redirect(base_url()."activos/solicitudes/culminacion");
            }

         }
    }

}
