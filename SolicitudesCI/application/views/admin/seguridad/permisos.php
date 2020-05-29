<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Configuracion
        <small>Gestion de Permisos Usuarios</small>
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
     <div class="box box-solid">
    <div class="box-body">
        <div class="box-body table-responsive">
          <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
         <thead>
             <tr>
                 <th>Cedula</th>
                 <th>Nombres</th>                 
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
                         <td><?php echo $item->tipo;?></td>
                        <?php $datacliente = $item->ci_usuario."*".$item->nom_usuario."*".$item->ape_usuario."*".$item->correo_usuario."*".$item->cod_tipo_usuario;?>
                         <td>
                            <div class="btn-group">
                             <a href="<?php echo base_url();?>administrar/seguridad/edit_permiso/<?=$item->ci_usuario;?>" class="btn btn-warning btn-sm"><span class="fa fa-edit"></span></a>
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
    </section>
</div>