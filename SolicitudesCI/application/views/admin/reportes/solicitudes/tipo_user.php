
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Solicitud de documentos
        <small>Por tipo de usuario</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
            <div class="box-body table-responsive">
            <?php if (count($tipos)): ?>
              <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <td><h4>Tipos de Usuarios</h4></td>
                  </tr>
                </thead>
                <tbody>
                   <?php foreach ($tipos as $item ):?>
                           <tr>
                             <td><?=$item->tipo_usuario;?></td>
                             <td><?php
                             if ($item->cod_tipo_usuario=="2") { ?>
                              <a href="<?php echo base_url();?>administrar/reportes/solicitudes/solicitud_activo" class="btn btn-success btn-flat"><span class="fa fa-search"></span></a>                    
                             <?php } elseif ($item->cod_tipo_usuario=="3") { ?>
                              <a href="<?php echo base_url();?>administrar/reportes/solicitudes/solicitud_egresado" class="btn btn-success btn-flat"><span class="fa fa-search"></span></a>                    
                             <?php } elseif ($item->cod_tipo_usuario=="4") { ?>
                              <a href="<?php echo base_url();?>administrar/reportes/solicitudes/solicitud_especiales" class="btn btn-success btn-flat"><span class="fa fa-search"></span></a>                    
                             <?php } ?>
                           </td>
                          </tr>
                   <?php endforeach; ?>
                </table>
          <?php else: ?>
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          </button>
          <strong><i class="fa fa-warning fa-fw"></i>Disculpe!</strong><p> No existe registro.</p>
        </div>
          <?php endif; ?>
                 </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
