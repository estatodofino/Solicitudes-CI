<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Nueva Solicitud
        <small>Constancia de culminacion</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
      <div class="box-body">
        <form action="<?php echo base_url();?>activos/solicitudes/postulacion_store" method="POST">
          <h4></h4>
          <div class="form-group col-md-12 <?php echo !empty(form_error('numero')) ? 'has-error':'';?>">
              <label for="numero">Numero de solicitud:</label>
              <input type="text" class="form-control" id="numero" name="numero" value="<?php echo set_value('numero');?>">
                <?php echo form_error("numero","<span class='help-block'>","</span>");?>
          </div>
          <br>

        <div class="form-group <?php echo !empty(form_error('userFile')) ? 'has-error':'';?>">
          <label for="userFile">Comprobante de inscripcion</label>
          <input type="file" id="userFile" name="userFile" value="<?php echo set_value('userFile');?>">
          <?php echo form_error('userFile',"<span class='help-block'>","</span>");?>
          <p class="help-block">Formato permitido .PDF</p>
        </div>

        <div class="form-group <?php echo !empty(form_error('userFile')) ? 'has-error':'';?>">
          <label for="userFile">MACUR</label>
          <input type="file" id="userFile" name="userFile" value="<?php echo set_value('userFile');?>">
          <?php echo form_error('userFile',"<span class='help-block'>","</span>");?>
          <p class="help-block">Formato permitido .PDF</p>
        </div>

        <div class="form-group <?php echo !empty(form_error('userFile')) ? 'has-error':'';?>">
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
       <div class="container">
          <?php if (count($documentos)): ?>
               <?php foreach ($documentos as $item ):?>
                   <div class="col-sm-6 col-md-3">
                      <div class="thumbnail" style="height: 100%;">
                        <div class="image view view-first">
                          <img style="width: 100%; display: block;" src="<?php echo base_url();?>uploads/<?=$item->ruta_adj?>" alt="image" />
                          <div class="mask">
                            <p>URBI&copy;</p>
                            <div class="tools tools-bottom">
                              <a class="btn" href="<?php echo base_url() ?>vehiculo/examinar/<?=$item->id ?>"><i class="fa fa-search"></i></a>
                              </div>
                          </div>
                        </div>
                        <div class="caption" style="width:100%">
                          <ul class="no_style_list centrado">
                               <li><p>Modelo: <?=$item->nombre_adj?></p></li>
                              <li> <p>Marca: <?=$item->fecha?></p></li>
                            </ul>
                        </div>
                      </div>
                    </div>
                         <?php endforeach; ?>

                  <?php else: ?>
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  </button>
                  <strong><i class="fa fa-warning fa-fw"></i>Disculpe!</strong><p> No se han cargado vehiculos.</p>
                </div>

                  <?php endif; ?>
          </div>
      </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
