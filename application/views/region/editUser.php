<h3 class="header_beli">Edit User</h3>
<div class="crud_produk">  
<form action="" method="post">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nama_produk" placeholder="<?= $user['nama'];?>" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="harga" name="password" value="<?= set_value('harga');?>">
        <?= form_error('password','<small class="text-danger pl-3">','</small>');?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Konfirmasi Password</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="harga" name="password2" value="<?= set_value('harga');?>" >
        <?= form_error('password2','<small class="text-danger pl-3">','</small>');?>
        </div>
    </div>
    <button type="submit" class="btn" id="btn_submit">Submit</button>
    </form>
</div> 