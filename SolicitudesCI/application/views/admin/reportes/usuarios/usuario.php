<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Usuario solicitante
        <small><?=$usuario->tipo;?></small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
      <div class="box-body">
        <div class="box-body table-responsive">
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
              <div class="col-sm-6 invoice-col">
              <b>Solicitante</b>
              <address>
                <strong>Nombres y Apellidos: </strong><?=$usuario->pri_nombre;?> <?=$usuario->sec_nombre;?> <?=$usuario->pri_apellido;?> <?=$usuario->sec_apellido;?><br>
                <strong>Cedula: </strong><?=$usuario->ci_usuario?><br>
                <input type="hidden" name="id_newser"id="id_newser" value="<?=$usuario->ci_usuario?>">
                <strong>Direccion: </strong><?=$usuario->direccion;?><br>
                <strong>Correo: </strong><?=$usuario->correo_usuario;?><br>
                
              </address> 
            </div>
            <div class="col-sm-6 invoice-col">
                <div class="button-group">
               <a class="btn btn-success btn-flat btn-sm btn-aceptar"><span class="fa fa-check"></span> Aceptar</a>

                <a href="<?php echo base_url();?>administrar/backend/usuarios/<?=$usuario->ci_usuario;?>" class="btn btn-danger btn-remove-user btn-sm btn-flat btn-rechazar"><span class="fa fa-remove"></span> Rechazar</a>
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