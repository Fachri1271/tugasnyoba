<div class="block">
    <!-- Horizontal Form Title -->
    <div class="block-title">

        <h2><strong>Tambah Data Hama & Penyakit</strong> </h2>
    </div>
    <!-- END Horizontal Form Title -->

    <!-- Horizontal Form Content -->

    <?= validation_errors('<div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="fa fa-exclamation-circle"></i> Warning</h4> <a href="javascript:void(0)" class="alert-link"></a>', '
    </div>'); ?>

    <?php if ($this->session->flashdata("error_upload")) : ?>
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="fa fa-exclamation-circle"></i> Warning</h4> <a href="javascript:void(0)" class="alert-link"></a><?= $this->session->flashdata("error_upload"); ?>
        </div>
    <?php endif; ?>
    <?= form_open_multipart('hama/edit_hama/' . $hama_penyakit->id_hamapenyakit) ?>


    <div class=" form-group">
        <label class="col-md-3 control-label" for="example-hf-email">Nama Hama & Penyakit</label>
        <div class="col-md-9">
            <input type="text" id="example-hf-email" name="nama" class="form-control" value="<?= $hama_penyakit->nama  ?>" placeholder="Masukkan Nama Hama & Penyakit..">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="example-hf-password">Nama Latin</label>
        <div class="col-md-9">
            <input type="text" id="example-hf-password" name="nama_latin" value="<?= $hama_penyakit->nama_latin  ?>" class="form-control" placeholder="..">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="example-hf-password">Nama Daerah</label>
        <div class="col-md-9">
            <input type="text" id="example-hf-password" name="nama_daerah" value="<?= $hama_penyakit->nama_daerah  ?>" class="form-control" placeholder="..">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-3 control-label" for="example-hf-password" required>Gambar</label>
                <div class="col-md-4">
                    <input name="photo" type="file" class="form-control" id="gambar">
                </div>
                <div class="col-md-4">
                    <img src="<?= base_url('assets/gambar/hama/') ?>" id="gambar_load" width="300px" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="example-textarea-input">Deskripsi</label>
        <div class="col-md-16">
            <textarea id="example-textarea-input" name="deskripsi" cols="100" rows="10" class="form-control" placeholder="Content.."><?= $hama_penyakit->deskripsi  ?></textarea>
        </div>
    </div>

    <div class="form-group ">
        <div class="col-md-20 col-md-offset-3">
            <button type="submit" name=" submit" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Simpan</button>
            <a href="<?= base_url('hama/hama') ?>" class="btn btn-sm btn-warning">Kembali </a>
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