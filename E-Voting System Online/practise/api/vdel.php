<?php
session_start();
include("connect.php");

if (isset($_POST['delbtn'])){
    $voterid = $_POST['voterid'];
    

    $delete_query = mysqli_query($connect, "DELETE FROM voter WHERE voterid='$voterid'");
    if($delete_query){
        echo '<script>
                    alert("Deleted voters successfully");
                    window.location = "../routes/voter_del.php";
                </script>';
            exit();
        }
    
    else{
        echo '<script>
                alert("");
                window.location = "../routes/voter_del.php";
            </script>';
    }
}
?>
