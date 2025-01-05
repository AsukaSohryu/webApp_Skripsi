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
	<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script>
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
						<h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">Daftarkan Dirimu Dulu Yuk!</h1>
						<!--end::Title-->
						<!--begin::Text-->
						{{-- <div class="text-gray-600 fs-base text-center fw-semibold">In this kind of post,
						<a href="#" class="opacity-75-hover text-primary me-1">the blogger</a>introduces a person they’ve interviewed
						<br />and provides some background information about
						<a href="#" class="opacity-75-hover text-primary me-1">the interviewee</a>and their
						<br />work following this is a transcript of the interview.</div> --}}
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
									<div class="fv-row mb-8">
										<input type="text" placeholder="Email" id="email" name="email" autocomplete="off" class="form-control bg-transparent" />
										<br>
										@error('email')
											<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
									<div class="fv-row mb-8">
										<input type="text" placeholder="Nama" id="name" name="name" autocomplete="off" class="form-control bg-transparent" />
										<br>
										@error('name')
											<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
									<div class="fv-row mb-8" data-kt-password-meter="true">
										<!--begin::Wrapper-->
										<div class="mb-1">
											<!--begin::Input wrapper-->
											<div class="position-relative mb-3">
												<input class="form-control bg-transparent" type="password" placeholder="Password" name="password" id="password" autocomplete="off" />
												<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
													<i class="bi bi-eye-slash fs-2"></i>
													<i class="bi bi-eye fs-2 d-none"></i>
												</span>
												<br>
												@error('password')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
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
									<div class="fv-row mb-8">
										<input placeholder="Konfirmasi Password" id="confirm_password" name="confirm-password" type="password" id="confirm_password" autocomplete="off" class="form-control bg-transparent" />
									</div>
									<div class="d-grid mb-10">
										<button type="button" class="btn btn-primary" onclick="goToStep2()">Next</button>
									</div>
								</form>
							</div>
							<div class="text-gray-500 text-center fw-semibold fs-6">Sudah Memiliki Akun?
							<a href="{{ route('masuk') }}" class="link-primary">Masuk</a></div>

							<!-- Step 2: Password Setup -->
							<div id="step2" style="display: none;">
								<form class="form w-100" id="step2Form" action="{{ route('daftar.post') }}" method="POST" enctype="multipart/form-data">
									@csrf

									<!-- Hidden fields to carry Step 1 data -->
									<input type="hidden" id="hidden_email" name="email" />
									<input type="hidden" id="hidden_name" name="name" />
									<input type="hidden" id="hidden_password" name="password" />
									<input type="hidden" id="hidden_confirm_password" name="password_confirmation" />

									<div class="text-center mb-11">
										<h1 class="text-dark fw-bolder mb-3">Data Pribadi</h1>
										<div class="text-gray-500 fw-semibold fs-6">Kelengkapan Data Pribadi</div>
									</div>
									<div class="fv-row mb-8">
										<input type="file" placeholder="Foto" id="foto" name="foto" class="form-control bg-transparent" />
										<br>
										@error('foto')
											<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
									<div class="fv-row mb-8">
										<input type="text" placeholder="Alamat" id="alamat" name="alamat" class="form-control bg-transparent" />
										<br>
										@error('alamat')
											<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
									<div class="fv-row mb-8">
										<input type="text" placeholder="Pekerjaan" id="pekerjaan" name="pekerjaan" class="form-control bg-transparent" />
										<br>
										@error('pekerjaan')
											<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
									<div class="fv-row mb-8">
										<input type="date" placeholder="Tanggal Lahir" id="BOD" name="BOD" class="form-control bg-transparent" />
										<br>
										@error('BOD')
											<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
									<div class="fv-row mb-8">
										<input type="text" placeholder="Nomor WhatsApp" id="whatsapp" name="whatsapp" class="form-control bg-transparent" />
										@error('whatsapp')
											<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
									<div class="fv-row mb-8">
										<input type="text" placeholder="Nomor Telepon" id="notelp" name="notelp" class="form-control bg-transparent" />
										<br>
										@error('notelp')
											<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
									<div class="d-grid mb-10">
										<button type="submit" class="btn btn-primary">Daftar</button>
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
					alert('Mohon isi semua field pada langkah ini.');
					return;
				}

				// Password validation
				if (password.length < 8) {
					event.preventDefault();
					alert('Password harus memiliki setidaknya 8 karakter.');
					return;
				}
				if (password !== confirmPassword) {
					event.preventDefault();
					alert('Password dan konfirmasi password tidak sama.');
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
			});
		</script>
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
	</body>
	<!--end::Body-->
</html>