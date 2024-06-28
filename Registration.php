<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.20.0/dist/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Document</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <form id="myForm">
            <h2 class="text-center mb-4">Registration Form</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fname">First Name:</label>
                        <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" class="form-control" placeholder="Date of Birth">
            </div>
            <div class="form-group">
                <label for="phone">Phone No.:</label>
                <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone No.">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="pwd" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
                        url: 'Registration_submit.php',
                        data: formData,
                        success: function(response) {
                            if (response == 'exists') {
                                sweetAlert("Failed", "You have already Registered", "error");
                            }else{
                                sweetAlert("succees", "You have  Registered", "success");
                            }
                        }
                    });
                }
            });
        });
    </script>


</body>

</html>