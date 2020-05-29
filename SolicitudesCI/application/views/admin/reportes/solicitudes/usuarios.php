
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Usuarios
        <small></small>
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
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombres</th>
                    <th >Correo</th>
                    <th >tipo de usuario</th>
                    <th >Opciones</th>
                </tr>
            </thead>
             <tbody>
                 <?php if(!empty($usuarios)):?>
                    <?php foreach($usuarios as $item):?>
                        <tr>
                            <td><?php echo $item->ci_usuario;?></td>
                            <td><?php echo $item->nom_usuario;?> <?php echo $item->ape_usuario;?></td>
                            <td><?php echo $item->correo_usuario;?></td>
                            <td><?php echo $item->tipo;?></td>
                           <?php $datacliente = $item->ci_usuario."*".$item->nom_usuario."*".$item->ape_usuario."*".$item->correo_usuario."*".$item->cod_tipo_usuario;?>
                            <td>
                               <div class="btn-group">
                                    <a type="button" class="btn btn-info btn-view-usuario btn-sm" href="<?php echo base_url()?>administrar/reportes/solicitudes/por_usuario/<?=$item->ci_usuario;?>" value="<?php echo $item->ci_usuario;?>">
                                        <span class="fa fa-file-text"></span> Ver solicitudes
                                    </a>
                                </div>
                            </td>
                        </tr>
                   <?php endforeach;?>
                <?php endif;?>
            </tbody>
        </table>
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
        <h4 class="modal-title">Informacion del usuario</h4>
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
