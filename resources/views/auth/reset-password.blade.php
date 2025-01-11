<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
		<head><base href="../../../"/>
		<title>Lupa Kata Sandi</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="{{asset('/')}}assets/internal/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle-->
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
			<!--begin::Authentication - Password reset -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Aside-->
				<div class="d-flex flex-lg-row-fluid">
					<!--begin::Content-->
					<div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
						<!--begin::Image-->
						<img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{asset('/')}}assets/internal/media/auth/agency.png" alt="" />
						<img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{asset('/')}}assets/internal/media/auth/agency-dark.png" alt="" />
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
							<!--begin::Form-->
							<form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" action="{{ route('cek-email.post') }}" method="POST" id="cekEmail" onsubmit="checkEmail(event)">
								@csrf
								<!--begin::Heading-->
								<div class="text-center mb-10">
									<!--begin::Title-->
									<h1 class="text-dark fw-bolder mb-3">Lupa Kata Sandi?</h1>
									<!--end::Title-->
									<!--begin::Link-->
									<div class="text-gray-500 fw-semibold fs-6">Masukan Email Anda untuk Mengatur Ulang Kata Sandi</div>
									<!--end::Link-->
								</div>
								<!--begin::Heading-->
								<!--begin::Input group=-->
								<div class="fv-row mb-8">
									<!--begin::Email-->
									<input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" id="email" />
									<!--end::Email-->
								</div>
								<!--begin::Actions-->
								<div class="d-grid mb-2">
									<button type="submit" id="kt_password_reset_submit" class="btn btn-primary">
										<!--begin::Indicator label-->
										<span class="indicator-label">Verifikasi</span>
										<!--end::Indicator label-->
										<!--begin::Indicator progress-->
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicator progress-->
									</button>
									{{-- <a href="{{ route('masuk') }}" class="btn btn-secondary">Batalkan</a> --}}
								</div>

								<div class="text-gray-500 fw-semibold fs-6 d-flex justify-content-between">
									<a href="{{ route('masuk') }}" class="link-primary">Masuk Akun</a>
									<a href="{{ route('daftar') }}" class="link-primary">Daftar Sekarang!</a>
								</div>

							</form>

						</div>

					</div>

				</div>

			</div>

		</div>
		<script>var hostUrl = "assets/";</script>
		<script src="{{asset('/')}}assets/internal/plugins/global/plugins.bundle.js"></script>
		<script src="{{asset('/')}}assets/internal/js/scripts.bundle.js"></script>
		<script src="{{asset('/')}}assets/internal/js/custom/authentication/reset-password/reset-password.js"></script>

		<script>
			function checkEmail(event) {
				// Get the email input value
				const email = document.getElementById('email').value;
				console.log(email);

				// Email regex pattern to validate
				const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
				
				// Check if the email is valid
				if (!emailPattern.test(email)) {
					event.preventDefault();  // Prevent form submission if invalid
					Swal.fire({
						title: 'Gagal',
						text: 'Mohon masukkan email yang valid.',
						icon: 'error',
						confirmButtonText: 'Oke'
					});
					return;
				}

				// Submit the form if email is valid
				document.getElementById('cekEmail').submit();
			}
		</script>


		@error('email')
			<script>
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Alamat email yang Anda masukkan tidak terdaftar.',
				});
			</script>
		@enderror
	</body>
</html>