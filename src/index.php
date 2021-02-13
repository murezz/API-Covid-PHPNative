<?php

$title = 'Data Covid';

require 'layouts/header.php';

require 'layouts/navbar.php';

$url = 'https://api.kawalcorona.com/indonesia/';
$api = file_get_contents($url);
$data = json_decode($api, true);

$url2 = 'https://api.kawalcorona.com/indonesia/provinsi/';
$api2 = file_get_contents($url2);
$data2 = json_decode($api2, true);


?>


<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="img" data-aos="zoom-in">
                    <img src="../assets/img/landing.png" class="img-fluid" alt="Responsive image">
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <div class="desc mt-5">
                    <h1 class="mb-3 text-justify" data-aos="fade-down" data-aos-duration="1000">Data <span style="color: #56e0f5;">Covid 19</span> Di Indonesia</h1>
                    <div class=" row">
                        <?php foreach ($data as $row) : ?>
                            <div class="col-md-3 col-6">
                                <div class="text-warning mb-3" data-aos="fade-up" data-aos-duration="1000">
                                    <h5><?= $row['positif']; ?></h5>
                                    <span><i class="fas fa-plus"></i> Positif</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="text-success mb-3" data-aos="fade-up" data-aos-duration="1300">
                                    <h5><?= $row['sembuh']; ?></h5>
                                    <span><i class="fas fa-heartbeat"></i> Sembuh</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="text-danger mb-3" data-aos="fade-up" data-aos-duration="1600">
                                    <h5><?= $row['meninggal']; ?></h5>
                                    <span><i class="fas fa-skull-crossbones"></i> Meninggal</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div style="color: #56e0f5;" class="mb-3" data-aos="fade-up" data-aos-duration="1900">
                                    <h5><?= $row['dirawat']; ?></h5>
                                    <span><i class="fas fa-procedures"></i> Dirawat</span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a href="https://kawalcorona.com/api/" class="btn shadow text-light" style="background-color: #56e0f5;" data-aos="zoom-in" data-aos-duration="2000">
                        Lihat Api covid
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container">
    <h2 class="text-center" data-aos="fade-up" data-aos-duration="1000">Data Per Provinsi</h2>
    <hr>
    <div class="row">
        <?php foreach ($data2 as $rows) : ?>
            <div class="col-md-4 col-12">
                <div class="card mb-3 shadow-sm" data-aos="fade-up" data-aos-duration="1500">
                    <div class="card-header text-light font-weight-bold" style="background-color: #56e0f5;"><?= $rows['attributes']['Provinsi']; ?></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="text-warning"><?= $rows['attributes']['Kasus_Posi']; ?></span>
                                <p>Positif</p>
                            </div>
                            <div class="col">
                                <span class="text-success"><?= $rows['attributes']['Kasus_Semb']; ?></span>
                                <p>Sembuh</p>
                            </div>
                            <div class="col">
                                <span class="text-danger"> <?= $rows['attributes']['Kasus_Meni']; ?></span>
                                <p>Meninggal</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<footer style="background-color:#636363;" class="py-3 text-light">
    <div class="text-center">
        <span>&copy; <?php echo date('Y'); ?> -Rejakartans</span>
    </div>
</footer>


<?php require 'layouts/footer.php'; ?>