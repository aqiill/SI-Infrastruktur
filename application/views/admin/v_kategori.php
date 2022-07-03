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
                                    <th>Kategori</th>
                                    <th>Display</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($kategori as $value) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= ucwords($value->nama_kategori); ?></td>
                                    <td>
                                        <?php
                                            if ($value->display == "none") { ?>
                                        <a href="<?= base_url('master/edit_status/b/' . $value->id_kategori) ?>"
                                            class="btn btn-warning"><?= ucwords($value->display); ?></a>
                                        <?php    } else { ?>
                                        <a href="<?= base_url('master/edit_status/n/' . $value->id_kategori) ?>"
                                            class="btn btn-info"><?= ucwords($value->display); ?></a>
                                        <?php    }
                                            ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('master/hapus_kategori/' . $value->id_kategori); ?>"
                                            class="btn btn-danger btn-small"
                                            onclick="return confirm('Anda yakin menghapus data kategori <?= ucwords($value->nama_kategori) ?>?')">Hapus</a>
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

                    <form role="form" method="POST" action="<?= base_url('master/tambah_kategori') ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <input type="text" name="kategori" class="form-control" id="tahun"
                                    placeholder="Masukkan Kategori" required>
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