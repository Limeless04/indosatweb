<h3 class="header_beli">Tambah Hadiah</h3>
<div class="crud_produk">  
<form action="" method="post">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Hadiah</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nama_produk" name="nama_hadiah" value="<?= set_value('nama_hadiah');?>">
        <?= form_error('nama','<small class="text-danger pl-3">','</small>');?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Kuota hadiah</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nama_produk" name="kuota" value="<?= set_value('kuota');?>">
        <?= form_error('kuota','<small class="text-danger pl-3">','</small>');?>
    </div>
    </div>
    <button type="submit" class="btn" id="btn_submit">Submit</button>
    </form>
</div>