<?php
include("../connection.php");

$email =  $_POST['email'];


$email_query = "SELECT * FROM new_tb WHERE email = '$email' ";
$result = mysqli_query($conn, $email_query);
$email_exists = mysqli_num_rows($result);

if ($email_exists > 0) {
    
    echo 'exists'; 
} else {
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pwd = md5($_POST['pwd']);
    $user ='user';
    $sql = "INSERT INTO new_tb (fname, lname, dob, phone, email, pwd, user)
                VALUES ('$fname', '$lname', '$dob', '$phone', '$email', '$pwd','$user')";
    if (mysqli_query($conn, $sql)) {
        echo "not exist"; 
    } else {
        echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
    }
}
mysqli_close($conn);
