<?php
    include("headerfile.php"); 
    include("../connection.php");    



    $query = "SELECT * FROM  new_tb Where user = 'admin' ";
    $insert_query = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($insert_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS can be added here */
    </style>
</head>
<body>

<div class="container-fluid ">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Admin Details</h5>
                    <div class="form-group">
                        <p id="firstName"><b>First Name :</b> <?php echo $result['fname']; ?></p>
                    </div>
                    <div class="form-group">
                        <p id="lastName"><b>Last Name :</b><?php echo $result['lname']; ?></p>
                    </div>
                    <div class="form-group">
                        <p id="email"><b>Admin Email :</b> <?php echo $result['email']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>







