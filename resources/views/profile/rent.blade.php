@extends('layouts.app')
@section('content')
<section class="pt-0">
    <div class="container gap-4 vstack">
        <!-- Title START -->
        <div class="row">
            <div class="col-12">
                <h1 class="mb-0 fs-4">
                    <i class="bi bi-journals fa-fw me-1"></i
                    >Listings
                </h1>
            </div>
        </div>
        <!-- Title END -->

        <!-- Counter START -->
        <div class="r ow g-4">
            <!-- Earning item -->
            <div class="col-md-6 col-xl-4">
                <div class="p-4 border card card-body h-100">
                    <h6>
                        Caution de sécurité
                        <a
                            tabindex="0"
                            class="mb-0 h6"
                            role="button"
                            data-bs-toggle="popover"
                            data-bs-trigger="focus"
                            data-bs-placement="top"
                            data-bs-content="After US royalty withholding tax"
                            data-bs-original-title=""
                            title=""
                        >
                            <i
                                class="bi bi-info-circle-fill small"
                            ></i>
                        </a>
                    </h6>
                    <h2 class="text-success">{{ $tenant->security_deposit }}</h2>
                    <p class="mb-2">
                        <span class="text-primary me-1"
                            >0 .20%<i
                                class="bi bi-arrow-up"
                            ></i></span
                        >vs last month
                    </p>
                    <div class="mt-auto text-primary-hover">
                        <a
                            href="#"
                            class="p-0 mb-0 text-decoration-underline"
                            >View statement</a
                        >
                    </div>
                </div>
            </div>


        </div>
        <!-- Counter END -->

        <!-- Listing table START -->

        <div class="row">
            <div class="col-12">
                <div class="border card">
                    <!-- Card header -->
                    <div class="card-header border-bottom">
                        <h5 class="card-header-title">
                            My Listings
                            <span
                                class="badge bg-primary bg-opacity-10 text-primary ms-2"
                                >1 Items</span
                            >
                        </h5>
                    </div>

                    <!-- Card body START -->
                    <div class="gap-3 card-body vstack">
                        <!-- Listing item START -->
                        <div class="p-2 border card">
                            <div class="row g-4">
                                <!-- Card img -->
                                <div class="col-md-3 col-lg-2">
                                    <img
                                        src="{{ asset('assets/images/category/hotel/4by3/10.jpg') }}"
                                        class="card-img rounded-2"
                                        alt="Card image"
                                    />
                                </div>

                                <!-- Card body -->
                                <div class="col-md-9 col-lg-10">
                                    <div
                                        class="p-0 card-body position-relative d-flex flex-column h-100"
                                    >
                                        <!-- Buttons -->
                                        <div
                                            class="top-0 list-inline-item dropdown position-absolute end-0"
                                        >
                                            <!-- Share button -->
                                            <a
                                                href="#"
                                                class="btn btn-sm btn-round btn-light"
                                                role="button"
                                                id="dropdownAction2"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                            >
                                                <i
                                                    class="bi bi-three-dots-vertical"
                                                ></i>
                                            </a>
                                            <!-- dropdown button -->
                                            <ul
                                                class="rounded shadow dropdown-menu dropdown-menu-end min-w-auto"
                                                aria-labelledby="dropdownAction2"
                                            >
                                                <li>
                                                    <a
                                                        class="dropdown-item"
                                                        href="#"
                                                        ><i
                                                            class="bi bi-info-circle me-1"
                                                        ></i
                                                        >Report</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="dropdown-item"
                                                        href="#"
                                                        ><i
                                                            class="bi bi-slash-circle me-1"
                                                        ></i
                                                        >Disable</a
                                                    >
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Title -->
                                        <h5
                                            class="mb-0 card-title me-5"
                                        >
                                            <a
                                                href="hotel-detail.html"
                                                >{{ $contract->property->name }}</a
                                            >
                                        </h5>
                                        @if ($contract->end_date >= now())
                                        <small>la prochaine date de paiement de votre loyé<i class="bi bi-geo-alt me-2"></i>{{ date('d/m/Y', strtotime($contract->end_date)) }}</small>
                                            @else
                                                <small><i class="bi bi-geo-alt me-2"></i>Contrat terminé</small>
                                            @endif

                                        <!-- Price and Button -->
                                        <div
                                            class="mt-3 d-sm-flex justify-content-sm-between align-items-center mt-md-auto"
                                        >
                                            <!-- Button -->
                                            <div
                                                class="d-flex align-items-center"
                                            >
                                                <h5
                                                    class="mb-0 fw-bold me-1"
                                                >
                                                    ${{ $contract->property->price }}
                                                </h5>
                                                <span
                                                    class="mb-0 me-2"
                                                    >/mois</span
                                                >
                                            </div>
                                            <!-- Price -->
                                            @php
                                                $currentDate = date('Y-m-d');
                                                $contractEndDate =   $contract->end_date ; // Remplacez ceci par la date de fin du contrat réelle
                                            @endphp

                                            @if ($currentDate >= $contractEndDate)
                                                <div class="gap-2 mt-3 hstack mt-sm-0">
                                                    <a href="#" class="mb-0 btn btn-sm btn-primary">
                                                        <i class="bi bi-pencil-square fa-fw me-1"></i>payer son loyer
                                                    </a>
                                                </div>
                                            @endif
                                                <a
                                                    href="{{ route('profile.paid.rent') }}"
                                                    class="mb-0 btn btn-sm btn-danger"
                                                    ><i
                                                        class="bi bi-trash3 fa-fw me-1"
                                                    ></i
                                                    >payer en avance</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Listing item END -->

                        <!-- Listing item START -->

                        <!-- Listing item END -->

                        <!-- Listing item START -->

                        <!-- Listing item END -->

                        <!-- Listing item START -->

                        <!-- Listing item END -->

                        <!-- Listing item START -->

                        <!-- Listing item END -->
                    </div>
                    <!-- Card body END -->
                </div>
            </div>
        </div>
        <!-- Listing table END -->
    </div>
</section>
@endsection
