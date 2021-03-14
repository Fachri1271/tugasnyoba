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
            <div class="block-options pull-right">
                <button type="button" data-toggle="modal" data-target="#add" title="Tambah" class="btn btn-sm btn-danger"><i class="fas fa-plus"></i></button>
            </div>
            <h2><strong>Basic Form</strong> Elements</h2>
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
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($user as $key => $value) { ?>


                        <tr>
                            <td class="text-center"><?= $no++;  ?></td>
                            <td class="text-center"><?= $value->nama ?></td>
                            <td class="text-center"><?= $value->username ?></td>
                            <td class="text-center"><?= $value->password ?></td>
                            <td class="text-center"><?= $value->gmail_acc ?></td>
                            <td class="text-center"><?php
                                                    if ($value->id_level == 1) {
                                                        echo '<span class="badge bd-danger">Admin</span>';
                                                    } else {
                                                        echo '<span class="badge bd-succes">Kontributor</span';
                                                    }

                                                    ?></td>

                            <td class="text-center">
                                <div class="card-tools">

                                    <button type="button" data-toggle="modal" data-target="#edit<?= $value->id_user ?>" title="Edit" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?= $value->id_user ?>" title=" Delete"><i class=" fa fa-times"></i></button>
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


<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <?php
                echo form_open('user/add');
                ?>
                <!-- Form Validation Example Content -->
                <form id="form-validation" action="page_forms_validation.html" method="post" class="form-horizontal form-bordered">
                    <fieldset>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_username">Nama <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Lengkap..">
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_email">Username <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="username" name="username" class="form-control" placeholder="test@example.com">
                                    <span class="input-group-addon"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_password">Password <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Choose a crazy one..">
                                    <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_confirm_password">Email <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="email" id="gmail_acc" name="gmail_acc" class="form-control" placeholder="..and confirm it!">
                                    <span class="input-group-addon"><i class="gi gi-envelope"></i></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_confirm_password">Level User <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select name="id_level" class="form-control">

                                        <option value="1" selected>Admin</option>
                                        <option value="2">Kontributor</option>
                                        <option value="3">Validator</option>
                                        <option value="4">Operator</option>
                                        <option value="5">Sistem Administrator</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>


                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Save</button>
                            <button type="button" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Close</button>
                        </div>
                    </div>
                </form>
                <!-- END Form Validation Example Content -->

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>


<!-- Modal edit -->

<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('user/edit/' . $value->id_user);
                    ?>
                    <!-- Form Validation Example Content -->
                    <form id="form-validation" action="page_forms_validation.html" method="post" class="form-horizontal form-bordered">
                        <fieldset>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="val_username">Nama <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" id="nama" value="<?= $value->nama ?>" name="nama" class="form-control" placeholder="Nama Lengkap..">
                                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" " for=" val_email">Username <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" id="username" value="<?= $value->username ?>" name=" username" class="form-control" placeholder="Username Anda...">
                                        <span class="input-group-addon"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"" for=" val_password">Password <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="password" id="password" value="<?= $value->password  ?>" name=" password" class="form-control" placeholder="Masukkan Password">
                                        <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="val_confirm_password">Email <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="email" id="gmail_acc" value="<?= $value->gmail_acc ?>" name="gmail_acc" class="form-control" placeholder="..and confirm it!">
                                        <span class="input-group-addon"><i class="gi gi-envelope"></i></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" value="<?= $value->id_level ?>" for="val_confirm_password">Level User <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <select name="id_level" class="form-control">

                                            <option value="1" <?php if ($value->id_level == 1) {
                                                                    echo 'selected';
                                                                } ?>>Admin</option>
                                            <option value="2" <?php if ($value->id_level == 2) {
                                                                    echo 'selected';
                                                                } ?>>Kontributor</option>
                                            <option value="3" <?php if ($value->id_level == 3) {
                                                                    echo 'selected';
                                                                } ?>>Validator</option>
                                            <option value="4" <?php if ($value->id_level == 4) {
                                                                    echo 'selected';
                                                                } ?>>Operator</option>
                                            <option value="5" <?php if ($value->id_level == 5) {
                                                                    echo 'selected';
                                                                } ?>> Sistem Administrator</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <br>
                        <div class="form-group form-actions">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                <?php
                                echo form_close();
                                ?>
                            </div>
                        </div>
                    </form>
                    <!-- END Form Validation Example Content -->

                </div>

            </div>

        </div>
    </div>
<?php } ?>
<!-- Modal delete -->
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_user; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <a href="<?= base_url('user/delete/' . $value->id_user) ?>" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Delete</a>
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