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
      $data = array(
        'solicitudes' =>$this->Solicitud_model->get_especiales($ci),
        'equivalencias' =>$this->Solicitud_model->get_equivalencias($ci),
        'datos' =>$this->Usuarios_model->getUser($ci) 
      );
      $this->load->view('overall/header');
      $this->load->view('overall/menuSoles');
      $this->load->view('especiales/solicitudes/list',$data);
      $this->load->view('overall/footer');
    }
     public function cambio_aviso()
    {
      $this->load->view('overall/header');
      $this->load->view('overall/menuSoles');
      $this->load->view('especiales/cartas/aviso_cambio');
      $this->load->view('overall/footer');
    } 
    public function equivalencias_aviso_egresado()
    {
      $this->load->view('overall/header');
      $this->load->view('overall/menuSoles');
      $this->load->view('especiales/cartas/aviso_equivalencias');
      $this->load->view('overall/footer');
    }
    public function equivalencias_aviso_no_egresado()
    {
      $this->load->view('overall/header');
      $this->load->view('overall/menuSoles');
      $this->load->view('especiales/cartas/aviso_equivalencias_no');
      $this->load->view('overall/footer');
    }
    public function reincorporacion_aviso()
    {
      $this->load->view('overall/header');
      $this->load->view('overall/menuSoles');
      $this->load->view('especiales/cartas/aviso_reincorporacion');
      $this->load->view('overall/footer');
    }
    public function traslado_aviso()
    {
      $this->load->view('overall/header');
      $this->load->view('overall/menuSoles');
      $this->load->view('especiales/cartas/aviso_traslado');
      $this->load->view('overall/footer');
    }
   
   

    public function cambio()
    {
      $sec=$this->Backend_model->getSec();
      $num = $sec->secuencia+1;
      $ci = $this->session->userdata("id");
      $data = array('control' =>$this->Backend_model->getSec(),
      'errorArch'=>"",
      'datos' =>$this->Usuarios_model->getUser($ci), 
      'documentos' => $this->Documentos_model->get_documentos($num)                  
  );
      $this->load->view('overall/header');
      $this->load->view('overall/menuSoles');
      $this->load->view('especiales/cartas/cambio',$data);
      $this->load->view('overall/footer');
    } 
    public function equivalencias_no_egresado()
    {
      $sec=$this->Backend_model->getSec();
      $num = $sec->secuencia+1;
      $ci = $this->session->userdata("id");
      $data = array('control' =>$this->Backend_model->getSec(),
                  'errorArch'=>"",
                  'datos' =>$this->Usuarios_model->getUser($ci), 
      'documentos' => $this->Documentos_model->get_documentos($num)
                );
      $this->load->view('overall/header');
      $this->load->view('overall/menuSoles');
      $this->load->view('especiales/cartas/equivalencias_noe',$data);
      $this->load->view('overall/footer');
    }
    public function equivalencias_egresado()
    {
      $sec=$this->Backend_model->getSec();
      $num = $sec->secuencia+1;
      $ci = $this->session->userdata("id");
      $data = array('control' =>$this->Backend_model->getSec(),
                  'errorArch'=>"",
                  'datos' =>$this->Usuarios_model->getUser($ci), 
      'documentos' => $this->Documentos_model->get_documentos($num)
                );
      $this->load->view('overall/header');
      $this->load->view('overall/menuSoles');
      $this->load->view('especiales/cartas/equivalencias',$data);
      $this->load->view('overall/footer');
    }
    public function traslado()
    {
      $sec=$this->Backend_model->getSec();
      $num = $sec->secuencia+1;
      $ci = $this->session->userdata("id");
      $data = array('control' =>$this->Backend_model->getSec(),
                  'errorArch'=>"",
                  'datos' =>$this->Usuarios_model->getUser($ci), 
      'documentos' => $this->Documentos_model->get_documentos($num)
                );
      $this->load->view('overall/header');
      $this->load->view('overall/menuSoles');
      $this->load->view('especiales/cartas/traslado',$data);
      $this->load->view('overall/footer');
    }
        public function reincorporacion()
    {
      $sec=$this->Backend_model->getSec();
      $num = $sec->secuencia+1;
      $ci = $this->session->userdata("id");
      $data = array('control' =>$this->Backend_model->getSec(),
                  'errorArch'=>"",
                  'datos' =>$this->Usuarios_model->getUser($ci), 
      'documentos' => $this->Documentos_model->get_documentos($num)
                );
      $this->load->view('overall/header');
      $this->load->view('overall/menuSoles');
      $this->load->view('especiales/cartas/reincorporacion',$data);
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
                $ci =$this->session->userdata("id");
                $data = array('control' =>$this->Backend_model->getSec(),
                              'errorArch'=>$this->upload->display_errors(),
                    'documentos'=>$this->Documentos_model->get_documentos($num),
                    'datos'=>$this->Usuarios_model->getUser($ci)
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

    public function cambio_carrera()
    {

       $this->form_validation->set_rules("numero","Numero","required|is_unique[solicitud_postulacion.num_solicitud]");
      $this->form_validation->set_rules("carrera_act","Carrera actual","required");
      //$this->form_validation->set_rules("periodo","Periodo","required");
      // $this->form_validation->set_rules("year","Año electivo","required");
      $this->form_validation->set_rules("monto","Monto del deposito","required");
      $this->form_validation->set_rules("referencia","Numero de referencia","required");

      $ci = $this->session->userdata("id");
      $periodo_actual = $this->Backend_model->getPeriodo();
      $tabla_sol = "solicitud_especiales";
      $code = "tipo_solicitud";

      $referencia = $this->input->post("referencia");
      $monto = $this->input->post("monto");
      $fecha_deposito = $this->input->post("fecha");
      $tipo = "9";
      $num = $this->input->post("numero");
      $carrera = $this->input->post("carrera_act");
      $periodo = $periodo_actual->cod_periodo;

    $valor_solicitud = $this->Documentos_model->get_valor($tipo);
    $pago = $this->Documentos_model->get_requisito("Comprobante de pago",$num);
    $cedula = $this->Documentos_model->get_requisito("Fotocopia de CI",$num);
    $macur = $this->Documentos_model->get_requisito("Macur",$num);
    $comprobante = $this->Documentos_model->get_requisito("Comprobante de inscripcion",$num);
    $res = $this->Documentos_model->get_compro($referencia);

    $solechas = $this->Solicitud_model->solicitudes($ci,$periodo_actual->cod_periodo,$tabla_sol,$tipo,$code);

    if ($solechas != TRUE) {
      
      if ($this->form_validation->run()== TRUE) {
         if (!empty($comprobante) && !empty($macur) && !empty($cedula) && !empty($pago)) {
            if ($valor_solicitud->valor <= $monto) {
            if (!$res) {
              $doc_file= $cedula->ruta_adj;
              $ci_solicitante= $ci;
              $fecha = date("Y-m-d");
              $estatus = "En espera";

              $data = array(
                'num_solicitud' =>$num ,
                'ci_solicitante' =>$ci_solicitante,
                'estatus_solicitud' =>$estatus,
                'fecha_solicitud' =>$fecha,
                'tipo_solicitud' =>$tipo,
                'carrera_origen' =>$carrera,
                'periodo' =>$periodo
                //'year_electivo' =>$year
                 );

             if ($this->Solicitud_model->subir_especial($data)) {
                $this->updateControl();
                $this->updateSolicitud($tipo);
                $this->cargar_comprobante($num,$referencia,$monto,$fecha_deposito,$doc_file,$fecha,$valor_solicitud->valor);
                $this->session->set_flashdata("success","La solicitud fue procesada");
                redirect(base_url()."especiales/solicitudes");
              }else{
                $this->session->set_flashdata("error","La solicitud no pudo ser procesada");
                redirect(base_url()."especiales/solicitudes/cambio");
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

                    $num = $this->input->post("numero");
                    $ci_solicitante= $this->session->userdata("id");
                    $fecha = date("Y-m-d");
                    $estatus = "En espera";
                    $periodo = $this->input->post("periodo");

                    $data = array(
                      'num_solicitud' =>$num ,
                      'ci_solicitante' =>$ci_solicitante,
                      'estatus_solicitud' =>$estatus,
                      'fecha_solicitud' =>$fecha,
                      'tipo_solicitud' =>$tipo,
                      'carrera_origen' =>$carrera,
                      'periodo' =>$periodo
                      //'year_electivo' =>$year
                       );

                   if ($this->Solicitud_model->subir_especial($data)) {
                      $this->updateControl();
                      $this->updateSolicitud($tipo);
                      $this->editComprobante($num,$referencia,$saldo_actual,$monto_ant,$fecha_deposito,$doc_file,$fecha,$valor);
                      $this->session->set_flashdata("success","La solicitud fue procesada");
                      redirect(base_url()."especiales/solicitudes");
                    }else{
                      $this->session->set_flashdata("error","La solicitud no pudo ser procesada");
                      redirect(base_url()."especiales/solicitudes/cambio");
                    }
                }else{ 
                  $this->session->set_flashdata("error","El deposito numero ".$res->cod_referencia." ya ha sido utilizado su saldo es de ".$res->saldo);
                redirect(base_url()."especiales/solicitudes/cambio");
                }
              }else{
                 $this->session->set_flashdata("error","El deposito numero ".$res->cod_referencia." ya existe en la base de datos");
                redirect(base_url()."especiales/solicitudes/cambio");
              }                              
            }
          }else{
            $this->session->set_flashdata("error","El monto cancelado es menor al monto a pagar");
            $this->cambio();
          }
         }else{
          $this->session->set_flashdata("error","Debe cargar todos los archivos!");
          $this->cambio();
         }
      }else{
        $this->session->set_flashdata("error","Error al cargar");
        $this->Cambio();
      }
    }else{
      $this->session->set_flashdata("error","Ya ha realizado esta solicitud, espere a que finalice el periodo actual");
       redirect(base_url()."especiales/solicitudes/cambio");
    }
    }
    //reincorporacion begin
    public function reincorporacion_store()
    {
       $this->form_validation->set_rules("numero","Numero","required|is_unique[solicitud_postulacion.num_solicitud]");

      
     // $this->form_validation->set_rules("periodo","Periodo","required");
      //$this->form_validation->set_rules("year","Año electivo","required");
      $this->form_validation->set_rules("monto","Monto del deposito","required");
      $this->form_validation->set_rules("referencia","Numero de referencia","required");

      $ci = $this->session->userdata("id");
      $tabla_sol = "solicitud_especiales";
      $code = "tipo_solicitud";
      $periodo_actual = $this->Backend_model->getPeriodo();

      $referencia = $this->input->post("referencia");
      $monto = $this->input->post("monto");
      $fecha_deposito = $this->input->post("fecha");
      $tipo = "8";
      $num = $this->input->post("numero");
      $carrera = "Computacion";
      $periodo = $periodo_actual->cod_periodo;

    $valor_solicitud = $this->Documentos_model->get_valor($tipo);
    $pago = $this->Documentos_model->get_requisito("Comprobante de pago",$num);
    $cedula = $this->Documentos_model->get_requisito("Fotocopia de CI",$num);
    $macur = $this->Documentos_model->get_requisito("Macur",$num);
    $tdb = $this->Documentos_model->get_requisito("Titulo de bachiller",$num);
    $pdn = $this->Documentos_model->get_requisito("Partida de nacimiento",$num);
    $res = $this->Documentos_model->get_compro($referencia);

    $solechas = $this->Solicitud_model->solicitudes($ci,$periodo_actual->cod_periodo,$tabla_sol,$tipo,$code);

    if ($solechas != TRUE) {
      if ($this->form_validation->run()== TRUE) {
         if (!empty($tdb) && !empty($pdn) && !empty($macur) && !empty($cedula) && !empty($pago)) {
            if ($valor_solicitud->valor <= $monto) {
            if (!$res) {
              $doc_file= $cedula->ruta_adj;
              $ci_solicitante= $this->session->userdata("id");
              $fecha = date("Y-m-d");
              $estatus = "En espera";

              $data = array(
                'num_solicitud' =>$num ,
                'ci_solicitante' =>$ci_solicitante,
                'estatus_solicitud' =>$estatus,
                'fecha_solicitud' =>$fecha,
                'tipo_solicitud' =>$tipo,
                'carrera_origen' =>$carrera,
                'periodo' =>$periodo,
                'year_electivo' =>$year
                 );

             if ($this->Solicitud_model->subir_especial($data)) {
                $this->updateControl();
                $this->updateSolicitud($tipo);
                $this->cargar_comprobante($num,$referencia,$monto,$fecha_deposito,$doc_file,$fecha,$valor_solicitud->valor);
                $this->session->set_flashdata("success","La solicitud fue procesada");
                redirect(base_url()."especiales/solicitudes");
              }else{
                $this->session->set_flashdata("error","La solicitud no pudo ser procesada");
                redirect(base_url()."especiales/solicitudes/reincorporacion");
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

                    $num = $this->input->post("numero");
                    $ci_solicitante= $this->session->userdata("id");
                    $fecha = date("Y-m-d");
                    $estatus = "En espera";
                    $periodo = $this->input->post("periodo");

                    $data = array(
                      'num_solicitud' =>$num ,
                      'ci_solicitante' =>$ci_solicitante,
                      'estatus_solicitud' =>$estatus,
                      'fecha_solicitud' =>$fecha,
                      'tipo_solicitud' =>$tipo,
                      'carrera_origen' =>$carrera,
                      'periodo' =>$periodo,
                      'year_electivo' =>$year
                       );

                   if ($this->Solicitud_model->subir_especial($data)) {
                      $this->updateControl();
                      $this->updateSolicitud($tipo);
                      $this->editComprobante($num,$referencia,$saldo_actual,$monto_ant,$fecha_deposito,$doc_file,$fecha,$valor);
                      $this->session->set_flashdata("success","La solicitud fue procesada");
                      redirect(base_url()."especiales/solicitudes");
                    }else{
                      $this->session->set_flashdata("error","La solicitud no pudo ser procesada");
                      redirect(base_url()."especiales/solicitudes/reincorporacion");
                    }
                }else{ 
                  $this->session->set_flashdata("error","El deposito numero ".$res->cod_referencia." ya ha sido utilizado su saldo es de ".$res->saldo);
                redirect(base_url()."especiales/solicitudes/reincorporacion");
                }
              }else{
                 $this->session->set_flashdata("error","El deposito numero ".$res->cod_referencia." ya existe en la base de datos");
                redirect(base_url()."especiales/solicitudes/reincorporacion");
              }                              
            }
          }else{
            $this->session->set_flashdata("error","El monto cancelado es menor al monto a pagar");
            $this->reincorporacion();
          }
         }else{
          $this->session->set_flashdata("error","Debe cargar todos los archivos!");
          $this->reincorporacion();
         }
      }else{
        $this->session->set_flashdata("error","Error al cargar");
        $this->reincorporacion();
      }
    }else{
      $this->session->set_flashdata("error","Ya ha realizado esta solicitud, espere a que finalice el periodo actual");
       redirect(base_url()."especiales/solicitudes/reincorporacion");
    }
    }
    //reincorporacion end

    /*equivalencias inicio*/
    public function store_equivalencia()
    {
      if ($this->input->post("tipo_sol")=="egresado") {
        # code...
        $function = "equivalencias_egresado";        
        $tipo = "6";

      }elseif ($this->input->post("tipo_sol")=="no_egresado") {
        # code...
        $function = "equivalencias_no_egresado";        
        $tipo = "5";

      } 
     $this->form_validation->set_rules("numero","Numero","required|is_unique[solicitud_postulacion.num_solicitud]");
      $this->form_validation->set_rules("grado","Titulo obtenido","required");
      $this->form_validation->set_rules("tipo","Tipo de institucion","required");
      $this->form_validation->set_rules("nombre_instituto","Nombre de la institucion","required");
      $this->form_validation->set_rules("year_grado","Año de graduacion","required");
      $this->form_validation->set_rules("pais_grado","Pais","required");
      $this->form_validation->set_rules("estado_grado","Estado","required");
      //$this->form_validation->set_rules("periodo","Periodo","required");
      // $this->form_validation->set_rules("year_electivo","Año electivo","required");
      $this->form_validation->set_rules("monto","Monto del deposito","required");
      $this->form_validation->set_rules("referencia","Numero de referencia","required"); 

      $referencia = $this->input->post("referencia");
      $monto = $this->input->post("monto");
      $fecha_deposito = $this->input->post("fecha");
      $num = $this->input->post("numero");

      $instituto = $this->input->post("nombre_instituto");
      $tipo_institucion = $this->input->post("tipo");
      $titulo_grado = $this->input->post("grado");
      $year_grado = $this->input->post("year_grado");
      $pais_grado = $this->input->post("pais_grado");
      $estado_grado = $this->input->post("estado_grado");

      $periodo_actual = $this->Backend_model->getPeriodo();
      $ci = $this->session->userdata("id");
      $tabla_sol = "solicitud_equivalenciaS";
      $code = "tipo_solicitud";
      $periodo = $periodo_actual->cod_periodo;

      $valor_solicitud = $this->Documentos_model->get_valor($tipo);
      $res = $this->Documentos_model->get_compro($referencia);

      $pago = $this->Documentos_model->get_requisito("Comprobante de pago",$num);
      $cedula = $this->Documentos_model->get_requisito("Fotocopia de la CI",$num);
      $cbc = $this->Documentos_model->get_requisito("Constancia de buena conducta",$num);
      $notas_certi = $this->Documentos_model->get_requisito("Notas certificadas",$num);
      $titulo_obtenido = $this->Documentos_model->get_requisito("Titulo obtenido",$num);
      $pdn = $this->Documentos_model->get_requisito("Partida de nacimiento",$num);
      $militar = $this->Documentos_model->get_requisito("Copia del carnet militar",$num);

      $solechas = $this->Solicitud_model->solicitudes($ci,$periodo_actual->cod_periodo,$tabla_sol,$tipo,$code);

      if($solechas != TRUE){
       if ($this->form_validation->run()== TRUE) {

         if (!empty($titulo_obtenido) && !empty($pdn) && !empty($cbc) && !empty($cedula) && !empty($pago) && !empty($notas_certi) && !empty($militar)) {
            if ($valor_solicitud->valor <= $monto) {
            if (!$res) {
              $doc_file= $cedula->ruta_adj;
              $ci_solicitante= $this->session->userdata("id");
              $fecha = date("Y-m-d");
              $estatus = "En espera";

              $data = array(
                'num_solicitud' =>$num ,
                'ci_solicitante' =>$ci_solicitante,
                'estatus_solicitud' =>$estatus,
                'fecha_solicitud' =>$fecha,
                'tipo_solicitud' =>$tipo,
                'grado' =>$titulo_grado,
                'year_grado' =>$year_grado,
                'institucion_grado' =>$instituto,
                'pais_grado' =>$pais_grado,
                'estado_grado' =>$estado_grado,
                'tipo_institucion' =>$tipo_institucion,
                'periodo' =>$periodo
                //'year' =>$year
                 );

             if ($this->Solicitud_model->subir_equivalencias($data)) {
                $this->updateControl();
                $this->updateSolicitud($tipo);
                $this->cargar_comprobante($num,$referencia,$monto,$fecha_deposito,$doc_file,$fecha,$valor_solicitud->valor);
                $this->session->set_flashdata("success","La solicitud fue procesada");
                redirect(base_url()."especiales/solicitudes");
              }else{
                $this->session->set_flashdata("error","La solicitud no pudo ser procesada");
                redirect(base_url()."especiales/solicitudes/".$function);
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

                    $num = $this->input->post("numero");
                    $ci_solicitante= $this->session->userdata("id");
                    $fecha = date("Y-m-d");
                    $estatus = "En espera";
                    $periodo = $periodo_actual->cod_periodo;

                    $data = array(
                      'num_solicitud' =>$num ,
                      'ci_solicitante' =>$ci_solicitante,
                      'estatus_solicitud' =>$estatus,
                      'fecha_solicitud' =>$fecha,
                      'tipo_solicitud' =>$tipo,
                      'grado' =>$titulo_grado,
                      'year_grado' =>$year_grado,
                      'institucion_grado' =>$instituto,
                      'pais_grado' =>$pais_grado,
                      'estado_grado' =>$estado_grado,
                      'tipo_institucion' =>$tipo_institucion,
                      'periodo' =>$periodo
                      //'year' =>$year
                       );

                   if ($this->Solicitud_model->subir_equivalencias($data)) {
                      $this->updateControl();
                      $this->updateSolicitud($tipo);
                      $this->editComprobante($num,$referencia,$saldo_actual,$monto_ant,$fecha_deposito,$doc_file,$fecha,$valor);
                      $this->session->set_flashdata("success","La solicitud fue procesada");
                      redirect(base_url()."especiales/solicitudes");
                    }else{
                      $this->session->set_flashdata("error","La solicitud no pudo ser procesada");
                      redirect(base_url()."especiales/solicitudes/".$function);
                    }
                }else{ 
                  $this->session->set_flashdata("error","El deposito numero ".$res->cod_referencia." ya ha sido utilizado su saldo es de ".$res->saldo);
                redirect(base_url()."especiales/solicitudes/".$function);
                }
              }else{
                 $this->session->set_flashdata("error","El deposito numero ".$res->cod_referencia." ya existe en la base de datos");
                redirect(base_url()."especiales/solicitudes/".$function);
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
      }else{
        $this->session->set_flashdata("error","Error al cargar");
        $this->$function();
      }
    }else{
      $this->session->set_flashdata("error","Ya ha realizado esta solicitud, espere a que finalice el periodo actual");
       redirect(base_url()."especiales/solicitudes/".$function);
    }

    }
    /*equivalencias fin*/
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
      $this->load->view('overall/menuSoles');
      $this->load->view('solicitud/solicitud_especial',$data);
      $this->load->view('overall/footer');
    }
                public function ver_equivalencias($num_sol)
    {
      $data = array('ordenes' =>$this->Solicitud_model->equivalencia($num_sol),
      'documentos' =>$this->Documentos_model->get_documentos($num_sol), );
      $this->load->view('overall/header');
      $this->load->view('overall/menuSoles');
      $this->load->view('solicitud/solicitud_equivalencia',$data);
      $this->load->view('overall/footer');
    }
}
