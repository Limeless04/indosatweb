<div class="card">
  <h5 class="card-header">Alamat Gedung</h5>
  <div class="card-body">
      <?php if(empty($alamat)):?>
        <p class="card-text">Tidak Ada Alamat</p>
      <?php else:?>
        <?php foreach ($alamat as $a):?>
            <p class="card-text"><?php echo $a['alamat'];?></p>
        <?php endforeach;?>
        <?php endif;?>.
    <a href="<?= base_url("Region/editContacts/");?><?= $a['id'];?>" class="btn btn-warning">Edit</a>
  </div>
</div>