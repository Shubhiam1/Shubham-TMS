<?php
include("connection.php");

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$query = "INSERT INTO contact_us(`name`, `email`, `subject`, `phone`, `message`) VALUES('$name', '$email', '$subject', '$phone', '$message')";
$insert_query = mysqli_query($conn, $query);

if ($insert_query) {
    // If insertion was successful, return success message
    echo "Message sent successfully!";
} else {
    // If insertion failed, return error message
    echo "Error: " . mysqli_error($conn);
}
?>
