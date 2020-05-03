</div>
<!-- Compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/');?>js/jquery.js">   </script>
<script src="<?= base_url('assets/');?>js/popper.min.js">   </script>
<script src="<?= base_url('assets/');?>js/bootstrap.js">   </script>
<script src="<?= base_url('assets/');?>js/sidebar.js">   </script>
<!-- <script type="text/javascript">
$(document).ready(function(){
    $('#depo').change(function(){ 
        $.ajax({
            type : "POST",
            url : "<?= base_url('Beli/');?>get_msisdn",
            data : {cluster: $('#depo').val()},
            asycn: true,
            dataType : 'json',
            success: function(data){
                            let html = '';
                            let i;
                            for(i=0; i<data.length; i++){
                                html += '<option value='+data[i].msisdn+'>'+data[i].msisdn+'</option>';
                            }
                            $('#msisdn').html(html);
            },
        });
        return false;
    }); 

});
</script> -->
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

</body>

</html>