<h1><?php echo $heading; ?></h1>
<button class="btn_produk"><a href="<?= base_url('region/');?>createProduk">Tambah Produk</a></button>
<table class="table">
  <thead id="thead">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Harga</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1;?>
  <?php if(empty($produk)):?>
   <h1>Data Kosong</h1> 
  <?php else:?>
  <?php foreach($produk as $p):?>
    <tr>
      <th scope="row"><?php echo $i++;?></th>
      <td><?= $p['nama_produk'];?></td>
      <td><?=$p["harga"];?></td>
      <td><?= $p["deskripsi"];?></td>
      <td>
      <button type="button" class="badge badge-pill badge-danger"><a style="text-decoration:none;color:white;" href="<?= base_url("Region/");?>hapusProduk/<?= $p['id'];?>">Hapus</a> </button>
      <!-- <div class="modal fade" id="modalProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Apakah Anda Yakin Menghapus?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <p><?= $p['nama_produk'];?></p>
              <p><?=$p["harga"];?></p>
              <p><?= $p["deskripsi"];?></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger"><a style="text-decoration:none;color:white;" href="<?= base_url("Region/");?>hapusProduk/<?= $p['id'];?>">Hapus</a> </button>
              </div>
            </div>
          </div>
        </div>     -->
      <br> <a href="<?= base_url("region/");?>editProduk/<?= $p['id'];?>" class="badge badge-info">Edit</a></td>
    </tr>
    <?php endforeach;?>
  <?php endif;?>
  </tbody>
</table>

