<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class Backend extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Backend_model');
        $this->load->model('Solicitud_model');
        $this->load->model('Usuarios_model');
        $this->load->model('Empresas_model');
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
        public function nuevo_tutor()
    {      
      $data = array(
        'empresas'=>$this->Empresas_model->get_empresas()
       );
      $this->load->view('overall/header');
      $this->load->view('overall/menuActivo');
      $this->load->view('activo/extra/tutor_add',$data);
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

    public function tutor_store()
    {
      $this->form_validation->set_rules("tutor_e_ci","Cedula","required|is_unique[asesor_empresarial.ci_asesor]");
      $this->form_validation->set_rules("asesor","Nombre","required|is_unique[empresas.rif]");
      $this->form_validation->set_rules("profesion","Profesion del asesor","required");
      $this->form_validation->set_rules("cargo_asesor","Cargo del asesor","required");

       $rif = $this->input->post("idempresa");
       $nombre = $this->input->post("asesor");
       $tutor_ci = $this->input->post("tutor_e_ci");
       $cargo = $this->input->post("cargo_asesor");
       $profesion = $this->input->post("profesion");

      if ($this->form_validation->run()== TRUE) {
         $data = array(
          'rif_empresa' =>$rif ,
          'ci_asesor' =>$tutor_ci ,
          'nombre_asesor' =>$nombre ,
          'cargo_asesor' =>$cargo ,
          'profesion_asesor' =>$profesion );

          if ($this->Backend_model->subir_tutor($data)) {
            $this->session->set_flashdata("success","Se ha guardado la correctamente");
            redirect(base_url()."activos/solicitudes/postulacion");
          } else {
            $this->session->set_flashdata("error","No se ha guardado la informacion");
            redirect(base_url()."activos/solicitudes/postulacion");
          }
      }else{
        $this->nuevo_tutor();
      }

    }

    public function get_asesor()
  {
    $id = $this->input->post('id');
    $data = $this->Backend_model->get_asesor($id);
    echo json_encode($data);
  }

        public function menu()
    {    
      $id = $this->Backend_model->getPeriodo();  
      $ci = $this->session->userdata("id");
      $data = array(
        'usuario'=>$this->Usuarios_model->get_user($ci),
       'usuarios'=>$this->Usuarios_model->get_all_users(),
       'periodo'=>$this->Backend_model->getPeriodo(),
       'modificacion' =>$this->Backend_model->getModificacion($id->cod_periodo)
       );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/administrador',$data);
      $this->load->view('overall/footer');
    }
    public function ver_solicitante($ci)
    {
      $data = array(
        'usuario'=>$this->Usuarios_model->get_user($ci)
       );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/usuarios/usuario',$data);
      $this->load->view('overall/footer'); 
    }
    public function usuarios_aceptar()
    {
    $id = $this->input->post("id");
    $estado = $this->input->post("estado");
    $data = array(
      'estado' =>$estado
     );
    $this->Usuarios_model->update_id($id,$data);
    echo "administrar/Backend/menu";   
    
    }

        public function delete_orden()
    {
    $id = $this->input->post("id");
    $estado = $this->input->post("estado");
    $url = $this->input->post("url");
    $tabla = $this->input->post("table");

    $data = array(
      'estado' =>$estado
     );
    $this->Solicitud_model->update_id($id,$tabla,$data);
    echo $url ;   
    
    }

    public function delete_periodo($id)
    {
    $url = "administrar/Backend/menu";
    $data = array(
      'estado' =>"0"
     );
    $this->Backend_model->update($id,$data);   
    echo $url;
    }

    public function add_periodo()
    {
        $nombre = strtolower($this->input->post("nombre"));
        $codigo = $this->input->post("codigo");
        $inicio = $this->input->post("inicio");
        $fin = $this->input->post("final"); 

       $res=$this->Backend_model->get_periodo_name($nombre);
         
         if (!empty($_POST["nombre"])) {
           if ($res) {
             $this->session->set_flashdata("error","El periodo ingresado ya existe");
              redirect(base_url()."administrar/Backend/menu");
           }else{
            $data = array(
              'nom_periodo' =>$nombre,
              'cod_periodo'=>$codigo,
              'inicio_periodo'=>$inicio,
              'fin_periodo'=>$fin,
              'estado' => "1" );  

            if ($this->Backend_model->periodo_add($data)) {              
            $this->session->set_flashdata("success","Se ha guardado la ruta");
            echo json_encode(array("status" => TRUE));
            }else{

            $this->session->set_flashdata("error","error al cargar");
            redirect(base_url()."administrar/Backend/menu");
            }

           }
         }else{
          $this->session->set_flashdata("error","todos los datos deben estar llenos");
            redirect(base_url()."administrar/Backend/menu");
         }
    }
      public function ajax_edit($id)
      {
         $data = $this->Backend_model->periodo_get_by_id($id);  
 
         echo json_encode($data);
      }

     public function periodo_update()
     {
      $id = $this->input->post('codigo');
      $inicio = $this->input->post('inicio');
      $final = $this->input->post('final');

      $data = array(
            'inicio_periodo'=>$inicio,
            'fin_periodo'=>$final
          ); 

        $this->Backend_model->update($id, $data);
        echo json_encode(array("status" => TRUE));
     }
     public function periodos()
     {
      $data = array(
        'periodos'=>$this->Backend_model->get_periodos()
       );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/periodos',$data);
      $this->load->view('overall/footer');
     }
     public function new_modificacion()
     {
      $data = array('periodo' =>$this->Backend_model->getPeriodo() );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/modificacion_add',$data);
      $this->load->view('overall/footer');
     }

     public function add_modificacion()
    {
    
    $periodo_actual = $this->Backend_model->getPeriodo();
    $codigo = $this->input->post("id"); 
    $fecha_fin = $this->input->post("fin");
    $fecha_inicio = $this->input->post("inicio");
    $periodo = $this->input->post("periodo");

    $res = $this->Backend_model->getModificacion_by($codigo,$periodo);

    if ($res) {
         $result = '<div class="callout callout-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p><i class="icon fa fa-ban"></i>La materia que desea agregar ya existe</p>
        </div>';
        echo json_decode($result);
     } else{
        $data = array(
            'cod_modificacion' =>$codigo ,
            'fecha_inicio' =>$fecha_inicio ,
            'fecha_fin' =>$fecha_fin ,
            'periodo' =>$periodo ,
            'estado' =>"1" );
        $this->Backend_model->modificacion_add($data);
        echo json_encode(array("status" => TRUE));
     }
  

    }

    public function nueva()
    {
    
    $periodo_actual = $this->Backend_model->getPeriodo();
    $codigo = $this->input->post("codegux"); 
    $fecha_fin = $this->input->post("fecha_fin");
    $fecha_inicio = $this->input->post("fecha_inicio");
    $periodo = $this->input->post("idperiodo");

    $res = $this->Backend_model->getModificacion_by($codigo,$periodo);

    $this->form_validation->set_rules("fecha_inicio","fecha inicio","required");
    $this->form_validation->set_rules("fecha_fin","fecha de cierre","required");
    if ($this->form_validation->run()== TRUE) {
     $data = array(
            'cod_modificacion' =>$codigo ,
            'fecha_inicio' =>$fecha_inicio ,
            'fecha_fin' =>$fecha_fin ,
            'periodo' =>$periodo ,
            'estado' =>"1" );
     if ($this->Backend_model->modificacion_add($data)) {
       $this->session->set_flashdata("success","Se guardo satisfactoriamente");
            redirect(base_url()."administrar/Backend/menu");
     }else{
      $this->session->set_flashdata("error","No se pudo guardar");
            redirect(base_url()."administrar/Backend/new_modificacion");
     }
    }else{
      $this->new_modificacion();
    }

    }
  }