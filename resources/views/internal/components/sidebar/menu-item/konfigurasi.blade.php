<div data-kt-menu-trigger="click" class="menu-item">
    <div class="menu-item">
        <a class="menu-link {{ Route::is('informasiShelter.*') ? 'active' : '' }}" href="{{ route('informasiShelter.index') }}">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title">Informasi Shelter</span>
        </a>
    </div>
</div>
<div data-kt-menu-trigger="click" class="menu-item">
    <div class="menu-item">
        <a class="menu-link {{ Route::is('pertanyaanPenyerahan.*') ? 'active' : '' }}" href="{{ route('pertanyaanPenyerahan.index') }}">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title">Pertanyaan Penyerahan</span>
        </a>
    </div>
</div>
<div data-kt-menu-trigger="click" class="menu-item">
    <div class="menu-item">
        <a class="menu-link {{ Route::is('pertanyaanPengadopsian.*') ? 'active' : '' }}" href="{{ route('pertanyaanPengadopsian.index') }}">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title">Pertanyaan Pengadopsian</span>
        </a>
    </div>
</div>
