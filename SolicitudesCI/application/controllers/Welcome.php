<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
	parent::__construct();
	$this->load->model("Usuarios_model");
	$this->load->model("Backend_model");
	$this->form_validation->set_message('required', '%s es obligatorio.');
	$this->form_validation->set_message('numeric', '%s debe ser numérico.');
	$this->form_validation->set_message('is_unique', '%s ya existe en la base de datos');
	}
	    /**
    * @desc - genera un token para cada usuario registrado
    * @return token
    */
    private function token()
    {
        return sha1(uniqid(rand(),true));
    }

		public function index()
		{
		if ($this->session->userdata("login"))
				{
		$ci=$this->session->userdata("id");
		$data = array('usuario' =>$this->Usuarios_model->get_user($ci),
                  'datos' =>$this->Usuarios_model->getUser($ci),
                  'documentos' =>$this->Backend_model->get_docs());
			if ($this->session->userdata("rol")==4) {
				$this->load->view('overall/header');
    			$this->load->view('overall/menuSoles'); 
    			$this->load->view('especiales/welcome',$data);
				$this->load->view('overall/footer');
				}
			elseif ($this->session->userdata("rol")==3) {
				$this->load->view('overall/header');
    			$this->load->view('overall/menuEgresado');
    			$this->load->view('egresado/welcome',$data);
				$this->load->view('overall/footer');
				}
		 	elseif ($this->session->userdata("rol")==2) {
				$this->load->view('overall/header');
    			$this->load->view('overall/menuActivo');
    			$this->load->view('activo/welcome',$data);
				$this->load->view('overall/footer');
				}
			elseif ($this->session->userdata("rol")==1) {
			  	redirect(base_url()."administrar/Backend/menu");
				}
				}
				else{
					 $this->load->view('login');
				}
		}

	public function clavecambi()
	{
			$this->load->view('overall/header2');
            $this->load->view('welcome_message');
			$this->load->view('overall/footer2');
	}

	public function acceso()
	{
		$data = array('usuarios' =>$this->Usuarios_model->getUsuarios() );
			$this->load->view('overall/header');
			$this->load->view('overall/barra');
      $this->load->view('overall/usuarios',$data);
			$this->load->view('overall/footer');
	}

	public function icons()
	{
			$this->load->view('overall/header');
			$this->load->view('overall/barra');
			$this->load->view('welcome_message_2');
			$this->load->view('overall/footer');
	}

	public function login()
{
		if(!empty($_POST['cedula']) and !empty($_POST['password'])) {
		$cedula = $this->input->post("cedula");
		$password = $this->input->post("password");
		$res = $this->Usuarios_model->login($cedula, $password);

		if (!$res) {
		$this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos");
		redirect(base_url());
		}
		else{//apertura else
			$data  = array(
				'id' => $res->ci_usuario,
				'nombre' => $res->nom_usuario,
				'apellido' => $res->ape_usuario,
				'rol' => $res->cod_tipo_usuario,
				'login' => TRUE
			);
			$this->session->set_userdata($data);
			redirect(base_url()."welcome/");
		}//cierre del else

	 }
	 else{
		$this->session->set_flashdata("error","Todos los campos deben estar llenos");
		redirect(base_url());
	 }
}

