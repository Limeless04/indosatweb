<div class="container">
    <h3 class="header_beli">Quiz</h3>
    <form action="" method="post">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nama" name="nama_penjawab" value="<?= set_value('nama_penjawab');?>" required>
        <?= form_error('nama_pelanggan','<small class="text-danger pl-3">','</small>');?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Hp Indosat</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= set_value('nomor_hp');?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Kabupaten/Kota</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="lab_kota" name="kab_kota" value="<?= set_value('kab_kota');?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Akun FB</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="akun_fb" name="akun_fb" value="<?= set_value('akun_fb');?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Jawaban Quiz</label>
        <div class="col-sm-10">
        <textarea class="form-control" id="jawaban" name="jawaban" ><?= set_value('jawaban');?></textarea>
        </div>
    </div>
    <button type="submit" class="btn" id="btn_submit">Submit</button>
    </form>
  </div>