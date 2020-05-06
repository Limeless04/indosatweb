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
    </tr>
    <?php endforeach;?>
  <?php endif;?>
  </tbody>
</table>

