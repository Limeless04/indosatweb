<?php if(empty($error)):?>
<?php else:?>
<?php echo $error;?>
<?php endif;?>
<!-- <ul>
<?php if(empty($upload_data)):?>
<?php else:?>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>
<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
<?php endif;?> -->
<h3 class="header_beli">Data Produk Baru</h3>
<div class="crud_produk">  
<form action="<?= base_url("Region/do_upload_img");?>" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Produk</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= set_value('nama_produk');?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="harga" name="harga" value="<?= set_value('harga');?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi Produk</label>
        <div class="col-sm-10">
        <input type="text" class="form-control col" id="desc_produk" name="desc_produk" value="<?= set_value('desc_produk');?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Gambar</label>
        <div class="col-sm-10">
        <input type="file" name="userfile" size="20"  class="form-control"/>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Url Video</label>
        <div class="col-sm-10">
        <input type="text" class="form-control col" id="url_video" name="url_video" value="<?= set_value('url_video');?>">
        <div class="alert alert-danger" role="alert">Untuk URL video masukan URL embed(sematkan) dari youtube, ada dimenu bagikan->sematkan(embed)->copy tags dan url yang muncul itu</div>
        </div>
    </div>
    <button type="submit" class="btn" id="btn_submit">Submit</button>
    </form>
</div> 