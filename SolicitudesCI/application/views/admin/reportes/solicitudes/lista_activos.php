
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Solicitud de documentos
        <small>Usuarios Activos</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
            <div class="box-body table-responsive">
              <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
             <thead>
               <tr>
                 <th># Solicitud</th>
                 <th>CI Solicitante</th>
                 <th>Solicitante</th>
                 <th>Tipo</th>
                 <th>Condicion</th>
                 <th>Fecha</th>
                 <th>Opcion</th>
               </tr>
             </thead>
             <tbody>
               <?php if (!empty($solicitudes)): ?>
                       <?php foreach($solicitudes as $item):?>
                           <tr>
                               <td><?php echo $item->num_solicitud;?></td>
                               <td><?php echo $item->ci_solicitante;?></td>
                               <td><?=$item->nombre;?> <?=$item->apellido;?></td>
                               <td><?php echo $item->nombre_solicitud;?></td>
                               <td><?=$item->estado_solicitud;?></td>
                               <td><?php echo $item->fecha_solicitud;?></td>
                               <td>                               
                                   <a href="<?php echo base_url();?>administrar/solicitudes/ver/<?php echo $item->num_solicitud;?>" class="btn btn-info btn-view"><span class="fa fa-search"></span></a>
                                 
                               </td>
                           </tr>
                       <?php endforeach;?>
                   <?php endif ?>
                   <?php if (!empty($culminacion)): ?>
                       <?php foreach($culminacion as $item):?>
                           <tr>
                               <td><?php echo $item->num_solicitud;?></td>
                               <td><?php echo $item->ci_solicitante;?></td>
                               <td><?=$item->nombre;?> <?=$item->apellido;?></td>
                               <td><?php echo $item->nombre_solicitud;?></td>
                               <td><?=$item->estatus_solicitud;?></td>
                               <td><?php echo $item->fecha_solicitud;?></td>
                               <td>                               
                                   <a href="<?php echo base_url();?>administrar/solicitudes/ver_adjuntos/<?php echo $item->num_solicitud;?>" class="btn btn-info btn-view"><span class="fa fa-search"></span></a>
                                 
                               </td>
                           </tr>
                       <?php endforeach;?>
                   <?php endif ?>
                </tbody>
           </table>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
