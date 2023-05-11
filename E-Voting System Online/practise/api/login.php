<?php
    include("connect.php");
    $email=$_POST['logemail'];
    $password=$_POST['logpass'];
    $check=mysqli_query($connect,"SELECT * FROM user WHERE email='$email' AND password ='$password'");
    if(mysqli_num_rows($check)>0)
    {
        echo '
        <script>
            alert("logged in");
           window.location = "../routes/candidate.php";
        </script>';
    }else{
        echo '
        <script>
            alert("Invalid Credentials or User not found");
            window.location = "../index.html";
        </script>';
    }
?>