<?php

    include("connection.php");


    $name = $_POST['name'];
    $email = $_POST['email'];
    $query = $_POST['query'];
    $submit = $_POST['submit'];

    $query = "INSERT INTO booking_quaries(`id`,`name`,`email`,`query`) VALUES ('$submit','$name','$email','$query')";
    $insert_query = mysqli_query($conn,$query);
    

    if($insert_query)
    {
        echo "Query Submitted";
    }else{
        echo "error";
    }
?>