<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->

    <ul class="breadcrumb breadcrumb-top">
        <li>User</li>
        <li><a href="">Hama</a></li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <div class="block-options pull-right">

                <a href="<?= base_url('hama/add_hama') ?>" class="btn btn-sm btn-danger">Tambah</a>
            </div>
            <h2><strong>Tabel Hama Dan Penyakit</strong> </h2>
        </div>



        <p><a href="https://datatables.net/" target="_blank"></a></p>
        <?php
        if ($this->session->flashdata('pesan')) {
            echo ' ';
            echo $this->session->flashdata('pesan');
            echo '';
        }


        ?>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                <thead class="text-center">
                    <tr>
                        <th class="text-center">NO</th>
                        <th>Nama Hama</th>
                        <th>Nama Latin (Hama&Penyakit)</th>
                        <th>Nama Daerah</th>
                        <th>gambar</th>
                        <th>Deskripsi</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($hama_penyakit as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++;  ?></td>
                            <td class="text-center"><?= $value->nama ?></td>
                            <td class="text-center"><?= $value->nama_latin ?></td>
                            <td class="text-center"><?= $value->nama_daerah ?></td>
                            <td class="text-center"><img src="<?= base_url('assets/gambar/hama/' . $value->gambar) ?>" width="100px"></td>
                            <td class="text-center"><?= $value->deskripsi ?></td>
                            <td class="text-center">
                                <div class="card-tools">

                                    <a href="<?= base_url('hama/edit_hama/' . $value->id_hamapenyakit) ?>" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?= $value->id_hamapenyakit ?>" title=" Delete"><i class=" fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->



<!-- Button trigger modal -->
<!-- Modal delete -->
<?php foreach ($hama_penyakit as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_hamapenyakit; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="alert alert-warning alert-dismissable">

                        <h4><i class="fa fa-exclamation-circle"></i> Warning</h4>Apakah Anda Yakin Menghapus <a href="javascript:void(0)" class="alert-link">Data ! <?= $value->nama ?> </a>
                    </div>
                    <!-- Form Validation Example Content -->
                    <form id="form-validation" action="page_forms_validation.html" method="post" class="form-horizontal form-bordered">

                        <div class="form-group form-actions">
                            <div class="col-md-8 col-md-offset-4">
                                <a href="<?= base_url('Hama/delete/' . $value->id_hamapenyakit) ?>" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Delete</a>
                                <button type="button" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Close</button>

                            </div>
                        </div>
                    </form>
                    <!-- END Form Validation Example Content -->

                </div>

            </div>

        </div>
    </div>
<?php } ?>


<script src="<?= base_url('assets/'); ?>js/vendor/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/vendor/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/plugins.js"></script>
<script src="<?= base_url('assets/'); ?>js/app.js"></script>
<!-- Load and execute javascript code used only in this page -->
<script src="<?= base_url('assets/'); ?>js/pages/tablesDatatables.js"></script>
<script>
    $(function() {
        TablesDatatables.init();
    });
</script>