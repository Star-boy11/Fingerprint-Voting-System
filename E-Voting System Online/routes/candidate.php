<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link type="text/css" href="../css/style.css" rel="stylesheet">
    <link rel="icon" type="image/ico" href="favicon.ico">
  	
    <title>E-Voting System</title>
</head>
<body>
    
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
              <a class="navbar-brand text-light" >E-Voting</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav coloumn align-items-center">
                  <a class="nav-link active" aria-current="page" href="../routes/candidate.php">Add Candidate</a>
                  <a class="nav-link" href="../routes/voters.php">Add Voters</a>
                  <a class="nav-link" href="../routes/result.php">View Result</a>
                  <a class="nav-link" href="../routes/reset_vote.php">Vote reset</a>
                  <a class="nav-link" href="../routes/voter_del.php">Voter Remove</a>

                </div>
              </div>
              <a href="../index.html" class="btn text-end">Log Out</a>
            </div>
          </nav>
          
          <h1 class="text-center mt-4">Welcome to Admin Page</h1>

          <div class="container 
          form-body">
            <div class="row">
                <div class="form-holder">
                    <div class="form-content">
                        <div class="form-items">
                            <h3>Register Form</h3>
                            <p>Fill in the data below.</p>
                            <form class="requires-validation" enctype="multipart/form-data" action="../api/cand.php" method="POST" novalidate >
    
                                <div class="col-md-12 mb-3">
                                   <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                                   
                                </div>

                                <div class="col-md-12 mb-3">
                                  <input class="form-control" type="tel" name="phonenumber" placeholder="Phone Number" required>
                                  
                                </div>
    
                               <div class="col-md-12">
                                  <input class="form-control" type="text" name="cadid" placeholder="Candidate Id" required>
                                   <div class="valid-feedback">Candidate Id is valid!</div>
                                   <div class="invalid-feedback">Candidate Id cannot be blank!</div>
                               </div>
    
    
                               <div class="col-md-12 mt-3">
                                
                                <label class="mb-3 mr-1" for="gender">Gender: </label>

                                <input type="radio" class="btn-check" name="gender" id="male"  value="Male" autocomplete="off" required>
                                <label class="btn btn-sm btn-outline-secondary" for="male">Male</label>

                                <input type="radio" class="btn-check" name="gender" id="female"  value="Female" autocomplete="off" required>
                                <label class="btn btn-sm btn-outline-secondary" for="female">Female</label>

                                <input type="radio" class="btn-check" name="gender" id="others"  value="Others" autocomplete="off" required>
                                <label class="btn btn-sm btn-outline-secondary" for="others">Others</label>
    
                                
                                <div><br>
                                  <p><label for="file" class="btn" name="image" style="cursor: pointer;">Upload Image</label></p>
                                  <p><input type="file"  accept="image/*" name="image" id="file" ></p>
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
	  <script type="module" src="/static/app.js"></script>

</body>
</html>