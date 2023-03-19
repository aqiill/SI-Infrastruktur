    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= strtoupper($title); ?>: <?= $cari ?>
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
                        <!-- Button trigger modal -->
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Uraian</th>
                                    <th>Sumber</th>
                                    <th>Kategori</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($hasil as $value) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= ucwords(strtolower($value->uraian)); ?></td>
                                    <td><a
                                            href="<?= base_url('infrastruktur/capaian/' . $value->id_capaian); ?>"><?= $value->sumber; ?></a>
                                    </td>
                                    <td><?= $value->nama_kategori; ?></td>
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