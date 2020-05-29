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
  <div style="font-size: 30px; text-align: center;">
     <p>Sistema de informacion bajo ambiente web para el control de proceso academicos</p>
  </div>
      <div class="login-box">
        <div style="text-align: center">
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Introduzca sus datos de ingreso</p>
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
            <form action="<?php echo base_url();?>welcome/login" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Cedula" name="cedula">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="contraseña" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat"><span class="glyphicon glyphicon-off"></span>  Iniciar Sesión</button>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="panel-footer text-center">
                <p>¿Eres un nuevo usuario?<a href="<?php echo base_url()?>welcome/registrate"> Regístrate Aquí</a></p>
               </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>

    <!-- /.login-box -->
        <footer class="footer">
          <div class="container footer" style="text-align: center;" >
           <p>Ubicación: Bloque C, planta Alta, Oficina C-91.<br>
             Correo  electrónico: <a> correo_aqui</a><br>
                LUZ Derechos reservados ® </p>
          </div>
        </footer>
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
