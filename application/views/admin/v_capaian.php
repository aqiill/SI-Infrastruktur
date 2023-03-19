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
                <?php if ($this->session->userdata('email') != "") { ?>
                <button type="button" class="btn btn-primary" style="margin-bottom: 5px;" data-toggle="modal"
                    data-target="#modal-default">
                    Tambah Data
                </button>
                <?php } ?>
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
                                    <th>Uraian</th>
                                    <th>Sumber</th>
                                    <th>Kategori</th>
                                    <?php if ($this->session->userdata('email') != "") { ?>
                                    <th>Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($capaian as $value) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= ucwords(strtolower($value->uraian)); ?></td>
                                    <td><a
                                            href="<?= base_url('infrastruktur/capaian/' . $value->id_capaian); ?>"><?= $value->sumber; ?></a>
                                    </td>
                                    <td><?= $value->nama_kategori; ?></td>
                                    <?php if ($this->session->userdata('email') != "") { ?>
                                    <td>
                                        <a href="<?= base_url('infrastruktur/hapus_capaian/' . $value->id_kategori . "/" . $value->id_capaian); ?>"
                                            class="btn btn-danger btn-small"
                                            onclick="return confirm('Anda yakin menghapus data <?= $value->uraian ?>?')">Hapus</a>
                                    </td>
                                    <?php } ?>
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

    <?php if ($this->session->userdata('email') != "") { ?>
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

                    <form role="form" method="POST"
                        action="<?= base_url('infrastruktur/tambah_capaian/' . $this->uri->segment(3)) ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="uraian">Uraian</label>
                                <textarea name="uraian" id="uraian" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="sumber">Sumber</label>
                                <textarea name="sumber" id="sumber" class="form-control" required></textarea>
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
    <?php } ?>