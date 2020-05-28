
<div class="container">
    <h3 class="header_beli">Pilih Produk</h3>
    <form action="" method="post">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Depo Terdekat</label>
        <div class="col-sm-10">
        <select class="form-control" id="depo" name="depo">
            <option>Pilih Depo Terdekat...</option>
            <?php foreach($cluster as $c):?>
            <option value="<?= $c['cluster'];?>"><?=$c['kota'];?></option>
            <?php endforeach;?>
        </select>
        <?= form_error('depo','<small class="text-danger pl-3">','</small>');?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Pilih Produk</label>
        <div class="col-sm-10">
        <select class="form-control" id="produk" name="produk">
            <option>Pilih Produk...</option>
            <?php foreach($produk as $p):?>
            <option value="<?= $p['nama_produk'];?>"><?=$p['nama_produk'];?>&nbsp;<?= $p['harga'];?>&nbsp;<?= $p['deskripsi']?></option>
            <?php endforeach;?>
        </select>
        <?= form_error('produk','<small class="text-danger pl-3">','</small>');?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Pilih MSISDN</label>
        <div class="col-sm-10">
            <select class="form-control" id="msisdn" name="msisdn">
                <option value="bebas">Pilih MSISDN...</option>
            </select>
            <small>Jika MSISDN kosong, MSISDN akan diisi secara otomatis oleh sistem</small>
        <?= form_error('msisdn','<small class="text-danger pl-3">','</small>');?>
        </div>
    </div>
    <button type="submit" class="btn" id="btn_submit">Submit</button>
    <button type="submit" class="btn" id="btn_submit"><a href="<?= base_url('Home/index')?>" style="text-decoration:none;color:white;">Cancel</a></button>
    </form>