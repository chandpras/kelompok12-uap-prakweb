<!DOCTYPE html>
<html lang="en">
<head>
    <title>List Lowongan</title>
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
                    <a href="<?= base_url('/company') ?>" class="nav-item nav-link">Home</a>
                </div>
                <a href="<?= base_url('logout') ?>" class="btn btn-primary py-2 px-4 ms-3">Logout</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Profile Card Starts -->
    <div class="bg-header-sec py-5">
    </div>

  <!-- Profile Card Ends -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mt-5">
                <div class="mb-3 ">
                    <h3 class="card-title">List Lowongan Terbuka</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="py-5">
                    <div class="table-responsive">
                        <table class="table project-list-table table-nowrap align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul Pekerjaan</th>
                                    <th scope="col">Posisi</th>
                                    <th scope="col">Tipe Pekerjaan</th>
                                    <th scope="col">Gaji</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($lowongan as $item): ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td>
                                    <h6>
                                        <?= $item->judul_pekerjaan ?>
                                    </h6>
                                    </td>
                                    
                                    <td>
                                    <h6>
                                        <?= $item->posisi_lowongan ?>
                                    </td>

                                    <td>
                                    <h6>
                                        <?= $item->tipe_pekerjaan ?>
                                    </h6>
                                    </td>

                                    <td>
                                    <h6>
                                        <?= $item->gaji_pekerjaan ?>
                                    </h6>
                                    </td>

                                    <td>
                                    <h6>
                                        <?= $item->nama_lokasi ?>
                                    </h6>
                                    </td>

                                    <td>
                                        <form action="<?= base_url('/delete-lowongan/' . $item->vacid) ?>" method="post">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <?= csrf_field() ?>
                                            <button type="submit" onclick="alert('Anda yakin ingin menghapus lowongan tersebut?')" class="btn-primary">Delete</button>
                                            
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                                <div class="row">
                                  <div class="col-sm-12">
                                        <a href="<?= base_url('/create-lowongan' )?>" class="btn btn-primary" >Tambah Data</a>
                                  </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

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