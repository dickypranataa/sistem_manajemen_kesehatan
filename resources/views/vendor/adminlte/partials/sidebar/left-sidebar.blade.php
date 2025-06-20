<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
    @include('adminlte::partials.common.brand-logo-xl')
    @else
    @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') !=300)
                data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                data-accordion="false"
                @endif>

                {{-- Hak Akses berdasarkan Role --}}
                @if(Auth::check() && Auth::user()->role === 'dokter')
                {{-- Menu dokter --}}
                <li class="nav-item">
                    <a href="{{ url('/dokter/periksa') }}" class="nav-link">
                        <i class="fas fa-stethoscope nav-icon"></i>
                        <p>Periksa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dokter.jadwal.index') }}" class="nav-link">
                        <i class="fas fa-calendar-alt nav-icon"></i>
                        <p>Jadwal</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/dokter/riwayat') }}" class="nav-link">
                        <i class="fas fa-history nav-icon"></i>
                        <p>Riwayat Periksa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dokter.profile.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profil</p>
                    </a>
                </li>


                @elseif(Auth::check() && Auth::user()->role === 'pasien')
                {{-- Menu pasien --}}
                <li class="nav-item">
                    <a href="{{ url('/pasien/periksa') }}" class="nav-link">
                        <i class="fas fa-notes-medical nav-icon"></i>
                        <p>Periksa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/pasien/riwayat') }}" class="nav-link">
                        <i class="fas fa-history nav-icon"></i>
                        <p>Riwayat Periksa</p>
                    </a>
                </li>

                @elseif(Auth::check() && Auth::user()->role === 'admin')
                {{-- Menu admin --}}
                <li class="nav-item">
                    <a href="{{ url('/admin/dokter') }}" class="nav-link">
                        <i class="fas fa-user-md nav-icon"></i>
                        <p>Kelola Dokter</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.poli.index') }}" class="nav-link">
                        <i class="fas fa-clinic-medical nav-icon"></i>
                        <p>Kelola Poli</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/pasien') }}" class="nav-link">
                        <i class="fas fa-user-injured nav-icon"></i>
                        <p>Kelola Pasien</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/obat') }}" class="nav-link">
                        <i class="fas fa-prescription-bottle-alt nav-icon"></i>
                        <p>Kelola Obat</p>
                    </a>
                </li>
                @endif


                {{-- Menu dari konfigurasi AdminLTE --}}
                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')
            </ul>
        </nav>
    </div>

</aside>