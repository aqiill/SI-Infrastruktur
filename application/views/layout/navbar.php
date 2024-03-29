<header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url() ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>SI</b>NF</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SI</b>NFRAS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <?php if ($this->session->userdata('email') != "") { ?>

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="https://www.gravatar.com/avatar/<?= md5($this->session->userdata('email')); ?>?d=mm"
                            class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= ucwords(strtolower($this->session->userdata('nama'))); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="https://www.gravatar.com/avatar/<?= md5($this->session->userdata('email')); ?>?d=mm"
                                class="img-circle" alt="User Image">

                            <p>
                                <?= ucwords(strtolower($this->session->userdata('nama'))); ?> - Administrator
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= base_url('logout') ?>" class="btn btn-default btn-flat">Logout</a>
                            </div>
                        </li>
                    </ul>
                </li>

                <?php } ?>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <?php if ($this->session->userdata('email') != "") { ?>
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="https://www.gravatar.com/avatar/<?= md5($this->session->userdata('email')); ?>?d=mm"
                    class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= ucwords(strtolower($this->session->userdata('nama'))); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <?php } ?>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if ($this->uri->segment(1) == "beranda") {
                            echo "active";
                        } ?>"><a href="<?= base_url('beranda'); ?>"><i class="fa fa-dashboard"></i>
                    <span>Beranda</span></a></li>
            <li class="treeview <?php if ($this->uri->segment(1) == "infrastruktur" || $this->uri->segment(1) == "") {
                                    echo "active";
                                } ?>">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Data Infrastruktur</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php foreach ($menu as $value) { ?>
                    <li class="<?php if ($value->id_kategori == $this->uri->segment(3)) {
                                        echo "active";
                                    } ?>"><a
                            href="<?= base_url('infrastruktur/kategori/' . $value->id_kategori); ?>"><i
                                class="fa fa-circle-o"></i>
                            <?= ucwords($value->nama_kategori); ?></a></li>
                    <?php } ?>
                </ul>
            </li>
            <?php if ($this->session->userdata('email') != "") { ?>
            <li class="treeview <?php if ($this->uri->segment(1) == "master") {
                                        echo "active";
                                    } ?>">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Master Data</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ($this->uri->segment(2) == "tahun") {
                                        echo "active";
                                    } ?>"><a href="<?= base_url('master/tahun'); ?>"><i class="fa fa-circle-o"></i>
                            Tahun</a></li>
                    <li class="<?php if ($this->uri->segment(2) == "kategori") {
                                        echo "active";
                                    } ?>"><a href="<?= base_url('master/kategori'); ?>"><i class="fa fa-circle-o"></i>
                            Kategori</a></li>
                    <li class="<?php if ($this->uri->segment(2) == "users") {
                                        echo "active";
                                    } ?>"><a href="<?= base_url('master/users'); ?>"><i class="fa fa-circle-o"></i>
                            User</a></li>
                </ul>
            </li>
            <li class="header">SETTINGS</li>
            <li class="<?php if ($this->uri->segment(2) == "password") {
                                echo "active";
                            } ?>"><a href="<?= base_url('settings/password'); ?>"><i
                        class="fa fa-circle-o text-yellow"></i> <span>Ganti
                        Password</span></a></li>
            <li><a href="<?= base_url('logout'); ?>"><i class="fa fa-circle-o text-aqua"></i> <span>Logout</span></a>
            </li>
            <?php } else { ?>
            <li><a href="<?= base_url('login'); ?>"><i class="fa fa-circle-o text-green"></i> <span>Login</span></a>
            </li>
            <?php } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>