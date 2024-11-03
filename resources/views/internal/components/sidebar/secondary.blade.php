<!--begin::Sidebar secondary-->
<div class="app-sidebar-secondary">
    @if($pageTitle == 'Dashboard')
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


            {{--Pre-Alert Start--}}
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">RPA Pre-Alert AE</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link"  href="">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Pre-Alert MAWB List</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Pre-Alert HAWB List</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link"  href="">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Pre-Alert Manifest List</span>
                        </a>
                    </div>
                </div>
            </div>
            {{--Pre-Alert end--}}

            <!--end:Menu item-->
        </div>
    </div>
    <!--end::Sidebar secondary menu-->
    @elseif($pageTitle == 'Form Adopsi' || $pageTitle == 'Form Handover' || $pageTitle == 'Form Report')
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
                <a class="menu-link {{$pageTitle == 'Form Report' ? 'active' : ''}}" href="{{ route('formReport') }}">
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
                <a class="menu-link {{$pageTitle == 'Form Handover' ? 'active' : ''}}" href="{{ route('formHandover') }}">
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
                <a class="menu-link {{$pageTitle == 'Form Adopsi' ? 'active' : ''}}" href="{{ route('formAdopsi') }}">
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
    @endif
</div>
<!--end::Sidebar secondary-->
