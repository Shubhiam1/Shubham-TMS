<?php
include("../connection.php");


$name = $_POST['np_name'];
$type = $_POST['np_type'];
$location = $_POST['np_location'];
$price = $_POST['np_price'];
$detail = $_POST['np_details'];
$feature = $_POST['np_features'];


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["np_image"]["name"]);

if (move_uploaded_file($_FILES["np_image"]["tmp_name"], $target_file)) {
 
    $query = "INSERT INTO package_tb (`name`, `type`, `location`, `price`, `details`, `feature`, `image`) 
              VALUES ('$name', '$type', '$location', '$price', '$detail', '$feature', '$target_file')";
    
    if (mysqli_query($conn, $query)) {
        echo "Record inserted successfully.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}

mysqli_close($conn);
?>
