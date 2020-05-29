<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Nueva solicitud
        <small>Carta de Postulacion</small>
        </h1>
    </section>
    <!-- Main content -->
<section class="content">
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
      <?php echo $error;?>
<br><br>
<h3>Subir y descargar Archivo</h3>
<form action="<?php echo base_url();?>upload/store" method="POST" enctype="multipart/form-data">
  <table>
    <tr>
      <td>Titulo</td>
      <td><input type="text" name="titImagen" class="form-control"></td>
    </tr>
    <tr>
      <td>Imagen</td>
      <td>
        <input type="file" name="fileImagen" class="form-control">
      </td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" value="Guardar"></td>
    </tr>
  </table>
</form>
<?php echo $errorArch;?>
<?php echo $estado;?>
<a href="<?php echo base_url();?>upload/downloads/<?php echo $archivo;?>">Descargar</a>

     </div>
  </div>
</section>

  <div class="x_panel">
   <!-- <div class="x_title"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Subir Archivos</button></div> -->
            <div class="x_content">
             <?php if (count($documentos)): ?>
                 <div class="x_panel">
                       <?php foreach($documentos as $item): ?>
                       <div class="col-sm-6 col-md-3">
                        <div class="thumbnail" style="height: 100%;">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo base_url();?>uploads/files/<?=$item->file_name;?>" alt="<?=$item->title_name;?>"/>
                            <div class="mask">
                              <p>&copy;</p>
                              <div class="tools tools-bottom">
                                   <a href="<?php echo base_url();?>upload/downloads/<?php echo $item->file_name;?>" class="btn btn-sm"><span class="fa fa-download"></span></a>
                              <a href="<?php echo base_url();?>upload/verArchivo/<?php echo $item->file_name;?>" target="_blank"  class="btn btn-sm"><span class="fa fa-eye"></span></a>
                              </div>                              
                            </div>
                          </div>
                          <div class="caption" style="width:100%">
                          <ul class="no_style_list centrado">
                            <input type="hidden" id="idx" value="<?=$item->id;?>">
                           <li> <p><?=$item->title_name;?></p></li>
                           </ul>
                          </div>
                        </div>
                      </div>
                       <?php endforeach; ?>
                     </div>
                <?php else: ?>
                 <div class="alert alert-dismissible alert-danger">
                  <strong>Disculpe!</strong> <a href="#" class="alert-link">no se han cargado Documentos</a>
                </div>
                <?php endif; ?>
                  </div>
              </div>

            </div>

          </div>
        </div>
       </div>
     </div>
   </div>


    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
