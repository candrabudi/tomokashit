<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('backoffice/images/logo-sm.png') }}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backoffice/images/logo-dark.png') }}" alt="" height="26">
            </span>
        </a>
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('backoffice/images/logo-sm.png') }}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backoffice/images/logo-dark.png') }}" alt="" height="26">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a href="index.html" class="nav-link menu-link"> <i class="bi bi-speedometer2"></i> <span
                            data-key="t-dashboard">Dashboard</span> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarPages" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="bx bxs-bank"></i> <span data-key="t-pages">Payment</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('system.payment.method') }}" class="nav-link" data-key="t-starter"> Metode Pembayaran </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('system.payment.accounts.index') }}" class="nav-link" data-key="t-starter"> Akun Pembayaran </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('system.member') }}" class="nav-link menu-link"> 
                        <i class="bi bi-speedometer2"></i> 
                        <span data-key="t-dashboard">Member</span> 
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('system.banners.index') }}" class="nav-link menu-link"> 
                        <i class="bx bx-image-alt"></i> 
                        <span data-key="t-dashboard">Banner</span> 
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>
