<?php
include("../connection.php");
include("headerfile.php");




$id = $_GET["id"];

$query = "SELECT * FROM new_tb where id = '$id'";
$data  = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

$result = mysqli_fetch_assoc($data);
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>

    <div class="container-fluid">
    <h1>Update User</h1>
    <form method="POST" id="myForm">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form">
                                <div class="input_field">
                                    <input type="hidden" name="id" value="<?php echo $result['id']; ?>" class="input" id="id">
                                </div>
                                <div class="input_field">
                                    <label for="FirstName">First Name :</label>
                                    <input type="text" name="fname" value="<?php echo $result['fname']; ?>" class="form-control" id="fname">
                                </div>
                                <div class="input_field">
                                    <label for="LastName">Last Name :</label>
                                    <input type="text" name="lname" value="<?php echo $result['lname']; ?>" class="form-control" id="lname">
                                </div>
                                <div class="input_field">
                                    <label for="dob">Date of Birth :</label>
                                    <input type="date" name="dob" value="<?php echo $result['dob']; ?>" class="form-control" id="dob">
                                </div>
                                <div class="input_field">
                                    <label for="phone">Phone No. :</label>
                                    <input type="text" name="phone" value="<?php echo $result['phone']; ?>" class="form-control" id="phone">
                                </div>
                                <div class="input_field">
                                    <label for="email">Email :</label>
                                    <input type="email" name="email" value="<?php echo $result['email']; ?>" class="form-control" id="email">
                                </div>
                                <div class="input_field">
                                    <input type="checkbox" id="changePasswordCheckbox">
                                    <label for="changePasswordCheckbox">Change Password</label>
                                </div>
                                <div class="input_field" id="passwordField" style="display: none;">
                                    <label for="password">New Password :</label>
                                    <input type="password" name="pwd" value="<?php echo $result['email']; ?>" class="form-control" id="pwd">
                                </div>
                                <div class="input_field">
                                    <button type="submit" class="btn btn-primary" name="register" id="submitbtn">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    document.getElementById("changePasswordCheckbox").addEventListener("change", function() {
        var passwordField = document.getElementById("passwordField");
        if (this.checked) {
            passwordField.style.display = "block";
        } else {
            passwordField.style.display = "none";
        }
    });
</script>

    </form>
</div>

<script>
    $(document).ready(function() {

        $.validator.addMethod('dobGreaterThan18', function(value, element) {

            var dobDate = new Date(value);
            var today = new Date();
            var age = Math.floor((today - dobDate) / (365.25 * 24 * 60 * 60 * 1000));
            return age > 18;
        }, 'You must be at least 18 years old.');

        $.validator.addMethod('phoneValid', function(value, element) {
            return this.optional(element) || /^\d{10}$/.test(value);
        }, 'Phone number must be exactly 10 digits.');

        $("#myForm").validate({

            rules: {
                fname: "required",
                lname: "required",
                dob: {
                    required: true,
                    dobGreaterThan18: true
                },
                adrs: "required",
                phone: {
                    required: true,
                    phoneValid: true
                },
                email: {
                    required: true,
                    email: true
                },
                pwd: {
                    required: true,
                    minlength: 5
                },

            },

            messages: {
                fname: "Please Enter first name",
                lname: "Please enter your last name",
                dob: {
                    required: "Please enter your date of birth",
                    dobGreaterThan18: "You must be at least 18 years old."
                },
                adrs: "Please enter your address",
                phone: {
                    required: "Please enter your phone number",
                    phoneValid: "Phone number must be exactly 10 digits."
                },
                email: {
                    required: "Please enter a valid email address",
                    email: "Please enter a valid email address"
                },
                pwd: {
                    required: "Please enter a password",
                    minlength: "Your password must be at least 5 characters long"
                },

                agree: "Please accept our policy"
            },

            submitHandler: function(form) {
                var formData = $(form).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'manage_user_update_form_backend.php',
                    data: formData,
                    success: function(response) {
                       
                        if (response === "success") {
                            sweetAlert("Success", "User Updated Successfully", "success").then((result) => {
                                window.location.href = "manage_users.php";
                            });
                        } else if (response === "exists") {
                            sweetAlert("Exists", "Please Enter a Different Email", "error");
                        } else {
                            sweetAlert("Error", "An error occurred", "error");
                        }
                    }
                });
            }

        });
    });

    document.getElementById("changePasswordCheckbox").addEventListener("change", function() {
        var passwordField = document.getElementById("passwordField");
        if (this.checked) {
            passwordField.style.display = "block";
        } else {
            passwordField.style.display = "none";
        }
    });
</script>