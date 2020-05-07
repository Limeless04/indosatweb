<div class="container">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('klaim')?>"></div>
<div class="sukses" data-sukses="<?= $this->session->flashdata('sukses');?>"></div>
<div class="gambar" data-gambar="<?= base_url('assets/img/hadiah/'.$gambar);?>"></div>
    <img src="<?= base_url('assets/');?>img/claim.png" id="landing_page" alt="">
        <form action="" method="post">
            <div class="form-group row">
                <div class="mx-auto col-sm-4" style="text-align: center;">
                <label class="col-sm col-form-label" style="text-align: center;">Kode Hadiah</label>
                <input type="text" class="form-control mx-auto" id="nama" name="kode_hadiah" value="<?= set_value('kode_hadiah');?>">
                <?= form_error('kode_hadiah','<small class="text-danger pl-3">','</small>');?>
                </div>
            </div>
            <div style="text-align: center;">
                <button type="submit" class="btn" id="btn_submit_2">Submit</button>
            </div>
    </form>
</div>

