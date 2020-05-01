<?=$this->session->flashdata('notif');?>

<button class="btn_produk"><a href="<?= base_url('Cluster/');?>addMsisdn">Tambah MSISDN</a></button>
<div class="container">
            <h3>Report Sheet</h3>
            <table id="tblMsisdn" width="100%">
            <thead>
                <tr>
                    <th scope="col">Msisdn</th>
                    <th scope="col">Cluster</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            </table>
</div>