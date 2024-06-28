
<?php include("connection.php");  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Queries</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.20.0/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Additional custom styles can be added here */
        /* For example, to style the body */
        body {
            padding: 20px;
        }

        .error{
            color : red;
        }
    </style>
</head>
<body>
   <?php
        $id    =  $_GET['id'];
        $query = "SELECT * FROM package_tb Where id = '$id'";
        $insert_query  = mysqli_query($conn,$query);
        $result = mysqli_fetch_assoc($insert_query);
   ?>
    <div class="container">
        <h1 class="text-center mb-4">Booking Queries</h1>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <form id="myForm" >
                            <div class="form-group">
                                <label for="name">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name" >
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" >
                            </div>
                            <div class="form-group">
                                <label for="query">Your Query</label>
                                <textarea class="form-control" id="query" name="query" rows="3" ></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" value="<?php echo $result['id']; ?>" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
   
    <script>
        $(document).ready(function() {

            $("#myForm").validate({

                rules: {
                    name: "required",
                    email: "required",
                    query: "required",
                },
                messages: {
                    name: "Plaese Enter Name",
                    email: "Please Enter Email",
                    query: "Please Enter your Query",
                },

                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    console.log(formData);
                    $.ajax({
                        type: 'POST',
                        url: 'booking_quaries_backend.php',
                        data: formData,
                        success: function(response) {
                            console.log(response);
                            if (response == 'Query Submitted') {

                                Swal.fire({
                                    icon: "success",
                                    title: "Success....!",
                                    text: "Your Query is Submitted!",
                                    }).then(
                                        $("#myForm")[0].reset() 
                                    
                                    );
                            }else{
                                alert("Error 404!, Please try after some time");
                            }
                        
                        }
                    });
                }
            });
        });
    </script>
</html>
