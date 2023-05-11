<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link type="text/css" href="../css/style.css" rel="stylesheet">
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
                  <a class="nav-link" href="../routes/candidate.php">Add Candidate</a>
                  <a class="nav-link" href="../routes/voters.php">Add Voters</a>
                  <a class="nav-link" href="../routes/result.php">View Result</a>
                  <a class="nav-link active" aria-current="page" href="../routes/reset_vote.php">Vote reset</a>
                  <a class="nav-link" href="../routes/voter_del.php">Voter Remove</a>

                </div>
              </div>
              <a href="../index.html" class="btn text-end">Log Out</a>
            </div>
          </nav>
          
    <h1 class="text-center mt-4">Election Result</h1><br><br><br>
    <div class="container form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <form class="requires-validation" action="../api/voter_resets.php" method="POST">
                            <div>
                                <div style="text-align: center;">
                                    <button type="submit" name="submit" class="btn text-end">Reset</button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        
    </script>
</body>
</html>