<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Seguridad
        <small>Cambiar Clave</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
            <div class="box-body">
  <div class="col-md-12">
      <?php if($this->session->flashdata("error")):?>
          <div class="callout callout-danger">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
               </div>
      <?php endif;?>
      <?php if($this->session->flashdata("success")):?>
          <div class="callout callout-success">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("success"); ?></p>
               </div>
      <?php endif;?>
      <form action="<?php echo base_url();?>activos/seguridad/update" method="POST">
          <input type="hidden" name="iduser" value="">
          <div class="form-group col-md-12 <?php echo !empty(form_error('antigua')) ? 'has-error':'';?>">
              <label for="antigua">Antigua Contraseña:</label>
              <input type="password" class="form-control" id="antigua" name="antigua" value="<?php echo set_value('antigua');?>" placeholder="ingrese su Antigua Contraseña">
                <?php echo form_error("antigua","<span class='help-block'>","</span>");?>
          </div>

          <div class="form-group col-md-12 <?php echo !empty(form_error('nueva')) ? 'has-error':'';?>">
              <label for="nueva">Nueva Contraseña:</label>
              <input type="password" class="form-control" id="nueva" name="nueva" value="<?php echo set_value('nueva');?>" placeholder="Ingrese su Nueva Contraseña">
              <?php echo form_error('nueva',"<span class='help-block'>","</span>");?>
          </div>

          <div class="form-group col-md-12 <?php echo !empty(form_error('confirmar')) ? 'has-error':'';?>">
              <label for="confirmar">Confirmacion de Contraseña:</label>
              <input type="password" class="form-control" id="confirmar" name="confirmar" value="<?php echo set_value('confirmar');?>" placeholder="Repita su Nueva Contraseña">
              <?php echo form_error("confirmar","<span class='help-block'>","</span>");?>
          </div>

          <div class="form-group col-md-12">
              <button type="submit" class="btn btn-success btn-flat"><span class="fa fa-edit fa-fw"></span>Actualizar</button>
              <a class="btn btn-danger" type="button" href="<?php echo base_url();?>"><span class="fa fa-ban"></span> Cancelar</a>
          </div>
      </form>
  </div>
</div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
