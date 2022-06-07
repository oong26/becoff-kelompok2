<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                @if (auth()->user() != null)
                    <a class="nav-link mt-2" href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                        Home
                    </a>
                    <div class="sb-sidenav-menu-heading">Master</div>
                    @if (auth()->user()->role == 'Owner')
                        <a class="nav-link {{ Request::segment(2) == 'daftar-menu' ? 'active' : '' }}"
                            href="{{ route('daftar-menu.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-coffee"></i></div>
                            Daftar Menu
                        </a>
                        <a class="nav-link {{ Request::segment(2) == 'meja' ? 'active' : '' }}"
                            href="{{ route('meja.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Daftar Meja
                        </a>
                    @endif
                    @if (auth()->user()->role != 'Owner' || auth()->user()->role != 'Pegawai')
                        <a class="nav-link {{ Request::segment(2) == 'user' ? 'active' : '' }}"
                            href="{{ route('user.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Akun
                        </a>
                    @endif
                    @if (auth()->user()->role != 'Owner')
                        <a class="nav-link {{ Request::segment(2) == 'pemesanan' ? 'active' : '' }}"
                            href="{{ route('pemesanan.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Pemesanan
                        </a>
                    @endif
                    @if (auth()->user()->role == 'Owner')
                        <a class="nav-link {{ Request::segment(2) == 'keuangan' ? 'active' : '' }} collapsed" href="#"
                            data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false"
                            aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Keuangan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('pemasukan.index') }}">Pemasukan</a>
                                <a class="nav-link" href="{{ route('pengeluaran.index') }}">Pengeluaran</a>
                                <a class="nav-link" href="{{ route('rekapitulasi.index') }}">Rekapitulasi</a>
                            </nav>
                        </div>
                        <a class="nav-link {{ Request::segment(2) == 'cek-kualitas' ? 'active' : '' }}"
                            href="{{ route('cek-kualitas.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-check"></i></div>
                            Cek Kualitas
                        </a>
                    @endif
                @endif
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ isset(auth()->user()->name) ? auth()->user()->name : '' }}
        </div>
    </nav>
</div>
