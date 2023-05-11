<?php
    session_start();
    include("../api/connect.php");
    if (!isset($_SESSION['userdata'])) {
        echo 'Error setting userdata session';
    } 
    if (!isset($_SESSION['groupdata'])) {
        echo 'Error setting groupdata session';
    } else {
        $userdata = $_SESSION['userdata'];
        $groupdata = $_SESSION['groupdata'];
    }

    if($_SESSION['userdata']['status']==0){
        $status='<b style="color:red">Not Voted</b>';
    }else{
        $status='<b style="color:green">Voted</b>';
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
    <title>E-Voting System</title>
</head>
<body>   
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
              <a class="navbar-brand text-light" >E-Voting</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <a href="./logout.php" class="btn text-end">Log Out</a>
            </div>
          </nav>
        <h1 class="text-center mt-4">Welcome to voting Page</h1>
        <div class="container form-body">
            <div class="row">
                <div class="form-holder">
                    <div class="form-content">
                        <div class="form-items">
                            <h3></h3><br><br><br>

                            <style>
                                #profile{
                                    background-color: whitesmoke;
                                    color: black;
                                    width: 25%;
                                    padding: 10px;
                                    float: left;
                                    /* margin:5px; */
                                }
                                #groupsdata{
                                    background-color: whitesmoke;
                                    color: black;
                                    width: 74%;
                                    /* margin-top:4px; */
                                    padding: 20px;
                                    float:right;
                                }
                                #groupsdata img {
                                    float: right;
                                }     
                            </style>   
                            
                            <form action="../api/votingr.php" method="POST">
                            <div class="container-fluid">
                                <?php if (isset($userdata)): ?>
                                    <div id="profile" class="row justify-content-center">
                                        <div class="text-center">
                                            <img src="../votersimage/<?php echo $userdata['image'] ?>" class="img-fluid rounded" height="100" width="100"><br><br>
                                        </div>
                                        <div class="col-md-10">
                                            <h4 class="mb-3"><?php echo $userdata['name'] ?></h4>
                                            <p class="font-weight-bold mb-0">Phone number:</p>
                                            <p><?php echo $userdata['number'] ?></p>
                                            <p class="font-weight-bold mb-0">Department:</p>
                                            <p><?php echo $userdata['deapartment'] ?></p>
                                            <p class="font-weight-bold mb-0">Gender:</p>
                                            <p><?php echo $userdata['gender'] ?></p>
                                            <p class="font-weight-bold mb-0">Status:</p>
                                            <p><?php echo $status ?></p>

                                            <input type="hidden" name="vid" value="<?php echo $userdata['voterid'] ?>">
                                        </div>
                                
                                <?php endif; ?>
                                </div>
                                <div id="groupsdata" >
                                    <?php 
                                    if (!empty($groupdata)){
                                        $counter = 1; // initialize counter variable
                                        foreach ($groupdata as $candidate) {
                                            ?>
                                            <div class="container-fluid">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <p><?php echo $counter ?></p> <!-- display counter variable -->
                                                    </div>
                                                    <div class="col">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <p>Candidate Name: <?php echo $candidate['name'] ?></p>
                                                            </div>
                                                            <!-- <div class="col">
                                                                <p>Candidate ID: <?php echo $candidate['candidateid'] ?></p>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <img class="mb-2 rounded" src="../uploads/<?php echo $candidate['photo'] ?>" height="90" width="90" style="margin-right:10px";>
                                                    </div>
                                                    <div class="col-auto">
                                                        <form action="../api/votingr.php" method="POST">
                                                            <input type="hidden" name="gvotes" value="<?php echo $candidate['votes'] ?>">
                                                            <input type="hidden" name="gname" value="<?php echo $candidate['name'] ?>">
                                                            <?php if($_SESSION['userdata']['status']==1){ ?>
                                                                <button type="button" name="votebtn" value="Vote" id="votebtn" class="btn btn-primary" disabled>Voted</button>
                                                            <?php } else { ?>
                                                                <button type="submit" name="votebtn" value="Vote" class="btn btn-primary">Vote</button>
                                                            <?php } ?>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $counter++; // increment counter variable
                                        }
                                    }else{
                                        ?>
                                        <div style="border-bottom: 1px solid #bdc3c7; margin-bottom: 10px">
                                            <b>No groups available right now.</b>    
                                        </div>
                                        <?php
                                    } 
                                    ?> 
                                </div>
                                </div>
                            </form>             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
    
	  

</body>
</html>
