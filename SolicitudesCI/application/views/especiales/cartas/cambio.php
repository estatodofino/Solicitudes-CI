<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Nueva Solicitud
        <small>Solicitar traslado y cambio de carrera</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
            if ($datos->sec_nombre=="" && $datos->sec_apellido=="" && $datos->direccion=="" && $datos->sexo=="" && $datos->telefono_fijo=="" && $datos->telefono_movil=="")
             {
            echo '<div class="callout callout-warning">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p><span class="icon fa fa-warning fa-fw"></span>Para realizar la solicitud del documento debe <a href="'.base_url().'especiales/seguridad/actualizar">completar su registro</a></p>
             </div>';
           }
      ?>
        <?php if($this->session->flashdata("success")):?>
   <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("success"); ?></p>
        </div>
  <?php endif;?>
  <?php if($this->session->flashdata("error")):?>
  <div class="alert alert-danger alert-dismissible">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
       </div>
  <?php endif;?>
  <?php if($errorArch !=""):?>
         <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           <p><i class="icon fa fa-ban"></i><?=$errorArch;?></p>
              </div>
       <?php endif;?>
 <div class="box box-solid">
  <div class="box-body">

   <form action="<?php echo base_url();?>especiales/solicitudes/cambio_carrera" method="POST">
    <input type="hidden" class="form-control" name="tipo_sol" value="cambio">
    <div class="form-group col-md-12 <?php echo !empty(form_error('numero')) ? 'has-error':'';?>">
      
        <label for="numero">Numero de solicitud:</label>
        <input type="text" class="form-control" id="numero" name="numero"readonly="">
       <input type="hidden" class="form-control" id="secuencia" name="secuencia" value="<?=$control->secuencia;?>" disabled="">
       <?php echo form_error("numero","<span class='help-block'>","</span>");?>
     </div>
     <br>
     <br>
            
      <div class="form-group col-md-12 callout callout-defaul">
        <div class="row">
        <label>Carrera actual: </label> 
        <br>
         <div class="form-group col-md-3">
          <label for="Nucleo">Nucleo</label>
          <select name="Nucleo" class="form-control">
            <option value="">::Seleccione</option>
            <option value="Costa Oriental" disabled="">Costa Oriental</option>
            <option value="Maracaibo" disabled="">Maracaibo</option>
            <option value="Punto Fijo">Punto Fijo</option>
          </select>
        </div>
        <div class="form-group col-md-5 <?php echo !empty(form_error('carrera_act')) ? 'has-error':'';?>">
          <label for="carrera_act">Carrera</label>
          <input type="text" class="form-control" name="carrera_act"value="<?php echo set_value('carrera_act');?>" placeholder="Periodo">
          <?php echo form_error('carrera_act',"<span class='help-block'>","</span>");?>
        </div>
        <!-- <div class="form-group col-md-4">
          <label for="Codigo_ubic1">Codigo de Ubicacion </label>
          <input type="text" class="form-control" name="Codigo_ubic1">
        </div> -->
        </div>
        <div class="row">
        <label>Carrera Solicitada: </label> 
        <br>
         <div class="form-group col-md-3">
          <label for="Nucleo">Nucleo</label>
          <input type="text" class="form-control" name="Nucleo" value="Punto Fijo" disabled="">
        </div>
        <div class="form-group col-md-5">
          <label for="carrera_sol">Carrera</label>
          <input type="text" class="form-control" name="carrera_sol" value="Computacion" disabled="">
        </div>
        <!-- <div class="form-group col-md-4">
          <label for="Codigo_ubic2">Codigo de Ubicacion </label>
          <input type="text" class="form-control" name="Codigo_ubic2">
        </div>
        <div class="form-group col-md-4 <?php echo !empty(form_error('periodo')) ? 'has-error':'';?>">
          <label for="periodo">Periodo </label>
          <input type="text" class="form-control" name="periodo" value="<?php echo set_value('periodo');?>" placeholder="Periodo">
          <?php echo form_error('periodo',"<span class='help-block'>","</span>");?>
        </div> -->
        
        <!-- <div class="form-group col-md-4 <?php echo !empty(form_error('referencia')) ? 'has-error':'';?>">
          <label for="year">Año electivo </label>
          <input type="text" class="form-control" name="year" value="<?php echo set_value('year');?>" placeholder="Año electivo">
          <?php echo form_error('year',"<span class='help-block'>","</span>");?>
        </div> -->
        </div>
      </div> 

      <br>     

      <div class="form-group col-md-12"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="fa fa-upload fa-fw"></span> Subir Archivos</button></div>
      
