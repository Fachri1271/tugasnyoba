<div class="block">
    <!-- Horizontal Form Title -->
    <div class="block-title">

        <h2><strong>Tambah Data Budidaya</strong> </h2>
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
        <label class="col-md-3 control-label" for="example-hf-email">Kategori Budidaya</label>
        <div class="col-md-9">
            <select class="form-control" id="val-kategori" name="val-kategori" required>
                <option value="">Pilih Kategori</option>
                <?php
                foreach ($thp_budidaya as $rowKat) {
                ?>
                    <option value="<?= $rowKat->id_subbudidaya; ?>"><?= ucwords($rowKat->sub_budidaya); ?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="example-textarea-input">Deskripsi</label>
        <div class="col-md-16">
            <textarea id="example-textarea-input" name="keterangan" cols="100" rows="10" value="<?= $rowKat->keterangan ?>" required class="form-control" placeholder="Content.."> </textarea>
        </div>
    </div>

    <div class="form-group ">
        <div class="col-md-20 col-md-offset-3">
            <button type="submit" name=" submit" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Simpan</button>
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
</script>