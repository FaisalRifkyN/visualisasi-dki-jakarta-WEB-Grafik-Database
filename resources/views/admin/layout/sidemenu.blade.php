<!-- side menu -->
<div class="min-height-300 bg-primary position-absolute w-100"></div>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 " href="{{route('dashboard')}}">
            <img src="assets/img/logo.png" class="navbar-brand-img h-100" alt="logo">
            <span class="ms-1 font-weight-bold">VISUALISASI DKI JAKARTA</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="{{route('dashboard')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('banyakjenisusaha')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Banyak Jenis Usaha</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('banyakkecamatanjenisusaha')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-map-big text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Banyak Kecamatan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('banyakwilayahjenisusaha')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-pin-3 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Banyak Wilayah</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('sebaranjenisusahakecamatan')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sebaran Jenis Usaha</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('sebarankecamatanjenisusaha')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-building text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sebaran Kecamatan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('sebaranjenisusahawilayah')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-square-pin text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sebaran Jenis usaha Wilayah</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('user')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data User</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- end side menu -->