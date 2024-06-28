<?php
include_once 'paypal_config.php';
include_once 'dbcon.php';

function getCurrentDate()
{
    $timestamp = time();
    $date = date("Y-m-d", $timestamp);
    return $date;
}

function getCurrentTime()
{
    date_default_timezone_set("Asia/Kolkata");
    $time = date("H:i:s");
    return $time;
}

if (!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cc']) && !empty($_GET['st'])) {

    // Get transaction information from URL
    $in = $_GET['item_number'];
    $tid = $_GET['tx'];
    $pg = $_GET['amt'];
    $cc = $_GET['cc'];
    $pst = $_GET['st'];

    $dt = getCurrentDate();
    $tm = getCurrentTime();

    // Check if transaction data exists with the same TXN ID.
    $sql_c = "SELECT * FROM `payments` WHERE `txn_id` = '$tid'";
    $data_c = mysqli_query($conn, $sql_c) or die('MySQL Error (Paypal Success2)' . mysqli_error($conn));
    $count = mysqli_num_rows($data_c);

    if ($count == 0) {

        // Insert transaction data into the database
        $sql_tr = "INSERT INTO `payments`(`item_number`,`txn_id`,`payment_gross`,`currency_code`,`payment_status`,`dt`,`tm`) VALUES ('$in','$tid','$pg','$cc','$pst','$dt','$tm')";
        $data_tr = mysqli_query($conn, $sql_tr) or die('MySQL Error (Insert)' . mysqli_error($conn));
        $last_id = mysqli_insert_id($conn);

    } else {

        // Update transaction data into the database
        $sql_tr = "UPDATE `payments` SET `item_number`='$in',`payment_gross`='$pg',`currency_code`='$cc',`payment_status`='$pst',`dt`='$dt',`tm`='$tm' WHERE `txn_id` = '$tid'";
        $data_tr = mysqli_query($conn, $sql_tr) or die('MySQL Error (Paypal update-1)' . mysqli_error($conn));

        // Get last transaction data from database
        $sql_last = "SELECT * FROM `payments` WHERE `txn_id`='$tid'";
        $data_last = mysqli_query($conn, $sql_last) or die('MySQL Query Error update-2' . mysqli_error($conn));
        $row_last = mysqli_fetch_assoc($data_last);
        $last_id = $row_last['payment_id'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Paypal Payment Gateway Integration in PHP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/paypal.css">
</head>

<body>
    <div class="container">

        <?php if (!empty($last_id)) { ?>
            <h2 style="text-align: center; color: blue;">Thank You !!</h2>
            <h3 style="text-align: center; color: green;">Your Payment has been Successful.</h3>
        <?php } else { ?>
            <h2 style="text-align: center; color: blue;">Sorry !!</h2>
        <?php } ?>

        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="status">
                    <?php if (!empty($last_id)) { ?>
                        <h4 class="heading">Payment Information - </h4>
                        <br>
                        <p><b>Reference ID : </b> <strong><?php echo $last_id; ?></strong></p>
                        <p><b>Transaction ID : </b> <?php echo $tid; ?></p>
                        <p><b>Paid Amount  : </b> <?php echo $pg; ?></p>
                        <p><b>Currency : </b> <?php echo $cc; ?></p>
                        <p><b>Payment Status : </b> <?php echo $pst; ?></p>

                        <h4 class="heading">Product Information - </h4>
                        <br>
                        <p><b>Name : </b> <?php echo $in; ?></p>
                        <p><b>Price : </b> <?php echo $pg ?></p>

                        <h4 class="heading">Date & Time</h4>
                        <p><b>Pay Date : </b> <?php echo date("M d, Y", strtotime($row_last['dt'])); ?></p>
                        <p><b>Pay Time : </b> <?php echo date("h:i A", strtotime($row_last['tm'])); ?></p>

                    <?php } else { ?>

                        <h1 class="error">Sorry !! Your Payment has Failed.</h1>

                    <?php } ?>
                </div>
            </div>
        </div>

        <h3 style="text-align: center;"><a href="index.php" class="btn-continue">Back to Home</a></h3>
    </div>
</body>
</html>
