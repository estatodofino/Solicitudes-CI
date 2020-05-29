<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class Seguridad extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Usuarios_model');
        $this->form_validation->set_message('required', '%s es obligatorio.');
        $this->form_validation->set_message('numeric', '%s debe ser numérico.');
    }
    public function permisos()
   {
    $data  = array(
       'usuarios' => $this->Usuarios_model->getUsuarios()
     );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/seguridad/permisos', $data);
      $this->load->view('overall/footer');
   }
    public function index()
    {
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/administrador');
      $this->load->view('overall/footer');
    }
    public function cambiclave()
    {

      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/seguridad/claves');
      $this->load->view('overall/footer');
    }
    public function Actualizar()
    {
      $id_usuario=$this->session->userdata("id");
      $data = array('usuario' => $this->Usuarios_model->getUser($id_usuario) );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/seguridad/Actualizar',$data);
      $this->load->view('overall/footer');
    }
    public function Usuarios()
    {
      $id_usuario=$this->session->userdata("id");
      $data = array('usuario' => $this->Usuarios_model->getUser($id_usuario),
      'usuarios'=> $this->Usuarios_model->getUsuarios() );
      $this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/seguridad/Usuarios',$data);
      $this->load->view('overall/footer');
    }
    public function update()
    {
      $id_usuario = $this->session->userdata("id");
       $antigua = $this->input->post("antigua");
       $nueva = $this->input->post("nueva");
       $confirmar = $this->input->post("confirmar");

      $this->form_validation->set_rules("antigua","Su Antigua clave","required");
      $this->form_validation->set_rules("nueva","Nueva clave","required");
      $this->form_validation->set_rules("confirmar","Confirmacion de clave","required");

      $usuarioActual = $this->Usuarios_model->getUser_pass($id_usuario);

      if ($this->form_validation->run()) {
        if($antigua == $usuarioActual->password)
        {
         if($nueva == $confirmar)
            {
              $data = array('password' =>$confirmar);
              if ($this->Usuarios_model->update_id($id_usuario,$data)) {
                $this->session->set_flashdata("success","Excelente! su clave de Ingreso fue actualizada");
                 redirect(base_url()."welcome/");
                   }else{
                    $this->session->set_flashdata("error","Error! No se pudo actualizar su Contraseña");
                   }
                }else{
                  $this->session->set_flashdata("error","Error! las Contraseñas no coinciden");
                 $this->cambiclave();
                    }
                }else{
                $this->session->set_flashdata("error","Error! Antigua Contraseña es incorrecta");
                $this->cambiclave();
              }
            }else{
              $this->cambiclave();
            }
    }
    public function edit()
    {
  $idusuario = $this->input->post("idusuario");
  $nombre1 = $this->input->post("pri_nombre");  
  $nombre2 = $this->input->post("sec_nombre");
  $apellido1 = $this->input->post("pri_apellido");
  $apellido2 = $this->input->post("sec_apellido");
  $correo = $this->input->post("email");
  $tel_fijo = $this->input->post("telefono_fijo");
  $tel_movil = $this->input->post("telefono_movil");
  $direccion = $this->input->post("direccion");
  $sexo = $this->input->post("sexo");
  $hb = $this->input->post("hb");

  $this->form_validation->set_rules("pri_nombre","Primer nombre","required");
  $this->form_validation->set_rules("sec_nombre","Segundo nombre","required");
  $this->form_validation->set_rules("pri_apellido","Primer apellido","required");
  $this->form_validation->set_rules("sec_apellido","Segundo apellido","required");
  $this->form_validation->set_rules("email","Email","required");
  $this->form_validation->set_rules("telefono_movil","Telefono","required");
  $this->form_validation->set_rules("telefono_fijo","Telefono","required");
  $this->form_validation->set_rules("direccion","Direccion","required");

  if ($this->form_validation->run()) {
    $data  = array(
      'pri_nombre' => $nombre1,
      'sec_nombre' => $nombre2,
      'pri_apellido' => $apellido1,
      'sec_apellido' => $apellido2,
      'correo_usuario' => $correo,
      'telefono_movil' => $tel_movil,
      'telefono_fijo' => $tel_fijo,
      'direccion' => $direccion,
      'sexo' => $sexo,
      'fecha_nacimiento' => $hb
    );

  if ($this->Usuarios_model->update($idusuario,$data)) {
   $this->session->set_flashdata("success","se ha modificado satisfactoriamente");
      redirect(base_url()."welcome/");

    }
    else{
      $this->session->set_flashdata("error","No se pudo guardar la informacion");
      redirect(base_url()."admin/seguridad/actualizar/".$idusuario);
    }
  }else {
    $this->actualizar();
  }

}
  public function edit_permiso($ci)
  {
    $data = array('roles' => $this->Usuarios_model->getRoles(),
      'usuario' =>$this->Usuarios_model->get_user($ci));
    $this->load->view("overall/header");
    $this->load->view("overall/menuAdmin");
    $this->load->view("admin/seguridad/edit_rol",$data);
    $this->load->view("overall/footer");
  }

     public function update_rol(){
    $idusuario = $this->input->post("idusuario");
    $rol = $this->input->post("rol");
    $this->form_validation->set_rules("rol","Rol","required");
    if ($this->form_validation->run()) {
      $data  = array(
        'cod_tipo_usuario' => $rol,
      );

      if ($this->Usuarios_model->update_id($idusuario,$data)) {
        $this->session->set_flashdata("success","se ha modificado satisfactoriamente");
        redirect(base_url()."administrar/seguridad/permisos");

      }
      else{
        $this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."administrar/seguridad/edit/".$idusuario);
      }
    }else {
      $this->edit_permiso($idusuario);
    }
  }
}
