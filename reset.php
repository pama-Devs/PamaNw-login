<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Node.Works Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>
<body class="my-login-page">
<form method="post" action="reset.php">
  	<?php include('errors.php'); ?>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center align-items-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="img/Logo.png" alt="bootstrap 4 login page">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Reset Password</h4>
                            <div class="alert alert-success col-md-12" role="alert">
                                <p>Kindly Create New Password</p>
                              </div>
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="password_1">Password</label>
									<input id="password_1" type="password" class="form-control" name="password_1" required data-eye>
									<div class="invalid-feedback">
										Password is required
									</div>
								</div>
								<div class="form-group">
									<label for="password_2">Verify Password</label>
									<input id="password_2" type="password" class="form-control" name="password_2" required data-eye>
									<div class="invalid-feedback">
										Password is required
									</div>
								</div>

								<div class="form-group m-0">
									<a href="index.html"><button type="submit" class="btn btn-primary btn-block" name="reset_pass">Reset</button></a>
								</div>
							</form>
						</div>
					</div>
					<!--<div class="footer">
						
					</div>-->
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
	</form>
</body>
</html>