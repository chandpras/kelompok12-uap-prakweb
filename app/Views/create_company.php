<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= base_url("assets/css/stylecompany.css")?>">
</head>
<body>
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

				<h3>Tambah Profile <?= $current_user->username ?> </h3>
				<hr>
			</div>
			<!-- Form START -->
			<form action = "/create-company" method="POST">
				<?= csrf_field() ?>
				<div class="row mb-5 gx-5">
					<!-- Contact detail -->
					<div class="col-xxl-8 mb-5 mb-xxl-0">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
								<h4 class="mb-4 mt-0">Contact detail</h4>
								<!-- First Name -->
                                <div class="col-md-6">
									<input type="hidden" class="form-control" name="id_user" value= "<?= $userId ?>">
								</div>
								<div class="col-md-6">
									<label for="nama_perusahaan">Nama Perusahaan *</label>
									<input type="text" class="form-control" name="nama_perusahaan" value="">
								</div>
								<!-- Last name -->
								<div class="col-md-6">
									<label for="alamat_perusahaan">Alamat</label>
									<input type="text" class="form-control" name="alamat_perusahaan" value="">
								</div>
								<!-- Phone number -->
								<div class="col-md-6">
									<label for="telp_perusahaan">Nomor Telepon *</label>
									<input type="text" class="form-control" name="telp_perusahaan" value="">
								</div>
								<!-- Mobile number -->
								<div class="col-md-6">
									<label for="bidang_perusahaan">Bidang *</label>
									<input type="text" class="form-control" name="bidang_perusahaan" value="">
								</div>
                                <div class="col-md-6">
									<label for="id_lokasi">Lokasi *</label>
									<select class="form-control" name="id_lokasi" value="">
                                        <?php foreach($lokasi as $value): ?>
                                            <option value="<?= $value['id'] ?>">
                                        <?= $value['nama_lokasi']?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
								</div>
                                <div class="col-md-6">
									<label for="id_kategori">Kategori *</label>
									<select class="form-control" name="id_kategori" value="">
                                        <?php foreach($kategori as $value): ?>
                                            <option value="<?= $value['id'] ?>">
                                        <?= $value['nama_kategori']?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
								</div>
								<!-- Email -->
								<div class="col-md-6">
									<label for="deskripsi_perusahaan" class="form-label">Deskripsi *</label>
									<input type="text" class="form-control"  name="deskripsi_perusahaan">
								</div>
								
							</div> <!-- Row END -->
						</div>
					</div>
					<!-- Upload profile -->
					<div class="col-xxl-4">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
								<h4 class="mb-4 mt-0">Upload Logo Perusahaan</h4>
								<div class="text-center">
									<!-- Image upload -->
									<div class="square position-relative display-2 mb-3">
										<i class="fas fa-fw fa-user position-absolute top-50 start-50 translate-middle text-secondary"></i>
									</div>
									<!-- Button -->
									<input type="file" id="customFile" name="file" hidden="">
									<label class="btn btn-success-soft btn-block" for="customFile">Upload</label>
									<button type="button" class="btn btn-danger-soft">Hapus</button>
									<!-- Content -->
									<p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span>Ukuran Minimum 300px x 300px</p>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- Row END -->

				<!-- Social media detail -->
				<div class="row mb-5 gx-5">
					<div class="col-xxl-6 mb-5 mb-xxl-0">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
								<h4 class="mb-4 mt-0">Social media detail</h4>
								<!-- Facebook -->
								<div class="col-md-6">
									<label class="form-label"><i class="fab fa-fw fa-facebook me-2 text-facebook"></i>Facebook *</label>
									<input type="text" class="form-control" placeholder="" aria-label="Facebook" value="http://www.facebook.com">
								</div>
								<!-- Twitter -->
								<div class="col-md-6">
									<label class="form-label"><i class="fab fa-fw fa-twitter text-twitter me-2"></i>Twitter *</label>
									<input type="text" class="form-control" placeholder="" aria-label="Twitter" value="http://www.twitter.com">
								</div>
								<!-- Linkedin -->
								<div class="col-md-6">
									<label class="form-label"><i class="fab fa-fw fa-linkedin-in text-linkedin me-2"></i>Linkedin *</label>
									<input type="text" class="form-control" placeholder="" aria-label="Linkedin" value="http://www.linkedin.com">
								</div>
								<!-- Instragram -->
								<div class="col-md-6">
									<label class="form-label"><i class="fab fa-fw fa-instagram text-instagram me-2"></i>Instagram *</label>
									<input type="text" class="form-control" placeholder="" aria-label="Instragram" value="http://www.instragram.com">
								</div>
								<!-- Dribble -->
								<div class="col-md-6">
									<label class="form-label"><i class="fas fa-fw fa-basketball-ball text-dribbble me-2"></i>Dribble *</label>
									<input type="text" class="form-control" placeholder="" aria-label="Dribble" value="http://www.dribble.com">
								</div>
								<!-- Pinterest -->
								<div class="col-md-6">
									<label class="form-label"><i class="fab fa-fw fa-pinterest text-pinterest"></i>Pinterest *</label>
									<input type="text" class="form-control" placeholder="" aria-label="Pinterest" value="http://www.pinterest.com">
								</div>
							</div> <!-- Row END -->
						</div>
					</div>

				</div> <!-- Row END -->
				<!-- button -->
				<div class="gap-3 d-md-flex justify-content-md-end text-center">
					<button type="submit" class="btn btn-primary btn-lg">Tambah profile</button>
                    
				</div>
			</form> <!-- Form END -->
		</div>
	</div>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