public function registrate()
{
$data  = array(
		'tipos' => $this->Backend_model->get_user_t());
$this->load->view('registro',$data);
}

		public function registro_especial()
		{
			$nombres = $this->input->post("nombres");
			$apellidos = $this->input->post("apellidos");
			$cedula = $this->input->post("cedula");
			$correo = $this->input->post("correo");
			$periodo= "";
			$password = $this->input->post("password");
			$password2 = $this->input->post("password2");
			$tipo = $this->input->post("tipox");
			$res=$this->Usuarios_model->get_user($cedula);
			$fecha = date("Y-m-d");

			if(!empty($nombres) and !empty($apellidos) and !empty($cedula) and !empty($correo) and !empty($password) and !empty($password2) ) {
			if ($res==False) {
				if ($password==$password2) {
				 $data  = array(
					 'ci_usuario' => $cedula,
					 'nom_usuario' => $nombres,
					 'ape_usuario' => $apellidos,
					 'correo_usuario' => $correo,
					 'cod_tipo_usuario' => $tipo,
					 'password' => $password,
					 'token'=>$this->token(),
					 'created_at'=>$fecha
				 );

			if ($this->Usuarios_model->save($data)) {
			 $this->data_user($cedula,$nombres,$apellidos,$correo,$periodo);
			 $this->session->set_flashdata("success","Se ha guardado la informacion ahora ya puedes ingresar");
			 redirect(base_url()."Welcome/");
			}
			 else{
				 $this->session->set_flashdata("error","No se ha guardado la informacion");
				 redirect(base_url()."Welcome/registrate");
			 }
			}else {
				$this->session->set_flashdata("error","Las contraseñas deben coincidir");
				redirect(base_url()."Welcome/registrate");
			}


			}else{
				$this->session->set_flashdata("error","El usuario ya se encuentra registrado");
			redirect(base_url("welcome/registrate"));
			}
			}
			else{
			$this->session->set_flashdata("error","Todos los campos deben estar llenos");
			redirect(base_url("welcome/registrate"));
			}
		}

		public function registrar()
		{
			$nombres = $this->input->post("nombres");
			$apellidos = $this->input->post("apellidos");
			$cedula = $this->input->post("cedula");
			$correo = $this->input->post("correo");
			$periodo= $this->input->post("periodo");
			$password = $this->input->post("password");
			$password2 = $this->input->post("password2");
			$tipo = $this->input->post("tipox");
			$res=$this->Usuarios_model->get_user($cedula);
			$fecha = date("Y-m-d");

			if(!empty($nombres) and !empty($apellidos) and !empty($cedula) and !empty($correo) and !empty($periodo) and !empty($password) and !empty($password2) ) {
			if ($res==False) {
				if ($password==$password2) {
				 $data  = array(
					 'ci_usuario' => $cedula,
					 'nom_usuario' => $nombres,
					 'ape_usuario' => $apellidos,
					 'correo_usuario' => $correo,
					 'cod_tipo_usuario' => $tipo,
					 'password' => $password,
					 'token'=>$this->token(),
					 'created_at'=>$fecha
				 );

			if ($this->Usuarios_model->save($data)) {
			 $this->data_user($cedula,$nombres,$apellidos,$correo,$periodo);
			 $this->session->set_flashdata("success","Se ha guardado la informacion ahora ya puedes ingresar");
			 redirect(base_url()."Welcome/");
			}
			 else{
				 $this->session->set_flashdata("error","No se ha guardado la informacion");
				 redirect(base_url()."Welcome/registrate");
			 }
			}else {
				$this->session->set_flashdata("error","Las contraseñas deben coincidir");
				redirect(base_url()."Welcome/registrate");
			}


			}else{
				$this->session->set_flashdata("error","El usuario ya se encuentra registrado");
			redirect(base_url("welcome/registrate"));
			}
			}
			else{
			$this->session->set_flashdata("error","Todos los campos deben estar llenos");
			redirect(base_url("welcome/registrate"));
			}
		}

 	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

	protected function data_user($cedula,$nombres,$apellidos,$correo,$periodo)
	{
		$data = array('ci_usuario' =>$cedula,
					  'pri_nombre' =>$nombres,
					  'pri_apellido' =>$apellidos,
					  'correo_usuario' =>$correo,
					  'periodo' =>$periodo
		 );
		$this->Usuarios_model->save_detalles($data);
	}
	public function contactar()
	{
		$this->load->view('overall/limpieza/header');
    $this->load->view('overall/aside');
    $this->load->view('overall/contactar');
		$this->load->view('overall/limpieza/footer');
	}

		public function user_add()
	{
		$this->load->view('overall/header');
	    $this->load->view('overall/barra');
	    $this->load->view('admin/new_user');
		$this->load->view('overall/footer');
	}

	public function send_mensaje()
	{
	$nombres = $this->input->post("nombres");
	$asunto = $this->input->post("asunto");
	$correo = $this->input->post("email");
	$mensaje = $this->input->post("mensaje");
	$fecha = date("Y-m-d");

	$this->form_validation->set_rules("nombres","Nombres","required");
	$this->form_validation->set_rules("asunto","Asunto","required");
	$this->form_validation->set_rules("email","Email","required");
	$this->form_validation->set_rules("mensaje","Mensaje","required");

	if ($this->form_validation->run()) {
		$data = array(
			'nombres_mail' => $nombres,
			'asunto_mail' => $asunto,
			'correo_mail' => $correo,
			'fecha_mail' => $fecha,
			'mensaje_mail' => $mensaje
		);
		if ($this->Usuarios_model->send_mensaje($data)) {
			$this->session->set_flashdata("success","Su correo se envio satisfactoriamente");
			redirect(base_url()."welcome/");
		}else {
			$this->session->set_flashdata("error","Su correo no se pudo enviar!!");
			redirect(base_url()."welcome/contactar/");
		}
	}
	else{
		$this->contactar();
	}
 }
 public function getData(){
	 $year = $this->input->post("year");
	 $resultados = $this->Ordenes_model->cantidad($year);
	 echo json_encode($resultados);
 }
 public function user_store(){
	$nombres = $this->input->post("nombre");
	$apellidos = $this->input->post("apellido");
	$cedula = $this->input->post("numero");
	$correo = $this->input->post("email");
	$cargo = "Asesor de Ventas";
	$password = $this->input->post("clave");
	$tipo = 2;


	$this->form_validation->set_rules("nombre","Nombres","required");
	$this->form_validation->set_rules("apellido","Apellidos","required");
	$this->form_validation->set_rules("numero","D.N.I","required|is_unique[usuarios.ci_usuario]");
	//$this->form_validation->set_rules("dependencia","Dependencia","required");
	$this->form_validation->set_rules("email","Correo","required");
	//$this->form_validation->set_rules("cargo","Cargo","required");
	$this->form_validation->set_rules("clave","Contraseña","required");
	//$this->form_validation->set_rules("password2","Confirmacion","required");

	if ($this->form_validation->run()) {
		 //if ($password==$password2) {
			 $data  = array(
				 'ci_usuario' => $cedula,
				 'nombre' => $nombres,
				 'apellido' => $apellidos,
				 'cargo' => $cargo,
				 'correo' => $correo,
				 'tipo_usuario' => $tipo,
				 'clave' => $password,
				 'token'=>$this->token()
			 );

	 if ($this->Usuarios_model->save($data)) {
		 $this->session->set_flashdata("success","Se ha guardado la informacion ahora ya puedes ingresar");
		 redirect(base_url()."Welcome/acceso");
	 	}
		 else{
			 $this->session->set_flashdata("error","No se ha guardado la informacion");
			 redirect(base_url()."Welcome/user_add");
		 }
		// }else {
		// 	$this->session->set_flashdata("error","Las conttraseñas deben coincidir");
		// 	redirect(base_url()."Welcome/user_add");
		// }
	}
	else{
		$this->user_add();
	}
 }
 public function editar_user($id)
 {
 	$data = array('usuario' =>$this->Usuarios_model->obtener_por_id($id),
 	'roles'=>$this->Usuarios_model->getRoles() );
 		$this->load->view('overall/header');
	    $this->load->view('overall/barra');
	    $this->load->view('admin/edit_user',$data);
		$this->load->view('overall/footer');
 }
    public function update_user(){
    $nombres = $this->input->post("nombre");
	$apellidos = $this->input->post("apellido");
	$idusuario = $this->input->post("idusuario");
	$correo = $this->input->post("email");
	$cargo = $this->input->post("cargo");
	$rol = $this->input->post("rol");


	$this->form_validation->set_rules("nombre","Nombres","required");
	$this->form_validation->set_rules("apellido","Apellidos","required");
	//$this->form_validation->set_rules("numero","D.N.I","required|is_unique[usuarios.ci_usuario]");
	//$this->form_validation->set_rules("dependencia","Dependencia","required");
	$this->form_validation->set_rules("email","Correo","required");
	//$this->form_validation->set_rules("cargo","Cargo","required");
	$this->form_validation->set_rules("cargo","Cargo","required");
	$this->form_validation->set_rules("rol","El nivel de usuario","required");
    if ($this->form_validation->run()) {
      $data  = array(
        'tipo_usuario' => $rol,
        'nombre' => $nombres,
		 'apellido' => $apellidos,
		 'cargo' => $cargo,
		 'correo' => $correo
      );

      if ($this->Usuarios_model->update($idusuario,$data)) {
        $this->session->set_flashdata("success","se ha modificado satisfactoriamente");
        redirect(base_url()."welcome/acceso");

      }
      else{
        $this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."welcome/editar_user/".$idusuario);
      }
    }else {
      $this->editar_user($idusuario);
    }
  }
}
