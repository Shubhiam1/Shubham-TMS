<?php include("connection.php"); ?>

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
        .error-msg{
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
    <?php
            $id = $_GET['id'];
            $query  = "SELECT * FROM package_tb where id = '$id'";
            $data = mysqli_query($conn, $query);
            $result  = mysqli_fetch_assoc($data);
    ?>
    <div class="container-fluid">
        <div class="custom-box text-center">
            <div class="row">
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
                <span class="error-msg"></span>
            </div>
            <div class="form-group">
                <label for="endDate"><b>End Date:</b></label>
                <input type="date" class="form-control" id="endDate" name="endDate">
                <span class="error-msg"></span>
            </div>
            <div class="form-group">
                <label for="comments"><b>Comments:</b></label>
                <textarea class="form-control" id="comments" name="comments" rows="4"></textarea>
                <span class="error-msg"></span>
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

        $("#submitid").click(function(e){
            e.preventDefault();
            var startDate = $("#startDate").val();
            var endDate = $("#endDate").val();
            var comments = $("#comments").val();
            $('.error-msg').text('');
            
            if(startDate.trim() === ""){
                $("#startDate").next('.error-msg').text("Please select start date ");
                return;
            }else if(endDate.trim() === ""){
                $("#endDate").next('.error-msg').text("Please select end date");
                return;
            }else if(comments.trim() === ""){
                $("#comments").next('.error-msg').text("Please enter a Commect");
                return;
            }else{
                alert("Please Login to Book package.");
                $('#myForm')[0].reset();
                window.location.href = "dashboard/login.php";
            }
            
        });

        // $("#myForm").validate({

        //     rules: {
        //         startDate: "required",
        //         endDate: "required",
        //         comments: "required",
        //     },
        //     messages: {
        //         startDate: "Please Enter Package Starting Date",
        //         endDate: "Please Enter Package Ending Date",
        //         comments: "Please Enter comments",
        //     },

        //     submitHandler: function(form) {
        //         var formData = $(form).serialize();
        //         console.log(formData);
        //         $.ajax({
        //             type: 'POST',
        //             url: 'package_details_backend.php',
        //             data: formData,
        //             success: function(response) {
        //                 console.log(response);
        //                 if (response == 'Booking Done') {

        //                     Swal.fire({
        //                         icon: "success",
        //                         title: "Success....!",
        //                         text: "Your Booking is Registered!",
        //                         }).then(
        //                             $("#myForm")[0].reset() 
                                  
        //                         );
        //                 }else{
        //                     alert("Error 404!, Please try after some time");
        //                 }
                      
        //             }
        //         });
        //     }
        // });
    });
</script>
</html>

