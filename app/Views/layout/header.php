<div id="header-fix" class="header fixed-top">
    <div class="site-width">
        <nav class="navbar navbar-expand-lg  p-0">
            <div class="navbar-header  h-100 h4 mb-0 align-self-center logo-bar text-left">
                <a href="<?= base_url('/') ?>" class="horizontal-logo text-left">
                    <img src="<?= base_url('public/dist/images/trash32.png') ?>">
                    <span class="h6 font-weight-bold align-self-center mb-0 ml-auto">Smart Dustbin</span>
                </a>
            </div>
            <div class="navbar-header h4 mb-0 text-center h-100 collapse-menu-bar">
                <a href="#" class="sidebarCollapse" id="collapse"><i class="icon-menu"></i></a>
            </div>

        </nav>
    </div>
</div>

<!-- Start - Sidebar Menu -->
<div class="sidebar">
    <div class="site-width">
        <!-- START: Menu-->
        <ul id="side-menu" class="sidebar-menu">
            <li class="dropdown active"><a href="#"><i class="icon-home mr-1"></i> Dashboard</a>
                <ul>
                    <li class=""><a href="<?= base_url('/') ?>"><i class="icon-home"></i> Dashboard</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#"><i class="icon-organization mr-1"></i> Data</a>
                <ul>
                    <li><a href="<?= base_url('grafik') ?>"><i class="icon-graph"></i> Grafik</a></li>
                </ul>
            </li>
            <!-- <li class="dropdown active"><a href="#"><i class="icon-notebook mr-1"></i> Laporan</a>
                <ul>
                    <li><a href="<?= base_url('laporan_organik') ?>"><i class="icon-doc"></i> Lap. Sampah Organik</a></li>
                    <li><a href="<?= base_url('laporan_anorganik') ?>"><i class="icon-doc"></i> Lap. Sampah Anorganik</a></li>
                </ul>
            </li> -->
        </ul>
        <!-- END: Menu-->
        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0 ml-auto">
            <li class="breadcrumb-item"><a href="#">Application</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
</div>
<!-- End - Sidebar Menu -->

