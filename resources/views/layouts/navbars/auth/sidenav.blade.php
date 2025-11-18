<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" target="_blank">
            <img src="./img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Revenue Cycle</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-laptop text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->can('permission.view') || auth()->user()->can('role.view') || auth()->user()->can('user.view'))
                <li class="nav-item mt-3 d-flex align-items-center">
                    <div class="ps-4">
                        <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Permission</h6>
                    </div>
                </li>
                @if (auth()->user()->can('permission.view'))
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'permissions' ? 'active' : '' }}"
                            href="{{ route('permissions') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-books text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Permissions</span>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('role.view'))
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'roles' ? 'active' : '' }}"
                            href="{{ route('roles') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-books text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Roles</span>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('user.view'))
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'user' ? 'active' : '' }}"
                            href="{{ route('user') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-books text-danger text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">User</span>
                        </a>
                    </li>
                @endif
            @endif

            @if (auth()->user()->can('account_number.view') ||
                    auth()->user()->can('customer.view') ||
                    auth()->user()->can('income.view') ||
                    auth()->user()->can('pihutang.view') ||
                    auth()->user()->can('product.view'))
                <li class="nav-item mt-3 d-flex align-items-center">
                    <div class="ps-4">
                        <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">All Pages</h6>
                    </div>
                </li>
                @if (auth()->user()->can('account_number.view'))
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'account-number' ? 'active' : '' }}"
                            href="{{ route('account-number') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-credit-card text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Account Number</span>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('customer.view'))
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'customer' ? 'active' : '' }}"
                            href="{{ route('customer') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-books text-danger text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Customer</span>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('income.view'))
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'income' ? 'active' : '' }}"
                            href="{{ route('income') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-money-coins text-success text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Income</span>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('pihutang.view'))
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'pihutang' ? 'active' : '' }}"
                            href="{{ route('pihutang') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-money-coins text-success text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pihutang Payment</span>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('product.view'))
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'product' ? 'active' : '' }}"
                            href="{{ route('product') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-books text-danger text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Product</span>
                        </a>
                    </li>
                @endif
            @endif

            @if (auth()->user()->can('jurnal.view') || auth()->user()->can('buku_besar.view'))
                <li class="nav-item mt-3 d-flex align-items-center">
                    <div class="ps-4">
                        <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Report</h6>
                    </div>
                </li>
                @if (auth()->user()->can('jurnal.view'))
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'jurnal-umum' ? 'active' : '' }}"
                            href="{{ route('jurnal-umum') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-laptop text-success text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Jurnal Umum</span>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->can('buku_besar.view'))
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'buku-besar' ? 'active' : '' }}"
                            href="{{ route('buku-besar') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-laptop text-success text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Buku Besar</span>
                        </a>
                    </li>
                @endif
            @endif

            <li class="nav-item mt-3 d-flex align-items-center">
                <div class="ps-4">
                    <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Authentication</h6>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'logout' ? 'active' : '' }}"
                    href="{{ route('logout') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-right-from-bracket text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
