<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{asset('/')}}assets/internal/media/logos/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{asset('/')}}assets/internal/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}assets/internal/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <title>Ubah Kata Sandi</title>
</head>
<body>
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-lg-row-fluid">
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{asset('/')}}assets/internal/media/auth/agency.png" alt="" />
                    <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">Selamatkan, Lindungi, dan Rawat</h1>
                    <!--end::Title-->
                    <!--begin::Text-->
                    <div class="text-gray-600 fs-base text-center fw-semibold">Pada website ini, anda dapat menyelamatkan hewan peliharaan liar dengan berbagai macam cara. Ayo lindungi dan sayangi anjing dan kucing disekitar kita!</div>
                    <!--end::Text-->
                </div>
            </div>
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
                    <div class="w-md-400px">
                        <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" action="{{ route('change-pass.post') }}" method="POST" id="forgotPassword" onsubmit="checkPassword(event)">
                            @csrf
                            <div class="text-center mb-10">
                                <h1 class="text-dark fw-bolder mb-3">Ubah Kata Sandi</h1>
                                <div class="text-gray-500 fw-semibold fs-6">Masukan Kata Sandi Baru Anda</div>
                            </div>

                            <div class="fv-row mb-8">
                                <input type="hidden" name="email" value="{{ request()->route('email') }}">
                                <input type="password" placeholder="Kata Sandi Baru" name="password" autocomplete="off" class="form-control bg-transparent" id="password" required/>
                            </div>

                            <div class="fv-row mb-8">
                                <input type="password" placeholder="Konfirmasi Kata Sandi" name="passwordConf" autocomplete="off" class="form-control bg-transparent" id="passwordConf" required/>
                            </div>

                            <div class="d-grid mb-2">
                                <button type="submit" id="kt_password_reset_submit" class="btn btn-primary">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Ubah Kata Sandi</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                                {{-- <a href="{{ route('masuk') }}" class="btn btn-secondary">Batalkan</a> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('/')}}assets/internal/plugins/global/plugins.bundle.js"></script>
    <script src="{{asset('/')}}assets/internal/js/scripts.bundle.js"></script>
    <script src="{{asset('/')}}assets/internal/js/custom/authentication/reset-password/reset-password.js"></script>

    <script>
        function checkPassword(event) {
            // Get the password and confirmation password values
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('passwordConf').value;

            // Prevent form submission if validation fails
            let formIsValid = true; // Flag to track if form is valid

            // Check if password meets minimum length
            if (password.length < 8) {
                formIsValid = false;
                Swal.fire({
                    title: 'Gagal',
                    text: 'Kata Sandi baru harus memiliki setidaknya 8 karakter.',
                    icon: 'error',
                    confirmButtonText: 'Oke'
                });
            }

            // Check if passwords match
            if (password !== confirmPassword) {
                formIsValid = false;
                Swal.fire({
                    title: 'Gagal',
                    text: 'Kata sandi baru dan konfirmasi kata sandi tidak cocok.',
                    icon: 'error',
                    confirmButtonText: 'Oke'
                });
            }

            // If the form is valid, submit it
            if (formIsValid) {
                // Allow the form to submit if no validation errors
                document.getElementById('forgotPassword').submit();
            } else {
                // Prevent form submission if there are validation errors
                event.preventDefault();
            }
        }
    </script>


    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Berhasil',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Oke'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('masuk') }}";
                }
            });
        </script>
    @endif
</body>
</html>
