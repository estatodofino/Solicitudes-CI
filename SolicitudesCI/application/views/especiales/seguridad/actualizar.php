<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Configuracion
        <small>Actualizar Informacion</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
            <div class="box-body">
    <div class="col-md-12">
<?php if($this->session->flashdata("error")):?>
        <div class="callout callout-success">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("error"); ?></p>
             </div>
    <?php endif;?>
        <form action="<?php echo base_url();?>activos/seguridad/edit" method="POST">
            <input type="hidden" name="idusuario" value="<?php echo $usuario->ci_usuario ?>">

            <div class="form-group col-md-6 <?php echo form_error("pri_nombre") != false ? 'has-error':'';?>">
                <label for="pri_nombre">Primer nombre:</label>
                <input type="text" class="form-control" id="pri_nombre" name="pri_nombre" value="<?php echo form_error("pri_nombre") !=false ? set_value("pri_nombre") : $usuario->pri_nombre;?>">
                <?php echo form_error("pri_nombre","<span class='help-block'>","</span>");?>
            </div>
            <div class="form-group col-md-6 <?php echo form_error("sec_nombre") != false ? 'has-error':'';?>">
                <label for="sec_nombre">Segundo nombre:</label>
                <input type="text" class="form-control" id="sec_nombre" name="sec_nombre" value="<?php echo form_error("sec_nombre") !=false ? set_value("sec_nombre") : $usuario->sec_nombre;?>">
                <?php echo form_error("sec_nombre","<span class='help-block'>","</span>");?>
            </div>
            <div class="form-group col-md-6 <?php echo form_error("pri_apellido") != false ? 'has-error':'';?>">
                <label for="pri_apellido">Primer apellido:</label>
                <input type="text" class="form-control" id="pri_apellido" name="pri_apellido" value="<?php echo form_error("pri_apellido") !=false ? set_value("pri_apellido") : $usuario->pri_apellido;?>">
                <?php echo form_error("pri_apellido","<span class='help-block'>","</span>");?>
            </div>
            <div class="form-group col-md-6 <?php echo form_error("sec_apellido") != false ? 'has-error':'';?>">
                <label for="sec_apellido">Segundo apellido:</label>
                <input type="text" class="form-control" id="sec_apellido" name="sec_apellido" value="<?php echo form_error("sec_apellido") !=false ? set_value("sec_apellido") : $usuario->sec_apellido;?>">
                <?php echo form_error("sec_apellido","<span class='help-block'>","</span>");?>
            </div>
            <div class="col-md-6 col-xs-12">
                        <label for="">Fecha de nacimiento:</label>
                        <input type="date" class="form-control date" name="hb" id="hb" value="<?=$usuario->fecha_nacimiento;?>">
                    </div>
            <div class="form-group col-md-6">
                <label for="sexo">Sexo:</label>
                  <select name="sexo" id="sexo" class="form-control">
                    <option value="<?php echo form_error("sexo") !=false ? set_value("sexo") : $usuario->sexo
                ;?>">::Seleccione</option>    
                  <option value="Masculino">Masculino</option> 
                  <option value="Femenino">Femenino</option>                      
                  </select>
            </div>
            <div class="form-group col-md-6 <?php echo form_error("email") != false ? 'has-error':'';?>">
                <label for="email">Correo electronico:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo form_error("email") !=false ? set_value("email") : $usuario->correo_usuario;?>">
                <?php echo form_error("correo","<span class='help-block'>","</span>");?>
            </div>
            <div class="form-group col-md-6 <?php echo form_error("telefono_movil") != false ? 'has-error':'';?>">
                <label for="telefono_movil">Telefono movil:</label>
                <input type="text" class="form-control" id="telefono_movil" name="telefono_movil" value="<?php echo form_error("telefono_movil") !=false ? set_value("telefono_movil") : $usuario->telefono_movil
                ;?>">
                <?php echo form_error("telefono_movil","<span class='help-block'>","</span>");?>
            </div>
            <div class="form-group col-md-6 <?php echo form_error("telefono_fijo") != false ? 'has-error':'';?>">
                <label for="telefono_fijo">Telefono fijo:</label>
                <input type="text" class="form-control" id="telefono_fijo" name="telefono_fijo" value="<?php echo form_error("telefono_fijo") !=false ? set_value("telefono_fijo") : $usuario->telefono_movil
                ;?>">
                <?php echo form_error("telefono_fijo","<span class='help-block'>","</span>");?>
            </div>
            <div class="form-group col-md-6 <?php echo form_error("direccion") != false ? 'has-error':'';?>">
                <label for="text">Direccion:</label>
                <input type="direccion" class="form-control" id="direccion" name="direccion" value="<?php echo form_error("direccion") !=false ? set_value("direccion") : $usuario->direccion;?>">
                <?php echo form_error("direccion","<span class='help-block'>","</span>");?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success"><span class="fa fa-edit fa-fw"></span> Guardar</button>
                <a class="btn btn-danger" type="button" href="<?php echo base_url();?>"><span class="fa fa-ban"></span> Cancelar</a>
            </div>
        </form>
    </div>
 </div>
</div>
</section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
