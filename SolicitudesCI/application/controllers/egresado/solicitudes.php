<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class Solicitudes extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Backend_model');
        $this->load->model('Usuarios_model');
        $this->load->model('Solicitud_model');
        $this->load->model('Documentos_model');
        $this->form_validation->set_message('required', '%s es obligatorio.');
        $this->form_validation->set_message('numeric', '%s debe ser numérico.');
    }
    public function index()
    {
      $ci=$this->session->userdata("id");
      $data = array('solicitudes' =>$this->Solicitud_model->get_solicitudes($ci) );
      $this->load->view('overall/header');
      $this->load->view('overall/menuEgresado');
      $this->load->view('egresado/solicitudes/list',$data);
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
      $sec=$this->Backend_model->getSec();
      $num = $sec->secuencia+1;
      $data = array('control' =>$this->Backend_model->getSec(),
                    'errorArch'=>"",
                    'documentos'=>$this->Documentos_model->get_documentos($num),
                    //'periodos' =>$this->Backend_model->get_periodos()
                  );
      $this->load->view('overall/header');
      $this->load->view('overall/menuEgresado');
      $this->load->view('egresado/cartas/Certificacion',$data);
      $this->load->view('overall/footer');
    }
    public function modalidad()
    {
      $sec=$this->Backend_model->getSec();
      $num = $sec->secuencia+1;
      $data = array('control' =>$this->Backend_model->getSec(),
                    'errorArch'=>"",
                    'documentos'=>$this->Documentos_model->get_documentos($num),
                    //'periodos' =>$this->Backend_model->get_periodos()
                  );
      $this->load->view('overall/header');
      $this->load->view('overall/menuEgresado'); 
      $this->load->view('egresado/cartas/modalidad',$data);
      $this->load->view('overall/footer');
    }
    public function posicion()
    {
      $sec=$this->Backend_model->getSec();
      $num = $sec->secuencia+1;

      $data = array('control' =>$this->Backend_model->getSec(),
                    'errorArch'=>"",
                    'documentos'=>$this->Documentos_model->get_documentos($num),
                    //'periodos' =>$this->Backend_model->get_periodos()
                  ); 
      $this->load->view('overall/header');
      $this->load->view('overall/menuEgresado');
      $this->load->view('egresado/cartas/posicion',$data);
      $this->load->view('overall/footer');
    }

    public function pensum()
    {
      $sec=$this->Backend_model->getSec();
      $num = $sec->secuencia+1;

      $data = array('control' =>$this->Backend_model->getSec(),
                    'errorArch'=>"",
                    'documentos'=>$this->Documentos_model->get_documentos($num),
                    //'periodos' =>$this->Backend_model->get_periodos()
                  );
      $this->load->view('overall/header');
      $this->load->view('overall/menuEgresado');
      $this->load->view('egresado/cartas/pensum',$data);
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

    public function get_documentos()
    {
     $numSol = $this->input->post("id");
     $data = $this->Documentos_model->get_documentos($numSol);
     echo json_encode($data);
    }

    public function delete_archivo($id){
      $data = $this->Documentos_model->eliminar_documentos($id);
 	    echo json_encode($data);
    }

    public function delete_documentos($id){
      $data = $this->Documentos_model->eliminar_docs($id);
      echo json_encode($data);
    }

       public function store()
    {

    $this->form_validation->set_rules("numero","Numero","required|is_unique[solicitud_postulacion.num_solicitud]");
    $this->form_validation->set_rules("monto","Monto del deposito","required");
    $this->form_validation->set_rules("referencia","Numero de referencia","required");

    $sec=$this->Backend_model->getSec();
    $num = $sec->secuencia+1;
    $periodo_actual = $this->Backend_model->getPeriodo();
    $ci = $this->session->userdata("id");
    $tabla_sol = "solicitud_general";
    $code = "tipo_solicitud";

    if ($this->input->post("tipo_sol")=="posicion") {
        # code...
        $function = "Posicion";
        $tipo = "12";

      }elseif ($this->input->post("tipo_sol")=="modalidad") {
        # code...
        $function = "Modalidad";
        $tipo = "13";
      }

    $referencia = $this->input->post("referencia");
    $monto = $this->input->post("monto");
    $fecha_deposito = $this->input->post("fecha");

    $valor_solicitud = $this->Documentos_model->get_valor($tipo);
    $cedula = $this->Documentos_model->get_requisito("Comprobante de pago",$num);
    $pago = $this->Documentos_model->get_requisito("Fotocopia de CI",$num);
    $res = $this->Documentos_model->get_compro($referencia);

    $solechas = $this->Solicitud_model->solicitudes($ci,$periodo_actual->cod_periodo,$tabla_sol,$tipo,$code);

    if ($solechas != TRUE) {
      if ($this->form_validation->run()== TRUE) {
        //if (!empty($cedula) && !empty($pago)) 
        if (!empty($cedula) && !empty($pago)) {         
          if ($valor_solicitud->valor <= $monto) {
            if (!$res) {
              $doc_file= $cedula->ruta_adj;
              $numero = $this->input->post("numero");
              $ci_solicitante= $ci;
              $fecha = date("Y-m-d");
              $estatus = "En espera";
              $periodo = $periodo_actual->cod_periodo;

              $data = array(
                'num_solicitud' =>$numero ,
                'ci_solicitante' =>$ci_solicitante,
                'estatus_solicitud' =>$estatus,
                'fecha_solicitud' =>$fecha,
                'tipo_solicitud' =>$tipo,
                'periodo'=>$periodo
                 );

             if ($this->Solicitud_model->subir($data)) {
                $this->updateControl();
                $this->updateSolicitud($tipo);
                $this->cargar_comprobante($numero,$referencia,$monto,$fecha_deposito,$doc_file,$fecha,$valor_solicitud->valor);
                $this->session->set_flashdata("success","La solicitud fue procesada");
                redirect(base_url()."egresado/solicitudes");
              }else{
                $this->session->set_flashdata("error","La solicitud no pudo ser procesada");
                redirect(base_url()."egresado/solicitudes/".$function);
              }
            }else{  
              if ($res->saldo > 0) {
                if ($res->saldo >= $valor_solicitud->valor) {
                    $referencia = $res->cod_referencia;
                    $saldo_actual = $res->saldo;
                    $valor = $valor_solicitud->valor;
                    $monto_ant = $res->monto_deposito;
                    $fecha_deposito =  $res->fecha_deposito;
                    $doc_file = $res->ruta_adj;

                    $numero = $this->input->post("numero");
                    $ci_solicitante= $ci;
                    $fecha = date("Y-m-d");
                    $estatus = "En espera";
                    $periodo = $periodo_actual->cod_periodo;

                    $data = array(
                      'num_solicitud' =>$numero ,
                      'ci_solicitante' =>$ci_solicitante,
                      'estatus_solicitud' =>$estatus,
                      'fecha_solicitud' =>$fecha,
                      'tipo_solicitud' =>$tipo,
                      'periodo' => $periodo
                       );

                   if ($this->Solicitud_model->subir($data)) {
                      $this->updateControl();
                      $this->updateSolicitud($tipo);
                      $this->editComprobante($numero,$referencia,$saldo_actual,$monto_ant,$fecha_deposito,$doc_file,$fecha,$valor);
                      $this->session->set_flashdata("success","La solicitud fue procesada");
                      redirect(base_url()."egresado/solicitudes");
                    }else{
                      $this->session->set_flashdata("error","La solicitud no pudo ser procesada");
                      redirect(base_url()."egresado/solicitudes/".$function);
                    }
                }else{ 
                  $this->session->set_flashdata("error","El deposito numero ".$res->cod_referencia." ya ha sido utilizado su saldo es de ".$res->saldo);
                redirect(base_url()."egresado/solicitudes/".$function);
                }
              }else{
                 $this->session->set_flashdata("error","El deposito numero ".$res->cod_referencia." ya existe en la base de datos");
                redirect(base_url()."egresado/solicitudes/".$function);
              }                              
            }
          }else{
            $this->session->set_flashdata("error","El monto cancelado es menor al monto a pagar");
            $this->$function();
          }
          //archivoscargados
        }else{
            $this->session->set_flashdata("error","Debe cargar todos los archivos!");
            $this->$function();
        }
      }else {
        $this->session->set_flashdata("error","Error al cargar");
        $this->$function();
      }
    }else{
      $this->session->set_flashdata("error","Ya ha realizado esta solicitud, espere a que finalice el periodo actual");
      $this->$function();
    }

    }

   public function Certificacion_programas()
    {
           
      $this->form_validation->set_rules("numero","Numero","required|is_unique[solicitud_postulacion.num_solicitud]");
      //$this->form_validation->set_rules("egreso","Periodo de egreso","required");
      $this->form_validation->set_rules("monto","Monto del deposito","required");
      $this->form_validation->set_rules("referencia","Numero de referencia","required");

      $sec=$this->Backend_model->getSec();
      $num = $sec->secuencia+1;
      $referencia = $this->input->post("referencia");
      $monto = $this->input->post("monto");
      $fecha_deposito = $this->input->post("fecha");
      $function = "Certificacion";
      $tipo = "14";

      $periodo_actual = $this->Backend_model->getPeriodo();
      $valor_solicitud = $this->Documentos_model->get_valor($tipo);
      $code ="tipo_solicitud" ;
      $tabla_sol ="solicitud_general";
      $ci = $this->session->userdata("id");

      $cedula = $this->Documentos_model->get_requisito("Comprobante de pago",$num);
      $pago = $this->Documentos_model->get_requisito("Fotocopia de CI",$num);
      $macur = $this->Documentos_model->get_requisito("Macur",$num);
      $res = $this->Documentos_model->get_compro($referencia);

      $solechas = $this->Solicitud_model->solicitudes($ci,$periodo_actual->cod_periodo,$tabla_sol,$tipo,$code);

      if ($solechas != TRUE) {
      if ($this->form_validation->run()== TRUE) {
        if (!empty($macur) && !empty($cedula) && !empty($pago)) {
          if ($valor_solicitud->valor <= $monto) {
            if (!$res) {
              $doc_file= $cedula->ruta_adj;
              $numero = $this->input->post("numero");
              $ci_solicitante= $this->session->userdata("id");
              $fecha = date("Y-m-d");
              $estatus = "En espera";
              $periodo = $periodo_actual->cod_periodo;

              $data = array(
                'num_solicitud' =>$numero ,
                'ci_solicitante' =>$ci_solicitante,
                'estatus_solicitud' =>$estatus,
                'fecha_solicitud' =>$fecha,
                'tipo_solicitud' =>$tipo,
                'periodo' =>$periodo
                 );

             if ($this->Solicitud_model->subir($data)) {
                $this->updateControl();
                $this->updateSolicitud($tipo);
                $this->cargar_comprobante($numero,$referencia,$monto,$fecha_deposito,$doc_file,$fecha,$valor_solicitud->valor);
                $this->session->set_flashdata("success","La solicitud fue procesada");
                redirect(base_url()."egresado/solicitudes");
              }else{
                $this->session->set_flashdata("error","La solicitud no pudo ser procesada");
                redirect(base_url()."egresado/solicitudes/".$function);
              }
            }else{  
              if ($res->saldo > 0) {
                if ($res->saldo >= $valor_solicitud->valor) {
                    $referencia = $res->cod_referencia;
                    $saldo_actual = $res->saldo;
                    $valor = $valor_solicitud->valor;
                    $monto_ant = $res->monto_deposito;
                    $fecha_deposito =  $res->fecha_deposito;
                    $doc_file = $res->ruta_adj;

                    $numero = $this->input->post("numero");
                    $ci_solicitante= $this->session->userdata("id");
                    $fecha = date("Y-m-d");
                    $estatus = "En espera";
                    $periodo = $periodo_actual->cod_periodo;

                    $data = array(
                      'num_solicitud' =>$numero ,
                      'ci_solicitante' =>$ci_solicitante,
                      'estatus_solicitud' =>$estatus,
                      'fecha_solicitud' =>$fecha,
                      'tipo_solicitud' =>$tipo,
                      'periodo' => $periodo
                       );

                   if ($this->Solicitud_model->subir($data)) {
                      $this->updateControl();
                      $this->updateSolicitud($tipo);
                      $this->editComprobante($numero,$referencia,$saldo_actual,$monto_ant,$fecha_deposito,$doc_file,$fecha,$valor);
                      $this->session->set_flashdata("success","La solicitud fue procesada");
                      redirect(base_url()."egresado/solicitudes");
                    }else{
                      $this->session->set_flashdata("error","La solicitud no pudo ser procesada");
                      redirect(base_url()."egresado/solicitudes/".$function);
                    }
                }else{ 
                  $this->session->set_flashdata("error","El deposito numero ".$res->cod_referencia." ya ha sido utilizado su saldo es de ".$res->saldo);
                redirect(base_url()."egresado/solicitudes/".$function);
                }
              }else{
                 $this->session->set_flashdata("error","El deposito numero ".$res->cod_referencia." ya existe en la base de datos");
                redirect(base_url()."egresado/solicitudes/".$function);
              }                              
            }
          }else{
            $this->session->set_flashdata("error","El monto cancelado es menor al monto a pagar");
            $this->$function();
          }

        }else{
            $this->session->set_flashdata("error","Debe cargar todos los archivos!");
            $this->$function();
        }
      }else {
        $this->session->set_flashdata("error","Error al cargar");
        $this->$function();
      }
    }else{
      $this->session->set_flashdata("error","Ya ha realizado esta solicitud, espere a que finalice el periodo actual");
       redirect(base_url()."egresado/solicitudes/".$function);
    }
    }

       public function Certificaciones() 
    {
    
      $this->form_validation->set_rules("numero","Numero","required|is_unique[solicitud_postulacion.num_solicitud]");
      //$this->form_validation->set_rules("egreso","Periodo de egreso","required");
      $this->form_validation->set_rules("monto","Monto del deposito","required");
      $this->form_validation->set_rules("referencia","Numero de referencia","required");

      $function = "Pensum";
      $tipo = "15";
      $sec=$this->Backend_model->getSec();
      $num = $sec->secuencia+1;      
      $referencia = $this->input->post("referencia");
      $monto = $this->input->post("monto");
      $fecha_deposito = $this->input->post("fecha");

      $periodo_actual = $this->Backend_model->getPeriodo();
      $valor_solicitud = $this->Documentos_model->get_valor($tipo);
      $code ="tipo_solicitud" ;
      $tabla_sol ="solicitud_general" ;
      $ci = $this->session->userdata("id");

      $cedula = $this->Documentos_model->get_requisito("Comprobante de pago",$num);
      $pago = $this->Documentos_model->get_requisito("Fotocopia de CI",$num);
      $pensum = $this->Documentos_model->get_requisito("Pensum",$num);
      $macur = $this->Documentos_model->get_requisito("Macur",$num);
      $res = $this->Documentos_model->get_compro($referencia);

      $solechas = $this->Solicitud_model->solicitudes($ci,$periodo_actual->cod_periodo,$tabla_sol,$tipo,$code);

    if ($solechas != TRUE) {
  
      if ($this->form_validation->run()== TRUE) {
        if (!empty($pensum) && !empty($macur) && !empty($cedula) && !empty($pago)) {
          if ($valor_solicitud->valor <= $monto) {
            if (!$res) {
              $doc_file= $cedula->ruta_adj;
              $numero = $this->input->post("numero");
              $ci_solicitante= $this->session->userdata("id");
              $fecha = date("Y-m-d");
              $estatus = "En espera";
              $periodo = $periodo_actual->cod_periodo;

              $data = array(
                'num_solicitud' =>$numero ,
                'ci_solicitante' =>$ci_solicitante,
                'estatus_solicitud' =>$estatus,
                'fecha_solicitud' =>$fecha,
                'tipo_solicitud' =>$tipo,
                'periodo' =>$periodo
                 );

             if ($this->Solicitud_model->subir($data)) {
                $this->updateControl();
                $this->updateSolicitud($tipo);
                $this->cargar_comprobante($numero,$referencia,$monto,$fecha_deposito,$doc_file,$fecha,$valor_solicitud->valor);
                $this->session->set_flashdata("success","La solicitud fue procesada");
                redirect(base_url()."egresado/solicitudes");
              }else{
                $this->session->set_flashdata("error","La solicitud no pudo ser procesada");
                redirect(base_url()."egresado/solicitudes/".$function);
              }
            }else{  
              if ($res->saldo > 0) {
                if ($res->saldo >= $valor_solicitud->valor) {
                    $referencia = $res->cod_referencia;
                    $saldo_actual = $res->saldo;
                    $valor = $valor_solicitud->valor;
                    $monto_ant = $res->monto_deposito;
                    $fecha_deposito =  $res->fecha_deposito;
                    $doc_file = $res->ruta_adj;

                    $numero = $this->input->post("numero");
                    $ci_solicitante= $this->session->userdata("id");
                    $fecha = date("Y-m-d");
                    $estatus = "En espera";
                    $periodo = $periodo_actual->cod_periodo;

                    $data = array(
                      'num_solicitud' =>$numero ,
                      'ci_solicitante' =>$ci_solicitante,
                      'estatus_solicitud' =>$estatus,
                      'fecha_solicitud' =>$fecha,
                      'tipo_solicitud' =>$tipo,
                      'periodo' => $periodo
                       );

                   if ($this->Solicitud_model->subir($data)) {
                      $this->updateControl();
                      $this->updateSolicitud($tipo);
                      $this->editComprobante($numero,$referencia,$saldo_actual,$monto_ant,$fecha_deposito,$doc_file,$fecha,$valor);
                      $this->session->set_flashdata("success","La solicitud fue procesada");
                      redirect(base_url()."egresado/solicitudes");
                    }else{
                      $this->session->set_flashdata("error","La solicitud no pudo ser procesada");
                      redirect(base_url()."egresado/solicitudes/".$function);
                    }
                }else{ 
                  $this->session->set_flashdata("error","El deposito numero ".$res->cod_referencia." ya ha sido utilizado su saldo es de ".$res->saldo);
                redirect(base_url()."egresado/solicitudes/".$function);
                }
              }else{
                 $this->session->set_flashdata("error","El deposito numero ".$res->cod_referencia." ya existe en la base de datos");
                redirect(base_url()."egresado/solicitudes/".$function);
              }                              
            }
          }else{
            $this->session->set_flashdata("error","El monto cancelado es menor al monto a pagar");
            $this->$function();
          }
        }else{
          $this->session->set_flashdata("error","Debe cargar todos los archivos!");
          $this->$function();
        }
      }else {
        $this->session->set_flashdata("error","Error al cargar");
        $this->$function();
      }
    }else{
      $this->session->set_flashdata("error","Ya ha realizado esta solicitud, espere a que finalice el periodo actual");
      $this->$function();
    }
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
    protected function cargar_comprobante($numero,$referencia,$monto,$fecha_deposito,$doc_file,$fecha,$valor_solicitud)
    {
      $saldo = $monto - $valor_solicitud;
     
      $data = array(
        'num_solicitud' =>$numero, 
        'cod_referencia' =>$referencia , 
        'saldo' =>$saldo , 
        'fecha_deposito' =>$fecha_deposito ,
        'ruta_adj' =>$doc_file ,
        'monto_deposito' => $monto,
        'fecha_solicitud' =>$fecha  
      );
      $this->Documentos_model->guardar_comprobante($data);
    }

    protected function editComprobante($numero,$referencia,$saldo_actual,$monto_ant,$fecha_deposito,$doc_file,$fecha,$valor)
    {
      $saldo = $saldo_actual - $valor;
      $data = array(
        'num_solicitud' =>$numero, 
        'cod_referencia' =>$referencia, 
        'saldo' =>$saldo, 
        'fecha_deposito' =>$fecha_deposito ,
        'ruta_adj' =>$doc_file ,
        'monto_deposito' => $monto_ant,
        'fecha_solicitud' =>$fecha  
      );
      $this->Documentos_model->guardar_comprobante($data);
    }
            public function ver_solicitud($num_sol)
    {
      $data = array('ordenes' =>$this->Solicitud_model->general($num_sol),
      'documentos' =>$this->Documentos_model->get_documentos($num_sol), );
      $this->load->view('overall/header');
      $this->load->view('overall/menuEgresado');
      $this->load->view('solicitud/solicitud_general',$data);
      $this->load->view('overall/footer');
    }
}
