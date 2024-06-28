<?php
include("../connection.php");
include("headerfile.php");


$id = $_GET["id"];

$query = "SELECT * FROM package_tb where id = '$id'";
$data  = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

$result = mysqli_fetch_assoc($data);
?>
<div class="container-fluid">


    <title>manage package</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
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
        textarea,
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

    <body>
        <form id="myForm" enctype="multipart/form-data">
            <div class="input-group-upper">
                <div class="input-field">
                    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                    <label for="national_park_name">National Park Name</label>
                    <input type="text" name="np_name" placeholder="Create national Park" value="<?php echo $result['name']; ?> ">
                </div>
                <div class="input-field">
                    <label for="national_park_type">National Park Type</label>
                    <input type="text" name="np_type" placeholder="National Park Type eg- Outdoor/Indoor" value="<?php echo $result['type']; ?>">
                </div>
            </div>
            <div class="input-group">
                <div class="input-field">
                    <label for="national_park_location">National Park Location</label>
                    <input type="text" name="np_location" placeholder="National Park Location" value="<?php echo $result['location']; ?>">
                </div>
                <div class="input-field">
                    <label for="price_in_usd">Price in USD</label>
                    <input type="number" name="np_price" placeholder="Price in USD" value="<?php echo $result['price']; ?>">
                </div>
            </div>
            <label for="national_park-details">National Park Details</label>
            <textarea name="np_details" placeholder="Package Details"> <?php echo $result['details'] ?></textarea>
            <label for="national_park_features">National Park Features</label>
            <input type="text" name="np_features" placeholder="Package Features Eg-Free pickup-Drop facility" value="<?php echo $result['feature']; ?>"><br>
            <label for="national_park_image">National Park Image</label>
            <img src="<?php echo $result['image']; ?>" alt="National Park Image" style="width: 100px; height: 100px;"><br>
            <input type="file" name="np_image" placeholder="Attach National Park Image" value="<?php echo $result['image']; ?>"><br>

            <input type="submit" value="Update">

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

            },
            messages: {
                np_name: "Please Enter  Park Name",
                np_type: "Please Enter  Park Type",
                np_location: "Please Enter  Park Location",
                np_price: "Please Enter  Park Price",
                np_details: "Please Enter  Park Details",
                np_features: "Please Enter  Park Features",


            },
            submitHandler: function(form) {
                var formData = new FormData(form);



                var logData = {};
                formData.forEach(function(value, key) {
                    logData[key] = value;
                });

                console.log("Form Data:", logData);


                $.ajax({
                    type: 'POST',
                    url: 'manage_package_update_backend.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response) {
                            sweetAlert("succses", "Package Updated Sucerssfully!", "success").then((result) => {
                                window.location.href = "manage_package.php";
                            });
                        } else {
                            alert("Error");
                        }
                    }
                });
            }


        });
    });
</script>

</html>