<h3 class="header_beli">Edit Statu</h3>
<div class="crud_produk">  
<form action="" method="post">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
        <select name="status" id="nama_produk" class="form-control" >
        <option value="">Pilih Status</option>
        <option value="suksess">Suksess</option>
        <option value="progress">Progress</option>
        <option value="reject">Reject</option>
        </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nama_produk" name="ket" value="<?= set_value('ket');?>" placeholder="<?= $edit['ket'];?>">
        <?= form_error('ket','<small class="text-danger pl-3">','</small>');?>
        </div>
    </div>
    <input type="hidden" name="msisdn" value="<?= $edit["msisdn"];?>">
    <input type="hidden" name="cluster" value="<?= $edit["cluster"];?>">
    <button type="submit" class="btn" id="btn_submit">Submit</button>
    </form>
</div> 
