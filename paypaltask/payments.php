<?php

require 'vendor/autoload.php'; // Include PayPal SDK

$order_id = $_REQUEST['PayerID'];

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Payments\OrdersGetRequest;


$clientId = 'AT56_z56tKqiyKv8U0H_NjANiF1XcXD-ExGd79XozBpwZBBA4kpI1bU7wDzRHopLqAnKiKULqmuO8LEM';
$clientSecret = 'EIHyLgqqZ99ZMwKpd5XczbRf5XWfNrCCGoTV2x2mpAfS_2CvtWu4Dcr2ZAPpyX0PNj8NqL7CwCsdBCc3';
$environment = new SandboxEnvironment($clientId, $clientSecret);
$client = new PayPalHttpClient($environment);


$response = $client->execute(new OrdersGetRequest($order_id)); 


if ($response->statusCode == 200) {
    $data = $response->result->purchase_units[0];
    $transactionId = $data->payments->captures[0]->id;
    $amount = $data->amount->value;
    $currency = $data->amount->currency_code;
    $status = $data->payments->captures[0]->status;
    $payerEmail = $data->payer->email_address;
    $payerName = $data->payer->name->given_name . ' ' . $data->payer->name->surname;

    $conn = mysqli_connect('localhost', 'root', '', 'new');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO payments (transaction_id, amount, currency, status, payer_email, payer_name) 
            VALUES ('$transactionId', '$amount', '$currency', '$status', '$payerEmail', '$payerName')";
    if (mysqli_query($conn, $sql)) {
        echo "Transaction details inserted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    // Handle error
    echo "Error: " . $response->statusCode . ", " . $response->result->message;
}
?>
