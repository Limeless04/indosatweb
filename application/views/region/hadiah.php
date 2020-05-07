<button class="btn_produk"><a href="<?= base_url('Region/');?>tambahHadiah">Tambah Hadiah</a></button>
<?=$this->session->flashdata('notif');?>
<table class="table">
  <thead id="thead">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Hadiah</th>
      <th scope="col">Kuota</th>
      <th scope="col">Gambar</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1;?>
  <?php if(empty($hadiah)):?>
   <h1>Data Kosong</h1> 
  <?php else:?>
  <?php foreach($hadiah as $p):?>
    <tr>
      <th scope="row"><?php echo $i++;?></th>
      <td><?= $p['nama_hadiah'];?></td>
      <td><?=$p["kuota"];?></td>
      <td><?=$p["gambar"];?></td>
      <td><a href="<?= base_url("Region/");?>hapusHadiah/<?= $p['id'];?>" class="badge badge-danger">Hapus</a>
    </tr>
    <?php endforeach;?>
  <?php endif;?>
  </tbody>
</table>