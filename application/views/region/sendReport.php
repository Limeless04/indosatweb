<?php echo form_open_multipart('Region/do_upload');?>
<?php if(empty($error)):?>

<?php else:?>
<?php echo $error;?>
<?php endif;?>
<div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
        <input type="file" class="form-control" id="nama_produk" name="report" value="<?= set_value('report');?>">
        <?= form_error('report','<small class="text-danger pl-3">','</small>');?>
        </div>
    </div>
    <button type="submit" class="btn" id="btn_submit" value="upload">Upload</button>
</form>

</ul>