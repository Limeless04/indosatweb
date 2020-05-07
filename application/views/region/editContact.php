<h3 class="header_beli">Data Alamat</h3>
<div class="crud_produk">  
<form action="" method="post">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Edit Alamat</label>
        <div class="col-sm-10">
        <textarea type="text" class="form-control" id="alamat" name="alamat" value="<?= set_value('alamat');?>" placeholder="<?= $alamat['alamat'];?>"></textarea>
        <?= form_error('alamat','<small class="text-danger pl-3">','</small>');?>
        </div>
    </div>
    <button type="submit" class="btn" id="btn_submit">Submit</button>
    </form>
</div>