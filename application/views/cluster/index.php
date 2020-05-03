<?=$this->session->flashdata('notif');?>
<h1><?= $heading;?></h1>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Table Report</h5>
        <p class="card-text">Option untuk melihat tabel record total pesanan cluster</p>
        <a href="<?= base_url('Cluster/reportOrder');?>" class="btn btn-warning">Report </a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Tambah MSISDN</h5>
        <p class="card-text">Tambah/hapus MSISDN</p>
        <a href="<?= base_url('Cluster/msisdn');?>" class="btn btn-warning">MSISDN</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Data Akun Cluster</h5>
        <p class="card-text">Tambah/edit/hapus akun cluster</p>
        <a href="<?= base_url('Cluster/email');?>" class="btn btn-warning">Cluster</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Log Out</h5>
        <p class="card-text">Keluar dari session</p>
        <a href="<?= base_url("Cluster/logOut");?>" class="btn btn-warning">Logout</a>
      </div>
    </div>
  </div>

</div>