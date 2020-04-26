<div class="container">
    <h3 class="header_beli">Data Customer</h3>
    <form action="" method="post">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nama" name="nama_pelanggan" value="<?= set_value('nama_pelanggan');?>">
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
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Depo Terdekat</label>
        <div class="col-sm-10">
        <input type="hidden" name="depo" value="">
        <select class="form-control" id="depo" name="depo" value="<?= set_value('depo');?>">
            <option>Pilih Depo Terdekat...</option>
            <option>Semarang</option>
            <option>Banyuwangi</option>
        </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Pilih Produk</label>
        <div class="col-sm-10">
        <input type="hidden" name="produk" value="">
        <select class="form-control" id="produk" name="produk" value="<?= set_value('produk');?>">
            <option>Pilih Produk...</option>
            <option>SP IM3 2GB</option>
            <option>SP IM3 23GB</option>
        </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Pilih MSISDN</label>
        <div class="col-sm-10">
        <input type="hidden" name="msisdn" value="">
        <select class="form-control" id="msisdn" name="msisdn" value="<?= set_value('msisdn');?>">
            <option>Pilih MSISDN...</option>
            <option>0855xxxxxxxx</option>
        </select>
        </div>
    </div>    
    <button type="submit" class="btn" id="btn_submit">Submit</button>
    </form>

  </div>