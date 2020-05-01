<p><a href="<?= base_url("Region/pushEmail");?>">Export Ke excel</a></p>

<table class="table">
  <thead>
    <tr>
        <th scope="col">Cluster</th>
        <th scope="col">Order</th>
        <th scope="col">Sukses</th> 
        <th scope="col">Reject</th>
        <th scope="col">Progress</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($data as $d):?>
          <tr>
              <td><?= $d->cluster?></td>
              <td><?= $d->order?></td>
              <td><?= $d->sukses?></td>
              <td><?= $d->reject?></td>
              <td><?= $d->progress?></td>
          </tr>
      <?php endforeach;?>
  </tbody>
</table>