
<button class="btn btn-primary"><a style="text-decoration:none;color:white;" href="<?= base_url('Region/ExportExcelMonth');?>">Export To Excel (Bulan ini)</a></button>

<button class="btn btn-primary"><a style="text-decoration:none;color:white;" href="<?= base_url('Region/ExportExcelAll');?>">Export To Excel (All)</a></button>

<button class="btn btn-primary"><a style="text-decoration:none;color:white;" href="<?= base_url('Region/do_upload');?>">Push Email</a></button>
<ul>
<?php if(empty($upload_data)): ?>
<?php else:?>    
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
<?php endif;?>
