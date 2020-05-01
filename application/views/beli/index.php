
<div class="container">
    <h3 class="header_beli">Data Customer</h3>
    <form action="" method="post">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nama" name="nama_pelanggan" value="<?= set_value('nama_pelanggan');?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor WA</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="nomor_wa" name="nomor_wa" value="<?= set_value('nomor_wa');?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat Email</label>
        <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email');?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat Rumah</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="alamat_rumah" name="alamat_rumah" value="<?= set_value('alamat_rumah');?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Depo Terdekat</label>
        <div class="col-sm-10">
        <select class="form-control" id="depo" name="depo" required>
            <option>Pilih Depo Terdekat...</option>
            <?php foreach($cluster as $c):?>
            <option value="<?= $c['cluster'];?>"><?=$c['kota'];?></option>
            <?php endforeach;?>
        </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Pilih Produk</label>
        <div class="col-sm-10">
        <select class="form-control" id="produk" name="produk" value="<?= set_value('produk');?>">
            <option>Pilih Produk...</option>
            <?php foreach($produk as $p):?>
            <option><?=$p['nama_produk'];?></option>
            <?php endforeach;?>
        </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Pilih MSISDN</label>
        <div class="col-sm-10">
            <select class="form-control" id="msisdn" name="msisdn" required>
            <option value="">Pilih MSISDN...</option>
        </select>
        </div>
    </div>   
    <input type="hidden" name="pending" value="1"> 
    <button type="submit" class="btn" id="btn_submit">Submit</button>
    </form>
  </div>
  </div>
<!-- Compiled and minified JavaScript -->
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/');?>js/jquery.js">   </script>
<script src="<?= base_url('assets/');?>js/popper.min.js">   </script>
<script src="<?= base_url('assets/');?>js/bootstrap.js">   </script>
<script src="<?= base_url('assets/');?>js/sidebar.js">   </script>
<script type="text/javascript">
$(document).ready(function(){
    $('#depo').change(function(){
        var depo = $(this).val();

        $.ajax({
            url:'<?= base_url("Beli/get_msisdn")?>',
            method:'POST',
            data:{depo:depo},
            dataType:'json',
            success:function(response){
                $('#msisdn').find('option').not(':first').remove();

                $.each(response, function(index,data){
                    $('#msisdn').append('<option value="'+data['msisdn']+'">'+data['msisdn']+'</option>');
                });
            }
        });
    });
});

</script>

</body>

</html>