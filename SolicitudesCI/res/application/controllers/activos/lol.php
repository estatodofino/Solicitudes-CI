$this->load->library('upload',$config);
         if (!$this->upload->do_upload("userFile")) {
             $this->session->set_flashdata("error","La informacion no se ha enviado");
              redirect(base_url()."activos/solicitudes/postulacion");
        } else {

            $file_info = $this->upload->data();
           
            $numSol = $this->input->post("numero");
            // $empresa = $this->input->post("empresa");
            // $rif = $this->input->post("rif");
            // $telefono = $this->input->post("telefono");
            // $direccion = $this->input->post("direccion");
            // $tutor_e = $this->input->post("tutor_e");
            // $tutor_e_ci = $this->input->post("tutor_e_ci");
            // $profesion = $this->input->post("profesion");
            // $cargo = $this->input->post("cargo_asesor");
            // $solicitante=$this->session->userdata("id");
            // $fecha_solicitud = date("Y-m-d");
            // $tipo_solicitud = 10;
            // $nombre_file="Comprobante_de_inscripcion";
            // $estado_solicitud="En espera";
            $archivo = $file_info['file_name'];

            $data = array(
              //'ci_solicitante' => $solicitante,
              'num_solicitud' => $numSol, 
              'ruta_adj' =>$archivo
              //'fecha_solicitud' => $fecha_solicitud,
              //'cod_tipo_solicitud' => $tipo_solicitud,
              //'estado_solicitud' => $estado_solicitud,
              //'rif_empresa' => $rif,
              //'ci_asesor' => $tutor_e_ci
                    );

            if ($this->Solicitud_model->subir_postulacion($data)) {
              // $this->detalle_solicitud($numSol,$archivo,$fecha_solicitud,$nombre);
              //   $this->datos_empresa($rif,$empresa,$telefono,$direccion);
              //   $this->datos_asesor($rif,$tutor_e_ci,$tutor_e,$profesion,$cargo);
                $this->session->set_flashdata("success","Su solicitud se ha enviado satisfactoriamente");
                redirect(base_url()."activos/solicitudes");
            }else{
                 $this->session->set_flashdata("success","La solicitud no puede ser procesada");
                redirect(base_url()."activos/solicitudes");
            }  
          }