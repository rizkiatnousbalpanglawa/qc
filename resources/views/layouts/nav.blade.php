<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">

        <div>
            <h4 class="logo-text">INTERNAL QC</h4>
        </div>

    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        @canany(['admin', 'tim_data', 'user'])
        <li class="{{ $dashboard_is_active ?? '' }}">
            <a href="{{ url('dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>

        </li>

        <li class="{{ $tps_is_active ?? '' }}">
            <a href="{{ url('tps') }}">
                <div class="parent-icon"><i class='bx bxs-user-account'></i>
                </div>
                <div class="menu-title">TPS</div>
            </a>
        </li>
        @endcanany

        @canany(['admin','tim_data'])
        <li class="menu-label">Data</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Data Master</div>
            </a>
            <ul>
                <li>
                    <a href="{{ url('provinsi') }}"><i class="bx bx-right-arrow-alt"></i>Provinsi</a>
                </li>
                <li>
                    <a href="{{ url('kabupaten-kota') }}"><i class="bx bx-right-arrow-alt"></i>Kabupaten / Kota</a>
                </li>
                <li>
                    <a href="{{ url('kecamatan') }}"><i class="bx bx-right-arrow-alt"></i>Kecamatan</a>
                </li>
                <li>
                    <a href="{{ url('kelurahan') }}"><i class="bx bx-right-arrow-alt"></i>Kelurahan</a>
                </li>
                <li class="{{ $parpol_is_active ?? '' }}">
                    <a href="{{ url('parpol') }}"><i class="bx bx-right-arrow-alt"></i>Parpol</a>
                </li>
                <li class="{{ $caleg_is_active ?? '' }}">
                    <a href="{{ url('caleg') }}"><i class="bx bx-right-arrow-alt"></i>Caleg</a>
                </li>

            </ul>
        </li>

        <li class="menu-label">Setting</li>
        <li class="{{ $setting_is_active ?? '' }}">
            <a href="{{ url('user') }}">
                <div class="parent-icon"><i class='bx bxs-user-account'></i>
                </div>
                <div class="menu-title">User</div>
            </a>
        </li>
        <li class="menu-label">Quick Count</li>
        <li class="{{ $upload_c1_is_active ?? '' }}">
            <a href="{{ url('upload-c1/saksi/show/') }}">
                <div class="parent-icon"><i class='bx bx-upload'></i>
                </div>
                <div class="menu-title">Upload C1</div>
            </a>
        </li>

        <li class="menu-label">Laporan</li>
        <li class="{{ $laporan_is_active ?? '' }}">
            <a href="{{ url('laporan') }}">
                <div class="parent-icon"><i class='bx bxs-file-pdf'></i>
                </div>
                <div class="menu-title">Laporan TPS</div>
            </a>
        </li>
        @endcanany

       

    </ul>
    <!--end navigation-->
</div>