<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Solicitud de Documentos
        <small>Nombre de usuario</small>
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
   <div class="box box-solid">
     <div class="box-body table-responsive">
           <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
             <thead>
               <tr>
                 <th># Solicitud</th>
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
                               <td><?php echo $item->nombre_solicitud;?></td>
                               <td><?=$item->estatus_solicitud;?></td>
                               <td><?php echo $item->fecha_solicitud;?></td>
                               <td>
                                <?php if($item->estatus_solicitud=="Procesada"):?>
                                   <a href="<?php echo base_url();?>activos/solicitudes/ver/<?php echo $item->num_solicitud;?>" class="btn btn-info btn-view"><span class="fa fa-search"></span></a>
                                 <?php endif;?>
                                   <a href="<?php echo base_url();?>activos/solicitudes/eliminar/<?php echo $item->num_solicitud;?>" class="btn btn-danger"><span class="fa fa-remove"></span></a>
                               </td>
                           </tr>
                       <?php endforeach;?>
                   <?php endif ?>
                   <?php if (!empty($especiales)): ?>
                     <?php foreach($especiales as $item):?>
                         <tr>
                             <td><?php echo $item->num_solicitud;?></td>
                             <td><?php echo $item->nombre_solicitud;?></td>
                             <td><?=$item->estado_solicitud;?></td>
                             <td><?php echo $item->fecha_solicitud;?></td>
                             <td>
                              <?php if($item->estado_solicitud=="Procesada"):?>
                                 <a href="<?php echo base_url();?>activos/solicitudes/ver_postulado/<?php echo $item->num_solicitud;?>" class="btn btn-info btn-view"><span class="fa fa-search"></span></a>
                               <?php endif;?>
                                 <a href="<?php echo base_url();?>activos/solicitudes/eliminar_postulado/<?php echo $item->num_solicitud;?>" class="btn btn-danger"><span class="fa fa-remove"></span></a>
                             </td>
                         </tr>
                     <?php endforeach;?>
                 <?php endif ?>
                 <?php if (!empty($equivalencias)): ?>
                       <?php foreach($equivalencias as $item):?>
                           <tr>
                               <td><?php echo $item->num_solicitud;?></td>
                               <td><?php echo $item->nombre_solicitud;?></td>
                               <td><?php echo $item->estatus_solicitud;?></td>
                               <td><?php echo $item->fecha_solicitud;?></td>
                               <td>
                                <a href="<?php echo base_url();?>especiales/solicitudes/ver/<?php echo $item->num_solicitud;?>" class="btn btn-danger btn-view"><span class="fa fa-search"></span></a>
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
