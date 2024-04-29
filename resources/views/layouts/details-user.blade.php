
<section class="pt-4">
    <div class="container">
        <div class="p-3 pb-2 border card rounded-3">
            <!-- Avatar and info START -->
            <div class="d-sm-flex align-items-center">
                <div class="mb-2 avatar avatar-xl mb-sm-0">
                    <img
                        class="avatar-img rounded-circle"
                        src="{{ asset('assets/images/avatar/01.jpg') }}"
                        alt=""
                    />
                </div>
                <h4 class="mb-2 mb-sm-0 ms-sm-3">
                    <span class="fw-light">Hi</span> {{ $tenant->name }}
                </h4>
                <a
                    href="add-listing.html"
                    class="flex-shrink-0 mb-0 btn btn-sm btn-primary-soft ms-auto"
                    ><i class="bi bi-plus-lg fa-fw me-2"></i>Add New
                    Listing</a
                >
            </div>
            <!-- Avatar and info START -->

            <!-- Responsive navbar toggler -->
            <button
                class="mt-2 btn btn-primary w-100 d-block d-xl-none"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#dashboardMenu"
                aria-controls="dashboardMenu"
            >
                <i class="bi bi-list"></i> Dashboard Menu
            </button>

            <!-- Nav links START -->
            <div
                class="offcanvas-xl offcanvas-end mt-xl-3"
                tabindex="-1"
                id="dashboardMenu"
            >
                <div class="p-3 offcanvas-header border-bottom">
                    <h5 class="offcanvas-title">Menu</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="offcanvas"
                        data-bs-target="#dashboardMenu"
                        aria-label="Close"
                    ></button>
                </div>
                <!-- Offcanvas body -->
                <div class="p-3 offcanvas-body p-xl-0">
                    <!-- Nav item -->
                    <div class="navbar navbar-expand-xl">
                        <ul
                            class="navbar-nav navbar-offcanvas-menu"
                        >
                            <li class="nav-item">
                                <a
                                    class="nav-link {{ request()->is('profile') ? 'active' : '' }}"
                                    href="{{ route('profile') }}"
                                >
                                    <i class="bi bi-person fa-fw me-1"></i>Dashboard
                                </a>
                            </li>



                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="{{ route('profile.rent') }}"
                                    ><i
                                        class="bi bi-journals fa-fw me-1"
                                    ></i
                                    >Mes loyés</a
                                >
                            </li>

                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="agent-bookings.html"
                                    ><i
                                        class="bi bi-bookmark-heart fa-fw me-1"
                                    ></i
                                    >Bookings</a
                                >
                            </li>

                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="agent-activities.html"
                                    ><i
                                        class="bi bi-bell fa-fw me-1"
                                    ></i
                                    >Activities</a
                                >
                            </li>





                            <li>
                                <a
                                    class="nav-link {{ request()->is('profile/edit') ? 'active' : '' }}"
                                    href="{{ route('profile.edit') }}"
                                >
                                    <i class="bi bi-gear fa-fw me-1"></i>Settings
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="dropdoanMenu"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i
                                        class="bi bi-list-ul fa-fw me-1"
                                    ></i
                                    >Dropdown
                                </a>
                                <ul
                                    class="dropdown-menu"
                                    aria-labelledby="dropdoanMenu"
                                >
                                    <!-- Dropdown menu -->
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="#"
                                            >Item 1</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="#"
                                            >Item 2</a
                                        >
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Nav links END -->
        </div>
    </div>
</section>
