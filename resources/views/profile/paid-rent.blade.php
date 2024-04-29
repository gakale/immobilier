@extends('layouts.app')

@section('content')
<div class="p-0 pt-4 bs-stepper-content pt-md-5">
    <div class="row g-4">

        <!-- Main content START -->
        <div class="col-6 offset-3">

                <!-- Step 1 content START -->
                <div id="step-1" role="tabpanel" class="content " aria-labelledby="steppertrigger1">
                    <div class="gap-4 vstack">
                    <h4 class="mb-0">Basic Information</h4>

									<!-- Listing category START -->
									<div class="shadow card">

										<!-- Card header -->
										<div class="card-header border-bottom">
											<!-- Title -->
											<h5 class="mb-0">Payer en avance </h5>
										</div>

										<!-- Card body START -->
										<div class="card-body">
                                        <form method="POST" action="{{route('profile.pay.rent')}}">
                                            @csrf
                                            <div class="row g-4">
                                                <div class="col-12">
                                                    <label class="form-label">Choisir le nombre mois a payé en avance *</label>
                                                    <select name="month" id="month-selector" class="form-select js-choice">
                                                        <option value="">Select type</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                    <small> payer en avance sur votre loyer <small>
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label">Prix du loyer selon contract *</label>
                                                    <input id="rent-price" class="form-control" disabled type="number" placeholder="{{ $contract->property->price }}" value="{{ $contract->property->price }}">
                                                    <small>Loyé en fonction du contract</small>
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label">Total a payer en fonction nombre de mois *</label>
                                                    <input name="amount" id="total-payment" class="form-control" type="number" placeholder="">
                                                    <small>Loyé en fonction du contract</small>
                                                </div>
                                            </div>
                                            <input type="submit" value="payer" class="btn btn-primary">
                                        </form>

                                        <script>
                                            document.getElementById('month-selector').addEventListener('change', function() {
                                                var month = this.value;
                                                var rentPrice = document.getElementById('rent-price').value;
                                                var totalPayment = month * rentPrice;
                                                document.getElementById('total-payment').value = totalPayment;
                                            });
                                        </script>
										</div>
										<!-- Card body END -->

									</div>


                </div>

        </div>
    </div>
</div>
                <!-- Step 1 content END -->


@endsection
