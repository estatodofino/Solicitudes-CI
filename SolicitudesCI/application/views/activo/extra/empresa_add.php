<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Nueva Empresa
        <small>Datos de la empresa</small>
        </h1>
    </section>
    <!-- Main content -->
<section class="content">
 <?php if($this->session->flashdata("error")):?>
  <div class="alert alert-success alert-dismissible">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("error"); ?></p>
       </div>
<?php endif;?>
 <div class="box box-solid">
    <div class="box-body">
      <form action="<?php echo base_url();?>activos/backend/store_empresa" method="POST">
            <div class="form-group <?php echo !empty(form_error('nombre')) ? 'has-error':'';?>">
                <label for="">Nombre de la empresa:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre de la empresa">
                <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
            </div>
      <div class="form-group <?php echo !empty(form_error('rif')) ? 'has-error':'';?>">
          <label for="rif">RIF:</label><input type="text" class="form-control" id="rif" name="rif" value="<?php echo set_value('rif');?>" placeholder="Ingrese el rif de la empresa" >
          <?php echo form_error('rif',"<span class='help-block'>","</span>");?>
      </div>
      <div class="form-group <?php echo !empty(form_error('telefono')) ? 'has-error':'';?>">
          <label for="telefono">Telefono de la empresa:</label>
          <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo set_value('telefono');?>" placeholder="Ingrese el telefono de la empresa">
            <?php echo form_error("telefono","<span class='help-block'>","</span>");?>
      </div>

      <div class="form-group <?php echo !empty(form_error('direccion')) ? 'has-error':'';?>">
          <label for="direccion">Direccion:</label><input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo set_value('direccion');?>" placeholder="Ingrese la direccion de la empresa">
          <?php echo form_error('direccion',"<span class='help-block'>","</span>");?>
      </div>

      <div class="form-group col-md-12">
          <button type="submit" class="btn btn-success btn-flat"><span class="fa fa-save fa-fw"></span>Guardar</button>
          <a class="btn btn-danger" type="button" href="<?php echo base_url();?>"><span class="fa fa-ban"></span> Cancelar</a>
      </div>
      </form>
     </div>
  </div>
</section>
    <!-- /.content -->
</div>
