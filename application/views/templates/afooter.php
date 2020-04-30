</div>
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
<script src="<?= base_url('assets/');?>js/datatables.js">   </script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
<!-- <script type="text/javascript">
var save_method; //for save method string
var table;
$(document).ready(function() {
    //database
    table = $('#mytable').DataTable({
        "bProcessing":true,
        "bServerSide":true,
        "sPaginationType":"full_numbers",
        "bFilter":true,
        "sServerMethod":"POST",
        "sAjaxSource":"<?= base_url('CLuster/getAllReport');?>",
        "iDisplayLength":2,
        "aLengthMenu":[[5,10,15,20,50,100,-1],[5,10,15,20,50,100,"All"]],
        "sEcho":1,
        // "columns":[
        //     {data:"nama_pelanggan"},
        //     {data:"no_wa"},
        //     {data:"produk"},
        //     {data:"msisdn"},
        //     {
        //         "data":null,
        //         "defaultContent":"<button>Edit</button>",
        //         "targets":-1,   
        //     }
        // ],
        // "aoColumns":[
        //     {"bSearchable":false,"bSortable":false,"bVisible":false}
        // ],
        'fnServerData':function(sSource,aoData,fnCallback){
            $.ajax({
                'dataType':'json',
                'type':'POST',
                'url':sSource,
                'data':aoData,
                'success':fnCallback
            })
        }
    });
});
</script> -->
<script type="text/javascript">
$(document).ready(function(){
    $('#propinsi').change(function(){
        var propinsi = $(this).val();
        $.ajax({
            url:'<?= base_url("Cluster/get_cluster")?>',
            method:'POST',
            data:{propinsi:propinsi},
            dataType:'json',
            success:function(response){
                $('#cluster').find('option').not(':first').remove();
                $.each(response, function(index,data){
                    $('#cluster').append('<option value="'+data['cluster']+'">'+data['kota']+'</option>');
                });
            }
        });
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#propinsi').change(function(){
        var propinsi = $(this).val();
        $.ajax({
            url:'<?= base_url("Region/get_cluster")?>',
            method:'POST',
            data:{propinsi:propinsi},
            dataType:'json',
            success:function(response){
                $('#cluster').find('option').not(':first').remove();
                $.each(response, function(index,data){
                    $('#cluster').append('<option value="'+data['cluster']+'">'+data['kota']+'</option>');
                });
            }
        });
    });
});
</script>
<script type="text/javascript">
       $('#mytable').DataTable({
           "processing":true,
           "serverSide":true,

           "language":{
               "emptyTable":"Data Kosong"
           }
           "ajax":{
               url:'<?= base_url('Cluster/get_report');?>',
               dataSrc: function(json){
                   if(typeof json =="object"){
                       return json
                   }else{
                       return([])
                   }
               }        
            },
       }).('xhr');
    });
</script>
</body>
</html>