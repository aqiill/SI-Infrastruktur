<header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
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

            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
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
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="<?= base_url('beranda'); ?>"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
            <li><a href="<?= base_url('beranda'); ?>"><i class="fa fa-book"></i> <span>Data Infrastruktur</span></a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Master Data</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('master/tahun'); ?>"><i class="fa fa-circle-o"></i> Tahun</a></li>
                    <li><a href="<?= base_url('master/kategori'); ?>"><i class="fa fa-circle-o"></i> Kategori</a></li>
                    <li><a href="<?= base_url('master/users'); ?>"><i class="fa fa-circle-o"></i> User</a></li>
                </ul>
            </li>
            <li class="header">SETTINGS</li>
            <li><a href="<?= base_url('settings/password'); ?>"><i class="fa fa-circle-o text-yellow"></i> <span>Ganti
                        Password</span></a></li>
            <li><a href="<?= base_url('logout'); ?>"><i class="fa fa-circle-o text-aqua"></i> <span>Logout</span></a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>