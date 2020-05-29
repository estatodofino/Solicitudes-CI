<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Materias
        <small></small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">

      <div class="row">
      <div class="col-md-12 col-xs-12">
      <div class="box box-solid table-responsive">
      <div class="box-body">
        <div class="row">
        <div class="col-md-12">
            <?php if($this->session->userdata("rol") =="1"):?>
            <button  onclick="add_materia()" class="btn btn-primary btn-flat"><span class="fa fa-plus" ></span> Agregar Categoria</button>
            <?php endif;?>
        </div>
    </div>
    <hr>
        <table id="table_1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                 <thead>
                   <tr> 
                   <th>Codigo</th>
                   <th>Nombre</th>
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
                     <td>
                       <?php
                        if($item->estado=="1"){ ?>
                            <button id="<?=$item->cod_materia;?>" value="<?=$item->nombre_materia;?>" class="btn-danger btn btn-close-mt"><span class="fa fa-lock"></span> Cerrar</button>
                            <button class="btn-warning btn" onclick="edit_materia(<?=$item->cod_materia;?>)" ><span class="fa fa-edit"></span> editar </button>
                       <?php } else{ ?>
                            <button id="<?=$item->cod_materia;?>" value="<?=$item->nombre_materia;?>" class="btn-success btn btn-open-mt"><span class="fa fa-unlock"></span> Abrir</button>
                            <button class="btn-warning btn" onclick="edit_materia(<?=$item->cod_materia;?>)" ><span class="fa fa-edit"></span> editar </button>
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
      <div class="row">
        
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
       <!-- Bootstrap modal -->
  <div class="modal fade" id="materia_modal_form" role="dialog">
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
                <input name="codigo" id="codigo" placeholder="Ingrese el codigo" class="form-control" type="text">
              </div>
            </div>           
            <div class="form-group">
              <label class="control-label col-md-3">Nombre:</label>
              <div class="col-md-9">
                <input name="nombre" id="nombre" placeholder="Ingrese el nombre de la materia" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Horas semanales:</label>
              <div class="col-md-9">
                <input name="horas" id="horas" placeholder="ingrese la cantidad de horas semanales" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">tipo de materia:</label>
              <div class="col-md-9">
                <select name="tipo" id="tipo" class="form-control">
                    <option value="obligatoria">Obligatoria</option>
                    <option value="electiva">Electiva</option>
                    <option value="autodesarrollo">Autodesarrollo</option>
                  </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Semestre:</label>
              <div class="col-md-9">
                <select name="semestre" id="semestre" class="form-control">
                    <option value="1">Primero</option>
                    <option value="2">Segundo</option>
                    <option value="3">Tercero</option>
                    <option value="4">Cuarto</option>
                    <option value="5">Quinto</option>
                    <option value="6">Sexto</option>
                    <option value="7">Septimo</option>
                    <option value="8">Octavo</option>
                    <option value="9">Noveno</option>
                    <option value="10">Decimo</option>
                  </select>
              </div>
            </div>
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save_m()" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
</div>
<!-- /.content-wrapper -->

