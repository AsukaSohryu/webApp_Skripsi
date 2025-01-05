<!DOCTYPE html>
<html lang="en">
	<head><base href="../../../"/>
		<title>Halaman Masuk</title>
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
	<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<script>var defaultThemeMode = "light"; var themeMode;</script>

		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>body { background-image: url('{{asset('/')}}assets/internal/media/auth/bg10.jpeg'); } [data-theme="dark"] body { background-image: url('{{asset('/')}}assets/internal/media/auth/bg10-dark.jpeg'); }</style>
			<!--end::Page bg image-->

			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<div class="d-flex flex-lg-row-fluid">
					<div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
						<img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{asset('/')}}assets/internal/media/auth/agency.png" alt="" />
						<img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{asset('/')}}assets/media/internal/auth/agency-dark.png" alt="" />
						<h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">Selamat Datang Kembali</h1>
					</div>
				</div>

				<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
					<div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
						<div class="w-md-400px">
							<form class="form w-100" id="kt_sign_in_form" action="{{ route('masuk.post') }}" method="POST">
								@csrf

								<div class="text-center mb-11">
									@if(session('popup_message'))
										<div class="alert alert-danger">
											Anda Belum Masuk Ke Dalam Akun!!
										</div>
									@endif

									<h1 class="text-dark fw-bolder mb-3">Masuk</h1>
									<div class="text-gray-500 fw-semibold fs-6">Masuk ke Akun Shelter Us</div>
								</div>

								<div class="fv-row mb-8">
									<input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" value="{{ old('email') }}" />
								</div>

								<div class="fv-row mb-3">
									<input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" />
								</div>

								<div class="d-grid mb-10">
									<button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
										<span class="indicator-label">Masuk</span>
										<span class="indicator-progress">Please wait...
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
										</span>
									</button>
								</div>

								<div class="text-gray-500 text-center fw-semibold fs-6">Belum Memiliki Akun?
									<a href="{{ route('daftar') }}" class="link-primary">Daftar</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<script src="{{asset('/')}}assets/internal/plugins/global/plugins.bundle.js"></script>
		<script src="{{asset('/')}}assets/internal/js/scripts.bundle.js"></script>
		<script src="{{asset('/')}}assets/internal/js/custom/authentication/sign-in/general.js"></script>

		<!-- Error Handling (Email/Password) -->
		@error('email')
			<script>
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Alamat email yang Anda masukkan tidak terdaftar.',
				});
			</script>
		@enderror

		@error('password')
			<script>
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Password yang Anda masukkan salah.',
				});
			</script>
		@enderror
	</body>
</html>
