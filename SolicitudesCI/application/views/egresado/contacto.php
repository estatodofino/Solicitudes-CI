<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Contacto
        <small>Enviar Mensaje</small>
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

            <div class="box-header with-border">
              <h3 class="box-title">Redactar Nuevo Mensaje</h3>
            </div>
            <!-- /.box-header -->
            <form action="<?php base_url();?>send_mensaje" method="post">
              <div class="form-group col-md-12 <?php echo !empty(form_error('nombres')) ? 'has-error':'';?>">
                  <label for="nombres">Ingrese su Nombre:</label>
                  <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo set_value('nombres');?>">
                    <?php echo form_error("nombres","<span class='help-block'>","</span>");?>
              </div>
              <div class="form-group col-md-12 <?php echo !empty(form_error('email')) ? 'has-error':'';?>">
                  <label for="email">Correo electronico:</label>
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email');?>">
                    <?php echo form_error("email","<span class='help-block'>","</span>");?>
              </div>
              <div class="form-group col-md-12 <?php echo !empty(form_error('asunto')) ? 'has-error':'';?>">
                  <label for="asunto">Asunto:</label>
                  <input type="text" class="form-control" id="asunto" name="asunto" value="<?php echo set_value('asunto');?>">
                    <?php echo form_error("asunto","<span class='help-block'>","</span>");?>
              </div>
              <div class="form-group col-md-12 <?php echo !empty(form_error('mensaje')) ? 'has-error':'';?>">
                  <label for="mensaje">Mensaje:</label>
                  <textarea class="form-control" id="mensaje" name="mensaje" rows="8" cols="80" value="<?php echo set_value('mensaje');?>"></textarea>
                    <?php echo form_error("mensaje","<span class='help-block'>","</span>");?>
              </div>
              <div class="form-group">
                <div class="pull-right">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar </button>
                </div>
              </div>
            </form>
            <!-- /.box-body -->

            <!-- /.box-footer -->

                 </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
