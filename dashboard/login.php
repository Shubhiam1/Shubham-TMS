<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.20.0/dist/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="login_styles.css"> <!-- Your custom styles -->
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="text" name="username" class="form-control" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password</label>
                                <input type="password" name="pwd" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Login" name="login" class="btn btn-primary btn-block">
                            </div>
                        </form>
                        <div class="text-center">
                            <a href="../Registration.php">Register Here</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>



<?php

include("../connection.php");
session_start();

if (isset($_POST['login'])) {


    $username = $_POST['username'];
    $pwd = md5($_POST['pwd']);

    $query = "SELECT * FROM new_tb WHERE email = '$username' ";
    $result = mysqli_query($conn, $query);

    if (isset($result)) {
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            if ($row['pwd'] == $pwd  && $row['user'] == 'admin') {
                $_SESSION['user_name'] = $username;
                $_SESSION['role']      = $row['user'];
                $_SESSION['id']        = $row['id'];
                header("location:admin.php");
            } else if ($row['pwd'] == $pwd && $row['user'] == 'user') {
                $_SESSION['user_name'] = $username;
                $_SESSION['role']      = $row['user'];
                $_SESSION['user_id']   = $row['id'];

                header("location:../packages2.php");
            } else {
                echo "<script>alert(' Password Invalid');</script>";
            }
        } else {
            echo "<script>alert(' Email and Password is Invalid' );</script>";
        }
    } else {
        echo "<script>alert('Invalid email and Password' );</script>";
    }
}

?>