<?php
include("../connection.php");

    $id = $_POST['id'];
    $confirm = $_POST['confirm'];
    $unconfirm = $_POST['unconfirm'];

    $query = "SELECT * FROM booking_details WHERE id = '$id'";
    $insert_query = mysqli_query($conn , $query);
    $result = mysqli_fetch_assoc($insert_query);

    if($id && $confirm)
    {
        $confirm = $_POST['confirm'];
        $query = "UPDATE booking_details SET status = '$confirm' WHERE id = '$id'";
        $insert_query = mysqli_query($conn , $query);
        if($insert_query)
        {
            echo "Booking Confirmed";
        }
    } else {
        $unconfirm = $_POST['unconfirm'];
        $query = "UPDATE booking_details SET status = '$unconfirm' WHERE id = '$id'";
        $insert_query = mysqli_query($conn , $query);
        if($insert_query)
        {
            echo "Booking Confirmed";
        }
    }

?>
