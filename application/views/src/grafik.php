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

<script>
    var primarycolor = getComputedStyle(document.body).getPropertyValue('--primarycolor');
    var bordercolor = getComputedStyle(document.body).getPropertyValue('--bordercolor');
    var bodycolor = getComputedStyle(document.body).getPropertyValue('--bodycolor');

    var options = {
        responsive: true,
        legend: {
            position: 'top',
            labels: {
                fontColor: bodycolor
            }
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    display: true,
                    color: bordercolor,
                    zeroLineColor: bordercolor
                },
                ticks: {
                    fontColor: bodycolor,

                },
            }],
            yAxes: [{
                display: true,
                gridLines: {
                    display: true,
                    color: bordercolor,
                    zeroLineColor: bordercolor
                },
                ticks: {
                    fontColor: bodycolor,

                }
            }]
        }
    };

    window.chartColors = {
        red: 'rgb(30, 61, 115)',
        orange: 'rgb(23, 162, 184)',
        yellow: 'rgb(30, 224, 172)',
        green: 'rgb(75, 192, 192)',
        blue: 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey: 'rgb(201, 203, 207)'
    };
    var color = Chart.helpers.color;

    
    /////////////////////////////////////////// Sampah Organik ///////////////////////////////////////////////////
    var barChartDataMingguanOrganik = {
        labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
        datasets: [{
            label: 'Tinggi Sampah',
            backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: [35, 60, 10, 30, 25, 90, 70]

        }, {
            label: 'Gas Metana',
            backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
            borderColor: window.chartColors.blue,
            borderWidth: 1,
            data: [70, 55, 90, 10, 25, 70, 40]
        }]

    };

    var barChartDataBulananOrganik = {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: 'Tinggi Sampah',
            backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: [35, 60, 10, 30, 25, 90, 70, 20, 30, 23, 34, 11]

        }, {
            label: 'Gas Metana',
            backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
            borderColor: window.chartColors.blue,
            borderWidth: 1,
            data: [70, 55, 90, 90, 25, 70, 40, 22, 35, 45, 11, 30]
        }]

    };

    var grafik_mingguan_organik = document.getElementById("grafik-mingguan-organik");
    if (grafik_mingguan_organik) {
        var ctx = document.getElementById('grafik-mingguan-organik').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            maintainAspectRatio: false,
            responsive: true,
            data: barChartDataMingguanOrganik,
            options
        });


    }

    var grafik_bulanan_organik = document.getElementById("grafik-bulanan-organik");
    if (grafik_bulanan_organik) {
        var ctx = document.getElementById('grafik-bulanan-organik').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            maintainAspectRatio: false,
            responsive: true,
            data: barChartDataBulananOrganik,
            options
        });


    }


    /////////////////////////////////////////// Sampah Non Organik ///////////////////////////////////////////////////
    var barChartDataMingguanAnorganik = {
        labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
        datasets: [{
            label: 'Tinggi Sampah',
            backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: [35, 60, 10, 30, 25, 90, 70]

        }, {
            label: 'Gas Metana',
            backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
            borderColor: window.chartColors.blue,
            borderWidth: 1,
            data: [70, 55, 90, 10, 25, 70, 40]
        }]

    };

    var barChartDataBulananAnorganik = {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: 'Tinggi Sampah',
            backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: [35, 60, 10, 30, 25, 90, 70, 20, 30, 23, 34, 11]

        }, {
            label: 'Gas Metana',
            backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
            borderColor: window.chartColors.blue,
            borderWidth: 1,
            data: [70, 55, 90, 90, 25, 70, 40, 22, 35, 45, 11, 30]
        }]

    };

    var grafik_mingguan_anorganik = document.getElementById("grafik-mingguan-anorganik");
    if (grafik_mingguan_anorganik) {
        var ctx = document.getElementById('grafik-mingguan-anorganik').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            maintainAspectRatio: false,
            responsive: true,
            data: barChartDataMingguanAnorganik,
            options
        });


    }

    var grafik_bulanan_anorganik = document.getElementById("grafik-bulanan-anorganik");
    if (grafik_bulanan_anorganik) {
        var ctx = document.getElementById('grafik-bulanan-anorganik').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            maintainAspectRatio: false,
            responsive: true,
            data: barChartDataBulananAnorganik,
            options
        });


    }
</script>