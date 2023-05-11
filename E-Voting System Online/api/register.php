<?php
    include("connect.php");
    if(isset($_POST['submit'])){
        $name=$_POST['logname'];
        $email=$_POST['logemail'];
        $password=$_POST['logpass'];

        if(empty($name) || empty($email) || empty($password)){
            echo '
            <script>
                alert("Please fill all fields.");
                window.location = "../routes/register.php";
            </script>';
        }else{
            $insert = mysqli_query($connect, "INSERT INTO user(name,email,password) VALUES('$name','$email','$password')" );
            if($insert){
                echo '
                <script>
                    alert("Registration Successful");
                    window.location = "../index.html";
                </script>';
            }else{
                echo '
                <script>
                    alert("Registration Failed");
                    window.location = "../routes/register.php";
                </script>';
            }
        }
    }
?>
