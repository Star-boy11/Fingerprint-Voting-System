<?php
    include("connect.php");
    $voterid=$_POST['voterid'];
    $fname=$_POST['fname'];
    $phone=$_POST['number'];
    $deapartment=$_POST['deapartment'];
    $gender=$_POST['gender'];
    $image=$_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];
    $isotemplate=$_POST['txtIsoTemplate'];

    // Check if all required fields are filled
    if(!empty($voterid) && !empty($fname) && !empty($phone) && !empty($deapartment) && !empty($gender) && !empty($image) && !empty($isotemplate)){
        
        $insert = mysqli_query($connect, "INSERT INTO voter (voterid,name,number,deapartment,gender,image,isotemplate) VALUES('$voterid','$fname','$phone','$deapartment','$gender','$image','$isotemplate')" );

        if($insert){
            move_uploaded_file($tmp_name,"../votersimage/$image");
            echo '
            <script>
                alert("Registration Sucessful");
                window.location = "../routes/voters.php";
            </script>';
        }else{
            echo '
            <script>
                alert(" Failed or Some error occured");
                window.location = "../routes/voters.php";
            </script>';
        }
    }else{
        echo '
            <script>
                alert(" Please fill all required fields");
                window.location = "../routes/voters.php";
            </script>';
    }
?>
