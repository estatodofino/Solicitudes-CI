<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Nueva Solicitud
        <small>Solicitud de Traslado</small>
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
     <div class="box box-solid">
      <div class="box-body">
        <form action="<?php echo base_url();?>especiales/solicitudes/store_tras" method="POST">
          <h4></h4>
          <div class="form-group col-md-6 <?php echo !empty(form_error('numero')) ? 'has-error':'';?>">
              <label for="numero">Numero de solicitud:</label>
              <input type="text" class="form-control" id="numero" name="numero" value="<?php echo set_value('numero');?>">
                <?php echo form_error("numero","<span class='help-block'>","</span>");?>
          </div>
          <br>

        <div class="form-group col-md-12 <?php echo !empty(form_error('userFile')) ? 'has-error':'';?>">
          <label for="userFile">Comprobante de inscripcion</label>
          <input type="file" id="userFile" name="userFile" value="<?php echo set_value('userFile');?>">
          <?php echo form_error('userFile',"<span class='help-block'>","</span>");?>
          <p class="help-block">Formato permitido .PDF</p>
        </div>

        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-success btn-flat">Solicitar</button>
        </div>
        </form>
       </div>
      </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
