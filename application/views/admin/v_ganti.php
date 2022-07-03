    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Tables
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <?= ucwords($this->uri->segment(1)); ?></a></li>
            <li><a href="#"><?= ucwords($title); ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php if ($this->session->flashdata('gagal') != "") { ?>
                <div class="form-group has-feedback">
                    <div class="alert alert-danger" role="alert">
                        <?= $this->session->flashdata('gagal'); ?>
                    </div>
                </div>
                <?php } ?>
                <?php if ($this->session->flashdata('sukses') != "") { ?>
                <div class="form-group has-feedback">
                    <div class="alert alert-success" role="alert">
                        <?= $this->session->flashdata('sukses'); ?>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-xs-12">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?= base_url('settings/password') ?>" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" disabled value="<?= $this->session->userdata('email') ?>"
                                    class="form-control" id="username">
                            </div>
                            <div class="form-group">
                                <label for="pl">Password Lama</label>
                                <input type="password" name="password_lama" class="form-control" required id="pl">
                            </div>
                            <div class="form-group">
                                <label for="pb">Password Baru</label>
                                <input type="password" name="password_baru" class="form-control" required id="pb">
                            </div>
                            <div class="form-group">
                                <label for="pk">Konfirmasi Password</label>
                                <input type="password" name="password_konf" class="form-control" required id="pk">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>