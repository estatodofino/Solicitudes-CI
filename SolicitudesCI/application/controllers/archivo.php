<?php defined('BASEPATH') OR exit('No direct script access allowed');

//This is the Controller for codeigniter crud using ajax application.
class Archivo extends CI_Controller {

	 public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->model('vehiculo_model');
	 	}
    public function subirArchivo(){
      $config['upload_path'] = './uploads/files/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '2048';
      $config['max_width'] = '2024';
      $config['max_height'] = '2008';

      $this->load->library('upload',$config);

      if (!$this->upload->do_upload("fileImagen")) {
          $data['error'] = $this->upload->display_errors();
          $this->load->view('tables/header2');
          $this->load->view('overall/barra');
          $this->load->view('vehiculo/ver',$data);
          $this->load->view('tables/footer2');
      } else {

          $file_info = $this->upload->data();

          $this->crearMiniatura($file_info['file_name']);
          $id = $this->input->post('id');
          $titulo = $this->input->post('titulo');
          $imagen = $file_info['file_name'];

          $subir = $this->vehiculo_model->subir2($id,$titulo,$imagen);
          $data = array(
          'vehiculo' => $this->vehiculo_model->get_by_id($id),
          'documentos' =>$this->vehiculo_model->get_documentos($id)
          );

          $this->load->view('tables/header2');
          $this->load->view('overall/barra');
          $this->load->view('vehiculo/ver', $data);
          $this->load->view('tables/footer2');

      }
  }

    function crearMiniatura($filename){
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'uploads/files/'.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['new_image']='uploads/thumbs/';
        $config['thumb_marker']='';//captura_thumb.png
        $config['width'] = 150;
        $config['height'] = 150;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
}
}