<div id="tipo">
  <div class="box-body table-responsive">
     <table id="docs" class="table table-striped table-bordered" cellspacing="0" width="100%">
       <thead>
         <tr>
           <th>Nombre del Documento</th>
           <th>Ruta del documento</th>
           <th>Estado</th>
           <th>Opcion</th>
         </tr>
       </thead>
       <tbody>
       <?php if(!empty($documentos)):?>
            <?php foreach($documentos as $item):?>
                <tr>
                    <td><?=$item->nombre_adj;?></td>
                    <td><?=$item->ruta_adj;?></td>
                    <td><span class="label label-success fa fa-check">Subido</span></td>
                            
                      <td>
                         <div class="btn-group">
                              <button type="button" class="btn btn-info btn-view-ordenes btn-sm" data-toggle="modal" data-target="#modal-default" value="">
                                  <span class="fa fa-search"></span>
                              </button> 
                             <a href="<?php echo base_url();?>especiales/solicitudes/delete_archivo/<?=$item->id;?>" class="btn btn-danger btn-remove_doc btn-sm" value="<?php echo current_url();?>"><span class="fa fa-remove"></span></a>
                          </div>
                      </td>
                  </tr>
               <?php endforeach;?>
            <?php endif;?>
           </tbody>
         </table>
     </div>
    </div>

      <br>
      <br>
      
      <div class="form-group col-md-4 <?php echo !empty(form_error('referencia')) ? 'has-error':'';?>">
          <label for="referencia">N° de Referencia:</label><input type="text" class="form-control" id="referencia" name="referencia" value="<?php echo set_value('referencia');?>" placeholder="Numero de referencia" >
          <?php echo form_error('referencia',"<span class='help-block'>","</span>");?>
      </div>

      <div class="form-group col-md-4 <?php echo !empty(form_error('monto')) ? 'has-error':'';?>">
          <label for="monto">Monto del deposito:</label><input type="text" class="form-control" id="monto" name="monto" value="<?php echo set_value('monto');?>" placeholder="Monto del deposito" >
          <?php echo form_error('monto',"<span class='help-block'>","</span>");?>
      </div>

      <div class="form-group col-md-4">
          <label for="fecha">Fecha de pago:</label><input type="date" class="form-control" id="fecha" name="fecha">
          
      </div>
      <div class="form-group col-md-12">
        <?php if($datos->sec_nombre!=""):?>
          <button type="submit" class="btn btn-success btn-flat"><span class="fa fa-send fa-fw"></span>Solicitar</button>
        <?php endif; ?>
          <a type="button" value="egresado/solicitudes" name="button" class="btn btn-cancel btn-danger"><span class="fa fa-remove fa-fw"></span>Cancelar</a>
      </div>

      </form>
       </div>
      </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Subir Archivos</h4>
      </div>
       <div class="modal-body">
         <?=form_open_multipart(base_url()."especiales/solicitudes/subirDoc")?>
          <input type="hidden" id="numDoc" name="id" value=""/>
          <input type="hidden" name="direccion" value="especiales/solicitudes/cambio"/>
          <input type="hidden" name="direccion2" value="especiales/cartas/cambio"/>
             <div class="form-group">
                <label for="titulo" >Titulo</label>
                 <select name="titulo" class="form-control" >
                   <option value="Fotocopia de CI">Copia de CI</option>
                    <option value="Comprobante de pago" >Deposito bancario</option>
                    <option value="Comprobante de inscripcion" >Ultimo comprobante de inscripcion</option>
                    <option value="Macur" >Copia Notas certificadas o MACUR</option>
                  </select>
                  </div>
                   <div class="form-group">
                    <label for="fileImagen">Archivo</label>
                    <input type="file" name="fileImagen">
                    </div>
                     <div class="ln_solid"></div>
                     <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>

                    <button type="submit" class="btn btn-primary"><span class="fa fa-upload"></span> Cargar</button>
                  <?=form_close()?>
                 </div>
                </div>
            </div>
          </div>
