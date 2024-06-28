<?php
include("../connection.php");

$id    = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$dob   = $_POST['dob'];
$phone = $_POST['phone'];
$email = $_POST['email'];


if(isset($_POST['change_password'])) {
    $pwd = $_POST['pwd'];
    $password_query = ", pwd='$pwd'";
} else {

    $password_query = "";
}

$result = mysqli_query($conn, "SELECT * FROM new_tb WHERE email = '$email'");
$row = mysqli_fetch_assoc($result);

if ($row && $row['id'] != $id) {
    echo "exists"; 
} else {

    $query = "UPDATE new_tb SET fname='$fname', lname='$lname', dob='$dob', phone='$phone', email='$email' $password_query WHERE id='$id'";
    $data = mysqli_query($conn, $query);
    if ($data) {
        echo "success"; 
    } else {
        echo "error";
    }
}
?>
