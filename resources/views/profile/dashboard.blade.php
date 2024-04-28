@extends('layouts.app')
@section('content')
<section class="pt-0">
    <div class="container gap-4 vstack">
        <!-- Title START -->
        <div class="row">
            <div class="col-12">
                <h1 class="mb-0 fs-4">
                    <i class="bi bi-house-door fa-fw me-1"></i
                    >Dashboard
                </h1>
            </div>
        </div>
        <!-- Title END -->

        <!-- Counter START -->
        <div class="row g-4">
            <!-- Counter item -->
            <div class="col-sm-6 col-xl-3">
                <div class="border card card-body">
                    <div class="d-flex align-items-center">
                        <!-- Icon -->
                        <div
                            class="text-white icon-xl bg-success rounded-3"
                        >
                            <i class="bi bi-journals"></i>
                        </div>
                        <!-- Content -->
                        <div class="ms-3">
                            <h4>56</h4>
                            <span>Total loyé payé</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Counter item -->
            <div class="col-sm-6 col-xl-3">
                <div class="border card card-body">
                    <div class="d-flex align-items-center">
                        <!-- Icon -->
                        <div
                            class="text-white icon-xl bg-info rounded-3"
                        >
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <!-- Content -->
                        <div class="ms-3">
                            <h4>$2,55,365</h4>
                            <span>Total Dépensé</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Counter item -->
            <div class="col-sm-6 col-xl-3">
                <div class="border card card-body">
                    <div class="d-flex align-items-center">
                        <!-- Icon -->
                        <div
                            class="text-white icon-xl bg-warning rounded-3"
                        >
                            <i
                                class="bi bi-bar-chart-line-fill"
                            ></i>
                        </div>
                        <!-- Content -->
                        <div class="ms-3">
                            <h4>1</h4>
                            <span>Nombre de panne</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Counter item -->
            <div class="col-sm-6 col-xl-3">
                <div class="border card card-body">
                    <div class="d-flex align-items-center">
                        <!-- Icon -->
                        <div
                            class="text-white icon-xl bg-primary rounded-3"
                        >
                            <i class="bi bi-star"></i>
                        </div>
                        <!-- Content -->
                        <div class="ms-3">
                            <h4>12K</h4>
                            <span>Total Reviews</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Counter END -->

        <!-- Graph START -->

        <!-- Graph END -->

        <!-- Booking table START -->
        <div class="row">
            <div class="col-12">
                <div class="border card rounded-3">
                    <!-- Card header START -->
                    <div class="card-header border-bottom">
                        <div
                            class="d-sm-flex justify-content-between align-items-center"
                        >
                            <h5 class="mb-2 mb-sm-0">
                                Upcoming Bookings
                            </h5>
                            <a
                                href="#"
                                class="mb-0 btn btn-sm btn-primary"
                                >View All</a
                            >
                        </div>
                    </div>
                    <!-- Card header END -->

                    <!-- Card body START -->
                    <div class="card-body">
                        <!-- Search and select START -->
                        <div
                            class="mb-3 row g-3 align-items-center justify-content-between"
                        >
                            <!-- Search -->
                            <div class="col-md-8">
                                <form
                                    class="rounded position-relative"
                                >
                                    <input
                                        class="form-control pe-5"
                                        type="search"
                                        placeholder="Search"
                                        aria-label="Search"
                                    />
                                    <button
                                        class="px-3 py-0 border-0 btn position-absolute top-50 end-0 translate-middle-y"
                                        type="submit"
                                    >
                                        <i
                                            class="fas fa-search fs-6"
                                        ></i>
                                    </button>
                                </form>
                            </div>

                            <!-- Select option -->
                            <div class="col-md-3">
                                <!-- Short by filter -->
                                <form>
                                    <select
                                        class="form-select js-choice"
                                        aria-label=".form-select-sm"
                                    >
                                        <option value="">
                                            Sort by
                                        </option>
                                        <option>Free</option>
                                        <option>Newest</option>
                                        <option>Oldest</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <!-- Search and select END -->

                        <!-- Hotel room list START -->
                        <div class="border-0 table-responsive">
                            <table
                                class="table p-4 mb-0 align-middle table-hover table-shrink"
                            >
                                <!-- Table head -->
                                <thead class="table-light">
                                    <tr>
                                        <th
                                            scope="col"
                                            class="border-0 rounded-start"
                                        >
                                            #
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-0"
                                        >
                                            Name
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-0"
                                        >
                                            Type
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-0"
                                        >
                                            Date
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-0"
                                        >
                                            status
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-0"
                                        >
                                            Payment
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-0 rounded-end"
                                        >
                                            Action
                                        </th>
                                    </tr>
                                </thead>

                                <!-- Table body START -->
                                <tbody class="border-top-0">
                                    <!-- Table item -->
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">01</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">
                                                <a href="#"
                                                    >Deluxe Pool
                                                    View</a
                                                >
                                            </h6>
                                        </td>
                                        <td>With Breakfast</td>
                                        <td>Nov 22 - 25</td>
                                        <td>
                                            <div
                                                class="badge text-bg-success"
                                            >
                                                Booked
                                            </div>
                                        </td>
                                        <td>
                                            <div
                                                class="badge bg-success bg-opacity-10 text-success"
                                            >
                                                Full payment
                                            </div>
                                        </td>
                                        <td>
                                            <a
                                                href="#"
                                                class="mb-0 btn btn-sm btn-light"
                                                >View</a
                                            >
                                        </td>
                                    </tr>

                                    <!-- Table item -->
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">02</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">
                                                <a href="#"
                                                    >Deluxe Pool
                                                    View with
                                                    Breakfast</a
                                                >
                                            </h6>
                                        </td>
                                        <td>
                                            Free Cancellation |
                                            Breakfast only
                                        </td>
                                        <td>Nov 24 - 28</td>
                                        <td>
                                            <div
                                                class="badge text-bg-success"
                                            >
                                                Booked
                                            </div>
                                        </td>
                                        <td>
                                            <div
                                                class="badge bg-orange bg-opacity-10 text-orange"
                                            >
                                                On Property
                                            </div>
                                        </td>
                                        <td>
                                            <a
                                                href="#"
                                                class="mb-0 btn btn-sm btn-light"
                                                >View</a
                                            >
                                        </td>
                                    </tr>

                                    <!-- Table item -->
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">03</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">
                                                <a href="#"
                                                    >Luxury Room
                                                    with Balcony</a
                                                >
                                            </h6>
                                        </td>
                                        <td>
                                            Free Cancellation |
                                            Breakfast + Lunch/Dinner
                                        </td>
                                        <td>Nov 24 - 28</td>
                                        <td>
                                            <div
                                                class="badge text-bg-info"
                                            >
                                                Reserved
                                            </div>
                                        </td>
                                        <td>
                                            <div
                                                class="badge bg-info bg-opacity-10 text-info"
                                            >
                                                Half Payment
                                            </div>
                                        </td>
                                        <td>
                                            <a
                                                href="#"
                                                class="mb-0 btn btn-sm btn-light"
                                                >View</a
                                            >
                                        </td>
                                    </tr>

                                    <!-- Table item -->
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">04</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">
                                                <a href="#"
                                                    >Deluxe Room
                                                    Twin Bed With
                                                    Balcony</a
                                                >
                                            </h6>
                                        </td>
                                        <td>Free Cancellation</td>
                                        <td>Nov 28 - 30</td>
                                        <td>
                                            <div
                                                class="badge text-bg-success"
                                            >
                                                Booked
                                            </div>
                                        </td>
                                        <td>
                                            <div
                                                class="badge bg-success bg-opacity-10 text-success"
                                            >
                                                Full Payment
                                            </div>
                                        </td>
                                        <td>
                                            <a
                                                href="#"
                                                class="mb-0 btn btn-sm btn-light"
                                                >View</a
                                            >
                                        </td>
                                    </tr>

                                    <!-- Table item -->
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">05</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">
                                                <a href="#"
                                                    >Room With Free
                                                    Cancellation |
                                                    Breakfast +
                                                    Lunch</a
                                                >
                                            </h6>
                                        </td>
                                        <td>Free Cancellation</td>
                                        <td>Nov 28 - 30</td>
                                        <td>
                                            <div
                                                class="badge text-bg-info"
                                            >
                                                Reserved
                                            </div>
                                        </td>
                                        <td>
                                            <div
                                                class="badge bg-success bg-opacity-10 text-success"
                                            >
                                                Full Payment
                                            </div>
                                        </td>
                                        <td>
                                            <a
                                                href="#"
                                                class="mb-0 btn btn-sm btn-light"
                                                >View</a
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- Table body END -->
                            </table>
                        </div>
                        <!-- Hotel room list END -->
                    </div>
                    <!-- Card body END -->

                    <!-- Card footer START -->
                    <div class="pt-0 card-footer">
                        <!-- Pagination and content -->
                        <div
                            class="d-sm-flex justify-content-sm-between align-items-sm-center"
                        >
                            <!-- Content -->
                            <p
                                class="text-center mb-sm-0 text-sm-start"
                            >
                                Showing 1 to 8 of 20 entries
                            </p>
                            <!-- Pagination -->
                            <nav
                                class="mb-sm-0 d-flex justify-content-center"
                                aria-label="navigation"
                            >
                                <ul
                                    class="mb-0 pagination pagination-sm pagination-primary-soft"
                                >
                                    <li class="page-item disabled">
                                        <a
                                            class="page-link"
                                            href="#"
                                            tabindex="-1"
                                            >Prev</a
                                        >
                                    </li>
                                    <li class="page-item">
                                        <a
                                            class="page-link"
                                            href="#"
                                            >1</a
                                        >
                                    </li>
                                    <li class="page-item active">
                                        <a
                                            class="page-link"
                                            href="#"
                                            >2</a
                                        >
                                    </li>
                                    <li class="page-item disabled">
                                        <a
                                            class="page-link"
                                            href="#"
                                            >..</a
                                        >
                                    </li>
                                    <li class="page-item">
                                        <a
                                            class="page-link"
                                            href="#"
                                            >15</a
                                        >
                                    </li>
                                    <li class="page-item">
                                        <a
                                            class="page-link"
                                            href="#"
                                            >Next</a
                                        >
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Card footer END -->
                </div>
            </div>
        </div>
        <!-- Booking table END -->
    </div>
</section>
@endsection
