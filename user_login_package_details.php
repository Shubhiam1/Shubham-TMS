<?php 
    include("connection.php"); 
    session_start();

    $userprofile = $_SESSION['user_name'];
    $role        = $_SESSION['role'];
    $user_id          = $_SESSION['user_id'];

    // echo "<pre>";
    //     print_r($user_id);
    // echo "</pre>";


    if ($userprofile == false) {
        header('location:login.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Package</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Custom CSS -->
    <style>
        /* Custom styles */
        body {
            background-color: #f8f9fa;
        }
        .error{
            color:red;
        }
        .custom-box {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .custom-box .row {
            margin-bottom: 10px;
        }
        .form-section {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .form-section .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
   
    
    <div class="container-fluid">
        
        <div class="custom-box text-center">
        
            <div class="row">
            <?php
                    $id = $_GET['id'];
                    $query  = "SELECT * FROM package_tb where id = '$id'";
                    $data = mysqli_query($conn, $query);
                    $result  = mysqli_fetch_assoc($data);
                ?>
           
                <div class="col-md-4">
                    <h4 class="text-success"> Name:</h4>
                    <b><?php echo $result['name']; ?></b>
                </div>
                <div class="col-md-4">
                    <h4 class="text-success"> Details:</h4>
                    <b><?php echo $result['details']; ?></b>
                </div>
                <div class="col-md-4">
                    <h4 class="text-success"> Features:</h4>
                    <b><?php echo $result['feature']; ?></b>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-success text-center"></h4>
                    
                    <img src='dashboard/<?php echo $result['image']; ?>' alt='Package Image' style='width: 50%; height: auto;'>

                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center"> 
                    <div class="col-md-12">
                    <h4 class="text-center text-success">Total Price:</h4>
                    <div class="text-center"> <h5><b><?php echo $result['price'] ?></b> $</h5></div> 
                </div>
            </div>
</div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="container form-section">
        <h3 class="text-center">Book Package</h3>
        <form method  id="myForm">
            <div class="form-group">
                <label for="startDate"><b>Start Date:</b></label>
                <input type="date" class="form-control" id="startDate" name="startDate">
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            </div>
            <div class="form-group">
                <label for="endDate"><b>End Date:</b></label>
                <input type="date" class="form-control" id="endDate" name="endDate">
            </div>
            <div class="form-group">
                <label for="comments"><b>Comments:</b></label>
                <textarea class="form-control" id="comments" name="comments" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="submitid">Submit</button>
            <a href="booking_quaries.php?id=<?php echo $result['id']; ?>" class="text-center mt-5 d-block">Booking Queries! Feel free to Contact Us!</a>
        </form>
    </div>

    <!-- Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.20.0/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<script>
    $(document).ready(function() {
        $("#myForm").validate({
            rules: {
                startDate: "required",
                endDate: "required",
                comments: "required",
            },
            messages: {
                startDate: "Please Enter Package Starting Date",
                endDate: "Please Enter Package Ending Date",
                comments: "Please Enter comments",
            },
            submitHandler: function(form) {
                var formDataWithUserId = new FormData(form);
                formDataWithUserId.append('user_id', '<?php echo $user_id; ?>');

                Swal.fire({
                    title: 'Confirm Booking',
                    text: 'Please proceed to payment to confirm your booking.',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Pay Now',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Proceed to payment
                        $.ajax({
                            type: 'POST',
                            url: 'user_login_package_details_backend.php',
                            data: formDataWithUserId,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                console.log(response);
                                if (response.trim() === 'Booking Done') {
                                    Swal.fire({
                                        title: 'Payment Method',
                                        text: 'Please select your preferred payment method',
                                        input: 'select',
                                        inputOptions: {
                                            'stripe': 'Pay with Stripe',
                                            'paypal': 'Pay with PayPal'
                                        },
                                        inputPlaceholder: 'Select payment method',
                                        showCancelButton: true,
                                        cancelButtonText: 'Cancel',
                                        confirmButtonText: 'Continue',
                                        inputValidator: (value) => {
                                            if (!value) {
                                                return 'You need to choose a payment method';
                                            }
                                        }
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            var paymentMethod = result.value;
                                            $("#myForm")[0].reset();
                                            var packagePrice = <?php echo $result['price']; ?>;
                                            var id           = <?php echo $result['id'] ?>;
                                            if (paymentMethod === 'stripe') {
                                                window.location.href = "stripe/index.php?price=" + packagePrice;
                                            } else if (paymentMethod === 'paypal') {
                                                // Redirect to PayPal payment page
                                                // window.location.href = "paypal/index.php?price=" + packagePrice;
                                                window.location.href = "paypaltask/index.php?id=" + id  ;
                                            }
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Error!",
                                        text: "Booking failed. Please try again later.",
                                    });
                                }

                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    icon: "error",
                                    title: "Error!",
                                    text: "Booking failed. Please try again later.",
                                });
                            }
                        });
                    }
                });
            }
        });
    });


</script>
</html>

