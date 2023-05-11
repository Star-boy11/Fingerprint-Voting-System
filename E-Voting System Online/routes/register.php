<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link type="text/css" href="../css/style.css" rel="stylesheet">
	<script defer type="module" src="login.js"></script>
	<script defer type="module" src="app.js"></script>
    <title>E-Voting System</title>
</head>
<body>
    <h1 class="text-center mt-2">Welcome to E-Voting</h1>

	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-3">
					<div class="section pb-3 pt-3 pt-sm-2 text-center">
						<h6 class="mb-0 pb-2"><span>Sign Up</span></h6>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
                                        <h4 class="mb-4 pb-3">Admin Registration</h4>
											<form action="../api/register.php" method="POST">
												<div class="form-group">
													<input type="text" name="logname" class="form-style" placeholder="Your Full Name" id="logname" autocomplete="off">
													<i class="input-icon uil uil-user"></i>
												</div>	
												<div class="form-group mt-2">
													<input type="email" name="logemail" class="form-style" placeholder="Your Email" id="logemail" autocomplete="off">
													<i class="input-icon uil uil-at"></i>
												</div>	
												<div class="form-group mt-2">
													<input type="password" name="logpass" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<button type="submit" name="submit" class="btn mt-4" id="register">Register</button>
												<p class="mb-0 mt-4 text-center"><a href = "../index.html" class="link">Admin Login?</a></p>
											</form>	
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="index.js"></script>
</body>
</html>