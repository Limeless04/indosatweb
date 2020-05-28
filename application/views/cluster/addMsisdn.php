<h3 class="header_beli">Tambah Msisdn Baru</h3>
<div class="crud_msisdn">  
<form action="" method="post">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Msisdn</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="msisdn" name="msisdn" value="<?= set_value('msisdn');?>">
        </div>
    </div>
    <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Produk</label>
        <div class="col-sm-10">
        <select class="form-control" id="nama_produk" name="nama_produk">
            <option>Pilih Produk...</option>
            <?php foreach($produk as $p):?>
            <option value="<?= $p['nama_produk'];?>"><?=$p['nama_produk'];?>&nbsp;<?= $p['harga'];?>&nbsp;<?= $p['deskripsi']?></option>
            <?php endforeach;?>
        </select>
        </div>
    </div>
        <button type="submit" class="btn" id="btn_submit">Submit</button>
    </form>
</div> 