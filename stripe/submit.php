<?php
require('../connection.php');
require("config.php");
\Stripe\Stripe::setVerifySslCerts(false);


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// die();

$token = $_POST["stripeToken"];
$price = $_POST["price"];
$email = $_POST['stripeEmail'];
$type = $_POST['stripeTokenType'];
$payment_method = 'stripe';
$current_datetime = date("Y-m-d H:i:s");

$charge = \Stripe\Charge::create(array(
    "amount" => $price, 
    "currency" => "usd",
    "description" => "Stripe payment Gateway Integration",
    "source" => $token,
));

if ($charge->status === 'succeeded') {
    $query = "INSERT INTO stripe_payment (`email`, `amount`, `date`, `payment_method`) VALUES ('$email', '$price', '$current_datetime', '$payment_method')";
    $insert_query = mysqli_query($conn, $query);
    if ($insert_query) {
        echo "Data Inserted";
    } else {
        echo "Data Is not Inserted";
    }
    echo '<script>alert("Payment is done!");';
    echo 'window.location.href = "../packages2.php";</script>';
    exit;
}

header('Location: index.php');
exit;
?>
