<h1><?php echo $heading; ?></h1>
<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure alias incidunt illo quos perferendis commodi, ducimus modi atque, sequi blanditiis in! Praesentium tenetur quasi accusantium at laborum adipisci neque culpa!</p> -->
<div class="table-responsive">
				<table class="table table-bordered" id="table-report">
					<thead>
						<tr>
							<th>Cluster</th>
							<th>Order</th>
							<th>Sukses</th>
							<th>Reject</th>
							<th>Progress</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>

<h4>Report Bulan Lalu</h4>
<?php if(empty($reportBlnLalu)):?>
  <h5>Data Kosong</h5>
  <?php else:?>
<table class="table">
  <thead id="thead">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cluster</th>
      <th scope="col">Order</th>
      <th scope="col">Suksess</th>
      <th scope="col">Reject</th>
      <th scope="col">Progress</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1;?>
  <?php foreach($reportBlnLalu as $bl):?>
    <tr>
      <th scope="row"><?= $i++;?></th>
      <td><?= $bl["depo"]?></td>
      <td><?= $bl["count(nama_pelanggan)"]?></td>
      <td><?= $bl["count(sukses)"]?></td>
      <td><?= $bl["count(reject)"]?></td>
      <td><?= $bl["count(pending)"]?></td>
    </tr>
  <?php endforeach;?>
  <?php endif;?>
  </tbody>
</table>


<h4>Akumulasi Report Setiap Bulan</h4>
<?php if(empty($allReportData)):?>
  <h5>Data Kosong</h5>
  <?php else:?>
<table class="table">
  <thead id="thead">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cluster</th>
      <th scope="col">Order</th>
      <th scope="col">Suksess</th>
      <th scope="col">Reject</th>
      <th scope="col">Progress</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1;?>
  <?php foreach($allReportData as $all):?>
    <tr>
      <th scope="row"><?= $i++;?></th>
      <td><?= $all["depo"]?></td>
      <td><?= $all["count(nama_pelanggan)"]?></td>
      <td><?= $all["count(sukses)"]?></td>
      <td><?= $all["count(reject)"]?></td>
      <td><?= $all["count(pending)"]?></td>
    </tr>
  <?php endforeach;?>
  <?php endif;?>
  </tbody>
</table>
