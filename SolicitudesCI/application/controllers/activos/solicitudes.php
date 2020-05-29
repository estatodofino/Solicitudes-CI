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
        $this->load->model('Materias_model');
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
    public function Modificacion_aviso()
    {
      $ci = $this->session->userdata("id");
      $periodo_actual = $this->Backend_model->getPeriodo();
      $cod_modificacion = $this->Backend_model->getModificacion($periodo_actual->cod_periodo);
      $res_mod = $this->Solicitud_model->modificacion($ci,$cod_modificacion->cod_modificacion);
      $data = array('modificacion' =>$this->Backend_model->getModificacion($periodo_actual->cod_periodo),
      'respuesta' => $res_mod );
      $this->load->view('overall/header');
      $this->load->view('overall/menuActivo'); 
      $this->load->view('activo/cartas/aviso_modificacion');
      $this->load->view('overall/footer');
    }
    public function Modificacion()
    {
      $sec=$this->Backend_model->getSec();
      $num = $sec->secuencia+1;
      $data = array('control' =>$this->Backend_model->getSec(),
              'errorArch'=>"",
              'materias' => $this->Materias_model->get_materias(),
              'documentos'=>$this->Documentos_model->get_documentos($num),
              //'modid'=> $this->Backend_model->LastID()
      );
      $this->load->view('overall/header');
      $this->load->view('overall/menuActivo');
      $this->load->view('activo/cartas/modificacion',$data);
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
    $periodo = $this->Backend_model->getPeriodo();

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

    $tipo = "10";
    $ci = $this->session->userdata("id");
    $tabla_sol = "solicitud_postulacion";
    $code = "cod_tipo_solicitud";
    $periodo_actual = $this->Backend_model->getPeriodo();

    $solechas = $this->Solicitud_model->solicitudes($ci,$periodo_actual->cod_periodo,$tabla_sol,$tipo,$code);

    if ($solechas != TRUE) {
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
          $periodo_activo = $this->Backend_model->getPeriodo();
          $fecha = date("Y-m-d");
          $num = $this->input->post('numero');
          $empresa = $this->input->post('idempresa');
          $tutor = $this->input->post('idtutor');
          $periodo = $periodo_activo->cod_periodo;
          $archivo = $file_info['file_name'];
          $doc_name = "Comprobante de Inscripcion";

          $solicitante = $this->session->userdata("id");
          $estatus = "En espera";

          $datos = array(
            'ci_solicitante' => $solicitante ,
            'fecha_solicitud' =>$fecha ,
            'num_solicitud' =>$num ,
            'cod_tipo_solicitud' =>$tipo ,
            'estado_solicitud' =>$estatus ,
            'rif_empresa' =>$empresa,
            'ci_asesor' =>$tutor,
            'periodo'=>$periodo
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
    } else{
       $this->session->set_flashdata("error","Ya ha realizado esta solicitud, espere a que finalice el periodo actual");
       redirect(base_url()."activos/solicitudes/postulacion");
    }
  }

      public function culminacion_store()
    {
     
     $ci = $this->session->userdata("id");
     $tabla_sol = "solicitud_general";
     $periodo_actual = $this->Backend_model->getPeriodo();
     $tipo = "11";
     $code="tipo_solicitud";

     $solechas = $this->Solicitud_model->solicitudes($ci,$periodo_actual->cod_periodo,$tabla_sol,$tipo,$code);

      if ($solechas != TRUE) {
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
             $periodo_activo = $this->Backend_model->getPeriodo();
             $solicitante = $this->session->userdata("id");
             $fecha = date("Y-m-d");
             $num = $this->input->post('numero');
             $periodo = $periodo_activo->cod_periodo;
             $archivo = $file_info['file_name'];
             $doc_name = "Comprobante de inscripción";

             $datos = array(
               'num_solicitud' =>$num ,
               'ci_solicitante' =>$solicitante ,
               'fecha_solicitud' =>$fecha ,
               'tipo_solicitud' =>$tipo,
               'periodo' => $periodo
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

      }else{
          $this->session->set_flashdata("error","Ya ha realizado esta solicitud, espere a que finalice el periodo actual");
       redirect(base_url()."activos/solicitudes/culminacion");
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


    public function ver_postulacion($num_sol)
    {
      $data = array('ordenes' =>$this->Solicitud_model->postulacion($num_sol),
      'documentos' =>$this->Documentos_model->get_documentos($num_sol), );
      $this->load->view('overall/header');
      $this->load->view('overall/menuActivo');
      $this->load->view('admin/solicitud/ver_postulacion',$data);
      $this->load->view('overall/footer');
    }
        public function ver_solicitud($num_sol)
    {
      $data = array('ordenes' =>$this->Solicitud_model->general($num_sol),
      'documentos' =>$this->Documentos_model->get_documentos($num_sol), );
      $this->load->view('overall/header');
      $this->load->view('overall/menuActivo');
      $this->load->view('solicitud/solicitud_general',$data);
      $this->load->view('overall/footer'); 
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
               $this->load->view('overall/menuActivo');
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
                $this->load->view('overall/menuActivo');
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
    public function store_modificacion()
    {
      $this->form_validation->set_rules("numero","Numero","required|is_unique[solicitud_modificacion.num_solicitud]");

      $numero = $this->input->post("numero");
      $periodo_actual = $this->Backend_model->getPeriodo();      
      $ci = $this->session->userdata("id");
      $fecha_solicitud = date("Y-m-d");
      $estado = "en espera";
      $tipo_solicitud = "16";
      $cod_modificacion = $this->Backend_model->getModificacion($periodo_actual->cod_periodo);

      $idmaterias = $this->input->post("idmaterias");
      $tipo = $this->input->post("tipos");
      $condiciones = $this->input->post("condiciones");

      $justificacion = $this->input->post("justificacion");

      //$res_mod = $this->Solicitud_model->modificacion($ci,$cod_modificacion->cod_modificacion);
      $data = array(
                      'num_solicitud' =>$numero ,
                      'ci_solicitante' => $ci ,
                      'fecha_solicitud' => $fecha_solicitud ,
                      'estatus_solicitud' => $estado,
                      'tipo_solicitud' => $tipo_solicitud ,
                      'cod_modificacion' => $cod_modificacion->cod_modificacion,
                      'estado' => "1"
                       );

      if ($this->Solicitud_model->save_modificacion($data)) {
          $this->updateControl();
          $idventa = $this->Backend_model->LastID();
          $this->updateSolicitud($tipo_solicitud);
          $this->save_modificacion_detalle($idmaterias,$idventa->id,$tipo,$condiciones);
          $this->save_justificacion($idventa->id,$justificacion);
          $this->session->set_flashdata("success","Se envio su solicitud");
          redirect(base_url()."activos/solicitudes");
      }else{
        $this->session->set_flashdata("error","Error al enviar la solicitud");
        redirect(base_url()."activos/solicitudes/modificacion");
      }
    }

    protected function save_modificacion_detalle($materias,$idventa,$tipo,$condiciones)
    {
      //$idventa = $this->Backend_model->LastID();
      for ($i=0; $i < count($materias); $i++) { 
      $data  = array(
        'cod_materia' =>$materias[$i], 
        'id_modificacion' =>$idventa,
        'condicion' =>$condiciones[$i],
        'tipo' =>$tipo[$i],
        'respuesta'=> "en espera"
      );

      $this->Solicitud_model->save_modificacion_detalle($data);
    }

    }
    protected function save_justificacion($idventa,$justificacion)
    {
      //$idventa = $this->Backend_model->LastID();
      $data = array(
                    'id_modificacion' =>$idventa,
                    'justificacion' =>$justificacion 
                  );
      $this->Solicitud_model->save_justificacion($data);
    }

}

