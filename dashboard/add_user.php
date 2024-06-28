<?php
include("headerfile.php");
include("../connection.php")
?>

<div class="container-fluid">
<h1>Add User</h1>

    <div class="container mt-7">
                    <div class="card-body">
                        <form id="myForm" method="POST">
                            <div class="mb-3">
                                <label for="fname" class="form-label">First Name:</label>
                                <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name">
                            </div>
                            <div class="mb-3">
                                <label for="lname" class="form-label">Last Name:</label>
                                <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name">
                            </div>
                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of Birth:</label>
                                <input type="date" name="dob" class="form-control" id="dob" placeholder="Date of Birth">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone No.:</label>
                                <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone No.">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label for="pwd" class="form-label">Password:</label>
                                <input type="password" name="pwd" class="form-control" id="pwdid" placeholder="Password">
                            </div>
                            <button type="submit" value="Register" class="btn btn-primary">Add User</button>
                        </form>
                    </div>
                
           
        
    </div>
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
                    url: 'add_user_backend.php',
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        if (response == 'exists') {

                            // sweetAlert("Failed", "You have already Registered", "error");
                            Swal.fire({
                                icon: "error",
                                title: "Opps....!",
                                text: "You have already Registered!",
                                });
                        }
                        if (response == 'not exist') {
                            Swal.fire({
                                icon: "success",
                                title: "Great!",
                                text: "User Registered Sucessfully !",
                                }).then((result)=>{
                                    window.location.href="manage_users.php";
                                });
                        }
                    }
                });
            }
        });
    });

    $(document).ready(function() {
        $(".sidebar-link").removeClass("active");
        $('.add-user').addClass("active");
	});
</script>
