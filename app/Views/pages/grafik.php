<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
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
        <div class="row">
            <div class="col-md-6 col-lg-9 mt-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="card-title">Grafik Minggu Ini Sampah Organik</h6>
                    </div>
                    <div class="card-body text-center">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Grafik Bulanan -->
            <div class="col-md-6 col-lg-9 mt-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="card-title">Grafik Minggu Ini Sampah Anorganik</h6>
                    </div>
                    <div class="card-body text-center">
                        <canvas id="myGrafik"></canvas>
                    </div>
                </div>
            </div>
            <!-- <?php
            for ($i = 0; $i < 15; $i++) { ?>
                <div class="col-md-12 col-lg-12 mt-3">
                    <div class="clearfix"></div>
                </div>
            <?php } ?> -->
        </div>
        <!-- END: Card DATA-->
    </div>
</main>

<?php
foreach ($data_rekap_organik as $rs) {
    $tgl[] = $rs['tanggal'];
    $tinggi[] = $rs['tinggi'];
    $metana[] = $rs['metana'];
}
$thn = date('Y');
?>
<?php
foreach ($data_rekap_anorganik as $rsl) {
    $tg[] = $rsl['tanggal'];
    $t[] = $rsl['tinggi'];
    $m[] = $rsl['metana'];
}
$thn = date('Y');
?>

<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($tgl) ?>,
            datasets: [{
                label: 'Tinggi',
                data: <?php echo json_encode($tinggi) ?>,
                backgroundColor: [
                    'rgba(73, 211, 132, 0.5)',
                    'rgba(73, 211, 132, 0.5)',
                    'rgba(73, 211, 132, 0.5)',
                    'rgba(73, 211, 132, 0.5)',
                    'rgba(73, 211, 132, 0.5)',
                    'rgba(73, 211, 132, 0.5)',
                    'rgba(73, 211, 132, 0.5)',
                ],
                borderColor: [
                    'rgba(73, 211, 132, 1)',
                    'rgba(73, 211, 132, 1)',
                    'rgba(73, 211, 132, 1)',
                    'rgba(73, 211, 132, 1)',
                    'rgba(73, 211, 132, 1)',
                    'rgba(73, 211, 132, 1)',
                    'rgba(73, 211, 132, 1)',
                ],
                borderWidth: 1
            },{
                label: 'Metana',
                data: <?php echo json_encode($metana) ?>,
                backgroundColor: [
                    'rgba(16, 51, 41, 0.5)',
                    'rgba(16, 51, 41, 0.5)',
                    'rgba(16, 51, 41, 0.5)',
                    'rgba(16, 51, 41, 0.5)',
                    'rgba(16, 51, 41, 0.5)',
                    'rgba(16, 51, 41, 0.5)',
                    'rgba(16, 51, 41, 0.5)',
                ],
                borderColor: [
                    'rgba(16, 51, 41, 1)',
                    'rgba(16, 51, 41, 1)',
                    'rgba(16, 51, 41, 1)',
                    'rgba(16, 51, 41, 1)',
                    'rgba(16, 51, 41, 1)',
                    'rgba(16, 51, 41, 1)',
                    'rgba(16, 51, 41, 1)',
                ],
                borderWidth: 1
            }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });


    var ctx = document.getElementById("myGrafik").getContext('2d');
    var myGrafik = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($tg) ?>,
            datasets: [{
                label: 'Tinggi',
                data: <?php echo json_encode($t) ?>,
                backgroundColor: [
                    'rgba(220, 234, 85, 0.5)',
                    'rgba(220, 234, 85, 0.5)',
                    'rgba(220, 234, 85, 0.5)',
                    'rgba(220, 234, 85, 0.5)',
                    'rgba(220, 234, 85, 0.5)',
                    'rgba(220, 234, 85, 0.5)',
                    'rgba(220, 234, 85, 0.5)',
                ],
                borderColor: [
                    'rgba(220, 234, 85, 1)',
                    'rgba(220, 234, 85, 1)',
                    'rgba(220, 234, 85, 1)',
                    'rgba(220, 234, 85, 1)',
                    'rgba(220, 234, 85, 1)',
                    'rgba(220, 234, 85, 1)',
                    'rgba(220, 234, 85, 1)',
                ],
                borderWidth: 1
            },{
                label: 'Metana',
                data: <?php echo json_encode($m) ?>,
                backgroundColor: [
                    'rgba(128, 114, 27, 0.5)',
                    'rgba(128, 114, 27, 0.5)',
                    'rgba(128, 114, 27, 0.5)',
                    'rgba(128, 114, 27, 0.5)',
                    'rgba(128, 114, 27, 0.5)',
                    'rgba(128, 114, 27, 0.5)',
                    'rgba(128, 114, 27, 0.5)',
                ],
                borderColor: [
                    'rgba(128, 114, 27, 1)',
                    'rgba(128, 114, 27, 1)',
                    'rgba(128, 114, 27, 1)',
                    'rgba(128, 114, 27, 1)',
                    'rgba(128, 114, 27, 1)',
                    'rgba(128, 114, 27, 1)',
                    'rgba(128, 114, 27, 1)',
                ],
                borderWidth: 1
            }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<?= $this->endSection(); ?>