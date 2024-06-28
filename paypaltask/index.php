<?php 

//  echo "<pre>";
//  print_r($_GET);
//  echo "</pre>";
//  die();

// Include configuration file 
include_once 'config.php'; 
 
// Include database connection file 
include_once 'dbConnect.php'; 


            $id  = $_GET['id'];
            $sql = "SELECT * FROM `package_tb` WHERE `id` = '$id' ";
            $res = mysqli_query($conn,$sql) or die("MySql Query Error".mysqli_error($con));
            $row = mysqli_fetch_assoc($res);
            
?>

                <form action="<?php echo PAYPAL_URL; ?>" method="post" class="paypal_form">
                    <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
					
                    <!-- Important For PayPal Checkout -->
                    
                    <input type="hidden" name="item_name" id="item" value="<?php echo $row['name'] ?>"><br><br>
               
                    <input type="hidden" required="" name="amount" id="amount" value="<?php echo $row['price'] ?>">
                    <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">
					
                    <!-- Specify a Buy Now button. -->
                    <input type="hidden" name="cmd" value="_xclick">
                    <!-- Specify URLs -->
                    <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                    <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
					<br><br>
                    <!-- Display the payment button. -->
                    <input type="submit" name="submit" border="0" value="Pay With PayPal">
                </form>

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery(".paypal_form").submit(function(){
            setData(jQuery("#amount").val(), jQuery("#item_name").val());
        });
        function setData(amount, item) {
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            
          };
          xhttp.open("GET", "insertData.php?amount="+amount+"&item="+item, true);
          xhttp.send();
        }
    });
</script>




