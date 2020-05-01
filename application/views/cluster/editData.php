<h3 class="header_beli">Tambah User</h3>
<div class="crud_produk">  
<form action="" method="post">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama_pelanggan');?>" placeholder="<?= $edit["nama_pelanggan"]?>">
        <?= form_error('nama','<small class="text-danger pl-3">','</small>');?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor WA</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="nomor_wa" name="no_wa" value="<?= set_value('no_wa');?>" placeholder="<?= $edit["no_wa"]?>">
        <?= form_error('nomor_wa','<small class="text-danger pl-3">','</small>');?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat Email</label>
        <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email');?>" placeholder="<?= $edit["email"]?>">
        <?= form_error('email','<small class="text-danger pl-3">','</small>');?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat Rumah</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="alamat_rumah" name="alamat_rumah" value="<?= set_value('alamat_rumah');?>" placeholder="<?= $edit["alamat_rumah"]?>">
        <?= form_error('alamat_rumah','<small class="text-danger pl-3">','</small>');?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Depo Terdekat</label>
        <div class="col-sm-10">
        <select class="form-control" id="depo" name="depo" required>
            <option value="">Pilih Depo Terdekat...</option>
            <?php foreach($cluster as $c):?>
            <option value="<?= $c['cluster'];?>"><?=$c['kota'];?></option>
            <?php endforeach;?>
        </select>
        </div>
    </div>
    <input type="hidden" name="pending" value="1"> 
    <button type="submit" class="btn" id="btn_submit">Submit</button>
    </form>
</div> 
