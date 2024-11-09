<!--begin::Sidebar secondary-->
<div class="app-sidebar-secondary">
    @if(Route::is('dashboard'))
    <!--begin::Sidebar secondary menu-->
    <div class="menu menu-sub-indention menu-rounded menu-column menu-active-bg menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-arrow-gray-500 fw-semibold fs-6 py-4 py-lg-6 px-1 px-lg-5" id="kt_app_sidebar_secondary_menu" data-kt-menu="true">
        <div id="kt_app_sidebar_secondary_menu_wrapper" class="hover-scroll-y me-lg-n2 pe-lg-2" data-kt-scroll="true" data-kt-scroll-activate="{default: true, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_app_sidebar_secondary_menu" data-kt-scroll-offset="20px">
            <!--begin:Menu item-->
            <div class="menu-item">
                <!--begin:Menu content-->
                <div class="menu-content">
                    <span class="menu-section fs-5 fw-bolder ps-1 py-1">Home</span>
                </div>
                <!--end:Menu content-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div class="menu-item">
                <!--begin:Menu link-->
                <a class="menu-link {{$title == 'Dashboard' ? 'active' : ''}}" href="">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
        </div>
    </div>
    <!--end::Sidebar secondary menu-->
    @elseif(Route::is('formReport.*') || Route::is('formHandover.*') || Route::is('formAdopsi.*'))
    <div class="menu menu-sub-indention menu-rounded menu-column menu-active-bg menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-arrow-gray-500 fw-semibold fs-6 py-4 py-lg-6 px-1 px-lg-5" id="kt_app_sidebar_secondary_menu" data-kt-menu="true">
        <div id="kt_app_sidebar_secondary_menu_wrapper" class="hover-scroll-y me-lg-n2 pe-lg-2" data-kt-scroll="true" data-kt-scroll-activate="{default: true, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_app_sidebar_secondary_menu" data-kt-scroll-offset="20px">
            <!--begin:Menu item-->
            <div class="menu-item">
                <!--begin:Menu content-->
                <div class="menu-content">
                    <span class="menu-section fs-5 fw-bolder ps-1 py-1">Form</span>
                </div>
                <!--end:Menu content-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div class="menu-item">
                <!--begin:Menu link-->
                <a class="menu-link {{Route::is('formReport.*') ? 'active' : ''}}" href="{{ route('formReport.index') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Form Report</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            <div class="menu-item">
                <!--begin:Menu link-->
                <a class="menu-link {{Route::is('formHandover.*') ? 'active' : ''}}" href="{{ route('formHandover.index') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Form Handover</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            <div class="menu-item">
                <!--begin:Menu link-->
                <a class="menu-link {{Route::is('formAdopsi.*') ? 'active' : ''}}" href="{{ route('formAdopsi.index') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Form Adopsi</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
        </div>
    </div>
    @elseif(Route::is('dataHewan.*'))
    <div class="menu menu-sub-indention menu-rounded menu-column menu-active-bg menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-arrow-gray-500 fw-semibold fs-6 py-4 py-lg-6 px-1 px-lg-5" id="kt_app_sidebar_secondary_menu" data-kt-menu="true">
        <div id="kt_app_sidebar_secondary_menu_wrapper" class="hover-scroll-y me-lg-n2 pe-lg-2" data-kt-scroll="true" data-kt-scroll-activate="{default: true, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_app_sidebar_secondary_menu" data-kt-scroll-offset="20px">
            <!--begin:Menu item-->
            <div class="menu-item">
                <!--begin:Menu content-->
                <div class="menu-content">
                    <span class="menu-section fs-5 fw-bolder ps-1 py-1">Data Hewan</span>
                </div>
                <!--end:Menu content-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div class="menu-item">
                <!--begin:Menu link-->
                <a class="menu-link {{Route::is('dataHewan.*') ? 'active' : ''}}" href="{{ route('dataHewan.index') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Konfigurasi Data Hewan</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
        </div>
    </div>
    @elseif(Route::is('informasiShelter.*') || Route::is('pertanyaanPenyerahan.*') || Route::is('pertanyaanPengadopsian.*'))
    <div class="menu menu-sub-indention menu-rounded menu-column menu-active-bg menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-arrow-gray-500 fw-semibold fs-6 py-4 py-lg-6 px-1 px-lg-5" id="kt_app_sidebar_secondary_menu" data-kt-menu="true">
        <div id="kt_app_sidebar_secondary_menu_wrapper" class="hover-scroll-y me-lg-n2 pe-lg-2" data-kt-scroll="true" data-kt-scroll-activate="{default: true, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_app_sidebar_secondary_menu" data-kt-scroll-offset="20px">
            <!--begin:Menu item-->
            <div class="menu-item">
                <!--begin:Menu content-->
                <div class="menu-content">
                    <span class="menu-section fs-5 fw-bolder ps-1 py-1">Konfigurasi</span>
                </div>
                <!--end:Menu content-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div class="menu-item">
                <!--begin:Menu link-->
                <a class="menu-link {{Route::is('informasiShelter.*') ? 'active' : ''}}" href="{{ route('informasiShelter.index') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Informasi Shelter</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div class="menu-item">
                <!--begin:Menu link-->
                <a class="menu-link {{Route::is('pertanyaanPenyerahan.*') ? 'active' : ''}}" href="{{ route('pertanyaanPenyerahan.index') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Pertanyaan Penyerahan</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div class="menu-item">
                <!--begin:Menu link-->
                <a class="menu-link {{Route::is('pertanyaanPengadopsian.*') ? 'active' : ''}}" href="{{ route('pertanyaanPengadopsian.index') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Pertanyaan Pengadopsian</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
        </div>
    </div>
    @endif
</div>
<!--end::Sidebar secondary-->
