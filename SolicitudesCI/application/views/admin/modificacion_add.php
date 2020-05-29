<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Nuevo proceso de modificacion <?=$periodo->nom_periodo;?>
        <small></small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
    <div class="box-body">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nuevo</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url();?>administrar/backend/nueva" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="codegux">Codigo:</label>
                  <input type="text" name="codegux" id="codegux" readonly="" class="form-control">
                </div>

                <div class="form-group">
                  <label for="nombre">Periodo:</label>
                  <input type="hidden" name="idperiodo" id="idperiodo" value="<?=$periodo->cod_periodo;?>">
                  <input type="text" name="nombre" class="form-control" readonly="" disabled="" placeholder="Enter email" value="<?=$periodo->nom_periodo?>">
                </div>
                
                <div class="form-group <?php echo !empty(form_error('fecha_inicio')) ? 'has-error':'';?>">
                  <label for="nombre">fecha inicio:</label>
                  
                  <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
                  <?php echo form_error("fecha_inicio","<span class='help-block'>","</span>");?>
                </div>

                <div class="form-group <?php echo !empty(form_error('fecha_fin')) ? 'has-error':'';?>">
                  <label for="nombre">fecha fin:</label>
                  
                  <input type="date" name="fecha_fin" id="fecha_fin" class="form-control">
                  <?php echo form_error("fecha_fin","<span class='help-block'>","</span>");?>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><span class="fa fa-plus"></span>Guardar</button>
              </div>
            </form>
          </div>
    </div>
    </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
