<!DOCTYPE html>
<html lang="en">
<head>
    <title>Info Lowongan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="<?=base_url("img/favicon.ico")?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?=base_url("assets/lib/owlcarousel/assets/owl.carousel.min.css")?>" rel="stylesheet">
    <link href="<?=base_url("assets/lib/animate/animate.min.css")?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?=base_url("assets/css/bootstrap.min.css")?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?=base_url("assets/css/style.css")?>" rel="stylesheet">
</head>
<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-5 text-light"><i class="fa fa-map-marker-alt me-3"></i>Bandar Lampung, Lampung 35141</small>
                    <small class="me-5 text-light"><i class="fa fa-phone-alt me-3"></i>+62 821-6510-0647</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-3"></i>workwave@services.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-5 py-lg-0">
            <a href="index.html" class="navbar-brand p-0">
                <h1 class="m-0"><i class="fa fa-user-tie me-2"></i>WorkWave</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="<?= base_url('/applicant') ?>" class="nav-item nav-link">Home</a>
                </div>
                <a href="<?= base_url('logout') ?>" class="btn btn-primary py-2 px-4 ms-3">Logout</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

  <!-- Profile Card Starts -->
  <?php foreach ($infovac as $item): ?>
  <div class="bg-header-sec py-5">
    <div class="container py-5">
      <div class="main-body py-5">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="candidates-profile-details text-center">
                        <img src="<?= $item->foto_perusahaan ?? base_url('assets/img/defaultimg.jpg');?>" class="img-fluid d-block mx-auto rounded-circle img-thumbnail mb-4">
                        <h4 class="text-white candidates-profile-name mb-2"><?= $item->nama_perusahaan ?></h4>
                        <p class="text-white-50 mb-2"><i class="mdi mdi-bank mr-2"></i> <?= $item->bidang_perusahaan ?></p>
                        <ul class="candidates-profile-icons list-inline mb-3">
                            <li class="list-inline-item"><a href="#" class="text-warning"><i class="mdi mdi-star"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="text-warning"><i class="mdi mdi-star"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="text-warning"><i class="mdi mdi-star"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="text-warning"><i class="mdi mdi-star"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="text-warning"><i class="mdi mdi-star"></i></a></li>
                        </ul>

                        <ul class="candidates-profile-social-icons list-inline mb-0">
                            <li class="list-inline-item"><a href="#" class=""><i class="mdi mdi-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#" class=""><i class="mdi mdi-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class=""><i class="mdi mdi-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#" class=""><i class="mdi mdi-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Profile Card Ends -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/4.9.95/css/materialdesignicons.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />


<section class="section"> 
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-dark py-3">Deskripsi Perusahaan</h3>
            <h5><?= $item->deskripsi_perusahaan ?></h5>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="job-detail mb-2">
                <hr>
                <ul class="list-inline mt-3 mb-0">
                    <li class="list-inline-item mr-3">
                        <a href="" class="text-muted f-15 mb-0"><i class="mdi mdi-map-marker mr-2"></i>3659 Turkey Pen Road Manhattan, NY 10016</a>
                    </li>

                    <li class="list-inline-item mr-3">
                        <a href="" class="text-muted f-15 mb-0"><i class="mdi mdi-web mr-2"></i>Www.webthemes.co.in</a>
                    </li>

                    <li class="list-inline-item mr-3">
                        <a href="" class="text-muted f-15 mb-0"><i class="mdi mdi-email mr-2"></i>Webthemes.ltd@gmail.com</a>
                    </li>

                    <li class="list-inline-item mr-3">
                        <a href="" class="text-muted f-15 mb-0"><i class="mdi mdi-cellphone-iphone mr-2"></i>123 456 7890</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-dark mt-4">Judul Pekerjaan</h3>
            <h5><?= $item->judul_pekerjaan ?></h5>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-dark mt-4">Posisi</h3>
            <h5><?= $item->posisi_lowongan ?></h5>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-dark mt-4">Tipe Pekerjaan</h3>
            <h5><?= $item->tipe_pekerjaan ?></h5>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-dark mt-4">Deskripsi</h3>
            <h5><?= $item->deskripsi_pekerjaan ?></h5>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-dark mt-4">Gaji</h3>
            <h5><?= $item->gaji_pekerjaan ?></h5>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-dark mt-4">Lokasi</h3>
            <h5><?= $item->nama_lokasi ?></h5>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="job-detail mt-2 p-4">
               <!-- untuk isi -->
            </div>
        </div>
    </div>
    <br>
    <a href="<?= base_url('/tambah-sublowongan/' . $item->vacid) ?>" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Daftar</a>
    <?php endforeach; ?>
</div>

</section>



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="<?=base_url("assets/lib/wow/wow.min.js")?>"></script>
    <script src="<?=base_url("assets/lib/easing/easing.min.js")?>"></script>
    <script src="<?=base_url("assets/lib/waypoints/waypoints.min.js")?>"></script>
    <script src="<?=base_url("assets/lib/counterup/counterup.min.js")?>"></script>
    <script src="<?=base_url("assets/lib/owlcarousel/owl.carousel.min.js")?>"></script>

    <!-- Template Javascript -->
    <script src="<?=base_url("assets/js/main.js")?>" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>