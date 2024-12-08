<div data-kt-menu-trigger="click" class="menu-item">
    <div class="menu-item">
        <a class="menu-link {{ Route::is('formReport.*') ? 'active' : '' }}" href="{{ route('formReport.index') }}">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title">Laporan Penemuan</span>
        </a>
    </div>
</div>
<div data-kt-menu-trigger="click" class="menu-item">
    <div class="menu-item">
        <a class="menu-link {{ Route::is('formHandover.*') ? 'active' : '' }}" href="{{ route('formHandover.index') }}">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title">Pengajuan Penyerahan</span>
        </a>
    </div>
</div>
<div data-kt-menu-trigger="click" class="menu-item">
    <div class="menu-item">
        <a class="menu-link {{ Route::is('formAdopsi.*') ? 'active' : '' }}" href="{{ route('formAdopsi.index') }}">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title">Pengajuan Pengadopsian</span>
        </a>
    </div>
</div>
