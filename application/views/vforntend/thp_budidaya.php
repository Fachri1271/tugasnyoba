<div class="block full">
    <div class="block-title">
        <div class="block-options pull-right">


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


                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script src="<?= base_url('assets/'); ?>js/pages/tablesDatatables.js"></script>
<script>
    $(function() {
        TablesDatatables.init();
    });
</script>