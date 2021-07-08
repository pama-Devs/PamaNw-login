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
	<style>
            .register .nav-tabs .nav-link:hover{
                border: none;
            }
            .text-align{
                margin-top: -3%;
                margin-bottom: -9%;

                padding: 10%;
                margin-left: 30%;
            }
            .form-new{
                margin-right: 22%;
                margin-left: 20%;
            }
            .register-heading{
                align-items: center;
                margin-bottom: 10%;
                color: #000;
            } 
            .register{
                
                margin-top: 3%;
                padding: 3%;
                border-radius: 2.5rem;
            }
            .btnSubmit
            {
                width: 50%;
                border-radius: 1rem;
                padding: 1.5%;
                color: #fff;
                background-color: #03612e;
                border: none;
                cursor: pointer;
                margin-right: 6%;
                color: rgb(246, 246, 252);
                margin-top: 4%;
            }
    </style>
</head>

<body class="my-login-page">

<form method="post" action="user.php">
  	<?php include('errors.php'); ?>

	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="img/Logo.png" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">User Landing</h4>
							<form method="POST" class="my-login-validation" novalidate="">
							<label for="Info">Logged In</label>
							</form> <br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="container register">
            <div class="row">
                <div class="col-md-12">
                        <div class="tab-pane fade show active text-align form-new" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Daily Report</h3>
                            <div class="row register-form">
                                <div class="col-md-12">
                                    <form method="post" autocomplete="off" name="google-sheet">
                                        <div class="form-group">
                                            <input type="date" name="Date" class="form-control" placeholder="Date *" value="" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="Name" class="form-control" placeholder="Your Name *" value="" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" type="text" name="Report"  placeholder="Report" rows="5" value="" required=""></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="submit" class="btnSubmit btn-block" value="Submit" />
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
          
          <script>
            const scriptURL = 'https://script.google.com/macros/s/AKfycbx0RL5MeIdUX_TSHymHnbAU_fQLDmmU0KZ-iIUlIBkdQDxdFGyxYUXTAPAK2yLCTja8/exec'
            const form = document.forms['google-sheet']
          
            form.addEventListener('submit', e => {
              e.preventDefault()
              fetch(scriptURL, { method: 'POST', body: new FormData(form)})
                .then(response => alert("Your report has been submitted successfully..."))
                .catch(error => console.error('Error!', error.message))
            })
          </script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</form>
</body>
</html>