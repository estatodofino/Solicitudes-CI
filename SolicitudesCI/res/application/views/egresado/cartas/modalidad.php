<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Nueva solicitud
        <small>Carta de Posicion y Rango</small>
        </h1>
    </section>
    <!-- Main content -->
<section class="content">

 <div class="box box-solid">
    <div class="box-body">
      <form action="<?php echo base_url();?>egresado/solicitudes/posicion_store" method="POST">
        <div class="form-group col-md-12 <?php echo !empty(form_error('numero')) ? 'has-error':'';?>">
            <label for="numero">Numero de solicitud:</label>
            <input type="text" class="form-control" id="numero" name="numero" value="<?=$control->secuencia;?>">
           <input type="hidden" class="form-control" id="secuencia" name="secuencia" value="<?=$control->secuencia;?>" disabled="">
           <?php echo form_error("numero","<span class='help-block'>","</span>");?>
        </div>
        <br>


      <div class="form-group col-md-12 <?php echo !empty(form_error('egreso')) ? 'has-error':'';?>">
          <label for="rif">Periodo de egreso:</label><input type="text" class="form-control" id="egreso" name="egreso" value="<?php echo set_value('egreso');?>" placeholder="Ingrese el periodo de egreso" >
          <?php echo form_error('egreso',"<span class='help-block'>","</span>");?>
      </div>

      <div class="form-group col-md-12 <?php echo !empty(form_error('userFile')) ? 'has-error':'';?>">
        <label for="userFile">Fotocopia C.I</label>
        <input type="file" id="userFile" name="userFile" value="<?php echo set_value('userFile');?>">
        <?php echo form_error('userFile',"<span class='help-block'>","</span>");?>
          <p class="help-block">Formato permitido .PDF</p>
      </div>

      <div class="form-group col-md-12 <?php echo !empty(form_error('userFile')) ? 'has-error':'';?>">
        <label for="userFile">Comprobante de Pago</label>
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
