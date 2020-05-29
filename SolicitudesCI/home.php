<?php
defined("BASEPATH") or die("Accesso prohibido");
 
class Home extends CI_Controller
{
 public function __construct()
 {
 parent::__construct();
 }
 
 /**
 * @desc - carga la vista home y envia un array con las provincias
 */
 public function index()
 {
 $this->load->model("provincias_model");
 $data = array(
 "provincias" => $this->provincias_model->getProvincias()
 );
 
 $this->load->view("home", $data);
 }
 
 /**
 * @desc - devuleve un json con las poblaciones filtradas y el código postal de la primera
 */
 public function getAjaxPoblacion()
 {
 if($this->input->is_ajax_request() && $this->input->get("provincia"))
 {
 $this->load->model("provincias_model");
 $provinciaId = $this->input->get("provincia");
 
         //obtenemos las poblaciones de esa provincia
         $poblaciones = $this->provincias_model->getPoblaciones($provinciaId);
 
         $data = array(
             "poblaciones" => $poblaciones, 
             "postal"      => str_pad($poblaciones[0]->postal, 5, '0', STR_PAD_LEFT)
         );
 
         echo json_encode($data);
 }
 }
 
 /**
 * @desc - devuelve un json con el código postal de una provincia y todas las provincias
 */
 public function getAjaxPostal()
 {
 if($this->input->is_ajax_request() && $this->input->get("poblacion"))
 {
 $this->load->model("provincias_model");
 $poblacionId = $this->input->get("poblacion");
 
         //obtenemos el código postal de la poblacion
         $cPostal = $this->provincias_model->getPostal($poblacionId);
 
         $data = array(
             "postal"      => str_pad($cPostal->postal, 5, '0', STR_PAD_LEFT),
             "provincias"  => $this->provincias_model->getProvincias()
         );
 
         echo json_encode($data);
 }
 }
}