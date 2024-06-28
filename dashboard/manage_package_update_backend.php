<?php
include("../connection.php");

$id = $_POST['id'];
$name = $_POST['np_name'];
$type = $_POST['np_type'];
$location = $_POST['np_location'];
$price = $_POST['np_price'];
$detail = $_POST['np_details'];
$feature = $_POST['np_features'];
$image = $_FILES['np_image']['name'];


if (!empty($_FILES["np_image"]["name"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["np_image"]["name"]);
    if (move_uploaded_file($_FILES["np_image"]["tmp_name"], $target_file)) {
        $image = $target_file;
    } else {
        echo "Error uploading file.";
        exit;
    }
} else {

    $result = mysqli_query($conn, "SELECT image FROM package_tb WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);
    $image = $row['image'];
}

$query = "UPDATE package_tb SET `name` ='$name', `type`='$type', `location`='$location',  `price`='$price', `details`='$detail', `feature`='$feature' , `image`='$image' WHERE id = '$id'";
$data = mysqli_query($conn, $query);

if ($data) {
    echo "success";
} else {
    echo "error";
}
