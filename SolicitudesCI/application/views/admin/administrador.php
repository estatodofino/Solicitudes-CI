<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Bienvenido <?=$usuario->nom_usuario;?>! 
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php if($this->session->flashdata("error")):?>
        <div class="callout callout-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
        </div>
    <?php endif;?>
    <?php if($this->session->flashdata("success")):?>
        <div class="callout callout-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("success"); ?></p>
        </div>
    <?php endif;?>
     <div class="box box-solid">
      <div class="box-body table-responsive">
              
     </div>
  </div>

<div class="row">
  <div class="col-md-8 col-xs-12" >
         <div class="box box-primary">
           <div class="box-header with-border">
              <h3 class="box-title">Nuevas solicitudes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                 <thead>
                   <tr>
                   <th>Cedula</th>
                   <th>Nombres</th>
                   <th>Tipo de usuario</th>
                   <th >Opciones</th>
                  </tr>
               </thead>
                <tbody>
                <?php if(!empty($usuarios)):?>
                   <?php foreach($usuarios as $item):?>
                   <tr>
                       <td><?php echo $item->ci_usuario;?></td>
                       <td><?php echo $item->nom_usuario;?> <?php echo $item->ape_usuario;?></td>
                       <td><?php echo $item->tipo;?></td>
                      <!-- <?php $datacliente = $item->ci_usuario."*".$item->nom_usuario."*".$item->ape_usuario."*".$item->correo_usuario."*".$item->cod_tipo_usuario;?> -->
                     <td>
                        <div class="btn-group">
                             
                             <a href="<?php echo base_url();?>administrar/backend/ver_solicitante/<?=$item->ci_usuario;?>" class="btn btn-success btn-flat btn-sm btn-info"><span class="fa fa-search"></span> Ver solicitante</a>

                         </div>
                     </td>
                   </tr>
              <?php endforeach;?>
               <?php endif;?>
             </tbody>
           </table>
            </div>
            <!-- /.box-body -->
            <!--<div class="box-footer text-center">
              <a href="javascript:void(0)" class="uppercase">View All Products</a>
            </div>
             /.box-footer -->
          </div>                
  </div> 
  <div class="col-md-4 col-xs-12">
   <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Periodo en curso</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">      
    <div class="product-info">
      <?php if($periodo!=""){?>
        <input type="hidden" id="id_per" value="<?=$periodo->cod_periodo;?>">
        <input type="hidden" id="nom_per" value="<?=$periodo->nom_periodo;?>">
      <strong>Periodo: </strong><?=$periodo->nom_periodo;?><br>
      <strong>Inicio: </strong><?=$periodo->inicio_periodo;?><br>
      <strong>Fin: </strong><?=$periodo->fin_periodo;?><br>
      <span class="product-description">
        <button onclick="edit_periodo()" class="btn btn-success btn-sm pull-right"><span class="fa fa-edit"></span> Cambiar fecha</button>
        <button onclick="delete_periodo()" class="btn btn-danger btn-sm pull-left"><span class="fa fa-lock"></span> Cerrar</button>
      </span>
    <?php }else{?>
      <button class="btn btn-info" onclick="add_periodo()"><i class="glyphicon glyphicon-plus"></i> Agregar nuevo periodo</button> 
    <?php }?>
    </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer text-center">
      <a href="<?php echo base_url();?>administrar/backend/periodos" class="uppercase">Ver todos</a>
    </div>
    <!-- /.box-footer -->
  </div>
  </div>
</div>
 <div class="row">
  <div class="col-md-8 col-xs-12">
    
  </div>
  <div class="col-md-4 col-xs-12">
   <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Proceso de modificacion</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">      
    <div class="product-info">
      <?php if(!empty($modificacion)){?>
         <input type="hidden" id="id_per" value="<?=$periodo->cod_periodo;?>">
      <strong>Estado:</strong><?php if($modificacion->estado =="1"){
        echo '<label class="label-success">Activo</label>';
      }
      ?><br>
      <strong>Inicio: </strong><?=$modificacion->fecha_inicio;?><br>
      <strong>Fin: </strong><?=$modificacion->fecha_fin;?><br>
      <span class="product-description">
        <button onclick="edit_modificacion()" class="btn btn-success btn-sm pull-right"><span class="fa fa-edit"></span> Cambiar fecha</button>
        <button onclick="delete_modificacion()" class="btn btn-danger btn-sm pull-left"><span class="fa fa-lock"></span> Cerrar</button>
      </span>
    <?php }else{?>
       <a href="<?php echo base_url();?>administrar/backend/new_modificacion" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> Iniciar nuevo proceso</a>  
      <!--<button onclick="add_modificacion()" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> Iniciar nuevo proceso</button>-->
    <?php }?>
    </div>
    </div>
    <!-- /.box-body -->
    <!-- <div class="box-footer text-center">
      <a href="<?php echo base_url();?>administrar/backend/periodos" class="uppercase">Ver todos</a>
    </div> -->
    <!-- /.box-footer -->
  </div>
  </div>
     </div>   
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

  <!-- Bootstrap modal -->
  <div class="modal fade" id="periodo_modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" style="color:black; font-weight: bold;">Periodos</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/>
          <div class="form-body">
          <div class="form-group">
              <label class="control-label col-md-3">Codigo:</label>
              <div class="col-md-9">
                <input name="codigo" placeholder="Ingrese el codigo del periodo" class="form-control" type="text">
              </div>
            </div>           
            <div class="form-group">
              <label class="control-label col-md-3">Periodo:</label>
              <div class="col-md-9">
                <input name="nombre" placeholder="Ingrese el periodo"  class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Fecha inicio:</label>
              <div class="col-md-9">
                <input name="inicio" class="form-control" type="date">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">fecha fin:</label>
              <div class="col-md-9">
                <input name="final" class="form-control" type="date">
              </div>
            </div>
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
 <!-- Bootstrap modal -->
  <div class="modal fade" id="modificacion_modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" style="color:black; font-weight: bold;">Modificacion</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/>
          <div class="form-body">
          <div class="form-group">
              <label class="control-label col-md-3">Codigo:</label>
              <div class="col-md-9">
                <input name="codego" id="codego" readonly="" placeholder="Ingrese el codigo del periodo" class="form-control" type="text">
              </div>
            </div>           
            <div class="form-group">
              <label class="control-label col-md-3">Periodo:</label>
              <div class="col-md-9">
                <input name="nommodi" id="nommodi" readonly="" value="<?=$periodo->nom_periodo;?>" class="form-control" type="text">
                <input type="hidden" name="nomper" id="nomper" value="<?=$periodo->cod_periodo;?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Fecha inicio:</label>
              <div class="col-md-9">
                <input name="ini" id="ini" class="form-control" type="date">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">fecha fin:</label>
              <div class="col-md-9">
                <input name="fin" id="fin" class="form-control" type="date">
              </div>
            </div>
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save_i()" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->