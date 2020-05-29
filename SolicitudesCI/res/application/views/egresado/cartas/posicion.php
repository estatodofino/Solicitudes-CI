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
      <form action="<?php echo base_url();?>egresado/solicitudes/posicion_store" method="POST" enctype="multipart/form-data">
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

      <div class="form-group col-md-12"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Subir Archivos</button></div>


      <!-- <div class="form-group col-md-12">
        <div class="button-group">
            <span class="input-group-btn">
              <button class="btn btn-primary btn-foto btn-sm" type="button" name="button" aria-hidden="true">Fotocopia C.I</button>
                <button class="btn btn-light btn-sm" id="uploadfi" type="button"><span class="fa fa-upload" id="ico-btn-file"></span></button>
                </span>
        </div>
        </div> -->
        <!-- <div class="form-group col-md-12">
        <div class="button-group">
            <span class="input-group-btn">
              <button class="btn btn-primary btn-foto btn-sm" type="button" name="button" aria-hidden="true">Comprobante de Pago</button>
                <button class="btn btn-light btn-sm" id="uploadfi" type="button"><span class="fa fa-upload" id="ico-btn-file"></span></button>
                </span>
        </div>
      </div>

      <input type="file" id="fileImagen" name="fileImagen" required="required" accept="application/pdf" > -->

      <div class="form-group col-md-12">
          <button type="submit" class="btn btn-success btn-flat">Solicitar</button>
          <button type="button" name="button" class="btn btn-cancel btn-danger">Cancelar</button>
      </div>
      </form>
      <div class="content" id="tipo">

            </div>
     </div>
  </div>
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
             <div class="form-group">
                <label for="titulo" >Titulo</label>
                 <select name="titulo" >
                   <option value="Fotocopia de CI">Fotocopia de CI</option>
                    <option value="Comprobante de pago" >Comprobante de pago</option>
                  </select>
                  </div>
                   <div class="form-group">
                    <label for="fileImagen">Archivo</label>
                    <input type="file" name="fileImagen">
                    </div>
                     <div class="ln_solid"></div>
                     <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Cargar</button>
                  <?=form_close()?>
                 </div>
                </div>
            </div>
          </div>
</section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
