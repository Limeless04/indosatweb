<h3 class="header_beli">Data Produk Baru</h3>
<div class="crud_produk">  
<form action="" method="post">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Produk</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= set_value('nama_produk');?>" placeholder="<?= $produk['nama_produk'];?>">
        <?= form_error('nama_produk','<small class="text-danger pl-3">','</small>');?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="harga" name="harga" value="<?= set_value('harga');?>" placeholder="<?= $produk['harga'];?>">
        <?= form_error('harga','<small class="text-danger pl-3">','</small>');?>   
    </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi Produk</label>
        <div class="col-sm-10">
        <input type="text" class="form-control col" id="desc_produk" name="desc_produk" value="<?= set_value('desc_produk');?>" placeholder ="<?= $produk['deskripsi'];?>" >
        <?= form_error('desc_produk','<small class="text-danger pl-3">','</small>');?>    
    </div>
    </div>
    <button type="submit" class="btn" id="btn_submit">Submit</button>
    </form>
</div> 