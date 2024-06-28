<?php
    require("config.php");

    // echo "<pre>";
    // print_r($_GET);
    // echo "</pre>";
    $price = isset($_GET['price']) ? $_GET['price'] : 0; 
?>

<form id="payment-form" action="submit.php" method="post">
    <input type="hidden" name="price" value="<?php echo $price * 100; ?>">
    <script 
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key = "<?php echo $Publish_key ?>"
        data-amount = "<?php echo $price * 100; ?>" 
        data-name = "Stripe Payment Gateway"
        data-description = "Stripe payment Gateway Integration"
        data-currency = "usd" 
    >
    </script>
</form>
