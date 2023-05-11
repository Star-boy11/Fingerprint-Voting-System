<?php
session_start(); 
include("../api/connect.php");

if (isset($_POST['voterid'])) {
	$votid = $_POST['voterid'];
	setcookie('voterid', serialize($votid), time() + 3600, '/');

	$check_query = "SELECT * FROM voter WHERE voterid = $votid";
	$check_result = mysqli_query($connect, $check_query);

	if (mysqli_num_rows($check_result) > 0) {
		$userdata = mysqli_fetch_array($check_result);
		$groups = mysqli_query($connect,"SELECT * FROM candidate");
		$groupdata = array();
		while ($row = mysqli_fetch_assoc($groups)) {
			$groupdata[] = $row;
		}
		$_SESSION['groupdata'] = $groupdata;

		$_SESSION['userdata'] = $userdata;
		
			#setcookie('userdata', serialize($userdata), time() + 3600, '/');
		echo '
				<script>
					alert("id accepted");
					window.location = "./voterfig.php";
				</script>';	
		
		
	} else {
		echo '
			<script>
				alert("Invalid credentials");
				window.location = "./voterlogin.php";
			</script>';
	}
}

if (isset($_POST['voterid'])) {
	$candid = $_POST['voterid'];

	$sql = 'SELECT isotemplate FROM voter WHERE voterid = ' . $votid;
	$result = mysqli_query($connect, $sql);

	if ($result === false) {
		die('Error: ' . mysqli_error($connect));
	}

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$isotemplate = $row['isotemplate'];
		setcookie('isotemplate', $isotemplate, time() + 3600, '/');
	} else {
		echo '
			<script>
				alert("No Fingerprint data");
				window.location = "./voterlogin.php";
			</script>';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link type="text/css" href="../css/style.css" rel="stylesheet">
    <link rel="icon" type="image/ico" href="favicon.ico">
    <title>E-Voting System </title>
</head>
<body>
    <h1 class="text-center mt-2">Welcome to E-Voting</h1>

	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-3">
					<div class="section pb-3 pt-3 pt-sm-2 text-center">
						<h6 class="mb-0 pb-2"><span>Log In </span></h6>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-2 pb-3">Voter Log In</h4>
											<form  method="POST">
												<div class="form-group">
                                                    <input class="form-control" type="text" name="voterid" placeholder="Voter id" required>
												</div>	
												
												<button type="submit" class="btn mt-4">submit</button>
                            					
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

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></>
    <script src="index.js"></script>
</body>
</html>