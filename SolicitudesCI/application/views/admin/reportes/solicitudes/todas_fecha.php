<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Solicitud de Documentos
        <small>Por fechas</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
            <div class="box-body table-responsive">
                   <div class="row">
                  <div>
                    <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-success alert-dismissible">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("error"); ?></p>
                                 </div>
                        <?php endif;?>
                    </div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <div class="row">
                          <form action="<?php echo current_url();?>" method="POST" class="form-horizontal">
                            <label for="" class="col-md-2 control-label">Tipo de solicitud:</label>
                              <div class="col-md-3">
                                <select name="tipo_sol" id="tipo_sol" class="form-control">
                                  <option value="">::Seleccione</option>
                                   <?php foreach($tipos as $tipo):?>
                                    <option value="<?php echo $tipo->cod_tipo_solicitud;?>"><?php echo $tipo->nombre_solicitud;?> </option>
                                    <?php endforeach;?>
                                </select>
                              </div>
                              <div class="form-group">                             
                                  <label for="" class="col-md-1 control-label">Desde:</label>
                                  <div class="col-md-2">
                                      <input type="date" class="form-control" name="fechainicio" value="<?php echo !empty($fechainicio) ? $fechainicio:'';?>">
                                  </div>
                                  <label for="" class="col-md-1 control-label">Hasta:</label>
                                  <div class="col-md-2">
                                      <input type="date" class="form-control" name="fechafin" value="<?php  echo !empty($fechafin) ? $fechafin:'';?>">
                                  </div>
                                  <br>
                                  <br>
                                  <div class="col-md-4">
                                      <input type="submit" name="buscar" value="Buscar" class="btn btn-primary btn-search">
                                      <a href="<?php echo base_url(); ?>administrar/reportes/solicitudes/fecha" class="btn btn-danger">Restablecer</a>
                                  </div>
                              </div>
                          </form>
                      </div>
                      <hr>
                      </div>
                        <div class="panel-body">
                             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                              <th width="10%">N° de Solicitud</th>
                              <th width="20%">Solicitante</th>
                              <th width="10%">Fecha</th>
                              <th width="20%">Tipo de Solicitud</th>
                              <th width="20%">Estado</th>
                              <th width="3%">Opciones</th>
                            </tr>
                            </thead>
                             <tbody>
                                 <?php if(!empty($solicitudes)):?>
                                    <?php foreach($solicitudes as $item):?>
                                        <tr>
                                            <td><?php echo $item->num_solicitud;?></td>
                                            <td><?php echo $item->nombre;?> <?php echo $item->apellido;?></td>
                                            <td><?php echo $item->fechas;?></td>
                                            <td><?php echo $item->solicitud;?></td>
                                            <td><?php echo $item->estado;?></td>
                                             <!-- <?php $datasolicitudes = $orden->orden."*".$orden->nombre."*".$orden->apellido."*".$orden->fechas."*".$orden->solicitud."*".$orden->estado;?> -->
                                            <td>
                                               <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view-ordenes btn-sm" data-toggle="modal" data-target="#modal-default" value="<?php echo $item->num_solicitud;?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>

                                                </div>
                                            </td>
                                        </tr>
                                   <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                        </div>
                 </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!--Modal ddefaul-->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de la Orden</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
