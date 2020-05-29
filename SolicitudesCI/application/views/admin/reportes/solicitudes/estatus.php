
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Solicitud de Documentos
        <small>Estatus</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
            <div class="box-body table-responsive">
					<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                           <thead>
                        <tr>
                            <td>Solicitudes por Estatus</td>
                            </tr>
                        </thead>
						<tbody>
							<tr>
								 <td style="width: 25%"><a href="<?php echo base_url()?>administrar/reportes/solicitudes/ver_estatus/espera"> En espera</a></td></tr>
								 <tr>
								 <td style="width: 25%"><a href="<?php echo base_url()?>administrar/reportes/solicitudes/ver_estatus/revision"> En revision</a></td></tr>
								 <tr>
								 <td style="width: 25%"><a href="<?php echo base_url()?>administrar/reportes/solicitudes/ver_estatus/procesada"> Procesada </a></td></tr>
								 <tr>
								 <td style="width: 25%"><a href="<?php echo base_url()?>administrar/reportes/solicitudes/ver_estatus/cancelada"> Cancelada</a></td></tr>
						</table>
				</div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
