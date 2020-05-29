<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Modificacion de Inscripcion de materias 
        <small></small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
    <div class="box-body">
        <form action="<?php echo base_url();?>activos/solicitudes/store_modificacion" method="POST" enctype="multipart/form-data">

        <div class="form-group col-md-12 <?php echo !empty(form_error('numero')) ? 'has-error':'';?>">
            <label for="numero">Numero de solicitud:</label>
            <input type="text" class="form-control" id="numero" name="numero" readonly="">
           <input type="hidden" class="form-control" id="secuencia" name="secuencia" value="<?=$control->secuencia;?>" disabled="">
           <?php echo form_error("numero","<span class='help-block'>","</span>");?>
        </div>
        <br>

      <div class="form-group col-md-12"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="fa fa-upload"></span> Subir Archivos</button></div>
      
      <div class="content" id="tipo">
        <div class="box-body table-responsive">
           <table id="docs" class="table table-striped table-bordered" cellspacing="0" width="100%">
             <thead>
               <tr>
                 <th>Nombre del Documento</th>
                 <th>Ruta del documento</th>
                 <th>Estado</th>
                 <th>Opcion</th>
               </tr>
             </thead>
             <tbody>
               <?php if(!empty($documentos)):?>
                    <?php foreach($documentos as $item):?>
                        <tr>
                            <td><?=$item->nombre_adj;?></td>
                            <td><?=$item->ruta_adj;?></td>
                            <td><span class="label label-success fa fa-check">Subido</span></td>
                            
                            <td>
                               <div class="btn-group">
                                    <button type="button" class="btn btn-info btn-view-ordenes btn-sm" data-toggle="modal" data-target="#modal-default" value="">
                                        <span class="fa fa-search"></span>
                                    </button> 
                                   <a href="<?php echo base_url();?>egresado/solicitudes/delete_archivo/<?=$item->id;?>" class="btn btn-danger btn-remove_doc btn-sm" value="<?php echo current_url();?>"><span class="fa fa-remove"></span></a>
                                </div>
                            </td>
                        </tr>
                   <?php endforeach;?>
                <?php endif;?>
             </tbody>
           </table>
       </div>
      </div>

