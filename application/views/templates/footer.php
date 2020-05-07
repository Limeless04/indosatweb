</div>
<!-- Compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?= base_url('assets/');?>js/jquery.js">   </script>
<script src="<?= base_url('assets/');?>js/popper.min.js">   </script>
<script src="<?= base_url('assets/');?>js/bootstrap.js">   </script>
<script src="<?= base_url('assets/');?>js/sidebar.js">   </script>
<script type="text/javascript">
$(document).ready(function(){
    $('#depo').change(function(){
        var depo = $(this).val();
        $.ajax({
            url:'<?php echo base_url("Beli/get_msisdn");?>',
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
<script type="text/javascript">
$(document).ready(function(){
    $('#nama_produk').change(function(){
        var nama_produk = $(this).val();
        $.ajax({
            url:'<?php echo base_url("Home/get_produk");?>',
            method:'POST',
            data:{nama_produk:nama_produk},
            dataType:'json',
            success:function(response){
                $('#harga_produk').find('option').remove();
                $('#produk_desc').find('option').remove();
                $('#video_produk').find('option').remove();
                $.each(response, function(index,data){
                    $('#harga_produk').append('<option value="'+data['harga']+'">'+data['harga']+'</option>');
                    $('#produk_desc').val(data['deskripsi']);
                    $('#gambar_produk').prepend('<img src="../assets/img/produk/'+data['gambar']+'" height="240px" width="10px">');
                    $('#video_produk').prepend(data['url_video']);
                });
            }
        });
    });
});
</script>
<script type="text/javascript">
    const flashData = $('.flash-data').data('flashdata');
    if(flashData){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: flashData,
            });
    }
</script>
<script type="text/javascript">
    const sukses = $('.sukses').data('sukses');
    if(sukses){
        Swal.fire({
            icon: 'sukses',
            title: 'Selamat!',
            html: sukses,
            imageUrl: '<?= base_url('Claim/get_gambar');?>',
            imageHeight: 400,
            });
    }
</script>
</body>

</html>