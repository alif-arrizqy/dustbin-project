<meta http-equiv="refresh" content="10; url="<?php echo $_SERVER['PHP_SELF']; ?>">
<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto">
                        <h4 class="mb-0">Dashboard</h4>
                        <p>Welcome to admin panel monitoring system smart dustbin</p>
                    </div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        <?php
        // Data Sampah Organik
        foreach ($sampah_organik as $organik) :
            $tinggi_organik = $organik->tinggi;
            $metana_organik = $organik->metana;
            $status_organik = $organik->status;
        endforeach;

        // Data Sampah Anorganik
        foreach ($sampah_anorganik as $anorganik) :
            $tinggi_anorganik = $anorganik->tinggi;
            $metana_anorganik = $anorganik->metana;
            $status_anorganik = $anorganik->status;
        endforeach;
        ?>
        <div class="row">
            <div class="col-md-6 col-lg-6 mt-3">
                <div class="card overflow-hidden">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="card-title">Sampah Organik</h6>
                    </div>
                    <div id="div_refresh">
                        <div class="card-content">
                            <div class="card-body p-4 text-center">
                                <div class="my-auto">
                                    <img class="card-img-center rounded-0" src="<?= base_url('assets/') ?>dist/images/recycling-bin-green.png">
                                </div>
                                <div class="content my-3">
                                    <?php if ($tinggi_organik != 0) { ?>
                                        <p class="mb-0 font-w-800 tx-s-12">Ketinggian Sampah : <?= $tinggi_organik ?> cm </p>
                                    <?php } else { ?>
                                        <p class="mb-0 font-w-800 tx-s-12">Ketinggian Sampah : cm </p>
                                    <?php } ?>

                                    <?php if ($metana_organik != 0) { ?>
                                        <p class="mb-0 font-w-800 tx-s-12">Kadar Gas Metana : <?= $metana_organik ?> ppm </p>
                                    <?php } else { ?>
                                        <p class="mb-0 font-w-800 tx-s-12">Kadar Gas Metana : ppm </p>
                                    <?php } ?>
                                </div>

                                <!-- warna dari card sesuaikan sama kapasitas sampah -->
                                <?php if ($status_organik == 'sangataman') { ?>
                                    <div class="card bg-success my-6 text-left">
                                        <div class="card-body">
                                            <div class="content my-3">
                                                <div class="card-liner-content text-center">
                                                    <h2 class="card-liner-title text-white">STATUS : SANGAT AMAN </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if ($status_organik == 'aman1') { ?>
                                    <div class="card bg-primary my-6 text-left">
                                        <div class="card-body">
                                            <div class="content my-3">
                                                <div class="card-liner-content text-center">
                                                    <h2 class="card-liner-title text-white">STATUS : AMAN </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if ($status_organik == 'warning') { ?>
                                    <div class="card bg-warning my-6 text-left">
                                        <div class="card-body">
                                            <div class="content my-3">
                                                <div class="card-liner-content text-center">
                                                    <h2 class="card-liner-title text-white">STATUS : WARNING </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if ($status_organik == 'penuh1') { ?>
                                    <div class="card bg-danger my-6 text-left">
                                        <div class="card-body">
                                            <div class="content my-3">
                                                <div class="card-liner-content text-center">
                                                    <h2 class="card-liner-title text-white">STATUS : PENUH </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if ($status_organik == '') { ?>
                                    <div class="card bg-light my-6 text-left">
                                        <div class="card-body">
                                            <div class="content my-3">
                                                <div class="card-liner-content text-center">
                                                    <h2 class="card-liner-title">STATUS : KOSONG </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 mt-3">
                <div class="card overflow-hidden">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="card-title">Sampah non Organik</h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body p-4 text-center">
                            <div class="my-auto">
                                <img class="card-img-center rounded-0" src="<?= base_url('assets/') ?>dist/images/recycling-bin-yellow.png">
                            </div>
                            <div class="content my-3">
                                <?php if ($tinggi_anorganik != 0) { ?>
                                    <p class="mb-0 font-w-800 tx-s-12">Ketinggian Sampah : <?= $tinggi_anorganik ?> cm </p>
                                <?php } else { ?>
                                    <p class="mb-0 font-w-800 tx-s-12">Ketinggian Sampah : cm </p>
                                <?php } ?>

                                <?php if ($metana_anorganik != 0) { ?>
                                    <p class="mb-0 font-w-800 tx-s-12">Kadar Gas Metana : <?= $metana_anorganik ?> ppm </p>
                                <?php } else { ?>
                                    <p class="mb-0 font-w-800 tx-s-12">Kadar Gas Metana : ppm </p>
                                <?php } ?>
                            </div>
                            <!-- warna dari card sesuaikan sama kapasitas sampah -->
                            <?php if ($status_anorganik == 'sangataman') { ?>
                                <div class="card bg-success my-6 text-left">
                                    <div class="card-body">
                                        <div class="content my-3">
                                            <div class="card-liner-content text-center">
                                                <h2 class="card-liner-title text-white">STATUS : SANGAT AMAN </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($status_anorganik == 'aman1') { ?>
                                <div class="card bg-primary my-6 text-left">
                                    <div class="card-body">
                                        <div class="content my-3">
                                            <div class="card-liner-content text-center">
                                                <h2 class="card-liner-title text-white">STATUS : AMAN </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($status_anorganik == 'warning') { ?>
                                <div class="card bg-warning my-6 text-left">
                                    <div class="card-body">
                                        <div class="content my-3">
                                            <div class="card-liner-content text-center">
                                                <h2 class="card-liner-title text-white">STATUS : WARNING </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($status_anorganik == 'penuh1') { ?>
                                <div class="card bg-danger my-6 text-left">
                                    <div class="card-body">
                                        <div class="content my-3">
                                            <div class="card-liner-content text-center">
                                                <h2 class="card-liner-title text-white">STATUS : PENUH </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($status_anorganik == '') { ?>
                                <div class="card bg-light my-6 text-left">
                                    <div class="card-body">
                                        <div class="content my-3">
                                            <div class="card-liner-content text-center">
                                                <h2 class="card-liner-title">STATUS : KOSONG </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Card DATA-->
    </div>
</main>

<!-- <script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
    $(document).ready(function() {
        $("#div_refresh").load("index.php");
        setInterval(function() {
            $("#div_refresh").load("index.php");
        }, 1000);
    });
</script> -->