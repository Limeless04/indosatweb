<h3 class="header_beli">Tambah User</h3>
<div class="crud_produk">  
<form action="" method="post">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nama_produk" name="nama" value="<?= set_value('nama_produk');?>">
        <?= form_error('nama','<small class="text-danger pl-3">','</small>');?>
        </div>
    </div>
    <!-- <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="harga" name="password" value="<?= set_value('harga');?>">
        <?= form_error('password','<small class="text-danger pl-3">','</small>');?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Konfirmasi Password</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="harga" name="password2" value="<?= set_value('harga');?>">
        <?= form_error('password2','<small class="text-danger pl-3">','</small>');?>
        </div>
    </div> -->

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="text" class="form-control col" id="desc_produk" name="email" value="<?= set_value('desc_produk');?>">
        <?= form_error('email','<small class="text-danger pl-3">','</small>');?></div>
    </div>
    <!-- <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Cluster</label>
        <div class="col-sm-10">
        <input type="text" class="form-control col" id="desc_produk" name="cluster" value="<?= set_value('desc_produk');?>">
        <?= form_error('cluster','<small class="text-danger pl-3">','</small>');?>
        </div>
    </div> -->
     <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Propinsi</label>
        <div class="col-sm-10">
            <select name="propinsi" id="propinsi" class="form-control">
                <option value="">Pilih Propinsi..</option>
                <option value="Jawa Tengah">Jawa tengah</option>
                <option value="Jawa Barat">Jawa Barat</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Cluster/Kota</label>
        <div class="col-sm-10">
        <select name="cluster" id="cluster" class="form-control">
         <option value="">Pilih kota....</option>   
        </select>
    </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Role</label>
        <div class="col-sm-10">
        <select name="role" id="role" class="form-control">
         <option value="">Pilih Role....</option>
         <option value="1">Akun Region</option>
         <option value="2">Akun Cluster</option>   
        </select>
    </div>
    </div>
    <button type="submit" class="btn" id="btn_submit">Submit</button>
    </form>
</div>