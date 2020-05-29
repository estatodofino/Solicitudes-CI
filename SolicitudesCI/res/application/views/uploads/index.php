<div class="container">
    <div class="row">
        <p><?php echo $this->session->flashdata('statusMsg'); ?></p>
        <form enctype="multipart/form-data" action="" method="post">
         <div class="form-group">
                <label>titulo</label>
                <input type="text" class="form-control" name="title"/>
            </div> 
            
            <div class="form-group">
                <label>Seleccione sus archivos</label>
                <input type="file" class="form-control" name="userFiles[]" multiple/>
            </div>
            <div class="form-group">
                <input class="form-control" type="submit" name="fileSubmit" value="UPLOAD"/>
            </div>
        </form>
    </div>
    <div class="row">
        <ul class="gallery">
            <?php if(!empty($files)): foreach($files as $file): ?>
            <li class="item">
                <img style="width:200px;" src="<?php echo base_url('uploads/files/'.$file['file_name']); ?>" alt="" >
                <p>este es el titulo: <?php echo $file['title_name'];?></p>
                <p>Uploaded On <?php echo date("j M Y",strtotime($file['created'])); ?></p>
            </li>
            <?php endforeach; else: ?>
            <p>No hay Imagenes subidas</p>
            <?php endif; ?>
        </ul>
    </div>
</div>