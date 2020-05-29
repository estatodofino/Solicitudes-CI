<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

    class Materias extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('download');
        $this->load->model('Materias_model');
        $this->load->model('upload_model');
        $this->form_validation->set_message('required', '%s es obligatorio.');
        $this->form_validation->set_message('numeric', '%s debe ser numérico.');
    }

    public function index() 
    {
    $data = array('materias' =>$this->Materias_model->get_materias() );
    	$this->load->view('overall/header');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/materias/list',$data);
      $this->load->view('overall/footer');
    }

    public function add_materia()
    {
    $nombre = strtolower($this->input->post("nombre"));
    $codigo = $this->input->post("codigo");
    $semestre = $this->input->post("semestre");
    $horas = $this->input->post("horas");
    $tipo = $this->input->post("tipo");

    $res = $this->Materias_model->get_by_code($codigo);

    if ($res) {
         $result = '<div class="callout callout-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p><i class="icon fa fa-ban"></i>La materia que desea agregar ya existe</p>
        </div>';
        echo json_decode($result);
     } else{
        $data = array(
            'cod_materia' =>$codigo ,
            'nombre_materia' =>$nombre ,
            'horas_semanales' =>$horas ,
            'semestre' =>$semestre ,
            'tipo' =>$tipo );
        $this->Materias_model->materia_add($data);
        echo json_encode(array("status" => TRUE));
     }
  

    }
    public function change_state()
    {
        $id = $this->input->post("id");
        $estado =  $this->input->post("estado");

        $data = array('estado' =>$estado);
        $this->Materias_model->update($id,$data);
        echo json_encode(array("status" => TRUE));   
    }

    public function ajax_edit($id)
      {
         $data = $this->Materias_model->get_by_code($id);  
 
         echo json_encode($data);
      }
      public function materia_update()
      {
        $nombre = strtolower($this->input->post("nombre"));
        $id = $this->input->post("id");
        $semestre = $this->input->post("semestre");
        $horas = $this->input->post("horas");
        $tipo = $this->input->post("tipo");  

        $data = array('nombre_materia'=>$nombre,
                       'semestre' => $semestre,
                       'horas_semanales' => $horas,
                       'tipo' => $tipo );
        $this->Materias_model->update($id,$data);
        echo json_encode(array("status" => TRUE));

      }
}
