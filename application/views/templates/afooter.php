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
<script type="text/javascript">
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
        "sAjaxSource":"<?= base_url('Cluster/get_report');?>",
        "iDisplayLength":5,
        "aLengthMenu":[[5,10,15,20,50,100,-1],[5,10,15,20,50,100,"All"]],
        "sEcho":1,
        'fnServerData':function(sSource,aoData,fnCallback){
            $.ajax({
                'dataType':'json',
                'type':'POST',
                'url':sSource,
                'data':aoData,
                'success':fnCallback,
            });
        }
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#propinsi').change(function(){
        var propinsi = $(this).val();
        $.ajax({
            url:'<?php echo base_url()."Cluster/get_cluster";?>',
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
            url:'<?php echo base_url()."Region/get_cluster";?>',
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
  var dataTable = $('#reportTable').DataTable({
        "processing":true,
        'serverSide':true,
        "order":[],
        "searchable":true,
        "lengthMenu":[[5,10,20,50,-1],[5,10,20,50,"All"]],
        "ajax":{
            url:"<?php echo base_url().'Cluster/getReport';?>",
            type:"POST",
        },
        "columnDefs":[
            {
                "target":[0,3,4],
                "orderable":true,
            }
        ]
       });
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
  var dataTable = $('#reportTable-progress').DataTable({
        "processing":true,
        'serverSide':true,
        "order":[],
        "searchable":true,
        "lengthMenu":[[5,10,20,50,-1],[5,10,20,50,"All"]],
        "ajax":{
            url:"<?php echo base_url().'Cluster/getReportProgress';?>",
            type:"POST",
        },
        "columnDefs":[
            {
                "target":[0,3,4],
                "orderable":true,
            }
        ]
       });
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
  var dataTable = $('#reportTable-reject').DataTable({
        "processing":true,
        'serverSide':true,
        "order":[],
        "searchable":true,
        "lengthMenu":[[5,10,20,50,-1],[5,10,20,50,"All"]],
        "ajax":{
            url:"<?php echo base_url().'Cluster/getReportReject';?>",
            type:"POST",
        },
        "columnDefs":[
            {
                "target":[0,3,4],
                "orderable":true,
            }
        ]
       });
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
  var dataTable = $('#table-report').DataTable({
        "processing":true,
        'serverSide':true,
        "order":[],
        "searchable":true,
        "ajax":{
            url:"<?php echo base_url().'Region/getReport';?>",
            type:"POST",
        },
        "columnDefs":[
            {
                "target":[0,3,4],
                "orderable":true,
            }
        ]
       });
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
  var dataTable = $('#tblMsisdn').DataTable({
        "processing":true,
        'serverSide':true,
        "order":[],
        "searchable":true,
        "ajax":{
            url:"<?php echo base_url().'Cluster/getMsisdn';?>",
            type:"POST",
        },
        "columnDefs":[
            {
                "target":[0,3,4],
                "orderable":true,
            }
        ]
       });
    });
</script>
</body>
</html>