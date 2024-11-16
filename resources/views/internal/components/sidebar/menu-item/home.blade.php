<!--begin:Menu item-->
<div class="menu-item">
    <a class="menu-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{route('dashboard')}}">
        <span class="menu-bullet">
            <span class="bullet bullet-dot"></span>
        </span>
        <span class="menu-title">Dashboard</span>
    </a>
</div>

{{-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
    <!--begin:Menu link-->
    <span class="menu-link">
        <span class="menu-bullet">
            <span class="bullet bullet-dot"></span>
        </span>
        <span class="menu-title">RPA</span>
        <span class="menu-arrow"></span>
    </span>
    <!--end:Menu link-->

    <!--begin:Menu sub-->
    <div class="menu-sub menu-sub-accordion">
        <!--begin:Menu item-->
        <!-- tanpa dropdown -->
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link" href="../../demo24/dist/pages/user-profile/projects.html" target="_blank" title="Sunter | Accounting" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">E-Bukpot</span>
            </a>
            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->

        <!--begin:Menu item-->
        <!-- dengan dropdown -->
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">RPA PR PT Kohler</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion">
                <div class="menu-item">
                    <a class="menu-link" href="">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Generate PR OI</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Generate PR CC</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- end:Menu item -->
    </div>
    <!--end:Menu sub-->
</div> --}}
