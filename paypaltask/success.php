<?php 
session_start();
include_once 'config.php'; 
include_once 'dbConnect.php';

$pid = $_SESSION['product_id']; 

if(isset($_GET['PayerID'])){ 
    echo "<h1>Your Payment has been successful</h1>";
    $insert = $conn->query("UPDATE product SET status='completed' where id='".$pid."'");
    // Redirect to payments page with transaction details
    header("Location: payments.php?" . http_build_query($_REQUEST));
    exit; // Ensure no further output is sent
} else {
    echo "<h1>Your Payment has been failed</h1>";
}
session_destroy();
?>
<a href="index.php">Back to Home</a>



