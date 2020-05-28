<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Export Data Report Bulan</h5>
               <p class="card-text">Option untuk mengeksport data bulan ini ke excel</p>
         <button class="btn btn-warning"><a style="text-decoration:none;color:black;" href="<?= base_url('Region/ExportExcelMonth');?>">Export To Excel (Bulan ini)</a></button>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Export Seluruh Data Report</h5>
        <p class="card-text">Option Untuk mengeksport seluruh data report ke excel</p>
        <button class="btn btn-warning"><a style="text-decoration:none;color:black;" href="<?= base_url('Region/ExportExcelAll');?>">Export To Excel (All)</a></button>
      </div>
    </div>
  </div>
  <div class="col-sm-6" style="margin-top:30px;">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Kirim Report Via Email</h5>
        <p class="card-text">Option Untuk mengirim data eksport keseluruh Akun PIC</p>
        <button class="btn btn-warning"><a style="text-decoration:none;color:black;" href="<?= base_url('Region/do_upload');?>">Push Email</a></button>
      </div>
    </div>
  </div>
  <div class="col-sm-6" style="margin-top:30px;">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Export Jawaban Quiz</h5>
        <p class="card-text">Option Untuk Mengeksport jawaban quiz</p>
        <button class="btn btn-warning"><a style="text-decoration:none;color:black;" href="<?= base_url('Region/ExportExcelJawaban');?>">Export Jawaban</a></button>
      </div>
    </div>
  </div>
</div>
<!-- <ul>
<?php if(empty($upload_data)): ?>
<?php else:?>    
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
<?php endif;?> -->
