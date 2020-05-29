 <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li style="text-align: center;" class="header">Menú</li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>Solicitud de Documentos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>admin/Soporte/"><i class="fa fa-circle-o"></i> Consultar Orden de servicio</a></li>
                            <li><a href="<?php echo base_url();?>admin/Soporte/atencion"><i class="fa fa-circle-o"></i>Atender orden / Asignar Tecnico</a></li>
                        </ul>

                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-lock"></i> <span>Seguridad</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>admin/seguridad/keys"><i class="fa fa-circle-o"></i> Cambio de clave</a></li>
                            <li><a href="<?php echo base_url();?>admin/Usuarios/Actualizar"><i class="fa fa-circle-o"></i> Actualizar Datos</a></li>
                            <li><a href="<?php echo base_url();?>admin/seguridad/Usuarios"><i class="fa fa-circle-o"></i>Buscar Usuario</a></li>
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
                                  <a href="#"><i class="fa fa-circle-o"></i> Listado de Equipos
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                  </a>
                                  <ul class="treeview-menu">
                                    <li>
                                      <a href="<?php echo base_url();?>reportes/Equipos/tipo"><i class="fa fa-circle-o"></i> Por Tipo
                                      </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/Equipos/estatus"><i class="fa fa-circle-o"></i> Por Estatus
                                      </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/Equipos/componentes"><i class="fa fa-circle-o"></i> Por Componentes
                                      </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/Equipos/Dependencia"><i class="fa fa-circle-o"></i> Por Dependencias
                                      </a>
                                    </li>
                                  </ul>
                                </li>
                                <li class="treeview">
                                  <a href="#"><i class="fa fa-circle-o"></i> Ordenes de Servicios
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                  </a>
                                  <ul class="treeview-menu">
                                    <li >
                                      <a href="<?php echo base_url();?>Reportes/Ordenes/tecnico"><i class="fa fa-circle-o"></i> Por tecnico en una fecha dada</a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/Ordenes/fecha"><i class="fa fa-circle-o"></i> Por fecha</a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/Ordenes/estatus"><i class="fa fa-circle-o"></i> Por Estatus
                                      </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/Ordenes/tipo"><i class="fa fa-circle-o"></i> Por Tipo
                                      </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/Ordenes/Usuarios"><i class="fa fa-circle-o"></i> Por Usuario
                                      </a>
                                    </li>
                                  </ul>
                                </li>
                                <li class="treeview">
                                  <a href="#"><i class="fa fa-circle-o"></i> Usuarios
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                  </a>
                                  <ul class="treeview-menu">
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/usuarios/listas"><i class="fa fa-circle-o"></i> Listado General
                                      </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/usuarios/Dependencias"><i class="fa fa-circle-o"></i> Por Dependencias </a>
                                    </li>
                                  </ul>
                                </li>
                                <li class="treeview">
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
                                </li>
                              </ul>

                            </li>

                    <li><a href="<?php echo base_url();?>admin/mensajes"><i class="fa fa-envelope"></i> <span>Mensajes</span></a>
                   </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
         <!-- =============================================== -->
