<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->

    <ul class="breadcrumb breadcrumb-top">
        <li>User</li>
        <li><a href="">Data User</a></li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2><strong class="text-center">Datatables</strong> integration</h2>

        </div>



        <p><a href="https://datatables.net/" target="_blank">DataTables</a> is a plug-in for the Jquery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, which will add advanced interaction controls to any HTML table. It is integrated with template's design and it offers many features such as on-the-fly filtering and variable length pagination.</p>
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
                            <td class="text-center"><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="100px"></td>
                            <td class="text-center"><?= $value->deskripsi ?></td>
                            <td class="text-center">
                                <div class="card-tools">

                                    <a href="<?= base_url('hama/add_hama') ?>" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>
                                    <a href="" class="btn btn-sm btn-danger" title=" Delete"><i class=" fa fa-times"></i></a>
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