<h1><?= $heading;?></h1>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Table Report</h5>
        <p class="card-text">Option untuk melihat tabel record total pesanan tiap propinsi berdasarkan cluster</p>
        <a href="<?= base_url("Region/report");?>" class="btn btn-warning">Table Report </a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Print Report</h5>
        <p class="card-text">Option untuk melakukan unduhan dari tabel report</p>
        <a href="<?= base_url("Region/pushReport");?>" class="btn btn-warning">Print Report</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">PIC Region</h5>
        <p class="card-text">Tambah/edit/hapus akun PIC region</p>
        <a href="<?= base_url("Region/pic");?>" class="btn btn-warning">PIC Region</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Produk</h5>
        <p class="card-text">Tambah produk baru</p>
        <a href="<?= base_url("Region/produk");?>" class="btn btn-warning">Produk</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
   <div class="card">
     <div class="card-body">
       <h5 class="card-title">Log Out</h5>
       <p class="card-text">Keluar dari session</p>
       <a href="<?= base_url("Region/logOut");?>" class="btn btn-warning">Logout</a>
     </div>
   </div>
 </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Visitors Today</h5>
        <p class="card-text"><?=$visitortoday?></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Total Visitor</h5>
        <p class="card-text"><?= $totalvisitor?></p>
      </div>
    </div>
  </div>  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Visitor Online</h5>
        <p class="card-text"><?= $onlinevisitor?></p>
      </div>
    </div>
  </div> 

</div>