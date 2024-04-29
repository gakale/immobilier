@extends('layouts.app')
@section('content')
<section class="pt-0">
	<div class="container gap-4 vstack">
		<!-- Title START -->
		<div class="row">
			<div class="col-12">
				<h1 class="mb-0 fs-4"><i class="bi bi-gear fa-fw me-1"></i>Settings</h1>
			</div>
		</div>
		<!-- Title END -->

		<!-- Tabs START -->
		<div class="row g-4">
			<div class="col-12">
				<div class="px-2 pb-0 bg-light px-lg-0 rounded-top">
					<ul class="border-0 nav nav-tabs nav-bottom-line nav-responsive nav-justified" role="tablist">
						<li class="nav-item"> <a class="mb-0 nav-link active" data-bs-toggle="tab" href="#tab-1"><i class="fas fa-cog fa-fw me-2"></i>Edit Profile</a> </li>
						<li class="nav-item"> <a class="mb-0 nav-link" data-bs-toggle="tab" href="#tab-2"><i class="fas fa-bell fa-fw me-2"></i>Notification Settings</a> </li>
						<li class="nav-item"> <a class="mb-0 nav-link" data-bs-toggle="tab" href="#tab-3"><i class="fas fa-user-circle fa-fw me-2"></i>Account Settings</a> </li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Tabs END -->

		<!-- Tabs Content START -->
		<div class="row g-4">
			<div class="col-12">
				<div class="tab-content">
					<!-- Tab content 1 START -->
					<div class="tab-pane show active" id="tab-1">
						<div class="row g-4">
							<!-- Edit profile START -->
							<div class="col-12">
								<div class="border card">
									<div class="card-header border-bottom">
										<h5 class="card-header-title">Edit Profile</h5>
									</div>
									<div class="card-body">
										<!-- Full name -->
										<div class="mb-3">
											<label class="form-label">Name</label>
											<input type="text" class="form-control" value="{{ $tenant->name }}" placeholder="Name">
										</div>
										<!-- Profile picture -->
										<div class="mb-3">
											<label class="form-label">Profile picture</label>
											<!-- Avatar upload START -->
											<div class="d-flex align-items-center">
												<label class="position-relative me-4" for="uploadfile-1" title="Replace this pic">
													<!-- Avatar place holder -->
													<span class="avatar avatar-xl">
														<img id="uploadfile-1-preview" class="border border-white shadow avatar-img rounded-circle border-3" src="{{ asset('assets/images/avatar/01.jpg') }}" alt="">
													</span>
												</label>
												<!-- Upload button -->
												<label class="mb-0 btn btn-sm btn-primary-soft" for="uploadfile-1">Change</label>
												<input id="uploadfile-1" class="form-control d-none" type="file">
											</div>
											<!-- Avatar upload END -->
										</div>
										<!-- Email id -->
										<div class="mb-3">
											<label class="form-label">Email id</label>
											<input type="email" class="form-control" value="{{ $tenant->email }}" placeholder="Enter your email id">
										</div>
										<!-- Mobile number -->
										<div class="mb-3">
											<label class="form-label">Mobile number</label>
											<input type="text" class="form-control" value="222 555 666" placeholder="Enter your mobile number">
										</div>
										<!-- Location -->
                                        <div class="mb-3">
                                            <label class="form-label">Location</label>
                                            <input class="form-control" type="text" value="{{$tenant->contract->property->name}}">
                                        </div>
										<!-- Birthday -->
										<div>
											<label class="form-label">Birthday</label>
											<input type="text" class="form-control flatpickr" value="29 Aug 1994" placeholder="Enter your birth-date" data-date-format="d M Y">
										</div>
										<!-- Save button -->
										<div class="mt-4 d-flex justify-content-end">
											<a href="#" class="border-0 btn text-secondary me-2">Discard</a>
											<a href="#" class="btn btn-primary">Save change</a>
										</div>
									</div>
								</div>
							</div>
							<!-- Edit profile END -->

							<!-- Update Email START -->
							<div class="col-md-6">
								<div class="border card">
									<div class="card-header border-bottom">
										<h5 class="card-header-title">Update Email</h5>
										<p class="mb-0 small">Your current email address is <span class="text-primary">example@gmail.com</span></p>
									</div>
									<form class="card-body">
										<!-- Email -->
										<label class="form-label">Enter your new email id</label>
										<input type="email" class="form-control" placeholder="Enter your email id">

										<div class="mt-3 text-end">
											<a href="#" class="mb-0 btn btn-primary">Save Email</a>
										</div>
									</form>
								</div>
							</div>
							<!-- Update Email END -->

							<!-- Update Password START -->
							<div class="col-md-6">
								<div class="border card">
									<div class="card-header border-bottom">
										<h5 class="card-header-title">Update Password</h5>
										<p class="mb-0 small">Your current email address is <span class="text-primary">example@gmail.com</span></p>
									</div>
									<!-- Card body START -->
									<form class="card-body">
										<!-- Current password -->
										<div class="mb-3">
											<label class="form-label">Current password</label>
											<input class="form-control" type="password" placeholder="Enter current password">
										</div>
										<!-- New password -->
										<div class="mb-3">
											<label class="form-label"> Enter new password</label>
											<div class="input-group">
												<input class="form-control fakepassword" type="password" id="psw-input" placeholder="Enter new password">
												<span class="p-0 bg-transparent input-group-text">
													<i class="p-2 cursor-pointer fakepasswordicon fas fa-eye-slash"></i>
												</span>
											</div>
										</div>
										<!-- Confirm -->
										<div>
											<label class="form-label">Confirm new password</label>
											<input class="form-control" type="password" placeholder="Confirm new password">
										</div>

										<div class="mt-3 text-end">
											<a href="#" class="mb-0 btn btn-primary">Change Password</a>
										</div>
									</form>
									<!-- Card body END -->
								</div>
							</div>
							<!-- Update Password END -->
						</div>
					</div>
					<!-- Tab content 1 END -->

					<!-- Tab content 2 START -->
					<div class="tab-pane" id="tab-2">
						<div class="mb-4 border card">
							<!-- Card header -->
							<div class="bg-transparent card-header border-bottom">
								<h5 class="card-header-title">Notification Settings</h5>
								<p class="mb-0">Figure what you want to be notified about, and unsubscribe from what you don't.</p>
							</div>

							<!-- Form START -->
							<form class="card-body">
								<!-- Radio -->
								<div class="mb-4">
									<label class="form-label">Newsletter *</label>
									<div class="flex-wrap gap-4 d-flex">
										<div class="form-check radio-bg-light">
											<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDaily" checked="">
											<label class="form-check-label" for="flexRadioDaily">
												Daily
											</label>
										</div>
										<div class="form-check radio-bg-light">
											<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
											<label class="form-check-label" for="flexRadioDefault2">
												Twice a week
											</label>
										</div>
										<div class="form-check radio-bg-light">
											<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
											<label class="form-check-label" for="flexRadioDefault3">
												Weekly
											</label>
										</div>
										<div class="form-check radio-bg-light">
											<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
											<label class="form-check-label" for="flexRadioDefault4">
												Never
											</label>
										</div>
									</div>
								</div>

								<!-- Switch -->
								<div class="mb-4 form-check form-switch form-check-md d-flex justify-content-between">
									<label class="form-check-label ps-0 pe-4" for="checkPrivacy1">Notify me via email when logging in</label>
									<input class="flex-shrink-0 form-check-input" type="checkbox" id="checkPrivacy1" checked="">
								</div>

								<!-- Switch -->
								<div class="mb-4 form-check form-switch form-check-md d-flex justify-content-between">
									<label class="form-check-label ps-0 pe-4" for="checkPrivacy2">I would like to receive booking assist reminders</label>
									<input class="flex-shrink-0 form-check-input" type="checkbox" id="checkPrivacy2" checked="">
								</div>

								<!-- Switch -->
								<div class="mb-4 form-check form-switch form-check-md d-flex justify-content-between">
									<label class="form-check-label ps-0 pe-4" for="checkPrivacy3">I would like to receive emails about Booking promotions</label>
									<input class="flex-shrink-0 form-check-input" type="checkbox" id="checkPrivacy3" checked="">
								</div>

									<!-- Switch -->
								<div class="mb-4 form-check form-switch form-check-md d-flex justify-content-between">
									<label class="form-check-label ps-0 pe-4" for="checkPrivacy7">I would like to know about information and offers related to my upcoming trip</label>
									<input class="flex-shrink-0 form-check-input" type="checkbox" id="checkPrivacy7" checked="">
								</div>

								<!-- Switch -->
								<div class="mb-4 form-check form-switch form-check-md d-flex justify-content-between">
									<label class="form-check-label ps-0 pe-4" for="checkPrivacy4">Show your profile publicly</label>
									<input class="flex-shrink-0 form-check-input" type="checkbox" id="checkPrivacy4">
								</div>

								<!-- Switch -->
								<div class="mb-4 form-check form-switch form-check-md d-flex justify-content-between">
									<label class="form-check-label ps-0 pe-4" for="checkPrivacy6">Send SMS confirmation for all online payments</label>
									<input class="flex-shrink-0 form-check-input" type="checkbox" id="checkPrivacy6">
								</div>

								<!-- Switch -->
								<div class="mb-4 form-check form-switch form-check-md d-flex justify-content-between">
									<label class="form-check-label ps-0 pe-4" for="checkPrivacy5">Check which device(s) access your account</label>
									<input class="flex-shrink-0 form-check-input" type="checkbox" id="checkPrivacy5" checked="">
								</div>

								<!-- Button -->
								<div class="d-sm-flex justify-content-end">
									<button type="button" class="mb-0 btn btn-sm btn-primary me-2">Save changes</button>
									<a href="#" class="mb-0 btn btn-sm btn-outline-secondary">Cancel</a>
								</div>
							</form>
							<!-- Form END -->
						</div>
					</div>
					<!-- Tab content 2 END -->

					<!-- Tab content 3 START -->
					<div class="tab-pane" id="tab-3">
						<div class="row g-4">
							<!-- Security settings START -->
							<div class="col-12">
								<div class="border card">
									<div class="card-header border-bottom">
										<h5 class="card-header-title">Security settings</h5>
									</div>
									<div class="card-body">
										<!-- Two step -->
										<form class="mb-3">
											<h6>Two-factor authentication</h6>
											<label class="form-label">Add a phone number to set up two-factor authentication</label>
											<input type="text" class="mb-2 form-control" placeholder="Enter your mobile number">
											<button class="mb-0 btn btn-sm btn-primary">Send Code</button>
										</form>
									</div>
								</div>
							</div>
							<!-- Security settings END -->

							<!-- Linked account START -->
							<div class="col-lg-6">
								<div class="border card rounded-3">
									<!-- Card header -->
									<div class="card-header border-bottom">
										<h5 class="card-header-title">Linked account</h5>
									</div>
									<!-- Card body START -->
									<div class="pb-0 card-body">
										<!-- Google -->
										<div class="p-3 mb-4 border rounded position-relative d-sm-flex bg-success bg-opacity-10 border-success">
											<!-- Title and content -->
											<h2 class="mb-0 fs-1 me-3"><i class="fab fa-google text-google-icon"></i></h2>
											<div>
												<div class="top-0 bg-white position-absolute start-100 translate-middle rounded-circle lh-1 h-20px">
													<i class="bi bi-check-circle-fill text-success fs-5"></i>
												</div>
													<h6 class="mb-1">Google</h6>
													<p class="mb-1 small">You are successfully connected to your Google account</p>
													<!-- Button -->
													<button type="button" class="mb-0 btn btn-sm btn-danger">Invoke</button>
													<a href="#" class="mb-0 btn btn-sm btn-link text-body">Learn more</a>
											</div>
										</div>

										<!-- Linkedin -->
										<div class="p-3 mb-4 border rounded d-sm-flex">
											<!-- Title and content -->
											<h2 class="mb-0 fs-1 me-3"><i class="fab fa-linkedin-in text-linkedin"></i></h2>
											<div>
												<h6 class="mb-1">Linkedin</h6>
												<p class="mb-1 small">Connect with Linkedin account for a personalized experience</p>
												<!-- Button -->
												<button type="button" class="mb-0 btn btn-sm btn-primary">Connect Linkedin</button>
												<a href="#" class="mb-0 btn btn-sm btn-link text-body">Learn more</a>
											</div>
										</div>

										<!-- Facebook -->
										<div class="p-3 mb-4 border rounded d-sm-flex">
											<!-- Title and content -->
											<h2 class="mb-0 fs-1 me-3"><i class="fab fa-facebook text-facebook"></i></h2>
											<div>
												<h6 class="mb-1">Facebook</h6>
												<p class="mb-1 small">Connect with Facebook account for a personalized experience</p>
												<!-- Button -->
												<button type="button" class="mb-0 btn btn-sm btn-primary">Connect Facebook</button>
												<a href="#" class="mb-0 btn btn-sm btn-link text-body">Learn more</a>
											</div>
										</div>
									</div>
									<!-- Card body END -->
								</div>
							</div>
							<!-- Linked account END -->

							<!-- Social account END -->
							<div class="col-lg-6">
								<div class="border card rounded-3">
									<!-- Card header -->
									<div class="card-header border-bottom">
										<h5 class="card-header-title">Social media profile</h5>
									</div>
									<!-- Card body START -->
									<div class="card-body">
										<!-- Facebook username -->
										<div class="mb-3">
											<label class="form-label"><i class="fab fa-facebook text-facebook me-2"></i>Enter facebook username</label>
											<input class="form-control" type="text" value="loristev" placeholder="Enter username">
										</div>

										<!-- Twitter username -->
										<div class="mb-3">
											<label class="form-label"><i class="bi bi-twitter text-twitter me-2"></i>Enter twitter username</label>
											<input class="form-control" type="text" value="loristev" placeholder="Enter username">
										</div>

										<!-- Instagram username -->
										<div class="mb-3">
											<label class="form-label"><i class="fab fa-instagram text-instagram-gradient me-2"></i>Enter instagram username</label>
											<input class="form-control" type="text" value="loristev" placeholder="Enter username">
										</div>

										<!-- Youtube -->
										<div class="mb-3">
											<label class="form-label"><i class="fab fa-youtube text-youtube me-2"></i>Add your youtube profile URL</label>
											<input class="form-control" type="text" value="https://www.youtube.com/in/Booking-05620abc" placeholder="Enter username">
										</div>

										<!-- Button -->
										<div class="mt-4 d-flex justify-content-end">
											<button type="button" class="mb-0 btn btn-primary">Save change</button>
										</div>
									</div>
									<!-- Card body END -->
								</div>
							</div>
							<!-- Social account END -->

							<!-- Active logs START -->
							<div class="col-12">
								<div class="border card">

									<!-- Card header -->
									<div class="card-header border-bottom">
										<h5 class="card-header-title">Active Logs</h5>
									</div>

									<!-- Card body START -->
									<div class="card-body">
										<!-- Table START -->
										<div class="border-0 table-responsive">
											<table class="table p-4 mb-0 align-middle table-hover">

												<!-- Table head -->
												<thead class="table-light">
													<tr>
														<th scope="col" class="border-0 rounded-start">Browser</th>
														<th scope="col" class="border-0">IP</th>
														<th scope="col" class="border-0">Time</th>
														<th scope="col" class="border-0 rounded-end">Action</th>
													</tr>
												</thead>

												<!-- Table body START -->
												<tbody>
													<!-- Table row -->
													<tr>
														<td> Chrome On Window </td>
														<td> 173.238.198.108 </td>
														<td> 12 Nov 2021 </td>
														<td> <button class="mb-1 btn btn-sm btn-danger-soft me-1 mb-md-0">Sign out</button> </td>
													</tr>

													<!-- Table row -->
													<tr>
														<td> Mozilla On Window </td>
														<td> 107.222.146.90 </td>
														<td> 08 Nov 2021 </td>
														<td> <button class="mb-1 btn btn-sm btn-danger-soft me-1 mb-md-0">Sign out</button> </td>
													</tr>

													<!-- Table row -->
													<tr>
														<td> Chrome On iMac </td>
														<td> 231.213.125.55 </td>
														<td> 06 Nov 2021 </td>
														<td> <button class="mb-1 btn btn-sm btn-danger-soft me-1 mb-md-0">Sign out</button> </td>
													</tr>

													<!-- Table row -->
													<tr>
														<td >Mozilla On Window </td>
														<td> 37.242.105.138 </td>
														<td> 02 Nov 2021 </td>
														<td> <button class="mb-1 btn btn-sm btn-danger-soft me-1 mb-md-0">Sign out</button> </td>
													</tr>
												</tbody>
												<!-- Table body END -->
											</table>
										</div>
										<!-- Table END -->

										<!-- Active session -->
										<form class="mt-4">
											<h6 class="mb-0">Active sessions</h6>
											<p class="mb-2">Selecting "Sign out" will sign you out from all devices except this one. This can take up to 10 minutes.</p>
											<button class="mb-0 btn btn-sm btn-danger">Sign Out of all devices</button>
										</form>
									</div>
									<!-- Card body END -->
								</div>
							</div>
							<!-- Active logs END -->
						</div>
					</div>
					<!-- Tab content 3 END -->
				</div>
			</div>
		</div>
		<!-- Tabs Content END -->
	</div>
</section>
@endsection
