<?php
session_start();
include("../api/connect.php");
$check_query1 = mysqli_query($connect, "SELECT * FROM voter");
$userdata1 = array();
while ($row1 = mysqli_fetch_assoc($check_query1)) {
    $userdata1[] = $row1;
}
$_SESSION['userdata1'] = $userdata1;

?>
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
                  <a class="nav-link" href="../routes/reset_vote.php">Vote reset</a>
                  <a class="nav-link active" aria-current="page" href="../routes/voter_del.php">Voter Remove</a>

                </div>
              </div>
              <a href="../index.html" class="btn text-end">Log Out</a>
            </div>
          </nav>
          
    <h1 class="text-center mt-4">Delete Voter</h1><br><br><br>
    <div class="container form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        
                            <div>
                            <div id="voter">
                                <?php 
                                    if (!empty($userdata1)){
                                        foreach ($userdata1 as $voter) 
                                        {
                                            ?>
                                            <div class="container"> 
                                                <div style="border-bottom: 5px solid #bdc3c7; margin-bottom: 50px; display:flex;">

                                                    <p style="margin-right: 10px; font-weight:bold">Candidate Name:<span></p> <?php echo $voter['name']?></span>
                                                    <p style="margin-left: 20px; margin-right: 10px; font-weight:bold">Phone number:<span></p> <?php echo $voter['number']?></span>
                                                    <p style="margin-left: 20px; margin-right: 10px; font-weight:bold">Gender:<span></p> <?php echo $voter['gender']?></span>
                                                    <form  action="../api/vdel.php" method="POST" style="margin-left: 20px;">
                                                        <input type="hidden" name="voterid" value="<?php echo $voter['voterid']?>">
                                                        <button type="submit" style="margin: left 20px;" name="delbtn"  >Delete</button>
                                                    </form>
                                                </div>                                               
                                            </div>
                                            <?php
                                        }
                                        
                                    }else{
                                        ?>
                                        <div style="border-bottom: 1px solid #bdc3c7; margin-bottom: 10px">
                                            <b>No Voters available right now.</b>    
                                        </div>
                                        <?php

                                    } 
                                        
                                ?>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>