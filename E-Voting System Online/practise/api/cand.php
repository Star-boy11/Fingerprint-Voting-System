<?php
    include("connect.php");

    if(isset($_POST['submit'])){
        $fname=$_POST['name'];
        $phone=$_POST['phonenumber'];
        $candidateid=$_POST['cadid'];
        $gender=$_POST['gender'];
        $image=$_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];

        if(empty($fname) || empty($phone) || empty($candidateid) || empty($gender) || empty($tmp_name)){
            echo '
            <script>
                alert("Please fill all fields.");
                window.location = "../routes/candidate.php";
            </script>';
        }else{
            $insert = mysqli_query($connect, "INSERT INTO candidate (name,number,candidateid,gender,photo) VALUES('$fname','$phone','$candidateid','$gender','$image')" );
            if($insert){
                move_uploaded_file($tmp_name,"../uploads/$image");
                echo '
                <script>
                    alert("Registration Successful");
                    window.location = "../routes/candidate.php";
                </script>';
            }else{
                echo '
                <script>
                    alert("Failed or Some error occurred");
                    window.location = "../routes/candidate.php";
                </script>';
            }
        }
    }
?>