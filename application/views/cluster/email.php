<?=$this->session->flashdata('notif');?>
<button class="btn_produk"><a href="<?= base_url('Cluster/');?>tambahUser">Tambah User</a></button>
<table class="table">
  <thead id="thead">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Lengkap</th>
      <th scope="col">Email</th>
      <th scope="col">Cluster</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1;?>
  <?php if(empty($userCluster)):?>
   <h1>Data Kosong</h1> 
  <?php else:?>
  <?php foreach($userCluster as $p):?>
    <tr>
      <th scope="row"><?php echo $i++;?></th>
      <td><?= $p['nama'];?></td>
      <td><?=$p["email"];?></td>
      <td><?= $p["cluster"];?></td>
      <td><a href="<?= base_url("Cluster/");?>hapusUserRegion/<?= $p['id'];?>" class="badge badge-danger">Hapus</a> <br> <a href="<?= base_url("Cluster/");?>editUserRegion/<?= $p['id'];?>" class="badge badge-info">Edit</a></td>
    </tr>
    <?php endforeach;?>
  <?php endif;?>
  </tbody>
</table>