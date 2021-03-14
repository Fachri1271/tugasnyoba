<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->

    <ul class="breadcrumb breadcrumb-top">
        <li>User</li>
        <li><a href="">Budidaya</a></li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <div class="block-options pull-right">

                <a href="<?= base_url('Budidaya_tan/add_budidaya') ?>" class="btn btn-sm btn-danger">Tambah</a>
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
                        <th>kategori Budidaya</th>
                        <th>Sub kategori Budidaya</th>
                        <th>Deskripsi</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($budidaya as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++;  ?></td>
                            <td class="text-center"><?= $value->id_budidaya ?></td>
                            <td class="text-center">
                                <?php foreach ($thp_budidaya as $r => $val) {
                                    if ($val->id_subbudidaya == $value->id_subbudidaya) {
                                        echo $val->sub_budidaya;
                                    }
                                } ?>
                            </td>
                            <td class="text-center"><?= $value->deskripsi ?></td>

                            <td class="text-center">
                                <div class="card-tools">

                                    <a href="<?= base_url('Budidayan_tan/edit_budidaya/' . $value->id_subbudidaya) ?>" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?= $value->id_subbudidaya ?>" title=" Delete"><i class=" fa fa-times"></i></button>
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