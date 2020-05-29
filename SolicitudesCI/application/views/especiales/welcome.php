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
   <?php endif;
    
      if ($datos->sec_nombre=="" && $datos->sec_apellido=="" && $datos->direccion=="" && $datos->sexo=="" && $datos->telefono_fijo=="" && $datos->telefono_movil=="") {
    echo '<div class="callout callout-warning">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <p><span class="icon fa fa-warning fa-fw"></span>Para <b><a href="'.base_url().'activos/seguridad/Actualizar">finalizar su registro</a></b> debe completar su perfil!</p>
     </div>';
   }
    
   ?>
     <div class="box box-solid">
            <div class="box-body">
                 <p>Lorem ipsum dolor sit amet consectetur adipiscing elit gravida leo, vestibulum tortor quisque magna scelerisque tristique ad imperdiet nunc, sodales potenti ultrices urna egestas eros condimentum vitae. Integer feugiat himenaeos class potenti auctor dictum consequat, lacus accumsan condimentum ut tristique sodales, placerat nascetur magnis metus aenean nisi. Varius eget mi himenaeos praesent porttitor fusce viverra maecenas non lacinia, cubilia penatibus malesuada vehicula rutrum placerat lectus odio libero mauris hac, torquent purus a ad quis iaculis imperdiet natoque vel. <br> <br>

              Commodo taciti class pretium consequat justo suscipit non torquent, venenatis phasellus tincidunt tristique congue ante donec molestie, curabitur posuere placerat lacinia nullam conubia id. Metus praesent sodales a sapien venenatis fringilla pharetra, mauris sociosqu purus facilisi posuere vitae lobortis nisi, scelerisque cum at ante dis malesuada. Ante himenaeos et penatibus magnis inceptos mollis sociosqu hac, a habitasse integer fusce fames commodo congue eget leo, venenatis vitae vulputate odio nisi neque donec.
              </p>
           </div>
      </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
