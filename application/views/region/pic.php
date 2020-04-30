<button class="btn_produk"><a href="<?= base_url('Region/');?>tambahUser">Tambah User</a></button>
<?=$this->session->flashdata('notif');?>
<table class="table">
  <thead id="thead">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Lengkap</th>
      <th scope="col">Email</th>
      <th scope="col">Region</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1;?>
  <?php if(empty($userRegion)):?>
   <h1>Data Kosong</h1> 
  <?php else:?>
  <?php foreach($userRegion as $p):?>
    <tr>
      <th scope="row"><?php echo $i++;?></th>
      <td><?= $p['nama'];?></td>
      <td><?=$p["email"];?></td>
      <td><?= $p["propinsi"];?></td>
      <td><a href="<?= base_url("Region/");?>hapusUserRegion/<?= $p['id'];?>" class="badge badge-danger">Hapus</a> <br> <a href="<?= base_url("Region/");?>editUserRegion/<?= $p['id'];?>" class="badge badge-info">Edit</a></td>
    </tr>
    <?php endforeach;?>
  <?php endif;?>
  </tbody>
</table>