<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
  
class Upload extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->model('upload_model');        
        $this->load->helper('download');
         $this->form_validation->set_message('required', 'El campo no puede ir vacío!');
        $this->form_validation->set_message('min_length', 'El campo debe tener al menos %s carácteres');
        $this->form_validation->set_message('max_length', 'El campo no puede tener más de %s carácteres');
    }
 
    function index() {
       $data['error'] = "";
        $data['errorArch'] = "";
        $data['estado'] = "";
        $data['archivo'] = "";
        $data['documentos'] = $this->upload_model->get_archivos();
        $this->load->view('layouts/header');
        $this->load->view('example',$data);
        $this->load->view('layouts/footer');
    }
 
    //FUNCIÓN PARA SUBIR LA IMAGEN Y VALIDAR EL TÍTULO
    function do_upload() {
        $this->form_validation->set_rules('titulo', 'titulo', 'required|min_length[5]|max_length[10]|trim|xss_clean');
       
        //SI EL FORMULARIO PASA LA VALIDACIÓN HACEMOS TODO LO QUE SIGUE
        if ($this->form_validation->run() == TRUE) 
        {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';
 
        $this->load->library('upload', $config);
        //SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('vehiculo/vehiculo_view', $error);
        } else {
        //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
        //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
            $file_info = $this->upload->data();
            //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
            //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA
            $this->_create_thumbnail($file_info['file_name']);
            $data = array('upload_data' => $this->upload->data());
            $titulo = $this->input->post('titulo');
            $imagen = $file_info['file_name'];
            $subir = $this->upload_model->subir($titulo,$imagen);      
            $data['titulo'] = $titulo;
            $data['imagen'] = $imagen;
            $this->load->view('imagen_subida_view', $data);
        }
        }else{
        //SI EL FORMULARIO NO SE VÁLIDA LO MOSTRAMOS DE NUEVO CON LOS ERRORES
            $this->index();
        }
    }
    //FUNCIÓN PARA CREAR LA MINIATURA A LA MEDIDA QUE LE DIGAMOS
    function _create_thumbnail($filename){
        $config['image_library'] = 'gd2';
        //CARPETA EN LA QUE ESTÁ LA IMAGEN A REDIMENSIONAR
        $config['source_image'] = 'uploads/'.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        //CARPETA EN LA QUE GUARDAMOS LA MINIATURA
        $config['new_image']='uploads/thumbs/';
        $config['width'] = 150;
        $config['height'] = 150;
        $this->load->library('image_lib', $config); 
        $this->image_lib->resize();
    }

    public function store()
    {
       $config['upload_path'] = './uploads/files/';
        $config['allowed_types'] = 'pdf|xlsx|docx|png|jpg';
        $config['max_size'] = '20048';

        $this->load->library('upload',$config);

        if (!$this->upload->do_upload("fileImagen")) {
            $data['archivo'] = "";
            $data['error'] = "";
            $data['estado'] = "Archivo erroneo";
            $data['errorArch'] = $this->upload->display_errors();
            $data['documentos'] = $this->upload_model->get_archivos();
            $this->load->view('layouts/header');
            $this->load->view('example',$data);
            $this->load->view('layouts/footer');
        } else {

            $file_info = $this->upload->data();
           
            $fecha = date("Y-m-d");
            $titulo = $this->input->post('titImagen');
            $archivo = $file_info['file_name'];
            $subir = $this->upload_model->subir($titulo,$archivo,$fecha);
            $data['documentos'] = $this->upload_model->get_archivos();      
            $data['estado'] = "Archivo subido.";
            $data['archivo'] = $archivo;
            $data['error'] = "";
            $data['errorArch'] = ""; 

            $this->load->view('layouts/header');
            $this->load->view('example',$data);
            $this->load->view('layouts/footer');
            
        }

    }
    public function downloads($name){
         
       $data = file_get_contents('./uploads/files/'.$name); 
       force_download($name,$data); 
     
    }
    public function verArchivo($name)
    {
    $archivo = $this->upload_model->get_archivo($name);
    header("content-type: application/pdf");
    //header("content-Disposition: inline; filename=.pdf");
    readfile($archivo->ruta_adj);
    }
}