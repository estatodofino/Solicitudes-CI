<!-- Left side column. contains the sidebar -->
       <aside class="main-sidebar">
           <!-- sidebar: style can be found in sidebar.less -->
           <section class="sidebar">
               <!-- sidebar menu: : style can be found in sidebar.less -->
               <ul class="sidebar-menu" data-widget="tree">
                <li style="text-align: center;" class="header">Menú</li>
                <li class="treeview">
                    <a href="#">
                      <i class="fa fa-file-text"></i> <span>Solicitudes</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Crear nueva solicitud
                          <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li>
                            <a href="<?php echo base_url();?>activos/solicitudes/carta_postulacion"><i class="fa fa-circle-o"></i> Carta de Postulación <br> de Pasantías
                            </a>
                          </li>
                          <li>
                            <a href="<?php echo base_url();?>activos/solicitudes/constancia_culminacion"><i class="fa fa-circle-o"></i> Constancia de <br> Culminación de Materias
                            </a>
                          </li>
                          <li>
                            <a href="<?php echo base_url();?>activos/solicitudes/Modificacion_aviso"><i class="fa fa-circle-o"></i> Modificacion de <br>inscripcion de materias
                            </a>
                          </li>
                        </ul>
                      </li>
                    </ul>

                  </li>
                   <li><a href="<?php echo base_url();?>activos/Solicitudes"><i class="fa fa-search"></i>Consultas</a></li>
                   <!-- <li><a href="<?php echo base_url();?>activos/Documentos"><i class="fa fa-folder"></i>Documentos</a></li> -->
                   <li class="treeview">
                       <a href="#">
                           <i class="fa fa-lock"></i> <span>Seguridad</span>
                           <span class="pull-right-container">
                               <i class="fa fa-angle-left pull-right"></i>
                           </span>
                       </a>
                       <ul class="treeview-menu">
                           <li><a href="<?php echo base_url();?>activos/seguridad/cambiclave"><i class="fa fa-circle-o"></i> Cambio de clave</a></li>
                           <li><a href="<?php echo base_url();?>activos/seguridad/Actualizar"><i class="fa fa-circle-o"></i> Actualizar Datos</a></li>
                       </ul>

                   </li>
                   <<!--                          li class="treeview">
                       <a href="#">
                           <i class="fa fa-user-circle-o"></i> <span>Contacto</span>
                           <span class="pull-right-container">
                               <i class="fa fa-angle-left pull-right"></i>
                           </span>
                       </a>
                       <ul class="treeview-menu">
  <li><a href="<?php echo base_url();?>activo/contacto"><i class="fa fa-circle-o"></i> Enviar un mensaje </a></li>
                         </ul>
                   </li> -->  
               </ul>
           </section>
           <!-- /.sidebar -->
       </aside>
        <!-- =============================================== -->
