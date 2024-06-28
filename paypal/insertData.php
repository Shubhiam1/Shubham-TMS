<?php 
session_start();

include_once 'dbConnect.php';


$amount = $_GET['amount'];
$item = $_GET['item'];
$status = "pending";

$insert = $conn->query("INSERT INTO product(product_name, price, status) VALUES('".$item."','".$amount."','".$status."')");
$last_id = $conn->insert_id;

$_SESSION['product_id'] = $last_id;
