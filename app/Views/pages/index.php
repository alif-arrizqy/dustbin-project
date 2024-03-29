<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<meta http-equiv="refresh" content="10; url=" <?php echo $_SERVER['PHP_SELF']; ?>">
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
                                    <img class="card-img-center rounded-0" src="<?= base_url('public/dist/images/recycling-bin-green.png') ?>">
                                </div>
                                <div class="content my-3">
                                    <?php foreach ($sampah_organik->getResult() as $organik) {
                                        $tinggi_organik = $organik->tinggi;
                                        $metana_organik = $organik->metana;
                                        $status_organik = $organik->status;
                                    }

                                    // get SUM data buat rekap perhari
                                    foreach ($rekap_organik->getResult() as $rek_organik) {
                                        $rek_tinggi_organik = $rek_organik->total_tinggi;
                                        $rek_metana_organik = $rek_organik->total_metana;
                                    }

                                    // update data tinggi & metana ke tabel rekap harian organik
                                    $data_org['tinggi'] = $rek_tinggi_organik;
                                    $data_org['metana'] = $rek_metana_organik;

                                    $date = time();
                                    $tgl = date("Y-m-d", $date);
                                    $db = \Config\Database::connect();
                                    $update_org = $db->table('rekap_organik')->where('tanggal', $tgl)->update($data_org);

                                    if ($tinggi_organik != 0) { ?>
                                        <p class="mb-0 font-w-800 tx-s-12">Ketinggian Sampah : <?= $tinggi_organik ?> cm </p>
                                    <?php } else if ($tinggi_organik == 0) { ?>
                                        <p class="mb-0 font-w-800 tx-s-12">Ketinggian Sampah : 0 cm </p>
                                    <?php } else { ?>
                                        <p class="mb-0 font-w-800 tx-s-12">Ketinggian Sampah : 0 cm </p>
                                    <?php } ?>
                                    <?php if ($metana_organik != 0) { ?>
                                        <p class="mb-0 font-w-800 tx-s-12">Kadar Gas Metana : <?= $metana_organik ?> ppm </p>
                                    <?php } else if ($metana_organik == 0) { ?>
                                        <p class="mb-0 font-w-800 tx-s-12">Kadar Gas Metana : 0 ppm </p>
                                    <?php } else { ?>
                                        <p class="mb-0 font-w-800 tx-s-12">Kadar Gas Metana : 0 ppm </p>
                                    <?php } ?>
                                </div>
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
                                <?php if ($status_organik == 'penuh1') {
                                    date_default_timezone_set('Asia/Jakarta');
                                    $jam = date('H:i');
                                    if ($jam > '06:00' && $jam < '10:00') {
                                        $salam = "Selamat pagi,";
                                    } else if ($jam > '10:01' && $jam < '15:00') {
                                        $salam = "Selamat Siang,";
                                    } else if ($jam > '15:01' && $jam < '18:00') {
                                        $salam = 'Selamat sore,';
                                    } else {
                                        $salam = 'Selamat Malam,';
                                    }

                                    $date = date('d F Y') . '%0A';
                                    $token = '1810276529:AAF9dsuvZfnsCRbOErgMn9x_K2GGEmo3QBE';
                                    $message = $date . $salam . 'Mohon kepada petugas kebersihan, untuk membersihkan sampah di RT 02.  ' .
                                        ' %0AJagalah kebersihan dan Terima kasih sudah membersihkan :) ';
                                    $api = 'https://api.telegram.org/bot' . $token . '/sendMessage?chat_id=908456455&text=' . $message . '';
                                    $ch = curl_init($api);
                                    curl_setopt($ch, CURLOPT_HEADER, false);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                    curl_setopt($ch, CURLOPT_POST, 1);
                                    // curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                    $result = curl_exec($ch);
                                    curl_close($ch);
                                    // var_dump($api);

                                    // auto refresh web setiap 1 menit
                                    $url = $_SERVER['REQUEST_URI'];
                                    header("Refresh: 300; URL=$url");
                                    redirect()->to('/');
                                ?>
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
                        <h6 class="card-title">Sampah Anorganik</h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body p-4 text-center">
                            <div class="my-auto">
                                <img class="card-img-center rounded-0" src="<?= base_url('public/dist/images/recycling-bin-yellow.png') ?>">
                            </div>
                            <div class="content my-3">
                                <?php foreach ($sampah_anorganik->getResult() as $anorganik) {
                                    $tinggi_anorganik = $anorganik->tinggi;
                                    $metana_anorganik = $anorganik->metana;
                                    $status_anorganik = $anorganik->status;
                                }

                                // get SUM data buat rekap perhari
                                foreach ($rekap_organik->getResult() as $rek_organik) {
                                    $rek_tinggi_organik = $rek_organik->total_tinggi;
                                    $rek_metana_organik = $rek_organik->total_metana;
                                }

                                // update data tinggi & metana ke tabel rekap harian organik
                                $data_org['tinggi'] = $rek_tinggi_organik;
                                $data_org['metana'] = $rek_metana_organik;

                                $date = time();
                                $tgl = date("Y-m-d", $date);
                                $db = \Config\Database::connect();
                                $update_org = $db->table('rekap_anorganik')->where('tanggal', $tgl)->update($data_org);

                                if ($tinggi_anorganik != 0) { ?>
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
                            <?php if ($status_anorganik == 'penuh1') {
                                date_default_timezone_set('Asia/Jakarta');
                                $jam = date('H:i');
                                if ($jam > '06:00' && $jam < '10:00') {
                                    $salam = "Selamat pagi,";
                                } else if ($jam > '10:01' && $jam < '15:00') {
                                    $salam = "Selamat Siang,";
                                } else if ($jam > '15:01' && $jam < '18:00') {
                                    $salam = 'Selamat sore,';
                                } else {
                                    $salam = 'Selamat Malam,';
                                }

                                $date = date('d F Y') . '%0A';
                                $token = '1810276529:AAF9dsuvZfnsCRbOErgMn9x_K2GGEmo3QBE';
                                $message = $date . $salam . 'Mohon kepada petugas kebersihan, untuk membersihkan sampah di RT 02.  ' .
                                    ' %0AJagalah kebersihan dan Terima kasih sudah membersihkan :) ';
                                $api = 'https://api.telegram.org/bot' . $token . '/sendMessage?chat_id=908456455&text=' . $message . '';
                                $ch = curl_init($api);
                                curl_setopt($ch, CURLOPT_HEADER, false);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                curl_setopt($ch, CURLOPT_POST, 1);
                                // curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                $result = curl_exec($ch);
                                curl_close($ch);
                                // var_dump($api);

                                // auto refresh web setiap 1 menit
                                $url = $_SERVER['REQUEST_URI'];
                                header("Refresh: 300; URL=$url");
                                redirect()->to('/');
                            ?>
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
<?= $this->endSection(); ?>