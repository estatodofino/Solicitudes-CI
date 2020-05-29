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
                            <a href="<?php echo base_url();?>especiales/solicitudes/cambio_aviso"><i class="fa fa-circle-o"></i> Cambio de carrera
                            </a>
                          </li>
                          <li>
                            <a href="<?php echo base_url();?>especiales/solicitudes/traslado_aviso"><i class="fa fa-circle-o"></i> Traslado 
                            </a>
                          </li>
                          <li>
                            <a href="<?php echo base_url();?>especiales/solicitudes/reincorporacion_aviso"><i class="fa fa-circle-o"></i> Reincorporación
                            </a>
                          </li>
                          <li class="treeview menu-close">
                          <a href="#">
                            <i class="fa fa-circle-o"></i> Equivalencias
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                          <ul style="display: block;" class="treeview-menu">
                    <li>
                      <a href="<?php echo base_url();?>especiales/solicitudes/equivalencias_aviso_egresado"><i class="fa fa-circle-o"></i> Usuario egresado</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url();?>especiales/solicitudes/equivalencias_aviso_no_egresado"><i class="fa fa-circle-o"></i> Usuario no egresado</a>
                    </li>
                    </ul>                  
                         </li>
                         
                          <!-- <li>
                            <a href="<?php echo base_url();?>egresado/solicitudes/sol_certificacion"><i class="fa fa-circle-o"></i> Certificacion de <br> Programas
                            </a>
                          </li> -->
                        </ul>
                      </li>
                    </ul>

                  </li>
                   <li><a href="<?php echo base_url();?>especiales/Solicitudes"><i class="fa fa-search"></i>Consultas</a></li>
                   <li class="treeview">
                       <a href="#">
                           <i class="fa fa-lock"></i> <span>Seguridad</span>
                           <span class="pull-right-container">
                               <i class="fa fa-angle-left pull-right"></i>
                           </span>
                       </a>
                       <ul class="treeview-menu">
                           <li><a href="<?php echo base_url();?>especiales/seguridad/cambiclave"><i class="fa fa-circle-o"></i> Cambio de clave</a></li>
                           <li><a href="<?php echo base_url();?>especiales/seguridad/Actualizar"><i class="fa fa-circle-o"></i> Actualizar Datos</a></li>
                       </ul>

                   </li>
                  <!--  <li class="treeview">
                       <a href="#">
                           <i class="fa fa-user-circle-o"></i> <span>Contacto</span>
                           <span class="pull-right-container">
                               <i class="fa fa-angle-left pull-right"></i>
                           </span>
                       </a>
                       <ul class="treeview-menu">
                           <li><a href="<?php echo base_url();?>especiales/contacto"><i class="fa fa-circle-o"></i> Enviar un mensaje </a></li>
                           </ul>
                   </li> -->
               </ul>
           </section>
           <!-- /.sidebar -->
       </aside>
        <!-- =============================================== -->
