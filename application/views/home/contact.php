<div class="container">
    <h3>Alamat Kantor</h3>
    <?php if(empty($alamat)):?>
    <p>Kosong</p>
    <?php else:?>
    <?php foreach($alamat as $a):?>
    <p><?= $a['alamat'];?></p>
    <?php endforeach;?>
    <?php endif;?>
    </div>
