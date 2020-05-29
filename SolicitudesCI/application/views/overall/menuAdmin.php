 <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li style="text-align: center;" class="header">Menú</li>

                    <li>
                        <a href="<?php echo base_url();?>administrar/solicitudes">
                            <i class="fa fa-file-text-o"></i> <span>Solicitud de Documentos</span>
                            <!-- <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span> -->
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-lock"></i> <span>Seguridad</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>administrar/seguridad/cambiclave"><i class="fa fa-circle-o"></i> Cambio de clave</a></li>
                            <li><a href="<?php echo base_url();?>administrar/seguridad/Actualizar"><i class="fa fa-circle-o"></i> Actualizar Datos</a></li>
                            <li><a href="<?php echo base_url();?>administrar/seguridad/Usuarios"><i class="fa fa-circle-o"></i>Buscar Usuario</a></li>
                            <li><a href="<?php echo base_url();?>administrar/seguridad/permisos"><i class="fa fa-circle-o"></i> Privilegios</a></li>
                        </ul>

                    </li>
                    <li class="treeview">
                              <a href="#">
                                <i class="fa fa-share"></i> <span>Reportes</span>
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                              </a>
                              <ul class="treeview-menu">
                                <li class="treeview">
                                  <a href="#"><i class="fa fa-circle-o"></i> Listado de Usuarios
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                  </a>
                                  <ul class="treeview-menu">
                                    <li>
                                      <a href="<?php echo base_url();?>administrar/Reportes/usuarios/listas"><i class="fa fa-circle-o"></i> Listado General
                                      </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>administrar/reportes/Usuarios/tipo/activo"><i class="fa fa-circle-o"></i> Estudiantes activos
                                      </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>administrar/Reportes/Usuarios/tipo/Egresado"><i class="fa fa-circle-o"></i> Egresados
                                      </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>administrar/Reportes/Usuarios/tipo/especial"><i class="fa fa-circle-o"></i> Especiales
                                      </a>
                                    </li>
                                    
                                  </ul>
                                </li>
                                <li class="treeview">
                                  <a href="#"><i class="fa fa-circle-o"></i> Solicitudes
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                  </a>
                                  <ul class="treeview-menu">
                                    <li >
                                      <a href="<?php echo base_url();?>administrar/Reportes/Solicitudes/tipos_user"><i class="fa fa-circle-o"></i> Por tipo de Usuario</a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>administrar/Reportes/Solicitudes/fecha"><i class="fa fa-circle-o"></i> Por fecha</a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>administrar/Reportes/Solicitudes/estatus"><i class="fa fa-circle-o"></i> Por Estatus
                                      </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>administrar/Reportes/Solicitudes/tipo_solicitud"><i class="fa fa-circle-o"></i> Por Tipo de solicitud
                                      </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>administrar/Reportes/Solicitudes/Usuarios"><i class="fa fa-circle-o"></i> Por Usuario
                                      </a>
                                    </li>
                                  </ul>
                                </li>
                                
                                <!-- <li class="treeview">
                                  <a href="#"><i class="fa fa-circle-o"></i> Informes de Gestion
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                  </a>
                                  <ul class="treeview-menu">
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/Informes/Gestion"><i class="fa fa-circle-o"></i> Buscar por Mes
                                      </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/Informes/Gestion"><i class="fa fa-circle-o"></i> Buscar por Año
                                      </a>
                                    </li>
                                  </ul>
                                </li>
                                <li>
                                  <a href="<?php echo base_url();?>Reportes/Informes/"><i class="fa fa-circle-o"></i> Informes Tecnicos
                                    </a>
                                </li> -->
                              </ul>

                            </li>
                    <li><a href="<?php echo base_url();?>administrar/Materias"><i class="fa fa-atom"></i> <span>Materias</span></a>
                    <!-- <li><a href="<?php echo base_url();?>admin/mensajes"><i class="fa fa-envelope"></i> <span>Mensajes</span></a>
                   </li> -->
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
         <!-- =============================================== -->
