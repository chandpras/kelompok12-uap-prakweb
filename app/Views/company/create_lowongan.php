<!DOCTYPE html>
<html lang="en">
<head>
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

	<!-- Form Start -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Page title -->
				<div class="my-5">
				<?php 
							$auth = service('authentication');
							$current_user = $auth->user();
							$userId = $auth->id();
						?>

					<h3>Membuat Lowongan Pekerjaan </h3>
					<hr>
				</div>
				<!-- Form START -->
				<form action = "/save-lowongan" method="post"  enctype="multipart/form-data">
					<?= csrf_field() ?>
					<div class="row mb-5 gx-5">
						<!-- Contact detail -->
						<div class="col-xxl-8 mb-5 mb-xxl-0">
							<div class="bg-secondary-soft px-4 py-5 rounded">
								<div class="row g-3">
									<h4 class="mb-4 mt-0">Detail Lowongan Pekerjaan</h4>
									<!-- <input type="hidden" class="form-control" name="id_company" value= ""> -->
									<!-- Name -->
									<div class="col-md-6">
										<label for="judul_pekerjaan">Judul Pekerjaan *</label>
										<input type="text" class="form-control" name="judul_pekerjaan" value="">
									</div>
									<!-- Address -->
									<div class="col-md-6">
										<label for="posisi">Posisi atau Jabatan</label>
										<input type="text" class="form-control" name="posisi" value="">
									</div>
									<!-- Phone number -->
									<!-- Location -->
									<div class="col-md-6">
										<label for="tipe_pekerjaan">Tipe Pekerjaan *</label>
										<select class="form-control" name="tipe_pekerjaan" value="">
											<option selected disabled>Pilih Tipe Pekerjaan</option>
											<option value="1">Part Time</option>
                                            <option value="2">Full Time</option>
                                            <option value="2">Magang</option>
                                            <option value="2">Kontrak</option>
                                            <option value="2">Harian</option>
											</select>
										</div>
									<!-- Field -->
									<div class="col-md-6">
										<label for="tugas">Tugas *</label>
										<input type="text" class="form-control" name="tugas" value="">
									</div>
                                    <div class="col-md-6">
										<label for="gaji">Gaji *</label>
										<input type="text" class="form-control" name="gaji" value="">
									</div>
                                    <div class="col-md-6">
										<label for="persyaratan_kerja">Persyaratan Kerja *</label>
										<input type="text" class="form-control" name="persyaratan_kerja" value="">
									</div>
								
									<!-- Desc -->
									<div class="col-md-6">
										<label for="cv" class="form-label">CV *</label>
										<input type="text" class="form-control"  name="cv" value="">
									</div>
								</div> 
							</div>
						</div>
					</div> <!-- Row END -->

					<!-- button -->
					
					<div class="gap-3 d-md-flex justify-content-md-end text-center">
						<button type="submit" class="btn btn-primary btn-lg">Simpan</button>
					</div>
				</form> 
				<!-- Form END -->
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