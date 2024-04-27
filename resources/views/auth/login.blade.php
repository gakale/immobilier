<!DOCTYPE html>
<html lang="fr">

<!-- Mirrored from booking.webestica.com/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Apr 2024 19:55:01 GMT -->
<head>
	<title>Immobilier Login</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Booking - Multipurpose Online Booking Theme">

	<!-- Dark mode -->
	<script>
		const storedTheme = localStorage.getItem('theme')

		const getPreferredTheme = () => {
			if (storedTheme) {
				return storedTheme
			}
			return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
		}

		const setTheme = function (theme) {
			if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
				document.documentElement.setAttribute('data-bs-theme', 'dark')
			} else {
				document.documentElement.setAttribute('data-bs-theme', theme)
			}
		}

		setTheme(getPreferredTheme())

		window.addEventListener('DOMContentLoaded', () => {
		    var el = document.querySelector('.theme-icon-active');
			if(el != 'undefined' && el != null) {
				const showActiveTheme = theme => {
				const activeThemeIcon = document.querySelector('.theme-icon-active use')
				const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
				const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

				document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
					element.classList.remove('active')
				})

				btnToActive.classList.add('active')
				activeThemeIcon.setAttribute('href', svgOfActiveBtn)
			}

			window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
				if (storedTheme !== 'light' || storedTheme !== 'dark') {
					setTheme(getPreferredTheme())
				}
			})

			showActiveTheme(getPreferredTheme())

			document.querySelectorAll('[data-bs-theme-value]')
				.forEach(toggle => {
					toggle.addEventListener('click', () => {
						const theme = toggle.getAttribute('data-bs-theme-value')
						localStorage.setItem('theme', theme)
						setTheme(theme)
						showActiveTheme(theme)
					})
				})

			}
		})

	</script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;family=Poppins:wght@400;500;700&amp;display=swap">

	<!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">

	<!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

<!-- **************** MAIN CONTENT START **************** -->
<main>

<!-- =======================
Main Content START -->
<section class="vh-xxl-100">
	<div class="container px-0 h-100 d-flex px-sm-4">
		<div class="m-auto row justify-content-center align-items-center">
			<div class="col-12">
				<div class="overflow-hidden shadow bg-mode rounded-3">
					<div class="row g-0">
						<!-- Vector Image -->
						<div class="order-2 col-lg-6 d-flex align-items-center order-lg-1">
							<div class="p-3 p-lg-5">
								<img src="{{ asset('assets/images/element/signin.svg') }}" alt="">
							</div>
							<!-- Divider -->
							<div class="vr opacity-1 d-none d-lg-block"></div>
						</div>

						<!-- Information -->
						<div class="order-1 col-lg-6">
							<div class="p-4 p-sm-7">
								<!-- Logo -->
								<a href="index-2.html">
									<img class="mb-4 h-50px" src="{{ asset('assets/images/logo-icon.svg') }}" alt="logo">
								</a>
								<!-- Title -->
								<h1 class="mb-2 h3">Welcome back</h1>
								<p class="mb-0">New here?<a href="{{ route('register') }}"> Create an account</a></p>

								<!-- Form START -->
								<form class="mt-4 text-start" method="post" action="{{ route('login') }}">
                                    @csrf
									<!-- Email -->
									<div class="mb-3">
										<label class="form-label">Enter email id</label>
										<input type="email" class="form-control" name="email">
									</div>
									<!-- Password -->
									<div class="mb-3 position-relative">
										<label class="form-label">Enter password</label>
										<input class="form-control fakepassword" type="password" id="psw-input" name="password">
										<span class="p-0 mt-3 position-absolute top-50 end-0 translate-middle-y">
											<i class="p-2 cursor-pointer fakepasswordicon fas fa-eye-slash"></i>
										</span>
									</div>
									<!-- Remember me -->
									<div class="mb-3 d-sm-flex justify-content-between">
										<div>
											<input type="checkbox" class="form-check-input" id="rememberCheck">
											<label class="form-check-label" for="rememberCheck">Remember me?</label>
										</div>
										<a href="forgot-password.html">Forgot password?</a>
									</div>
									<!-- Button -->
									<div><button type="submit" class="mb-0 btn btn-primary w-100">Login</button></div>

									<!-- Divider -->
									<div class="my-4 position-relative">
										<hr>
										<p class="px-2 small bg-mode position-absolute top-50 start-50 translate-middle">Or sign in with</p>
									</div>

									<!-- Google and facebook button -->
									<div class="gap-3 vstack">
										<a href="#" class="mb-0 btn btn-light"><i class="fab fa-fw fa-google text-google-icon me-2"></i>Sign in with Google</a>
										<a href="#" class="mb-0 btn btn-light"><i class="fab fa-fw fa-facebook-f text-facebook me-2"></i>Sign in with Facebook</a>
									</div>

									<!-- Copyright -->
									<div class="mt-3 text-center text-primary-hover text-body"> Copyrights ©2023 Booking. Build by <a href="https://www.webestica.com/" class="text-body">Webestica</a>. </div>
								</form>
								<!-- Form END -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- =======================
Main Content END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- Back to top -->
<div class="back-top"></div>

<!-- Bootstrap JS -->
<script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

<!-- ThemeFunctions -->
<script src="{{ asset('assets/js/functions.js') }}"></script>

</body>

<!-- Mirrored from booking.webestica.com/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Apr 2024 19:55:02 GMT -->
</html>
