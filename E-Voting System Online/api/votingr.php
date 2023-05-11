
<?php

session_start();
include("connect.php");
if (isset($_POST['votebtn'])) {
    $votes = $_POST['gvotes'];
    $total_votes = $votes + 1;
    $gname = $_POST['gname'];
    $vid = $_POST['vid'];

    #$uid = isset($_COOKIE["votid"]) ? $_COOKIE["votid"] : "";
    
    $update_votes = mysqli_query($connect,"UPDATE candidate SET votes='$total_votes' WHERE name='$gname' ");
    $update_user_status = mysqli_query($connect,"UPDATE voter SET status = 1 WHERE voterid='$vid' ");
    if($update_votes and $update_user_status){
        $groups = mysqli_query($connect,"SELECT * FROM candidate");
        $groupdata = array();
        while ($row = mysqli_fetch_assoc($groups)) {
            $groupdata[] = $row;
        }
        $_SESSION['groupdata'] = $groupdata;
        $_SESSION['userdata']['status'] = 1;
        echo '
            <script>
                alert("Vote Saved");
                window.location = "../voterlg/logout.php";
            </script>';
    }else{
        echo '
            <script>
                alert("Error Occured");
                window.location = "../voterlg/voterlogin.php";
            </script>';
    }
   
}




?>
