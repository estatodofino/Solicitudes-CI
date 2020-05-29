<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> 
        Nueva Solicitud
        <small>Solicitud de equivalencias (Usuario no egresado)</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
            if ($datos->sec_nombre=="" && $datos->sec_apellido=="" && $datos->direccion=="" && $datos->sexo=="" && $datos->telefono_fijo=="" && $datos->telefono_movil=="") {
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
     <div class="form-group col-md-12 callout callout-defaul">
       <form action="<?php echo base_url();?>especiales/solicitudes/store_equivalencia" method="POST">

        <input type="hidden" class="form-control" name="tipo_sol" value="no_egresado">
        <div class="form-group col-md-12 <?php echo !empty(form_error('numero')) ? 'has-error':'';?>">
      
        <label for="numero">Numero de solicitud:</label>
        <input type="text" class="form-control" id="numero" name="numero" readonly="">
       <input type="hidden" class="form-control" id="secuencia" name="secuencia" value="<?=$control->secuencia;?>" disabled="">
       <?php echo form_error("numero","<span class='help-block'>","</span>");?>
     </div>
     <br>
     <br>
          <div class="row">
        <h4>Informacion academica (Educacion Media) </h4> 
        <br>

        <div class="form-group col-md-5 <?php echo !empty(form_error('grado')) ? 'has-error':'';?>">
          <label for="grado">Titulo Obtenido </label>
          <input type="text" class="form-control" name="grado" value="<?php echo set_value('grado');?>" placeholder="Titulo obtenido">
          <?php echo form_error('grado',"<span class='help-block'>","</span>");?>
        </div>
        
         <div class="form-group col-md-3">
          <label for="tipo">Tipo de institucion</label>
          <select name="tipo" class="form-control">
            <option value="">::Seleccione</option>
            <option value="Publico">Publico</option>
            <option value="Privado">Privado</option>
          </select>
        </div>
        
        <div class="form-group col-md-4 <?php echo !empty(form_error('nombre_instituto')) ? 'has-error':'';?>">
          <label for="nombre_instituto">Institucion educativa</label>
          <input type="text" class="form-control" name="nombre_instituto" value="<?php echo set_value('nombre_instituto');?>" placeholder="Institucion Educativa ">
          <?php echo form_error('nombre_instituto',"<span class='help-block'>","</span>");?>
        </div>
        
        <div class="form-group col-md-4 <?php echo !empty(form_error('year_grado')) ? 'has-error':'';?>">
          <label for="year_grado">Año de graduacion</label>
          <input type="text" class="form-control" name="year_grado" value="<?php echo set_value('year_grado');?>" placeholder="Año de graduacion">
          <?php echo form_error('year_grado',"<span class='help-block'>","</span>");?>
        </div>
        
        <div class="form-group col-md-4 <?php echo !empty(form_error('pais_grado')) ? 'has-error':'';?>">
          <label for="pais_grado">Pais donde obtuvo el titulo</label>
          <input type="text" class="form-control" name="pais_grado" value="<?php echo set_value('pais_grado');?>" placeholder="Pais donde obtuvo el titulo">
          <?php echo form_error('pais_grado',"<span class='help-block'>","</span>");?>
        </div>
        
        <div class="form-group col-md-4 <?php echo !empty(form_error('estado_grado')) ? 'has-error':'';?>">
          <label for="estado_grado">Estado donde obtuvo el titulo </label>
          <input type="text" class="form-control" name="estado_grado" value="<?php echo set_value('estado_grado');?>" placeholder="Estado donde obtuvo el titulo">
          <?php echo form_error('estado_grado',"<span class='help-block'>","</span>");?>
        </div>

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
        </div>
        
         <div class="form-group col-md-4 <?php echo !empty(form_error('year_electivo')) ? 'has-error':'';?>">
          <label for="year_electivo">Año electivo </label>
          <input type="text" class="form-control" name="year_electivo" value="<?php echo set_value('year_electivo');?>" placeholder="Año electivo">
          <?php echo form_error('year_electivo',"<span class='help-block'>","</span>");?>
        </div> -->
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
                                   <a href="<?php echo base_url();?>egresado/solicitudes/delete_archivo/<?=$item->id;?>" class="btn btn-danger btn-remove_doc btn-sm" value="<?php echo current_url();?>"><span class="fa fa-remove"></span></a>
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
         <?=form_open_multipart(base_url()."egresado/solicitudes/subirDoc")?>
          <input type="hidden" id="numDoc" name="id" value=""/>
          <input type="hidden" name="direccion" value="especiales/solicitudes/equivalencias_no_egresado"/>
          <input type="hidden" name="direccion2" value="especiales/cartas/equivalencias_noe"/>
             <div class="form-group">
                <label for="titulo" >Titulo</label>
                 <select name="titulo" class="form-control" >                  
                    <option value="Comprobante de pago" >Deposito bancario</option>

                    <!-- <option value="resolucion de equivalencias" >Copia de resolucion de equivalencias</option> -->
                   
                   <option value="Titulo obtenido">Titulo de bachiller original</option>
                   <option value="Notas certificadas">Notas universitarias certificadas</option>
                   <option value="Fotocopia de la CI">Copia de la CI</option>
                    <option value="Copia del carnet militar">Copia del carnet militar</option>
                    <option value="Partida de nacimiento">Partida de nacimiento original</option>
                    <option value="Constancia de buena conducta">Constancia de buena conducta</option>
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

