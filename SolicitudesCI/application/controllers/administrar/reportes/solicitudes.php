<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

class Solicitudes extends CI_Controller {
   public function __construct() {
      parent::__construct(); 
       $this->load->model('Solicitud_model');
         $this->load->model('Usuarios_model');
         $this->load->model('Backend_model');
       //$this->form_validation->set_message('required', '%s es obligatorio.');
       //$this->form_validation->set_message('numeric', '%s debe ser numérico.');
   }
   
   public function tipo_solicitud()
   {
     $data = array(
       'tipos' =>$this->Backend_model->get_tipo_solicitud()
     );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/Solicitudes/tipo', $data);
      $this->load->view('overall/footer');     
   }
   
   public function tipos_user(){
    $data  = array(
      'tipos' => $this->Backend_model->get_user_t()
    );
    $this->load->view("overall/header");
    $this->load->view("overall/menuAdmin");
    $this->load->view("admin/reportes/solicitudes/tipo_user",$data);
    $this->load->view("overall/footer");
  }

  public function solicitud_activo()
  {  
    $data = array('solicitudes' =>$this->Solicitud_model->get_All_postulaciones(), 
    'culminacion'=>$this->Solicitud_model->get_generales(11) );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/solicitudes/lista_activos', $data);
      $this->load->view('overall/footer');
  }

   public function solicitud_egresado()
  {  
    $data = array('solicitudes' =>$this->Solicitud_model->get_egresados() );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/solicitudes/lista_egresados',$data);
      $this->load->view('overall/footer');
  }

   public function solicitud_especiales()
  {  
    $data = array('solicitudes' =>$this->Solicitud_model->get_eespeciales(),
    'equivalencias' =>$this->Solicitud_model->get_eequivalencias() );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/solicitudes/lista_especiales', $data);
      $this->load->view('overall/footer');
  }
   

   public function fecha(){
   $fechainicio = $this->input->post("fechainicio");
   $fechafin = $this->input->post("fechafin");
   $tipo_solicitud = $this->input->post("tipo_sol");

   if ($this->input->post("buscar")) {

    if ($tipo_solicitud=="10") {
      $tipo = "solicitud_postulacion o";
      $solicitudes = $this->Solicitud_model->getOrdenesbyDate($fechainicio,$fechafin,$tipo);
      
    }elseif ($tipo_solicitud >"10" && $tipo_solicitud < "16" ) {
      $tipo = "solicitud_general o";
      $solicitudes = $this->Solicitud_model->get_OrdenesbyDate($fechainicio,$fechafin,$tipo,$tipo_solicitud); 
    }elseif ($tipo_solicitud >"6" && $tipo_solicitud < "10") {
      $tipo = "solicitud_especiales o";
      $solicitudes = $this->Solicitud_model->get_OrdenesbyDate($fechainicio,$fechafin,$tipo,$tipo_solicitud);
    }elseif ($tipo_solicitud =="6") {
      $tipo = "solicitud_equivalencias o";
      $solicitudes = $this->Solicitud_model->get_OrdenesbyDate($fechainicio,$fechafin,$tipo,$tipo_solicitud);
    }
   }else{
    $solicitudes ="";
   }
   $data = array(
     "solicitudes" => $solicitudes,
     "fechainicio" => $fechainicio,
     "fechafin" => $fechafin,
     'tipos' =>$this->Backend_model->get_tipo_solicitud()
   );

   $this->load->view("overall/header");
   $this->load->view("overall/menuAdmin");
   $this->load->view("admin/reportes/solicitudes/todas_fecha",$data);//misma vista donde se busca la info
   $this->load->view("overall/footer");     
 }

      public function estatus()
   {
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/Solicitudes/estatus'/*, $data*/);
      $this->load->view('overall/footer');
    
   }
   public function ver_estatus($estado)
   {
    $data = array(
    'generales' =>$this->Solicitud_model->get_OrdenesbyState("solicitud_general o",$estado),
    'especiales' =>$this->Solicitud_model->get_Ordenes_byState("solicitud_especiales o",$estado),
    'equivalencias' =>$this->Solicitud_model->get_Ordenes_byState("solicitud_equivalencias o",$estado),
    'postulaciones' =>$this->Solicitud_model->get_Ordenes_byState($estado)
     );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/Solicitudes/list_estatus', $data);
      $this->load->view('overall/footer'); 
   }

   public function ver_tipo($valor)
   {
     if ($valor <="6") {
      $tabla="solicitud_equivalencias o";
      $solicitudes = $this->Solicitud_model->get_OrdenesbyTipo($tabla,$valor) ;      
     }elseif ($valor >"6"  && $valor <"10" ) {
        $tabla="solicitud_especiales o";
        $solicitudes = $this->Solicitud_model->get_OrdenesbyTipo($tabla,$valor);
     }elseif ($valor  >"10" && $valor <"16" ) {
       $tabla="solicitud_general o";
      $solicitudes = $this->Solicitud_model->get_OrdenesbyTipo($tabla,$valor);
     }elseif ($valor=="10") {
        $solicitudes = $this->Solicitud_model->get_Ordenes_byTipo();
     }
     $data = array('solicitudes' =>$solicitudes );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/Solicitudes/list_tipo', $data);
      $this->load->view('overall/footer');
   }

         public function usuarios()
   {
      $data  = array(
        'tipos' => $this->Backend_model->get_user_t()
      );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/Solicitudes/usuarios_tipo',$data);
      $this->load->view('overall/footer');
    
   }
   public function ver_usuario($nombre)
   {
      $data = array('usuarios' => $this->Usuarios_model->get_Usuarios($nombre) );

      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/Solicitudes/usuarios',$data);
      $this->load->view('overall/footer');
   }
   public function por_usuario($ci)
   {
      $t_usuario = $this->Usuarios_model->tipo_user_ci($ci);
      if ($t_usuario->cod_tipo_usuario=="2") {
        $data = array(
        'solicitudes' =>$this->Solicitud_model->get_solicitudes($ci),
        'especiales' =>$this->Solicitud_model->get_postulaciones($ci)
       );
      }elseif ($t_usuario->cod_tipo_usuario=="3") {
       $data = array('solicitudes' => $this->Solicitud_model->get_solicitudes($ci) );
      }elseif ($t_usuario->cod_tipo_usuario=="4") {
        $data = array('solicitudes' =>$this->Solicitud_model->get_especiales($ci),
        'equivalencias'=>$this->Solicitud_model->get_equivalencias($ci) );
      }
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/Solicitudes/por_usuario',$data);
      $this->load->view('overall/footer');

   }
 }
