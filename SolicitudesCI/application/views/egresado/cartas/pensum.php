<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Nueva solicitud
        <small>Certificación de Pensum</small>
        </h1>
    </section>
    <!-- Main content -->
<section class="content">
  <?php if($this->session->flashdata("success")):?>
   <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("success"); ?></p>
        </div>
  <?php endif;?>
  <?php if($this->session->flashdata("error")):?>
  <div class="alert alert-danger alert-dismissible">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
       </div>
  <?php endif;?>
  <?php if($errorArch !=""):?>
         <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           <p><i class="icon fa fa-ban"></i><?=$errorArch;?></p>
              </div>
       <?php endif;?>
 <div class="box box-solid">
    <div class="box-body"> 
      <form action="<?php echo base_url();?>egresado/solicitudes/Certificaciones" method="POST">
        <div class="form-group col-md-12 <?php echo !empty(form_error('numero')) ? 'has-error':'';?>">
            <label for="numero">Número de solicitud:</label>
            <input type="text" class="form-control" id="numero" name="numero"readonly="">
           <input type="hidden" class="form-control" id="secuencia" name="secuencia" value="<?=$control->secuencia;?>" disabled="">
           <?php echo form_error("numero","<span class='help-block'>","</span>");?>
        </div>

        <input type="hidden" class="form-control" name="tipo_sol" value="pensum">

<!--   <div class="form-group <?php echo form_error("egreso") != false ? 'has-error':'';?>">
    <label for="egreso">Periodo de egreso</label>
    <select name="egreso" id="egreso" class="form-control">
        <option value="">Seleccione...</option>
        <?php foreach ($periodos as $periodo) :?>
            <option value="<?php echo $periodo->cod_periodo;?>" <?php echo set_select("egreso",$periodo->cod_periodo);?>><?php echo $periodo->nom_periodo ?></option>
        <?php endforeach;?>
    </select>
    <?php echo form_error("egreso","<span class='help-block'>","</span>");?>
    </div> -->
        
        <br>
              <div class="form-group col-md-12"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Subir Archivos</button></div>
      
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
      
            <div class="form-group col-md-4 <?php echo !empty(form_error('referencia')) ? 'has-error':'';?>">
          <label for="referencia">Numero de referencia:</label><input type="text" class="form-control" id="referencia" name="referencia" value="<?php echo set_value('referencia');?>" placeholder="Numero de referencia" >
          <?php echo form_error('referencia',"<span class='help-block'>","</span>");?>
      </div>

      <div class="form-group col-md-4 <?php echo !empty(form_error('monto')) ? 'has-error':'';?>">
          <label for="monto">Monto del depósito:</label><input type="text" class="form-control" id="monto" name="monto" value="<?php echo set_value('monto');?>" placeholder="Monto del deposito" >
          <?php echo form_error('monto',"<span class='help-block'>","</span>");?>
      </div>

      <div class="form-group col-md-4">
          <label for="fecha">Fecha de pago:</label><input type="date" class="form-control" id="fecha" name="fecha">
          
      </div>
      
      <div class="form-group col-md-12">
          <button type="submit" class="btn btn-success btn-flat">Solicitar</button>
          <a type="button" value="egresado/solicitudes" name="button" class="btn btn-cancel btn-danger">Cancelar</a>
      </div>

      </form>
     </div>
  </div>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Subir Archivos</h4>
      </div>
       <div class="modal-body">
         <?=form_open_multipart(base_url()."egresado/solicitudes/subirDoc")?>
          <input type="hidden" id="numDoc" name="id" value=""/>
          <input type="hidden" name="direccion" value="egresado/solicitudes/Pensum"/>
          <input type="hidden" name="direccion2" value="egresado/cartas/Pensum"/>
             <div class="form-group">
                <label for="titulo" >Título</label>
                 <select name="titulo" >
                   <option value="Pensum">Pensum aprobado</option>
                    <option value="Macur" >Relación de Materias Cursadas</option>
                    <option value="Fotocopia de CI">Fotocopia de CI</option>
                    <option value="Comprobante de pago" >Comprobante de pago</option>
                  </select>
                  </div>
                   <div class="form-group">
                    <label for="fileImagen">Archivo</label>
                    <input type="file" name="fileImagen">
                    </div>
                     <div class="ln_solid"></div>
                     <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Cargar</button>
                  <?=form_close()?>
                 </div>
                </div>
            </div>
          </div>
</section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
