<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link type="text/css" href="../css/style.css" rel="stylesheet">
    <title>E-Voting</title>
    <script src="./jquery-1.8.2.js" type="text/javascript"></script>
	<script src="./mfs100.js"></script>
	<script>
		function captureFingerprint() {
			var quality = 60; //(1 to 100) (recommended minimum 55)
			var timeout = 10; // seconds (minimum=10(recommended), maximum=60, unlimited=0)

			var res = CaptureFinger(quality, timeout);
			if (res.httpStaus) {
				document.getElementById('txtStatus').value = "ErrorCode: " + res.data.ErrorCode + " ErrorDescription: " + res.data.ErrorDescription;
				if (res.data.ErrorCode == "0") {
					document.getElementById('imgFinger').src = "data:image/bmp;base64," + res.data.BitmapData;
					var imageinfo = "Quality: " + res.data.Quality + " Nfiq: " + res.data.Nfiq + " W(in): " + res.data.InWidth + " H(in): " + res.data.InHeight + " area(in): " + res.data.InArea + " Resolution: " + res.data.Resolution + " GrayScale: " + res.data.GrayScale + " Bpp: " + res.data.Bpp + " WSQCompressRatio: " + res.data.WSQCompressRatio;
					document.getElementById('txtImageInfo').value = imageinfo;
					document.getElementById('txtIsoTemplate').value = res.data.IsoTemplate;
						
				}
			}   
			else {
				alert(res.err);
			}
		}
	</script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand text-light">E-Voting</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav coloumn align-items-center">
              <a class="nav-link"  href="../routes/candidate.php">Add Candidate</a>
              <a class="nav-link active" aria-current="page" href="../routes/voters.php">Add Voters</a>
              <a class="nav-link" href="../routes/result.php">View Result</a>
              <a class="nav-link" href="../routes/reset_vote.php">Vote reset</a>
              <a class="nav-link" href="../routes/voter_del.php">Voter Remove</a>
          
            </div>
          </div>
          <a href="../index.html" class="btn text-end">Log Out</a>
        </div>
      </nav>
    <h1 class="text-center mt-4">Voters Registration Form</h1>
    
    <div class="container form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Register Form</h3>
                        <p>          </p>
                        <div class="requires-validation" novalidate>

                            <form action="../api/voter.php" method="post" enctype="multipart/form-data" class="row g-3">
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="voterid" placeholder="Voter id" required>
                                                  
                                </div>
                                <div class="col-md-4">
                            
                                    <input type="text" class="form-control" id="validationCustom01"  name="fname" placeholder="Enter Your Full Name" aria-label="Enter Your Full Name" required>
                                    
                                </div>

                                <div class="col-md-4">
                                    
                                    <input type="tel" class="form-control" name="number" id="validationCustom01" placeholder="Enter Your Phone Number" aria-label="Enter Your Phone Number" required>
                                   
                                </div>

                                <div class="col-12">
                 
                                    <input type="text" class="form-control" id="department" name="deapartment" placeholder="Enter Department of Work" required>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <label class="mb-3 mr-1" for="gender">Gender: </label>

                                    <input type="radio" class="btn-check" name="gender" id="male"  value="Male" autocomplete="off" required>
                                    <label class="btn btn-sm btn-outline-secondary" for="male">Male</label>

                                    <input type="radio" class="btn-check" name="gender" id="female"  value="Female" autocomplete="off" required>
                                    <label class="btn btn-sm btn-outline-secondary" for="female">Female</label>

                                    <input type="radio" class="btn-check" name="gender" id="others"  value="Others" autocomplete="off" required>
                                    <label class="btn btn-sm btn-outline-secondary" for="others">Others</label>
                                    
                                </div>

                                <div class="container px-4 text-center mt-2" ;>
                                    <div class="row">
                                        <div>
                                            <p><label for="file" class="btn" name="image" style="cursor: pointer;">Upload Image</label></p>
                                            <p><input type="file"  accept="image/*" name="image" id="file" ></p>
                                        </div>
                                        
                                        <div class="col-md-6 lef margintop" >
                                            <input name="ctl00$body$btnCapture" type="button" id="body_btnCapture" class="btn btn-primary col-md-12" value="Capture" onclick="captureFingerprint()" />
                                            <img id="imgFinger" src="" alt="Finger Image" style="border-color:#DDDDDD;border-width:1px;border-style:Solid;height:140px;width:140px;position:center" />
                                            <textarea id="txtStatus" rows="2" cols="50" readonly></textarea><br>
		                                    <textarea id="txtImageInfo" rows="2" cols="50" readonly></textarea><br>
                                            
                                            <input type="hidden" id="txtIsoTemplate" name="txtIsoTemplate" rows="2" cols="50" readonly>
                                        </div>
                                        

                                    </div>
                                </div>

                                

                                <div class="form-button mt-3 mb-3">
                                    <button id="submit" type="submit" name="submit" class="btn btn-primary" id="register-id">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="/index.js"></script>
</body>
</html>

