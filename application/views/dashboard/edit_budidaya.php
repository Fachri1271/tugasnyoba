<div class="block">
    <!-- Horizontal Form Title -->
    <div class="block-title">

        <h2><strong>Edit Data Budidaya</strong> </h2>
    </div>
    <!-- END Horizontal Form Title -->

    <!-- Horizontal Form Content -->

    <?php
    //noftifikasi form kosong
    echo validation_errors('<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="fa fa-exclamation-circle"></i> Warning</h4> <a href="javascript:void(0)" class="alert-link"></a>', '</div>');
    //notifikasi gagal upload gambar
    if (isset($error_upload)) {
        echo '<div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="fa fa-exclamation-circle"></i> Warning</h4> <a href="javascript:void(0)" class="alert-link"></a>' . $error_upload . '</div>';
    }

    echo form_open_multipart('Budidaya_tan/add_budidaya') ?>

    <div class=" form-group">
        <label class="col-md-3 control-label" for="example-hf-email">Thp Budidaya</label>
        <div class="col-md-9">
            <?php 
				echo form_dropdown('val-thpbudidaya', $thp_budidaya, (!empty($dta) ? $dta->id_thpbudidaya : ''), 'class="form-control" id="val-thpbudidaya" onchange="thpbudidaya(\'val-thpbudidaya\',\'val-subthpbudidaya\');"'); 
			?>
        </div>
    </div>

	<div class=" form-group">
        <label class="col-md-3 control-label" for="example-hf-email">Thp Budidaya</label>
        <div class="col-md-9">
            <?php
				if (!empty($dta)) 
                {
                    $sub = $subthpbudidaya;
                }
                else
                {
                    $sub = array('' => '-- Pilih Sub THP Budidaya --');    
                }

				echo form_dropdown('val-subthpbudidaya', $sub, (!empty($dta) ? $dta->id_subthpbudidaya : ''), 'class="form-control" id="val-subthpbudidaya"'); 
			?>
        </div>
    </div>
<?php
            
?>
<div class="form-group">
    <label class="col-md-3 control-label" for="example-textarea-input">Deskripsi</label>
            <div class="col-md-16">
                <textarea id="example-textarea-input" name="keterangan" cols="100" rows="10" value="<?php echo (!empty($dta) ? $dta->id_thpbudidaya : '') ?>" required class="form-control" placeholder="Content.."> </textarea>
            </div>
</div>

<div class="form-group ">
    <div class="col-md-20 col-md-offset-3">
        <button type="submit" name="submit" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Simpan</button>
        <a href="<?= base_url('Budidaya_tan/tampil_budidaya') ?>" class="btn btn-sm btn-warning">Kembali </a>
    </div>
</div>
<?php form_close() ?>
<!-- END Horizontal Form Content -->
</div>


<script src="<?= base_url('assets/'); ?>js/vendor/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/vendor/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/plugins.js"></script>
<script src="<?= base_url('assets/'); ?>js/app.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="<?= base_url('assets/'); ?>js/pages/formsGeneral.js"></script>
<script>
    $(function() {
        Login.init();
    });

	function thpbudidaya(id, childId) {
        $.ajax({
            url:'<?php echo base_url('Budidaya_tan/get_sub'); ?>',
            type:'post',
            data:{val:$('#'+id).val()},
            success:function(data){
                data = JSON.parse(data);
                var content = '<option value="" selected="selected">- Pilih Sub THP Budidaya -</option>';
                $.each(data,function(key, val){
                    content += '<option value="' + val.kab_id + '">' + val.kab_nama + '</option>';
                });
                $('#' + childId).html(content);
            },
            beforesend:function(){
                $('#loadprov').html('<img width="100%" src="<?php echo base_url('assets/images/load.gif') ?>" />');
            },
            error:function(){
            }
        });
    }
</script>
