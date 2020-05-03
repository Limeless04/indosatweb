<div class="container">
    <h3 class="header_beli">Lengkapi Data Customer</h3>
    <form action="" method="post">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nama" name="nama_pelanggan" value="<?= set_value('nama_pelanggan');?>">
        <?= form_error('nama_pelanggan','<small class="text-danger pl-3">','</small>');?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor WA</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="nomor_wa" name="nomor_wa" value="<?= set_value('nomor_wa');?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat Email</label>
        <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email');?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat Rumah</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="alamat_rumah" name="alamat_rumah" value="<?= set_value('alamat_rumah');?>">
        </div>
    </div>
    <button type="submit" class="btn" id="btn_submit">Submit</button>
    </form>
  </div>
