<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Usuarios
        <small>Listado general</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
         <div class="box-body table-responsive">
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                                      <?php $datacliente = $item->ci_usuario."*".$item->nom_usuario."*".$item->ape_usuario."*".$item->correo_usuario."*".$item->tipo;?>
                                       <td>
                                          <div class="btn-group">
                                               <button type="button" class="btn btn-info btn-view-usuario btn-sm" data-toggle="modal" data-target="#modal-default" value="<?php echo $item->ci_usuario;?>">
                                                   <span class="fa fa-search"></span>
                                               </button>

                                              <a href="<?php echo base_url();?>administrar/reportes/usuarios/delete/<?=$item->ci_usuario;?>" class="btn btn-danger btn-remove-user btn-sm"><span class="fa fa-remove"></span></a>
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