<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Nueva tutor
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
     <form action="<?php echo base_url();?>administrar/backend/tutor_store" method="POST" enctype="multipart/form-data">
       
        <h4>Datos de la empresa</h4>
        <div class="form-group ">
            <div class="col-md-6 col-xs-12 <?php echo !empty(form_error('nombre')) ? 'has-error':'';?>">
                <label for="">Nombre de la empresa:</label>
                <input type="hidden" name="idempresa" id="idempresa">
                <div class="input-group">
                    <input type="text" class="form-control" disabled="disabled" name="nombre" id="nombre">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default" ><span class="fa fa-search"></span> Buscar</button>
                        </span>
                </div><!-- /input-group -->
                <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
            </div>
       </div>
      <div class="form-group col-md-6 <?php echo !empty(form_error('rif')) ? 'has-error':'';?>">
          <label for="rif">RIF:</label><input type="text" class="form-control" id="rif" name="rif" value="<?php echo set_value('rif');?>" disabled="disabled">
          <?php echo form_error('rif',"<span class='help-block'>","</span>");?>
      </div>
      <div class="form-group col-md-6 <?php echo !empty(form_error('telefono')) ? 'has-error':'';?>">
          <label for="telefono">Telefono de la empresa:</label>
          <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo set_value('telefono');?>" disabled="disabled">
            <?php echo form_error("telefono","<span class='help-block'>","</span>");?>
      </div>

      <div class="form-group col-md-6 <?php echo !empty(form_error('direccion')) ? 'has-error':'';?>">
          <label for="direccion">Direccion:</label><input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo set_value('direccion');?>" disabled="disabled">
          <?php echo form_error('direccion',"<span class='help-block'>","</span>");?>
      </div>
      <h4>Datos del tutor</h4>
      <div class="col-md-6 col-xs-12 <?php echo !empty(form_error('asesor')) ? 'has-error':'';?>">
          <label for="">Nombre del tutor:</label>
          <input type="text" class="form-control"  name="asesor" id="asesor" value="<?php echo set_value('asesor')?>"><!-- /input-group -->
          <?php echo form_error("asesor","<span class='help-block'>","</span>");?>
      </div>

      <div class="form-group col-md-6 <?php echo !empty(form_error('tutor_e_ci')) ? 'has-error':'';?>">
          <label for="tutor_e_ci">Cedula:</label><input type="text" class="form-control" id="tutor_e_ci" name="tutor_e_ci" value="<?php echo set_value('tutor_e_ci');?>" >
          <?php echo form_error('tutor_e_ci',"<span class='help-block'>","</span>");?>
      </div>
      <div class="form-group col-md-6 <?php echo !empty(form_error('profesion')) ? 'has-error':'';?>">
          <label for="profesion">Profesion:</label><input type="text" class="form-control" id="profesion" name="profesion" value="<?php echo set_value('profesion');?>" >
          <?php echo form_error('profesion',"<span class='help-block'>","</span>");?>
      </div>
      <div class="form-group col-md-6 <?php echo !empty(form_error('cargo_asesor')) ? 'has-error':'';?>">
          <label for="cargo_asesor">Cargo:</label><input type="text" class="form-control" id="cargo_asesor" name="cargo_asesor" value="<?php echo set_value('cargo_asesor');?>" >
          <?php echo form_error('cargo_asesor',"<span class='help-block'>","</span>");?>
      </div>

      <div class="form-group col-md-12">
          <button type="submit" class="btn btn-success btn-flat"><span class="fa fa-save fa-fw"></span> Guardar</button>
          <a class="btn btn-danger" type="button" href="<?php echo base_url();?>"><span class="fa fa-ban"></span> Cancelar</a>
      </div>
      </form>
     </div>
  </div>

  <!-- /.content-wrapper -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lista de Empresas</h4>
            </div>
            <div class="modal-body">
                <table id="example1" class="example table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>RIF</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Opcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($empresas)):?>
                            <?php foreach($empresas as $empresa):?>
                                <tr>
                                    <td><?php echo $empresa->rif;?></td>
                                    <td><?php echo $empresa->nombre_empresa;?></td>
                                    <td><?php echo $empresa->telefono_empresa;?></td>
                                    <td><?php echo $empresa->direccion_empresa;?></td>
                                    <?php $dataempresa = $empresa->rif."*".$empresa->nombre_empresa."*".$empresa->telefono_empresa."*".$empresa->direccion_empresa;?>
                                    <td>
                                        <button type="button" class="btn btn-success btn-check" value="<?php echo $dataempresa;?>"><span class="fa fa-check"></span> Seleccionar</button>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                <a class="btn btn-primary" href="<?php echo base_url();?>administrar/backend/nueva_empresa"><span class="fa fa-plus"> Agregar nueva empresa</span></a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</section>
    <!-- /.content -->
</div>
