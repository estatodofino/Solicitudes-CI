<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Mis solicitudes
        <small></small>
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
           <table id="table_id_2" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                               <td><?php echo $item->cod_tipo_solicitud;?></td>
                               <td><?php echo $item->estatus_solicitud;?></td>
                               <td><?php echo $item->fecha_solicitud;?></td>
                               <td>
                                   <a href="<?php echo base_url();?>activos/solicitudes/ver/<?php echo $item->num_solicitud;?>" class="btn btn-info btn-view"><span class="fa fa-search"></span></a>
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
