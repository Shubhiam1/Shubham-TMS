<?php
    include("connection.php");


    $start_date  = $_POST['startDate'];
    $end_date    = $_POST['endDate'];
    $comment     = $_POST['comments'];
    $user_id     = $_POST['user_id'];
    $status      = "unconfirmed";

    $query = "INSERT INTO booking_details(`user_id`,`package_start_date`,`package_end_date`,`comment`,`status`) VALUES ('$user_id','$start_date','$end_date','$comment','$status')";
    $insert_query = mysqli_query($conn, $query);

  
    if($query)
    {
        echo "Booking Done";
    }
    else
    {
        echo "Error: " . mysqli_error($conn); 
    }
?>
