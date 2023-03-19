<section class="content">
    <div class="row">
        <div class="col-12 col-md-6">
            <h2 class="text-center">SELAMAT DATANG DI</h2>
            <h2 class="text-center"><b>SISTEM INFORMASI INFRASTRUKTUR</b></h2>
            <div class="login-box">
                <div class="login-box-body">
                    <div class="login-logo">
                        <a href="<?= base_url(); ?>"><b>CARI DATA</b></a>
                    </div>
                    <form action="<?= base_url('infrastruktur/cari') ?>" method="post">
                        <div class="form-group has-feedback">
                            <input type="text" name="cari" class="form-control" autofocus required
                                placeholder="Cari Data...">
                        </div>
                        <!-- <div class="form-group">
                            <select name="kategori" class="form-control" required>
                                <option selected disabled>Pilih Kategori</option>
                                <?php foreach ($kategori as $vk) { ?>
                                <option value="<?= $vk->id_kategori ?>"><?= ucwords(strtolower($vk->nama_kategori)) ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="tahun" class="form-control" required>
                                <option selected disabled>Pilih Tahun</option>
                                <?php foreach ($tahun as $vt) { ?>
                                <option value="<?= $vt->id_tahun ?>"><?= ucwords(strtolower($vt->tahun)) ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div> -->
                        <div class="row">

                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary btn-block">Cari</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-12 col-md-6">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d510696.6792733382!2d100.27572527997047!3d0.029069652374352835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302aaa48eeda2d4b%3A0xe172a486dad25d91!2sKabupaten%20Lima%20Puluh%20Kota%2C%20Sumatera%20Barat!5e0!3m2!1sid!2sid!4v1656927684834!5m2!1sid!2sid"
                width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>