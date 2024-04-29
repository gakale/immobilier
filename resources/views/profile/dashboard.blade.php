@extends('layouts.app')
@section('content')
<section class="pt-0">
  <div class="container gap-4 vstack">
    <!-- Title START -->
    <div class="row">
      <div class="col-12">
        <h1 class="mb-0 fs-4">
          <i class="bi bi-house-door fa-fw me-1"></i>Dashboard
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
            <div class="text-white icon-xl bg-success rounded-3">
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
            <div class="text-white icon-xl bg-info rounded-3">
              <i class="bi bi-graph-up-arrow"></i>
            </div>
            <!-- Content -->
            <div class="ms-3">
              <h4>{{$totalSecurityDeposit}}</h4>
              <span>Ma caution</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Counter item -->
      <div class="col-sm-6 col-xl-3">
        <div class="border card card-body">
          <div class="d-flex align-items-center">
            <!-- Icon -->
            <div class="text-white icon-xl bg-warning rounded-3">
              <i class="bi bi-bar-chart-line-fill"></i>
            </div>
            <!-- Content -->
            <div class="ms-3">
              <h4>{{$totalRentPayments}}</h4>
              <span>Total Loyé payer</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Counter item -->
      <div class="col-sm-6 col-xl-3">
        <div class="border card card-body">
          <div class="d-flex align-items-center">
            <!-- Icon -->
            <div class="text-white icon-xl bg-primary rounded-3">
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
            <div class="d-sm-flex justify-content-between align-items-center">
              <h5 class="mb-2 mb-sm-0">
                Mes loyer Payer
              </h5>
              <a href="#" class="mb-0 btn btn-sm btn-primary">View All</a>
            </div>
          </div>
          <!-- Card header END -->

          <!-- Card body START -->
          <div class="card-body">
            <!-- Search and select START -->
            <div class="mb-3 row g-3 align-items-center justify-content-between">
              <!-- Search -->
              <div class="col-md-8">
                <form class="rounded position-relative">
                  <input class="form-control pe-5" type="search" placeholder="Search" aria-label="Search" />
                  <button class="px-3 py-0 border-0 btn position-absolute top-50 end-0 translate-middle-y"
                    type="submit">
                    <i class="fas fa-search fs-6"></i>
                  </button>
                </form>
              </div>

              <!-- Select option -->
              <div class="col-md-3">
                <!-- Short by filter -->
                <form>
                  <select class="form-select js-choice" aria-label=".form-select-sm">
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
                @livewire('rent-payments-table')
            </div>
            <!-- Hotel room list END -->
          </div>
          <!-- Card body END -->

          <!-- Card footer START -->

          <!-- Card footer END -->
        </div>
      </div>
    </div>
    <!-- Booking table END -->
  </div>
</section>
@endsection
