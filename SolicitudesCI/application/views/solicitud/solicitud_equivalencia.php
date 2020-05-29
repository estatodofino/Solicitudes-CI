<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Solicitud de Documentos
        <small>solicitud de equivalencia</small>
        </h1>
    </section>
    <!-- Main content -->
<section class="content">
  <?php if($this->session->flashdata("error")):?>
   <div class="callout callout-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
      </div><?php endif;?>
    <?php if($this->session->flashdata("success")):?>
     <div class="callout callout-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("success"); ?></p>
        </div><?php endif;?>
 <div class="box box-solid">
     <div class="box-body">
      <div class="row">
              <div class="col-xs-12">
                <div class="col-xs-4">
                    <div ><img style="width: 80%;" src="<?php echo base_url(); ?>proy/images/cabecera_001.png"></div>
                  </div>
                  <div class="col-xs-8">
                    <b style="text-aling:center">SISTEMA DE INFORMACION BAJO AMBIENTE WEB</b><br>
                    <b>PARA EL CONTROL PROCESOS ACADEMICOS</b> <br>
                    <b></b><br>
                  </div>
                </div> <br>
              <!-- /.col -->
            </div>
             <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              <b>Solicitante</b>
              <address>
                <strong>Nombre y Apellido: </strong><?=$ordenes->solicitante?><br>
                <strong>Cedula: </strong><?=$ordenes->ci_solicitante?><br>
                
              </address>
            </div>
            <!-- /.col -->
            
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Numero de solicitud:</b> <?=$ordenes->num_solicitud?><br>
              <input type="hidden" id="inOrdes" value="<?=$ordenes->num_solicitud?>">
              <b>Tipo de solicitud:</b> <?=$ordenes->tipoOrden;?><br>
              <b>Estado de la solicitud:</b> <?=$ordenes->estatus_solicitud;?>
            </div>
            <!-- /.col -->
          </div>
          <br>
          <br>
         <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              <b>Informacion Academica</b>
              <address>
                <strong>Titulo obtenido: </strong><?=$ordenes->grado?><br>
                <strong>Institucion: </strong><?=$ordenes->tipo_institucion?><br>
                <strong>Tipo de institucion: </strong><?=$ordenes->institucion_grado?><br>
                <strong>Año de graduacion: </strong><?=$ordenes->year_grado?><br>
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Carrera solicitada</b>
              <address>
                <strong>Carrera: </strong>Computacion<br>
                <strong>Nucle: </strong>Punto fijo<br>
                <strong>Periodo de la solicitud: </strong><?=$ordenes->periodo?><br>
              </address>
            </div>
          </div>

 <?php  if ($this->session->userdata("rol")=="1") {

        $url_l = "administrar/solicitudes/equivalencias";
        
    }elseif ($this->session->userdata("rol")=="4") {
      $url_l = "especiales/solicitudes";
    }
 ?>
<input type="hidden" id="url_l" value="<?=$url_l;?>">

<input type="hidden" id="table" value="solicitud_equivalencias">

<?php if($ordenes->estatus_solicitud !="Procesada"):?>
<div class="row">
    <!-- accepted payments column -->
    <div class="col-xs-12">
      <p class="lead">Documentos:</p>
</div>
</div>

<div id="tipo">
  <div class="box-body table-responsive">
     <table id="docs" class="table table-striped table-bordered" cellspacing="0" width="100%">
       <thead>
         <tr>
           <th>Nombre del Documento</th>
           <th>Ruta del documento</th>
           <th>Opcion</th>
         </tr>
       </thead>
       <tbody>
       <?php if(!empty($documentos)):?>
            <?php foreach($documentos as $item):?>
                <tr>
                    <td><?=$item->nombre_adj;?></td>
                    <td><?=$item->ruta_adj;?></td>                    
                      <td>
                         <div class="btn-group">
                              <button type="button" class="btn btn-info btn-view-ordenes btn-sm" data-toggle="modal" data-target="#modal-default" value="">
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

      <br>
      <br>
    <?php endif;?>
             <div class="row no-print">
                <div class="col-xs-12">
                  <input type="hidden" name="ordenid" id="ordenid" value="<?=$ordenes->num_solicitud?>">
                  <?php if ($this->session->userdata("rol")=="1") {
                    if ($ordenes->estatus_solicitud !="Procesada") {
                    if($ordenes->estatus_solicitud=="En espera") {?>
                     <a class="btn btn-info btn-change-state-pro"><span class="fa fa-file-text"></span> Procesar solicitud</a>
                  <?php  } }else{?>
                    <a class="btn btn-success" ><span class="fa fa-file-text"></span> Ver documento</a>
                  <?php }
                  }
                   ?>
                     <a class="btn btn-homero btn-danger"><span class="fa fa-remove"></span> Cancelar Solicitud</a>
                  <a class="btn btn-default btn-print pull-right"><i class="fa fa-print"></i> Print</a>
                </div>
              </div>


                  <div id="informes"></div>
                </div>
              </div>
            </div>
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
        <h4 class="modal-title">Nuevo informe tecnico </h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url();?>tech/soporte/new_informe" method="POST">
          <input type="hidden" name="orden_num" id="orden_num" value="<?=$ordenes->num_orden?>">
          <div class="form-group">
          <label for="informe">Informe tecnico</label>
          <textarea type="text" class="form-control" name="informe" id="informe" placeholder=""></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Guardar Informe</button>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
