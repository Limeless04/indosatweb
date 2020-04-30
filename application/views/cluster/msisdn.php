<?=$this->session->flashdata('notif');?>

<button class="btn_produk"><a href="<?= base_url('Cluster/');?>addMsisdn">Tambah MSISDN</a></button>
<table class="table">
  <thead id="thead">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Msisdn</th>
      <th scope="col">Cluster</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  
  <?php $i=1;?>
  <?php if(empty($msisdn)):?>
   <tr>
       <h1>Data Kosong</h1> 
   </tr>
  <?php else:?>
  <?php foreach($msisdn as $p):?>
    <tr>
        <th scope="row"><?php echo $i++;?></th>
        <td><?= $p['msisdn'];?></td>
        <td><?=$p["cluster"];?></td>
      <!-- <td><a href="<?= base_url("Region/");?>hapusUserRegion/<?= $p['id'];?>" class="badge badge-danger">Hapus</a> <br> <a href="<?= base_url("Region/");?>editUserRegion/<?= $p['id'];?>" class="badge badge-info">Edit</a></td> -->
    </tr>
    <?php endforeach;?>
  <?php endif;?>
  </tbody>
</table>