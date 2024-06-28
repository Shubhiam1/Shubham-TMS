<?php 

include_once 'config.php';


$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME); 


if ($conn->connect_errno) { 
    printf("Connect failed: %s\n", $db->connect_error); 
    exit(); 
}