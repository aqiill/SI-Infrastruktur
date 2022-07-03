    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= strtoupper($title); ?>
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

                <button type="button" class="btn btn-primary" style="margin-bottom: 5px;" data-toggle="modal"
                    data-target="#modal-default">
                    Tambah Data
                </button>
            </div>
            <div class="col-xs-12">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- Button trigger modal -->
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($users as $value) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= ucwords($value->nama_user); ?></td>
                                    <td><?= $value->email_user ?></td>
                                    <td><img src="https://www.gravatar.com/avatar/<?= md5($value->email_user); ?>?d=mm"
                                            alt=""></td>
                                    <td>
                                        <a href="<?= base_url('master/reset/' . $value->id_user) ?>"
                                            class="btn btn-warning"
                                            onclick="return confirm('Yakin ingin melakukan reset password <?= $value->nama_user; ?>')">Reset
                                            Password</a>
                                        <a href="<?= base_url('master/hapus_user/' . $value->id_user); ?>"
                                            class="btn btn-danger btn-small"
                                            onclick="return confirm('Anda yakin menghapus data user <?= ucwords($value->nama_user) ?>?')">Hapus</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Data</h4>
                </div>
                <div class="modal-body">

                    <form role="form" method="POST" action="<?= base_url('master/tambah_user') ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="user">Nama User</label>
                                <input type="text" name="nama_user" class="form-control" id="user"
                                    placeholder="Masukkan nama" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email User</label>
                                <input type="email" name="email_user" class="form-control" id="email"
                                    placeholder="Masukkan email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Masukkan password" required>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-block">Simpan Data</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>