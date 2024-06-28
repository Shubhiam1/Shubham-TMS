<?php
require_once 'vendor/autoload.php';
session_start();
    // init configuration
$clientID = env('CLIENT_ID');
$clientSecret = env('CLIENT_SECRET');
$redirectUri = 'http://localhost/tour/google_login/welcome.php';


// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");


    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "new";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if($conn){
        // echo "connected";   
    }else{
        echo "not connected";
    }

?>