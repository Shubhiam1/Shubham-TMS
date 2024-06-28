<?php
include("../connection.php");
include("headerfile.php");

?>

<title>manage package</title>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.20.0/dist/jquery.validate.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    .error {
        color: red;
    }

    form {
        max-width: 80%;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group:last-child {
        margin-bottom: 0;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
    }

    input[type="text"],
    textarea,input[type="number"],
    input[type="file"] {
        width: calc(100% - 12px);
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"],
    input[type="reset"] {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover,
    input[type="reset"]:hover {
        background-color: #0056b3;
    }

    textarea {
        resize: none;
    }

    @media (max-width: 768px) {

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
        }
    }
</style>

</head>

<div class="container-fluid">
<h1>Create Package</h1>


    <form action="" method="post" id="myForm" enctype="multipart/form-data">
        <div class="input-group-upper">
            <div class="input-field">
                <label for="national_park_name">National Park Name</label>
                <input type="text" name="np_name" placeholder="Create national Park">
            </div>
            <div class="input-field">
                <label for="national_park_type">National Park Type</label>
                <input type="text" name="np_type" placeholder="National Park Type eg- Outdoor/Indoor">
            </div>
        </div>
        <div class="input-group">
            <div class="input-field">
                <label for="national_park_location">National Park Location</label>
                <input type="text" name="np_location" placeholder="National Park Location">
            </div>
            <div class="input-field">
                <label for="price_in_usd">Price in USD</label>
                <input type="number" name="np_price" placeholder="Price in USD">
            </div>
        </div>
        <label for="national_park-details">National Park Details</label>
        <textarea name="np_details" placeholder="Package Details"></textarea>
        <label for="national_park_features">National Park Features</label>
        <input type="text" name="np_features" placeholder="Package Features Eg-Free pickup-Drop facility"><br>
        <label for="national_park_image">National Park Image</label>
        <input type="file" name="np_image" placeholder="Attach National Park Image" id="np_imageid"><br>
        <input type="submit" value="Create">
        <input type="reset" value="reset">
    </form>

</div>

<script>
    $(document).ready(function() {

        $("#myForm").validate({
            rules: {
                np_name: "required",
                np_type: "required",
                np_location: "required",
                np_price: "required",
                np_details: "required",
                np_features: "required",
                np_image: "required",
            },
            messages: {
                np_name: "Please Enter  Park Name",
                np_type: "Please Enter  Park Type",
                np_location: "Please Enter  Park Location",
                np_price: "Please Enter  Park Price",
                np_details: "Please Enter  Park Details",
                np_features: "Please Enter  Park Features",
                np_image: "Please Select an Image",

            },
            submitHandler: function(form) {
                var formData = new FormData(form);
                var image = $("#np_imageid")[0].files[0];
                formData.append('np_image', image);

                console.log("Form Data:", formData);

                $.ajax({
                    type: 'POST',
                    url: 'create_package_backend.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        console.log(response);
                        if (response) {

                            sweetAlert("success", "Package Created Sucessfully", "success").then((result) => {
                                location.reload();
                            });

                        } else {
                            alert("error 404!")
                        }
                    }
                });
            }

        });
    });

    $(document).ready(function() {
        $(".sidebar-link").removeClass("active");
        $('.create-pak').addClass("active");
	});
</script>