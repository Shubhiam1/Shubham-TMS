<?php 
    include_once 'paypal_config.php';

    include_once 'dbcon.php'; 
?>
<html>
    <head>
        <title> Paypal Payment </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="text/css" href="css/design.css">
    </head>
    <body>

        <div class="container">
            <h2 style="text-align: center; color: blue;">Paypal Payment </h2>

            <?php 
            $sql = "SELECT * FROM `package_tb`";
            $res = mysqli_query($conn,$sql) or die("MySql Query Error".mysqli_error($con));
            while($row=mysqli_fetch_assoc($res)){
            ?>
            
            <form action="<?php echo PAYPAL_URL; ?>" method="post">

                <div class="col-md-4 column productbox">

                    <!-- Paypal business test account email id so that you can collect the payments. -->
                    <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">

                    <!-- Buy Now button. -->
                    <input type="hidden" name="cmd" value="_xclick">

                    <!-- Details about the item that buyers will purchase. -->
                    <input type="hidden" name="item_name" value="<?php echo $row['name']; ?>">
                    <input type="hidden" name="item_number" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="amount" value="<?php echo $row['price']; ?>">
                    <input type="hidden" name="id" value="<?php echo $row['id'];?>"/>

                    <!-- Paypal currency -->
                    <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">

                    <!-- Success and cancel URLs -->
                    <input type='hidden' name='cancel_return' value='<?php echo PAYPAL_CANCEL_URL; ?>'>
                    <input type='hidden' name='return' value='<?php echo PAYPAL_RETURN_URL; ?>'>

                    <img src="../dashboard/<?php echo $row['image'];?>" class="img-responsive">
                    <div class="producttitle"><?php echo $row['name'];?></div>
                    <div class="productprice">
                        <div class="pull-right">

                            <!-- payment button. -->
                            <button type="submit" class="btn btn-primary btn-sm" name="submit" role="button">Buy Now</button>

                        </div>
                        <div class="pricetext">$<?php echo $row['price'];?></div>
                    </div>
                </div>

            </form>
            <?php } ?>
        </div>
       
    </body>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>

</html>