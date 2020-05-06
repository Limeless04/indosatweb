<div class="container">
    <h3 class="header_beli">Pilih Produk</h3>
    <form action="" method="post">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Produk</label>
        <div class="col-sm-10">
        <select class="form-control" id="nama_produk" name="nama_produk">
            <option>Pilih Nama Produk</option>
            <?php foreach($produk as $c):?>
            <option value="<?= $c['id'];?>"><?=$c['nama_produk'];?></option>
            <?php endforeach;?>
        </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
        <select class="form-control" id="harga_produk" name="harga_produk">
            <option>Harga produk</option>
        </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="produk_desc" name="produk_desc" placeholder="Deskripsi">
            </textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Gambar</label>
        <div class="col-sm" id="gambar_produk" name="produk">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Video</label>
        <div class="col-sm-10" id="video_produk" name="produk">
    </div>
</form>