<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../"/>
		<title>Halaman Daftar</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="{{asset('/')}}assets/internal/media/logos/favicon.ico" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{asset('/')}}assets/internal/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{asset('/')}}assets/internal/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center">
		<!--begin::Theme mode setup on page load-->
		<script>
		var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }
		</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>body { background-image: url('{{asset('/')}}assets/internal/media/auth/bg10.jpeg'); } [data-theme="dark"] body { background-image: url('{{asset('/')}}assets/internal/media/auth/bg10-dark.jpeg'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Sign-up -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Aside-->
				<div class="d-flex flex-lg-row-fluid">
					<!--begin::Content-->
					<div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
						<!--begin::Image-->
						<img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{asset('/')}}assets/internal/media/auth/agency.png" alt="" />
						<img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="assets/media/auth/internal/agency-dark.png" alt="" />
						<!--end::Image-->
						<!--begin::Title-->
						<h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">Selamatkan, Lindungi, dan Rawat</h1>
						<!--end::Title-->
						<!--begin::Text-->
						<div class="text-gray-600 fs-base text-center fw-semibold">Pada website ini, anda dapat menyelamatkan hewan peliharaan liar dengan berbagai macam cara. Ayo lindungi dan sayangi anjing dan kucing disekitar kita!</div>
						<!--end::Text-->
					</div>
					<!--end::Content-->
				</div>
				<!--begin::Aside-->
				<!--begin::Body-->
				<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
					<!--begin::Wrapper-->
					<div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
						<!--begin::Content-->
						<div class="w-md-400px">
							<!-- Step 1: Basic Details -->
							<div id="step1" style="display: block;">
								<form class="form w-100" id="step1Form">
									@csrf
									<div class="text-center mb-11">
										<h1 class="text-dark fw-bolder mb-3">Daftar</h1>
										<div class="text-gray-500 fw-semibold fs-6">Buat Akun untuk Shelter Us</div>
									</div>
									<div class="fv-row mb-3">
										<label for="" class="mb-3">Email<sup class="text-danger">*<sup></label>
										<input type="text" placeholder="Email" id="email" name="email" autocomplete="off" class="form-control bg-transparent" />
										<span class="mt-2 text-danger" id="email-error"></span>
									</div>
									<div class="fv-row mb-3">
										<label for="" class="mb-3">Nama<sup class="text-danger">*<sup></label>
										<input type="text" placeholder="Nama" id="name" name="name" autocomplete="off" class="form-control bg-transparent" />
									</div>
									<div class="fv-row mb-3" data-kt-password-meter="true">
										<!--begin::Wrapper-->
										<div class="mb-1">
											<!--begin::Input wrapper-->
											<div class="position-relative mb-3">
												<label for="" class="mb-3">Kata Sandi<sup class="text-danger">*<sup></label>
												<input class="form-control bg-transparent" type="password" placeholder="Kata Sandi" name="password" id="password" autocomplete="off" />
												<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility" style="top: 70% !important;">
													<i class="bi bi-eye-slash fs-2"></i>
													<i class="bi bi-eye fs-2 d-none"></i>
												</span>
											</div>
											<!--end::Input wrapper-->
											<!--begin::Meter-->
											<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
												<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
												<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
												<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
												<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
											</div>
											<!--end::Meter-->
										</div>
										<!--end::Wrapper-->
										<!--begin::Hint-->
										<div class="text-muted">Gunakan 8 karakter atau lebih dengan campuran huruf, angka, dan simbol.</div>
										<!--end::Hint-->
									</div>
									<div class="fv-row mb-3">
										<label for="" class="mb-3">Konfirmasi Kata Sandi<sup class="text-danger">*<sup></label>
										<input placeholder="Konfirmasi Kata Sandi" id="confirm_password" name="confirm-password" type="password" id="confirm_password" autocomplete="off" class="form-control bg-transparent" />
									</div>
									<div class="d-grid mb-10">
										<button type="button" class="btn btn-primary" onclick="goToStep2()" id="nextButton">Selanjutnya</button>
										<label for="" class="text-danger mt-2">Mohon isi semua kolom dengan <sup class="text-danger">*<sup></label>
										<br>
										<div class="text-gray-500 text-center fw-semibold fs-6">Sudah Memiliki Akun?
										<a href="{{ route('masuk') }}" class="link-primary">Masuk</a></div>
									</div>
								</form>
							</div>

							<!-- Step 2: Password Setup -->
							<div id="step2" style="display: none;">
								<form class="form w-100" id="step2Form" action="{{ route('daftar.post') }}" method="POST" enctype="multipart/form-data">
									@csrf

									<!-- Hidden fields to carry Step 1 data -->
									<input type="hidden" id="hidden_email" name="email" />
									<input type="hidden" id="hidden_name" name="name" />
									<input type="hidden" id="hidden_password" name="password" />
									<input type="hidden" id="hidden_confirm_password" name="password_confirmation" />

									<div class="text-center mb-8">
										<h1 class="text-dark fw-bolder mb-3">Data Pribadi</h1>
										<div class="text-gray-500 fw-semibold fs-6">Kelengkapan Data Pribadi</div>
									</div>
									<div class="fv-row mb-3">
										<label for="" class="mb-3">Foto<sup class="text-danger">*<sup></label>
										<input type="file" placeholder="Foto" id="foto" name="foto" class="form-control bg-transparent" accept=".jpg,.jpeg,.png,.svg,image/jpeg,image/png,image/svg+xml"/>
										<span class="mt-2 text-danger" id="foto-error"></span>
									</div>
									<div class="fv-row mb-3">
										<label for="" class="mb-3">Alamat<sup class="text-danger">*<sup></label>
										<input type="text" placeholder="Alamat" id="alamat" name="alamat" class="form-control bg-transparent" />
									</div>
									<div class="fv-row mb-3">
										<label for="" class="mb-3">Pekerjaan<sup class="text-danger">*<sup></label>
										<input type="text" placeholder="Pekerjaan" id="pekerjaan" name="pekerjaan" class="form-control bg-transparent" />
									</div>
									<div class="fv-row mb-3">
										<label for="" class="mb-3">Tanggal Lahir<sup class="text-danger">*<sup></label>
										<input type="date" placeholder="Tanggal Lahir" id="BOD" name="BOD" class="form-control bg-transparent" />
									</div>
									<div class="fv-row mb-3">
										<label for="" class="mb-3">Nomor WhatsApp<sup class="text-danger">*<sup></label>
										<input type="text" placeholder="Nomor WhatsApp" id="whatsapp" name="whatsapp" class="form-control bg-transparent" />
									</div>
									<div class="fv-row mb-3">
										<label for="" class="mb-3">Nomor Telepon<sup class="text-danger">*<sup></label>
										<input type="text" placeholder="Nomor Telepon" id="notelp" name="notelp" class="form-control bg-transparent" />
									</div>
									<div class="d-grid mb-10">
										<button type="submit" class="btn btn-primary" id="daftar">Daftar</button>
										<label for="" class="text-danger mt-2">Mohon isi semua kolom dengan <sup class="text-danger">*<sup></label>
									</div>
								</form>
							</div>
						</div>
						<!--end::Content-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-up-->
		</div>
		<script>
			function goToStep2() {
				const email = document.getElementById('email').value;
				const name = document.getElementById('name').value;
				const password = document.getElementById('password').value;
				const confirmPassword = document.getElementById('confirm_password').value;

				// Basic validation
				if (!email || !name) {
					// alert('Mohon isi semua field pada langkah ini.');
					Swal.fire({
						title: 'Gagal',
						text: 'Mohon isi semua field pada langkah ini.',
						icon: 'error',
						confirmButtonText: 'Oke'
					});
					return;
				}

				const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
				if (!emailPattern.test(email)) {
					Swal.fire({
						title: 'Gagal',
						text: 'Mohon masukkan email yang valid.',
						icon: 'error',
						confirmButtonText: 'Oke'
					});
					return;
				}

				// Password validation
				strongPasswordPattern =  /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&\[\]#^&.,;:])[A-Za-z\d@$!%*?&\[\]#^&.,;:]{8,}$/;

				if (password.length < 8) {
					event.preventDefault();
					Swal.fire({
						title: 'Gagal',
						text: 'Kata sandi harus memiliki setidaknya 8 karakter.',
						icon: 'error',
						confirmButtonText: 'Oke'
					});
					// alert('Password harus memiliki setidaknya 8 karakter.');
					return;
				}

				if(!strongPasswordPattern.test(password)){

					event.preventDefault();
					Swal.fire({
						title: 'Gagal',
						text: 'Kata sandi harus memiliki kombinasi angka, huruf, dan simbol!',
						icon: 'error',
						confirmButtonText: 'Oke'
					});
					return;
				}

				if (password !== confirmPassword) {
					event.preventDefault();
					Swal.fire({
						title: 'Gagal',
						text: 'Kata sandi dan konfirmasi kata sandi tidak sama.',
						icon: 'error',
						confirmButtonText: 'Oke'
					});
					// alert('Password dan konfirmasi password tidak sama.');
					return;
				}

				document.getElementById('hidden_email').value = email;
				document.getElementById('hidden_name').value = name;
				document.getElementById('hidden_password').value = password;
				document.getElementById('hidden_confirm_password').value = confirmPassword;

				// Hide Step 1 and show Step 2
				document.getElementById('step1').style.display = 'none';
				document.getElementById('step2').style.display = 'block';
			}

			document.getElementById('step2Form').addEventListener('submit', function(event) {
				const foto = document.getElementById('foto').value;
				const alamat = document.getElementById('alamat').value;
				const pekerjaan = document.getElementById('pekerjaan').value;
				const BOD = document.getElementById('BOD').value;
				const whatsapp = document.getElementById('whatsapp').value;
				const notelp = document.getElementById('notelp').value;

				// Basic validation
				if (!foto || !alamat || !pekerjaan || !BOD || !whatsapp || !notelp) {
					// alert('Mohon isi semua field pada langkah ini.');
					Swal.fire({
						title: 'Gagal',
						text: 'Mohon isi semua field pada langkah ini.',
						icon: 'error',
						confirmButtonText: 'Oke'
					});
					event.preventDefault();
					return;
				}

				// Validate if BOD is before today
				const today = new Date();  // Get current date
				today.setHours(0);
				today.setMinutes(0);
				today.setSeconds(0);
				const birthDate = new Date(BOD);

				// Compare BOD with current date
				if (birthDate >= today) {
					Swal.fire({
						title: 'Gagal',
						text: 'Tanggal lahir tidak bisa lebih dari hari ini.',
						icon: 'error',
						confirmButtonText: 'Oke'
					});
					event.preventDefault();  // Prevent form submission if BOD is invalid
					return;
				}
			});
		</script>

		@if (session('error'))
			<script>
				Swal.fire({
					title: 'Gagal',
					text: '{{ session('error') }}',
					icon: 'error',
					confirmButtonText: 'Oke'
				});
			</script>
		@endif
		@if (session('success'))
			<script>
				Swal.fire({
					title: 'Berhasil',
					text: '{{ session('success') }}',
					icon: 'success',
					confirmButtonText: 'Oke'
				});
			</script>
		@endif

		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{asset('/')}}assets/internal/plugins/global/plugins.bundle.js"></script>
		<script src="{{asset('/')}}assets/internal/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="{{asset('/')}}assets/internal/js/custom/authentication/sign-up/general.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
		<script>
			// Event listener to check email uniqueness as the user types
			$('#email').on('blur', function() {
				const email = $(this).val();
				
				// Check if the email is not empty
				if(email) {
					checkEmailUniqueness(email);
				}
			});

			// Function to check email uniqueness using AJAX
			function checkEmailUniqueness(email) {
				$.ajax({
					url: 'https://my.shelter-us.com/check-email', // The URL to check email uniqueness
					method: 'GET',
					data: { email: email }, // Sending email as query parameter
					success: function(response) {
						if(response.isUnique) {
							$('#email-error').text(''); // Clear any previous error messages
							$('#nextButton').prop('disabled', false);
						} else {
							$('#email-error').text('Email sudah terdaftar. Silahkan gunakan email lain atau masuk pada akun anda.');
							$('#nextButton').prop('disabled', true);
						}
					},
					error: function() {
						$('#email-error').text('Error.');
						$('#nextButton').prop('disabled', true);
					}
				});
			}
		</script>
		<script>
			// When the user selects a file
			$('#foto').on('change', function() {
				// Get the selected file
				const file = this.files[0];
				
				// Check if a file is selected
				if (file) {
					const fileType = file.type; // MIME type (e.g., image/jpeg, image/png)
					const validImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'];
					
					// Check if the file is a valid image
					if (validImageTypes.includes(fileType)) {
						$('#foto-error').text(''); // Clear any previous error messages
						$('#daftar').prop('disabled', false); // Enable the submit button
					} else {
						// Show error message if the file is not an image
						$('#foto-error').text('Mohon unggah file gambar yang valid (JPG, PNG, GIF, SVG).');
						$('#daftar').prop('disabled', true); // Disable the submit button
					}
				}
			});
		</script>
	</body>
	<!--end::Body-->
</html>