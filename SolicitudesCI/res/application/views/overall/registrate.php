<!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <div class="panel-content">
                 <!--aqui inicia el menu-->
                 <div class="logo">
                    <div  id="Login" role="dialog" >
                     <div class="panel-dialog">

                        <div class="panel-content">
                             <div class="panel-header">

                      <div class="panel-body">
                          <div class="row">
                      <div class="col-md-12">
                          <?php if($this->session->flashdata("error")):?>
                              <div class="alert alert-danger alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                               </div>
                          <?php endif;?>
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
                              <div class="form-group">
                                 <label for="Dependencia">dependencia  :</label>
                                 <select name="dependencia" id="dependencia" class="form-control">
                                    <?php foreach($dependencias as $items):?>
                                         <option value="<?php echo $items->codigo?>"><?php echo $items->nombre;?></option>
                                     <?php endforeach;?>
                                 </select>
                             </div>
                             <div class="form-group <?php echo !empty(form_error('cargo')) ? 'has-error':'';?>">
                                 <label for="cargo">Cargo del usuario:</label>
                                 <input type="text" class="form-control" id="cedula" name="cargo" value="<?php echo set_value('cargo');?>">
                                 <?php echo form_error("cargo","<span class='help-block'>","</span>");?>
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
                                  <input type="submit" class="btn btn-success" value="Guardar">
                              </div>
                          </form>
                      </div>
                  </div>
                           </div>
                           <div class="panel-footer text-center">
                                    <p>¿Ya estas registrado?<a href="<?php echo base_url()?>welcome/"> Logueate Aquí</a></p>
                                    <p>¿Olvidó su clave?<a> Recuperar Clave</a></p>
                                        <p>¿Deseas  contactarnos?<a> Escríbenos</a></p>
                                   </div>
                             </div>
                           </div>
                           </div>
                        </div>

              </div>
              <!-- /.sidebar-collapse -->
          </div>
        </section>
      </aside>
