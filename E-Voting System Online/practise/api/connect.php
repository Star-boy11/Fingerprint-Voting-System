<?php
    $connect = mysqli_connect("localhost", "root", "", "practise") or die("connection failed!");
    if (!$connect) {
        die('Connection failed: ' . mysqli_connect_error());
    }
?>