    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= strtoupper($title); ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <?= ucwords($this->uri->segment(1)); ?></a></li>
            <li><a href="#"><?= ucwords(strtolower($title)); ?></a></li>
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

                <button type="button" class="btn btn-primary pull-right" style="margin-bottom: 5px;" data-toggle="modal"
                    data-target="#modal-default">
                    Tambah Data
                </button>
            </div>
            <div class="col-12 col-md-6">
                <div class="box">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="box">
                    <?php if (isset($hasil_capaian[0])) { ?>
                    <div class="box-header text-center ">
                        <h1 class="box-title"><?= ucwords($hasil_capaian[0]->uraian) ?></h1><br>
                        <h1 class="box-title"><?= ucwords($hasil_capaian[0]->nama_kategori) ?></h1>
                    </div>
                    <?php } ?>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- Button trigger modal -->
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Satuan</th>
                                    <th>Capaian</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($hasil_capaian as $value) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $value->tahun; ?></td>
                                    <td><?= $value->satuan; ?></td>
                                    <td><?= $value->capaian; ?></td>
                                    <td>
                                        <a href="<?= base_url('infrastruktur/hapus_capaian/' . $value->id_capaian . '/' . $value->id_hasil_capaian); ?>"
                                            class="btn btn-danger btn-small"
                                            onclick="return confirm('Anda yakin menghapus data capaian <?= $value->capaian ?>?')">Hapus</a>
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

                    <form role="form" method="POST"
                        action="<?= base_url('infrastruktur/tambah_hasil_capaian/' . $this->uri->segment(3)) ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select required name="tahun" id="tahun" class="form-control">
                                    <option disabled selected>Pilih</option>
                                    <?php foreach ($tahun as $t) { ?>
                                    <option <?php foreach ($hasil_capaian as $c) {
                                                    if ($t->id_tahun == $c->id_tahun) {
                                                        echo "disabled";
                                                    }
                                                } ?> value="<?= $t->id_tahun ?>">
                                        <?= $t->tahun ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="capaian">Capaian</label>
                                <input type="number" step="any" name="capaian" required id="capaian"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <input type="text" id="satuan" name="satuan" required class="form-control">
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-block">Simpan
                                Data</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>