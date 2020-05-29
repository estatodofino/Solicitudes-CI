<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Periodos academicos.
        <small></small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid table-responsive">
    <div class="box-body">
        <table id="table_1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                 <thead>
                   <tr>
                   <th>Codigo</th>
                   <th>Periodo</th>
                   <th>Fecha de inicio</th>
                   <th>Fecha de culminacion</th>
                   <th>Estado</th>
                  </tr>
               </thead>
                <tbody>
                <?php if(!empty($periodos)):?>
                   <?php foreach($periodos as $item):?>
                   <tr>
                       <td><?php echo $item->cod_periodo;?></td>
                       <td><?php echo $item->nom_periodo;?> </td>
                       <td><?php echo $item->inicio_periodo;?></td>
                       <td><?php echo $item->fin_periodo;?></td>
                      <td>
                        <?php
                        if($item->estado=="1"){ ?>
                            <span class="label label-success">Periodo Activo</span>
                       <?php } else{ ?>
                            <span class="label label-danger">Periodo Cerrado</span>
                       <?php }?>
                      </td>
                     
                   </tr>
              <?php endforeach;?>
               <?php endif;?>
             </tbody>
           </table>
    </div>
    </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->