<?=$this->session->flashdata('notif');?>
<?=$this->session->flashdata('pesan');?>
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
      <td><button type="button" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#emailModal">Hapus</button><br> <a href="<?= base_url("Cluster/");?>editUser/<?= $p['id'];?>" class="badge badge-info">Edit</a></td>
    </tr>
    <?php endforeach;?>
  <?php endif;?>
  </tbody>
</table>

<!--Modal-->
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Apakah Anda Yakin Menghapus?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><?= $p['nama'];?></p>
        <p><?=$p["email"];?></p>
        <p><?= $p["cluster"];?></p>
      </tr>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger"><a href="<?= base_url("Cluster/");?>hapusUser/<?= $p['id'];?>" style="text-decoration:none;color:white;">Hapus</a></button>
      </div>
    </div>
  </div>
</div>