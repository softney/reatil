<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
		<meta content="Coderthemes" name="author" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>Retail | Login</title>
		<!-- App favicon -->
		<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

		<!-- App css -->
		<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
		<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css"  id="app-stylesheet" />

	</head>

	<body class="authentication-bg bg-light authentication-bg-pattern d-flex align-items-center pb-0 vh-100">

		<div class="account-pages w-100 mt-5 mb-5">
			<div class="container">

				<div class="row justify-content-center">
					<div class="col-md-8 col-lg-6 col-xl-5">
						<div class="card mb-0">

							<div class="card-body p-4">

								<div class="account-box">
									<div class="account-logo-box">
										<div class="text-center">
											<div class="text-center mb-5">
												<a href="javascript: void(0);" class="text-dark font-size-32 font-family-secondary">
													<img src="{{ asset('assets/images/Logo-Reatil-Light.png') }}" height="28" style="margin-top: -10px;"> <b><span style="font-size: 22px;">RETAIL</span></b>
												</a>
											</div>
										</div>
										<h5 class="mb-1 mt-4 text-center">Inicio de Sesión</h5>
										<p class="mb-0 text-center">Ingrese su email y contraseña para acceder al sitema.</p>
									</div>

									<div class="account-content mt-4">
										<form class="form-horizontal"  action="{{ route('login') }}" method="POST" autocomplete="off">
                                            @csrf
											<div class="form-group row">
												<div class="col-12">
													<label for="emailaddress">Email</label>
													<input type="email" name="email" id="email" class="form-control form-control-user  @error('email') is-invalid @enderror"
                                                    value="{{ old('email') }}" required placeholder="Ingrese su email" autofocus>
                                                    @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
												</div>
											</div>

											<div class="form-group row">
												<div class="col-12">
													<label for="password">Contraseña</label>
													<input type="password" name="password" id="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                                    placeholder="Ingrse su contraseña" required>
                                                    @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
												</div>
											</div>

											<div class="form-group row">
											</div>

											<div class="form-group row text-center mt-2">
												<div class="col-12">
													<button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Acceder</button>
												</div>
											</div>

										</form>

										<div class="row">
										</div>

										<div class="row mt-4 pt-2">
											<div class="col-sm-12 text-center">
												<p class="text-muted mb-0">Don't have an account? <a href="page-register.html" class="text-dark ml-1"><b>Sign Up</b></a></p>
											</div>
										</div>

									</div>
								</div>
							</div>

						</div>
						<!-- end card-body -->
					</div>
					<!-- end card -->
				</div>
				<!-- end row -->
			</div>
			<!-- end container -->
		</div>
		<!-- end page -->

		<!-- Vendor js -->
		<script src="{{ asset('assets/js/vendor.min.js') }}"></script>

		<!-- App js -->
		<script src="{{ asset('assets/js/app.min.js') }}"></script>

	</body>

</html>
