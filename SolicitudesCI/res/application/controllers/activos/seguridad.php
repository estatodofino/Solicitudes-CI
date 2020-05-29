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
    public function index()
    {
      $this->load->view('overall/header');
      $this->load->view('overall/menuActivo');
      $this->load->view('activo/solicitudes/list');
      $this->load->view('overall/footer');
    }
    public function cambiclave()
    {
      $this->load->view('overall/header');
      $this->load->view('overall/menuActivo');
      $this->load->view('activo/seguridad/claves');
      $this->load->view('overall/footer');
    }
    public function Actualizar()
    {
      $id_usuario=$this->session->userdata("id");
      $data = array('usuario' => $this->Usuarios_model->getUser($id_usuario) );
      $this->load->view('overall/header');
      $this->load->view('overall/menuActivo');
      $this->load->view('activo/seguridad/Actualizar',$data);
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

      $usuarioActual = $this->Usuarios_model->getUser($id_usuario);

      if ($this->form_validation->run()) {
        if($antigua == $usuarioActual->password)
        {
         if($nueva == $confirmar)
            {
              $data = array('password' =>$confirmar);
              if ($this->Usuarios_model->update($id_usuario,$data)) {
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
  $nombres = $this->input->post("nombres");
  $apellidos = $this->input->post("apellidos");
  $correo = $this->input->post("email");
  $telefono = $this->input->post("telefono");
  $direccion = $this->input->post("direccion");

  $this->form_validation->set_rules("nombres","Nombres","required");
  $this->form_validation->set_rules("apellidos","Apellidos","required");
  $this->form_validation->set_rules("email","Email","required");
  $this->form_validation->set_rules("telefono","Telefono","required");
  $this->form_validation->set_rules("direccion","Direccion","required");

  if ($this->form_validation->run()) {
    $data  = array(
      'nom_usuario' => $nombres,
      'ape_usuario' => $apellidos,
      'correo_usuario' => $correo,
      'telefono' => $telefono,
      'direccion' => $direccion
    );

  if ($this->Usuarios_model->update($idusuario,$data)) {
   $this->session->set_flashdata("success","se ha modificado satisfactoriamente");
      redirect(base_url()."welcome/");

    }
    else{
      $this->session->set_flashdata("error","No se pudo guardar la informacion");
      redirect(base_url()."activos/seguridad/actualizar/".$idusuario);
    }
  }else {
    $this->actualizar();
  }

}

}
