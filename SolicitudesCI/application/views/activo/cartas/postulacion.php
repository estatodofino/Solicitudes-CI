<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <b>Nueva Solicitud</b>
        <small>Carta de Postulación de Pasantías</small>
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
      <form action="<?php echo base_url();?>activos/solicitudes/store" method="POST" enctype="multipart/form-data">
        <div class="form-group col-md-12 <?php echo !empty(form_error('numero')) ? 'has-error':'';?>">
            <label for="numero">Numero de solicitud:</label>
            <input type="text" class="form-control" id="numero" name="numero" value="<?=$control->secuencia;?>" readonly="">
           <input type="hidden" class="form-control" id="secuencia" name="secuencia" value="<?=$control->secuencia;?>" disabled="">
           <input type="hidden" class="form-control" id="solicitud_tipo" name="solicitud_tipo" value="solicitud_postulacion" disabled="">
           <?php echo form_error("numero","<span class='help-block'>","</span>");?>
        </div>
        <!-- <div class="form-group col-md-12 <?php echo !empty(form_error('periodo')) ? 'has-error':'';?>">
            <label for="periodo">Periodo :</label>
            <input type="text" class="form-control" id="periodo" name="periodo" placeholder="Ingrese el periodo en curso">
           <?php echo form_error("periodo","<span class='help-block'>","</span>");?>
        </div> -->
        <br>
        <h4><b><u>Datos de la empresa</u></b></h4>
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
          <label for="telefono">Teléfono de la empresa:</label>
          <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo set_value('telefono');?>" disabled="disabled">
            <?php echo form_error("telefono","<span class='help-block'>","</span>");?>
      </div>

      <div class="form-group col-md-6 <?php echo !empty(form_error('direccion')) ? 'has-error':'';?>">
          <label for="direccion">Dirección:</label><input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo set_value('direccion');?>" disabled="disabled">
          <?php echo form_error('direccion',"<span class='help-block'>","</span>");?>
      </div>
      <h4><b><u>Datos del Tutor</u></b></h4>
      <div class="col-md-6 col-xs-12 <?php echo !empty(form_error('asesor')) ? 'has-error':'';?>">
          <label for="">Nombre del tutor:</label>
          <input type="hidden" name="idtutor" id="idtutor">
          <div class="input-group">
              <input type="text" class="form-control" disabled="disabled" name="asesor" id="asesor">
              <span class="input-group-btn">
                  <button class="btn btn-primary btn-buscar" type="button" data-toggle="modal" data-target="#modal-tutor" ><span class="fa fa-search"></span> Buscar</button>
                  </span>
          </div><!-- /input-group -->
          <?php echo form_error("asesor","<span class='help-block'>","</span>");?>
      </div>

      <div class="form-group col-md-6 <?php echo !empty(form_error('tutor_e_ci')) ? 'has-error':'';?>">
          <label for="tutor_e_ci">Cédula de identidad:</label><input type="text" class="form-control" id="tutor_e_ci" name="tutor_e_ci" disabled="disabled">
          <?php echo form_error('tutor_e_ci',"<span class='help-block'>","</span>");?>
      </div>
      <div class="form-group col-md-6 <?php echo !empty(form_error('profesion')) ? 'has-error':'';?>">
          <label for="profesion">Profesión:</label><input type="text" class="form-control" id="profesion" name="profesion" value="<?php echo set_value('profesion');?>" disabled="disabled">
          <?php echo form_error('profesion',"<span class='help-block'>","</span>");?>
      </div>
      <div class="form-group col-md-6 <?php echo !empty(form_error('cargo_asesor')) ? 'has-error':'';?>">
          <label for="cargo_asesor">Cargo:</label><input type="text" class="form-control" id="cargo_asesor" name="cargo_asesor" value="<?php echo set_value('cargo_asesor');?>" disabled="disabled">
          <?php echo form_error('cargo_asesor',"<span class='help-block'>","</span>");?>
      </div>

      <div class="form-group col-md-12<?php echo !empty(form_error('fileImagen')) ? 'has-error':'';?>">
        <label for="fileImagen">Comprobante de inscripción</label>
        <input type="file" id="fileImagen" name="fileImagen">
        <?php echo form_error('fileImagen',"<span class='help-block'>","</span>");?>
        <p class="help-block">Formatos permitidos .PDF .JPG</p>
      </div>

      <div class="form-group col-md-12">
          <button id="solicitar" type="submit" class="btn btn-success btn-flat"><span class="fa fa-send fa-fw" ></span>Solicitar</button>
          <a class="btn btn-danger" type="button" href="<?php echo base_url();?>"><span class="fa fa-ban"></span> Cancelar</a>
      </div>
      </form>
     </div>
  </div>
</section>
    <!-- /.content -->
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
<div class="modal fade" id="modal-tutor">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Asesores Empresariales</h4>
            </div>
            <div class="modal-body">
                <table id="etbstutor" class="table table-bordered table-striped table-hover">
                    <thead class="centrado">
                                    <tr>
                                        <th>Cedula</th>
                                        <th>Nombre y Apellido</th>
                                        <th>Profesion</th>
                                        <th>Cargo</th>
                                        <th><i class="fa fa-cogs fa-fw"></i></th>
                                    </tr>
                                </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>                
                <a class="btn btn-primary" href="<?php echo base_url();?>administrar/backend/nuevo_tutor"><span class="fa fa-plus"> Agregar asesor</span></a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
