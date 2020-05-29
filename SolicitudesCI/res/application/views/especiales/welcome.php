<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Bienvenido <?=$usuario->nom_usuario;?>!
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
<?php if($this->session->flashdata("success")):?>
<div class="callout callout-success">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("success"); ?></p>
     </div>
   <?php endif;?>
     <div class="box box-solid">
            <div class="box-body">

                 </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
