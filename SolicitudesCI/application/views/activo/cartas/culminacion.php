<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <b>Nueva Solicitud</b>
        <small>Constancia de culminación de materias</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php if($this->session->flashdata("error")):?>
       <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("error"); ?></p>
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
        <form action="<?php echo base_url();?>activos/solicitudes/culminacion_store" method="POST" enctype="multipart/form-data">
          <h4></h4>
          <div class="form-group col-md-12 ">
              <label for="numero">Número de solicitud:</label>
              <input type="text" class="form-control" id="numero" name="numero" readonly>
              <input type="hidden" class="form-control" id="secuencia" name="secuencia" value="<?=$control->secuencia;?>" disabled="">
          </div>
          <br>

        <div class="form-group <?php echo !empty(form_error('fileImagen')) ? 'has-error':'';?>">
          <label for="fileImagen">Comprobante de inscripción</label>
          <input type="file" id="fileImagen" name="fileImagen" value="<?php echo set_value('fileImagen');?>">
          <?php echo form_error('fileImagen',"<span class='help-block'>","</span>");?>
        </div>
        <p class="help-block">Formatos permitidos .PDF .JPG</p>
        <div class="form-group col-md-12">
          <button type="submit" class="btn btn-success btn-flat"><span class="fa fa-send fa-fw"></span>Solicitar</button>
          <a class="btn btn-danger" type="button" href="<?php echo base_url();?>"><span class="fa fa-ban"></span> Cancelar</a>
      </div>
        </form>
       </div>
      </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
