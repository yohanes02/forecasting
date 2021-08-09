<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<title>Login | PT Sepka Medika Alkesindo</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Flash Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
	<meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Flash Able, Flash Able bootstrap admin template">
	<meta name="author" content="Codedthemes" />

	<!-- Favicon icon -->
	<link rel="icon" href="assets/src-login/images/favicon2.jpg" type="image/x-icon">
	<!-- fontawesome icon -->
	<link rel="stylesheet" href="assets/src-login/fonts/fontawesome/css/fontawesome-all.min.css">
	<!-- animation css -->
	<link rel="stylesheet" href="assets/src-login/plugins/animation/css/animate.min.css">

	<!-- vendor css -->
	<link rel="stylesheet" href="assets/src-login/css/style.css">




</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content container">
		<div class="card">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="card-body">
						<img src="assets/src-login/images/logosepka3.png" width="70%" alt="" class="img-fluid mb-4">
						<h4 class="mb-3 f-w-400">Login into your account</h4>
						<form action="<?php echo base_url(); ?>auth" method="post">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="feather icon-user"></i></span>
								</div>
								<input type="text" class="form-control" placeholder="Username" name="username">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="feather icon-lock"></i></span>
								</div>
								<input type="password" class="form-control" placeholder="Password" name="password">
							</div>

							<div class="form-group text-left mt-2">
								<div class="checkbox checkbox-success d-inline">
									<input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
									<label for="checkbox-fill-a1" class="cr"> Save credentials</label>
								</div>
							</div>
							<?php echo $this->session->userdata('result_login'); ?>
							<button type="submit" class="btn btn-primary mb-4" style="float:right;">Login</button>
						</form>
					</div>
				</div>
				<div class="col-md-6 d-none d-md-block">
					<img src="assets/src-login/images/sepka1.png" width="97%" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="assets/src-login/js/vendor-all.min.js"></script>
<script src="assets/src-login/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>