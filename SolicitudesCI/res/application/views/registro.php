<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SolicitudesPf</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- base_url() = http://localhost/ventas_ci/-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/font-awesome/css/font-awesome.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/AdminLTE.min.css">
</head>
<body class="hold-transition login-page">
  <div class="main">
    <div class="logo1" >
      <img src="<?php echo base_url();?>assets/proy/images/cabecera.jpg" style="width:100%;" alt="">
    </div>
  </div>
    <div class="col-md-4">
      <div class="login-box">        
        <div class="login-box-body">
            <p class="login-box-msg">Introduzca sus datos de registro</p>
            <?php if($this->session->flashdata("error")):?>
              <div class="alert alert-danger">
                <p><?php echo $this->session->flashdata("error")?></p>
              </div>
            <?php endif; ?>
            <?php if($this->session->flashdata("success")):?>
              <div class="alert alert-success">
                <p><?php echo $this->session->flashdata("success")?></p>
              </div>
            <?php endif; ?>
            <div class="form-group">
               <label for="tipo_user">Tipo de usuario:</label>
                  <select name="tipo_user" id="tipo_user" class="form-control">
                    <option>::Seleccione</option>                    
                    <?php foreach($tipos as $tipo):?>
                  <option value="<?php echo $tipo->cod_tipo_usuario?>"><?php echo $tipo->tipo_usuario;?></option>
                       <?php endforeach;?>                          
                  </select>
              </div>

        <div id="fomularios">
              <form action="<?php echo base_url();?>welcome/registrar" method="POST">          

                <div class="form-group <?php echo !empty(form_error('nombres')) ? 'has-error':'';?>">
                    <label for="nombres">Nombres:</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo set_value('nombres');?>">
                      <?php echo form_error("nombres","<span class='help-block'>","</span>");?>
                </div>
                  <div class="form-group <?php echo !empty(form_error('apellidos')) ? 'has-error':'';?>">
                      <label for="apellidos">Apellidos:</label>
                      <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo set_value('apellidos');?>">
                        <?php echo form_error("apellidos","<span class='help-block'>","</span>");?>
                  </div>
                  <div class="form-group <?php echo !empty(form_error('cedula')) ? 'has-error':'';?>">
                      <label for="cedula">Numero de Cedula:</label>
                      <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo set_value('cedula');?>">
                      <?php echo form_error("cedula","<span class='help-block'>","</span>");?>
                  </div>
                  <div class="form-group <?php echo !empty(form_error('correo')) ? 'has-error':'';?>">
                      <label for="correo">Correo del usuario:</label>
                      <input type="email" class="form-control" id="correo" name="correo" value="<?php echo set_value('correo');?>">
                      <?php echo form_error("correo","<span class='help-block'>","</span>");?>
                  </div>

                 <div class="form-group <?php echo !empty(form_error('password')) ? 'has-error':'';?>">
                     <label for="password">Contraseña:</label>
                     <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password');?>">
                       <?php echo form_error("password","<span class='help-block'>","</span>");?>
                 </div>
                  <div class="form-group <?php echo !empty(form_error('password2')) ? 'has-error':'';?>">
                      <label for="password2">Confirme su contraseña:</label>
                      <input type="password" class="form-control" id="password2" name="password2" value="<?php echo set_value('password2');?>">
                        <?php echo form_error("password2","<span class='help-block'>","</span>");?>
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btn btn-success" value="Registrarme">
                  </div>
                  <div class="panel-footer text-center">
                  <p>¿Ya estas registrado?<a href="<?php echo base_url()?>welcome/"> Logueate Aquí</a></p>
                 </div>
              </form>
              </div>
        </div>
        <!-- /.login-box-body -->
    </div>
    </div>
    <div class="col-md-8">
      <!-- Content Wrapper. Contains page content -->
      <div class="content"> 
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <h1>
              Registro de Usuarios
              <small></small>
              </h1>
          </section>
          <!-- Main content -->
          <section class="content">
           <div class="box box-solid">
            <div class="box-body">
              <div class="col-md-6">
                <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Estudiante activo</h3>
                </div>
                <div class="panel-body" >
                  <p>Registrate como "Activo" Si eres estudiante activo de la carrera Computacion en LUZ nucleo Punto Fijo para realizar tus solicitudes de:
                    <ul>
                      <li> Carta postulacion de Pasantias</li>
                      <li> Constancia culminacion de materias</li>
                      <li> Proceso de modificacion de inscripcion</li>

                    </ul>
                  </p>
                </div>
              </div> 
              </div>
              <div class="col-md-6">
                <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Egresado</h3>
                </div>
                <div class="panel-body" >
                  <p>Si eres egresado de la carrera de Computacion de LUZ nucleo  Punto Fijo y deseas realizar tus tramites para: 
                  <p>
                    <ul>
                      <li> Carta de posicion y rango</li>
                      <li> Carta de modalidad</li>
                      <li> Certificacion de Pensum</li>
                      <li> Certificacion de Programas</li>
                    </ul>
                  
                  <p style="text-align: justify;">Registrate como usuario "Egresado-LUZ".</p>
                </div>
              </div> 
              </div>
              <div class="col-md-12">
                <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title">Solicitudes Especiales</h3>
                </div>
                <div class="panel-body" >
                  <p>Para solicitar:
                    <ul>
                      <li>Equivalencias</li>
                      <li>Traslados</li>
                      <li>Cambio de carrera</li>
                      <li>Reincorporacion</li>
                    </ul>
                    registrate como "Usuario especial".
                  </p>
                </div>
              </div> 
              </div>
           </div>
          </section>
          <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
    </div>
    <!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var base_url= "<?php echo base_url();?>";

            $(document).on("click",".btn-view-orden",function(){
                valor_id = $(this).val();
                $.ajax({
                    url: base_url + "admin/Soporte/edit_orden",
                    type:"POST",
                    dataType:"html",
                    data:{id:valor_id},
                    success:function(data){
                        $("#modal-default .modal-body").html(data);
                    }
                });
            });

    

     $("#tipo").on("change",function(){
        option = $('#idsolicitud').val();

        if (option != "") {
            $("#numero").val(generarnumero(option));
        }
        else{
            $("#idsolicitud").val(null);
            $("#numero").val(null);
        }
  })
     $("#tipo_user").on("change",function(){
        option = $('#tipo_user').val(); 
              
        if (option =="2") {
           $("#fomularios").html(
            '<div id="fomularios">'+
              '<form action="'+base_url+'welcome/registrar" method="POST">'+          
                '<input type="hidden" name="tipox" id="tipox" value="'+option+'">'+
                '<div class="form-group"> <label for="nombres">Nombres:</label>'+
                    '<input type="text" class="form-control" id="nombres" name="nombres"></div>'+

                  '<div class="form-group"><label for="apellidos">Apellidos:</label><input type="text" class="form-control" id="apellidos" name="apellidos"></div>'+
                  '<div class="form-group "><label for="cedula">Numero de Cedula:</label><input type="text" class="form-control" id="cedula" name="cedula"></div>'+
                  '<div class="form-group"><label for="correo">Correo del usuario:</label><input type="email" class="form-control" id="correo" name="correo"> </div>'+
                  '<div class="form-group"><label for="years">Año de ingreso:</label><input type="text" class="form-control" id="years" name="years"> </div>'+
                  '<div class="form-group"><label for="periodo">Periodo de ingreso:</label><input type="text" class="form-control" id="periodo" name="periodo"> </div>'+
                  '<div class="form-group "><label for="password">Contraseña:</label><input type="password" class="form-control" id="password" name="password">                 </div>'+
                  '<div class="form-group"><label for="password2">Confirme su contraseña:</label><input type="password" class="form-control" id="password2" name="password2"></div>'+
                 '<div class="form-group"><input type="submit" class="btn btn-success" value="Registrarme"> </div>'+              
                  '<div class="panel-footer text-center"><p>¿Ya estas registrado?<a href="<?php echo base_url()?>welcome/"> Logueate Aquí</a></p>'+
                  
                 '</div></form></div>'
            );    
        } else{
          if (option =="3") {
           $("#fomularios").html(

            '<div id="fomularios">'+
              '<form action="'+base_url+'welcome/registrar" method="POST">'+          
                '<input type="hidden" name="tipox" id="tipox" value="'+option+'">'+
                '<div class="form-group"> <label for="nombres">Nombres:</label>'+
                    '<input type="text" class="form-control" id="nombres" name="nombres"></div>'+

                  '<div class="form-group"><label for="apellidos">Apellidos:</label><input type="text" class="form-control" id="apellidos" name="apellidos"></div>'+
                  '<div class="form-group "><label for="cedula">Numero de Cedula:</label><input type="text" class="form-control" id="cedula" name="cedula"></div>'+
                  '<div class="form-group"><label for="correo">Correo del usuario:</label><input type="email" class="form-control" id="correo" name="correo"> </div>'+
                  '<div class="form-group"><label for="years">Año de egreso:</label><input type="text" class="form-control" id="years" name="years"> </div>'+
                  '<div class="form-group"><label for="periodo">Periodo de egreso:</label><input type="text" class="form-control" id="periodo" name="periodo"> </div>'+
                  '<div class="form-group "><label for="password">Contraseña:</label><input type="password" class="form-control" id="password" name="password">                 </div>'+
                  '<div class="form-group"><label for="password2">Confirme su contraseña:</label><input type="password" class="form-control" id="password2" name="password2"></div>'+
                 '<div class="form-group"><input type="submit" class="btn btn-success" value="Registrarme"> </div>'+              
                  '<div class="panel-footer text-center"><p>¿Ya estas registrado?<a href="<?php echo base_url()?>welcome/"> Logueate Aquí</a></p>'+
                  
                 '</div></form></div>'
            );    
        }else{
          if (option =="4") {
           $("#fomularios").html(
            '<div id="fomularios">'+
              '<form action="'+base_url+'welcome/registro_especial" method="POST">'+          
                '<input type="hidden" name="tipox" id="tipox" value="'+option+'">'+
                '<div class="form-group"> <label for="nombres">Nombres:</label>'+
                    '<input type="text" class="form-control" id="nombres" name="nombres"></div>'+

                  '<div class="form-group"><label for="apellidos">Apellidos:</label><input type="text" class="form-control" id="apellidos" name="apellidos"></div>'+
                  '<div class="form-group "><label for="cedula">Numero de Cedula:</label><input type="text" class="form-control" id="cedula" name="cedula"></div>'+
                  '<div class="form-group"><label for="correo">Correo del usuario:</label><input type="email" class="form-control" id="correo" name="correo"> </div>'+
                  '<div class="form-group"><label for="telefono">Numero de contacto:</label><input type="text" class="form-control" id="telefono" name="telefono"> </div>'+
                  '<div class="form-group"><label for="direccion">Direccion:</label><input type="text" class="form-control" id="direccion" name="direccion"> </div>'+
                  '<div class="form-group "><label for="password">Contraseña:</label><input type="password" class="form-control" id="password" name="password">                 </div>'+
                  '<div class="form-group"><label for="password2">Confirme su contraseña:</label><input type="password" class="form-control" id="password2" name="password2"></div>'+
                 '<div class="form-group"><input type="submit" class="btn btn-success" value="Registrarme"> </div>'+              
                  '<div class="panel-footer text-center"><p>¿Ya estas registrado?<a href="<?php echo base_url()?>welcome/"> Logueate Aquí</a></p>'+
                  
                 '</div></form></div>'
            );    
        }
        }
        }
  })

}) 

 </script>
</body>
</html>