<?php if(count($documentos)>2):?>     
      <div class="col-md-12">
         <div class="box box-success">
             <div class="box-header">
                 <h4>Materias a inscribir</h4><label id="display">0</label>
                 <button type="button" data-toggle="modal" data-target=".bs-success-modal-sm" class="btn-success btn pull-right"><span class="fa fa-plus"></span> Agregar</button>
             </div>
             <div class="box-body">
                 <table id="tbinscribir" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Semestre</th>
                            <th>Horas</th>
                            <th>tipo</th>
                            <th>Condicion</th>
                            <th><span class="fa fa-cogs"></span></th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
             </div>
         </div> 
      </div>
      <div class="col-md-12">
         <div class="box box-danger">
             <div class="box-header">
                 <h4>Materias a retirar</h4><label id="display_del">0</label>
                 <button type="button" data-toggle="modal" data-target=".bs-danger-modal-sm" class="btn-danger btn pull-right"><span class="fa fa-plus"></span> Agregar</button>
             </div>
             <div class="box-body">
                 <table id="tbretiro" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Horas</th>
                            <th>Semestre</th>
                            <th><span class="fa fa-cogs"></span></th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
             </div>
         </div>
      </div>
  <?php endif;?>

      <div class="form-group col-md-12">
          <label for="justificacion">Breve justificacion:</label>
          <textarea name="justificacion" id="justificacion" class="form-control"></textarea>
          
      </div>
      
      <div class="form-group col-md-12">
          <button type="submit" id="enviar" class="btn btn-success hidden btn-flat"><span class="fa fa-send"></span> Solicitar</button>
          <a type="button" id="comprobar" name="button" class="btn btn-success btn-flat"><span class="fa fa-check"></span> Solicitar</a>
          <a type="button" value="activos/solicitudes" name="button" class="btn btn-cancel btn-danger"><span class="fa fa-remove"></span> Cancelar</a>
      </div>
      </form>
     </div>
    </div>
    </section>
    <!-- /.content -->

 <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Subir Archivos</h4>
      </div>
       <div class="modal-body">
         <?=form_open_multipart(base_url()."activos/solicitudes/subirDoc")?>
          <input type="hidden" id="numDoc" name="id" value=""/>
          <input type="hidden" name="direccion" value="activos/solicitudes/Modificacion"/>
          <input type="hidden" name="direccion2" value="activo/cartas/modificacion"/>
             <div class="form-group">
                <label for="titulo" >Título</label>
                 <select name="titulo" >
                    <option value="Pensum">Pensum con las materias aprobadas</option>
                    <option value="Comprobante de inscripcion" >Comprobante de inscripcion</option>
                    <option value="Comprobante de pago" >Comprobante de pago</option>
                  </select>
                  </div>
                   <div class="form-group">
                    <label for="fileImagen">Archivo</label>
                    <input type="file" name="fileImagen">
                    </div>
                     <div class="ln_solid"></div>
                     <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-primary"><span class="fa fa-upload"></span> Cargar</button>
                  <?=form_close()?>
                 </div>
                </div>
            </div>
          </div>
 <div class="modal fade bs-success-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Materias a inscribir</h4>
        </div>
         <div class="modal-body">
         <table id="table_1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                 <thead>
                   <tr> 
                   <th>Codigo</th>
                   <th>Nombre</th>
                   <th>Tipo</th>
                   <th>Semestre</th>
                   <th>Horas semanales</th>
                   <th>Estado</th>
                   <th>Opciones</th>
                  </tr>
               </thead>
                <tbody>
                <?php if(!empty($materias)):?>
                   <?php foreach($materias as $item):?>
                   <tr>
                       <td><?php echo $item->cod_materia;?></td>
                       <td><?php echo $item->nombre_materia;?> </td>
                       <td><?php echo $item->tipo;?> </td>
                       <td><?php echo $item->semestre;?></td>
                       <td><?php echo $item->horas_semanales;?></td>
                      <td>
                        <?php
                        if($item->estado=="1"){ ?>
                            <span class="label label-success">Abierta</span>
                       <?php } else{ ?>
                            <span class="label label-danger">Cerrada</span>
                       <?php }?>
                      </td>
                      <?php $datamateria = $item->cod_materia."*".$item->nombre_materia."*".$item->semestre."*".$item->horas_semanales."*".$item->tipo;?>
                     <td>
                       <?php
                        if($item->estado=="1"){ ?>
                            <button value="<?=$datamateria;?>" class="btn-primary btn boton" ><span class="fa fa-plus"></span> Agregar </button>
                            <button type="button" class="btn btn-success btn-md btn-flat hidden botone"><span class="fa fa-check"></span>Agregada</button>
                       <?php } else{ ?>
                            <button class="btn-warning btn disabled" ><span class="fa fa-warning"></span> Agregar </button>
                       <?php }?>
                       </td>
                   </tr>
              <?php endforeach;?>
               <?php endif;?>
             </tbody>
           </table>
         </div>
        </div>
    </div>
  </div>
 <div class="modal fade bs-danger-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Materias a retirar</h4>
      </div>
       <div class="modal-body">
         <table id="table_1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                 <thead>
                   <tr> 
                   <th>Codigo</th>
                   <th>Nombre</th>
                   <th>Tipo</th>
                   <th>Semestre</th>
                   <th>Horas semanales</th>
                   <th>Estado</th>
                   <th>Opciones</th>
                  </tr>
               </thead>
                <tbody>
                <?php if(!empty($materias)):?>
                   <?php foreach($materias as $item):?>
                   <tr>
                       <td><?php echo $item->cod_materia;?></td>
                       <td><?php echo $item->nombre_materia;?> </td>
                       <td><?php echo $item->tipo;?> </td>
                       <td><?php echo $item->semestre;?></td>
                       <td><?php echo $item->horas_semanales;?></td>
                      <td>
                        <?php
                        if($item->estado=="1"){ ?>
                            <span class="label label-success">Abierta</span>
                       <?php } else{ ?>
                            <span class="label label-danger">Cerrada</span>
                       <?php }?>
                      </td>
                      <?php $datamateria = $item->cod_materia."*".$item->nombre_materia."*".$item->semestre."*".$item->horas_semanales."*".$item->tipo;?>
                     <td>
                       <?php
                        if($item->estado=="1"){ ?>
                            <button value="<?=$datamateria;?>" class="btn-primary btn botones" ><span class="fa fa-plus"></span> Agregar </button>
                            <button type="button" class="btn btn-success btn-md btn-flat hidden botonese"><span class="fa fa-check"></span>Agregada</button>
                       <?php } else{ ?>
                            <button class="btn-warning btn disabled" ><span class="fa fa-warning"></span> Agregar </button>
                       <?php }?>
                       </td>
                   </tr>
              <?php endforeach;?>
               <?php endif;?>
             </tbody>
           </table>
         </div>
        </div>
       </div>
     </div>
</div>
<!-- /.content-wrapper -->