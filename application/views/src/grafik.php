<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto">
                        <h4 class="mb-0">Grafik Sampah</h4>
                        <p>Grafik Monitoring Sampah</p>
                    </div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('grafik') ?>">Grafik</a></li>
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
        ?>
        <div class="row">
            <!-- Grafik Sampah Organik -->
            <!-- Grafik Mingguan -->
            <div class="col-md-6 col-lg-6 mt-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="card-title">Grafik Minggu Ini Sampah Organik</h6>
                    </div>
                    <div class="card-body text-center">
                        <canvas id="grafik-mingguan-organik"></canvas>
                    </div>
                </div>
            </div>

            <!-- Grafik Bulanan -->
            <div class="col-md-6 col-lg-6 mt-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="card-title">Grafik Bulan .. Sampah Organik</h6>
                    </div>
                    <div class="card-body text-center">
                        <canvas id="grafik-bulanan-organik"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- Grafik Sampah Anorganik -->
                        <!-- Grafik Mingguan -->
                        <div class="col-md-6 col-lg-6 mt-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="card-title">Grafik Minggu Ini Sampah Anorganik</h6>
                    </div>
                    <div class="card-body text-center">
                        <canvas id="grafik-mingguan-anorganik"></canvas>
                    </div>
                </div>
            </div>

            <!-- Grafik Bulanan -->
            <div class="col-md-6 col-lg-6 mt-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="card-title">Grafik Bulan .. Sampah Anorganik</h6>
                    </div>
                    <div class="card-body text-center">
                        <canvas id="grafik-bulanan-anorganik"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Card DATA-->
    </div>
</main>