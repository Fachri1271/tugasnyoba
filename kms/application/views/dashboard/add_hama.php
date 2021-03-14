<div class="block">
    <!-- Horizontal Form Title -->
    <div class="block-title">
        <div class="block-options pull-right">
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
        </div>
        <h2><strong>Horizontal</strong> Form</h2>
    </div>
    <!-- END Horizontal Form Title -->

    <!-- Horizontal Form Content -->
    <?php echo validation_errors('<div class="alert alert-info alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h4><i class="fa fa-info-circle"></i> Info</h4> Today is a nice <a href="javascript:void(0)" class="alert-link">day</a>!
                                    </div>', '</h4></div>');
    if (isset($error_upload)) {
        echo '<div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="fa fa-info-circle"></i> Info</h4> Today is a nice <a href="javascript:void(0)" class="alert-link">day</a>!
        </div>' . $error_upload . '</h4></div>';
    }
    ?>

    <form action="<?= site_url('hama/add') ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data" />
    <div class=" form-group">
        <label class="col-md-3 control-label" for="example-hf-email">Nama Hama & Penyakit</label>
        <div class="col-md-9">
            <input type="text" id="example-hf-email" name="nama" class="form-control" value="<?= set_value('nama') ?>" placeholder="Masukkan Nama Hama & Penyakit..">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="example-hf-password">Nama Latin</label>
        <div class="col-md-9">
            <input type="text" id="example-hf-password" name="nama_latin" value="<?= set_value('nama_latin') ?>" class="form-control" placeholder="Enter Password..">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="example-hf-password">Nama Daerah</label>
        <div class="col-md-9">
            <input type="text" id="example-hf-password" name="nama_daerah" value="<?= set_value('nama_daerah') ?>" class="form-control" placeholder="Enter Password..">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-14">
            <div class="form-group">
                <label class="col-md-3 control-label" for="example-hf-password" required>Gambar</label>
                <div class="col-md-4">
                    <input type="file" name="gambar" class="form-control" id="preview_gambar">
                </div>
                <div class="col-md-4">
                    <img src="<?= base_url('assets/gambar/hama/') ?>" id="gambar_load" width="300px" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="example-textarea-input">Deskripsi</label>
        <div class="col-md-9">
            <textarea id="example-textarea-input" name="deskripsi" cols="30" rows="10" value="<?= set_value('deskripsi') ?>" class="form-control" placeholder="Content.."> </textarea>
        </div>
    </div>

    <div class="form-group ">
        <div class="col-md-9 col-md-offset-3">
            <button type="submit" name=" submit" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Simpan</button>
            <a href="<?= base_url('hama/hama') ?>" class="btn btn-sm btn-warning">Kembali </a>
        </div>
    </div>
    </form>
    <!-- END Horizontal Form Content -->
</div>

<script>
    function bacaGambar(input) {
        if (input.file && input.file[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_gambar").change(function() {
        bacaGambar(this);
    });
</script>
<script src="<?= base_url('assets/'); ?>js/vendor/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/vendor/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/plugins.js"></script>
<script src="<?= base_url('assets/'); ?>js/app.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="<?= base_url('assets/'); ?>js/pages/formsGeneral.js"></script>
<script>
    $(function() {
        FormsGeneral.init();
    });
</script>