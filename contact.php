<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tourist Website</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.20.0/dist/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>
    <style>
        body {
            margin: 0;
            font-family: 'Hind', sans-serif;

        }

        .error {
            color: red;
        }

        .container {
            max-width: 1240px;
            width: 100%;
            margin: 0 auto;
        }

        .container2 {
            max-width: 1320px;
            width: 100%;
            margin: 0 auto;
        }

        .shape1 {
            position: absolute;
            top: -136px;
            left: -83px;
        }

        nav {
            position: sticky;
        }

        .herodiv {
            position: relative;
            display: flex;
            justify-content: space-around;
            margin: 25px 45px;
            align-items: center;
        }

        .menu ul {
            display: flex;
            list-style: none;
            padding: 0;
            align-items: center;
            gap: 31px;
            font-size: 15px;
            font-weight: bold;
            color: #646363;
            margin: 0;
        }

        .home {
            color: rgb(235 54 86);
        }

        .menu a:hover {
            color: rgb(235 54 86);
            cursor: pointer;
        }

        .menu {
            display: contents;

        }

        .logo img {
            max-width: 120px;
            width: 100%;
        }

        button img {
            max-width: 23px;
            fill: white;
        }

        .call {
            background-color: rgb(235 54 86);
            max-width: 138px;
            /* width: 100%; */
            color: white;
            border: none;
            padding: 13px 28px;
            font-weight: bold;
            align-items: center;
            border: transparent;
            justify-content: center;
            border-radius: 5px;

        }

        .learnbtn {
            background-color: rgb(235 54 86);
            max-width: 138px;
            width: 100%;
            color: white;
            border: none;
            padding: 13px 9px;
            font-weight: bold;
            align-items: center;
            border: transparent;
        }

        button:hover {
            background-color: white;
            color: rgb(235 54 86);
            cursor: pointer;
            border: 1px solid rgb(235 54 86);
            font-weight: bold;
            align-items: center;
        }

        .section1 {

            margin-left: auto;
            background-image: url(images/Elephant.jpg);
            width: 100%;
            background-repeat: no-repeat;
            /* background-size: 56% auto; */
            height: 615px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            background-position: center;
        }

        .content {
            max-width: 617px;
            margin-left: 129px;
        }

        .content p,
        .content h1 {
            margin: 0;
        }

        .lastp {
            color: rgb(235 54 86);
            font-size: 12px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .firstp {
            color: rgb(235 54 86);
            font-size: 28px;
            margin-bottom: 10px;

        }

        .content h1 {
            font-size: 55px;
            color: white;
            margin-bottom: 20px;

        }

        .content h1 span {
            color: rgb(235 54 86);
        }

        .shape2 {
            position: absolute;
            display: none;
        }

        .img1 {
            width: 260px;
            position: relative;
        }

        .img2 {
            width: 260px;
            top: 164px;
            left: 110px;
            position: absolute;

        }

        .s2con {
            display: flex;

        }

        .rdiv h1,
        .rdiv p,
        .rdiv h5 {
            margin: 0;
        }

        .rdiv {
            width: 50%;
        }

        .section2 {
            margin: 100px 0;
        }

        .rdiv h5 {
            color: rgb(235 54 86);
            font-size: 24px;
            margin-bottom: 10px;
        }

        .rdiv h1 {
            font-size: 35px;
            color: #121619;
            margin-bottom: 20px;
        }

        .rdiv p {
            color: #646464;
            line-height: 30px;

        }

        .mp {
            margin-top: 35px !important;
        }

        .learnbtn {
            margin-top: 30px;
            box-shadow: -2px 10px 36px -3px rgba(235, 54, 86, 0.82);
        }

        .experience {
            margin: 0;
            position: absolute;
            top: 227px;
            left: 10px;
            background-color: rgb(235 54 86);
            color: white;
            padding: 24px;
            padding: 12px 26px;
            font-size: 14px;
            border: 8px solid white;
            transition: 0.5s;
        }

        .experience span {
            font-size: 34px;
            margin: 0;
        }

        .experience:hover {
            border: 8px solid rgb(235 54 86);
            color: rgb(235 54 86);
            background-color: white;
            cursor: pointer;
        }

        .topdiv p {
            color: rgb(235 54 86);
            margin: 0;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .topdiv h1 {
            color: #121619;
            margin: 0;
            font-size: 38px;
            font-weight: 600;
            margin-bottom: 50px;
        }

        .topdiv {
            align-items: center;
            display: flex;
            flex-direction: column;
        }

        .section3 {
            margin: 80px 0;
        }

        .dodiv img {
            max-width: 45px;
            width: 100%;
            margin-bottom: 20px;
        }

        .btmdiv1 {
            display: flex;
            justify-content: space-around;
            gap: 116px;
        }

        .dodiv p {
            margin: 0;
            margin-bottom: 20px;
            color: #646363;
            line-height: 29px;
            transition: 0.5s;
        }


        .dodiv {
            padding: 50px 20px;
            align-items: center;
            text-align: center;
            transition: 0.5s;
        }

        .dodiv h3 {
            font-size: 21px;
            font-weight: bold;
            margin-top: 0;
        }

        .dodiv:hover {
            background-color: rgb(131 35 52);
            color: white;
        }

        .dodiv:hover p {

            color: white;
        }

        .section4 {
            margin: 170px 0;
        }

        .sec5con {
            background-image: url(/Simran/Interior/images/bgimage.jpg);
            background-repeat: no-repeat;
            height: 623px;
            background-position: center;
            display: flex;
            justify-content: end;
            background-size: cover;
            align-items: center;
        }

        .bottomdiv img {
            max-width: 245px;
            width: 100%;
        }


        .bottomdiv {
            display: flex;
            justify-content: space-around;
        }

        .imgbox:hover .overlaytext {

            display: block;
            cursor: pointer;
        }

        .imgbox {
            position: relative;


        }

        .overlaytext {
            position: absolute;
            bottom: 4px;
            left: 0;
            font-size: 22px;
            font-weight: bold;
            line-height: 35px;
            display: none;


        }

        .otext {
            color: white !important;
            background: linear-gradient(rgba(255, 255, 255, 0) 0%, #eb3656 117%);
            padding: 30px 46px;


        }

        a {
            color: unset;
            text-decoration: none;
        }

        .teambox {
            position: relative;

        }

        .teamsocial img {
            max-width: 20px;
            width: 100%;
            background-color: #646363;
            border-radius: 50%;
            padding: 4px;


        }

        .teamsocial {
            margin-top: 31px;
            display: none;
        }

        .teamovelay {
            display: flex;
            padding: 36px;
            align-items: center;
            flex-direction: column;
            position: absolute;
            top: 280px;
            border: transparent;
            transition: 0.5s;
        }

        .teamovelay p,
        .teamovelay h4 {
            margin: 0;
            margin-bottom: 10px;
        }

        .teamovelay p {
            font-size: 14px;
            color: #646363;
            transition: 0.5s;
        }

        .moverlay {
            display: flex;
            justify-content: center;
            text-align: center;


        }

        .btmdivv {
            display: flex;
            justify-content: space-around
        }


        .teamovelay:hover .teamsocial {
            display: block;

        }

        .moverlay:hover .teamovelay {
            border: 1px solid white;
            box-shadow: -2px 10px 36px -3px rgba(235, 54, 86, 0.82);
            display: block;
            position: absolute;

            top: 225px;
            background-color: white;
        }

        .socialflex {
            display: flex;
            gap: 30px;
        }

        .section5,
        .section6 {
            margin: 130px 0;
        }

        .testimonialcontent {
            background-color: #eb3656;
            padding: 60px 20px;
            max-width: 320px;
            margin-right: 132px;

            flex-direction: column;
            align-items: center;
            display: flex;


        }

        .teamsocial img:hover {
            background-color: #eb3656;
            fill: aliceblue;
            cursor: pointer;
        }

        .teamovelay p:hover {
            color: #eb3656;
            cursor: pointer;
        }

        .testimonialcontent img {
            border-radius: 50%;
            max-width: 86px;
            width: 100%;
        }

        .testimonialcontent p {
            margin: 0;
            color: white;
            line-height: 28px;
            text-align: center;
            margin-top: 19px;
            font-size: 16px;
        }

        .btmcont span {
            font-size: 16px;
            font-weight: bold;
        }

        .btmcont p {
            font-size: 10px;
        }

        .upform input {
            max-width: 708px;
            width: 100%;
            padding: 21px 25px;
            border: 1px solid #efeded;
            border-radius: 3px;
        }

        .upform {
            justify-content: center;
            display: flex;
            gap: 25px;
            margin: 25px 0;
            flex-direction: column;
            align-items: center;
        }

        .txtarea {
            display: flex;
            justify-content: center;

        }

        textarea {
            max-width: 624px;
            width: 100%;
            padding: 21px 25px;
            border: 1px solid #efeded;
            border-radius: 3px;
        }

        .savebtn {
            background-color: rgb(235 54 86);
            max-width: 138px;
            width: 100%;
            color: white;
            border: none;
            padding: 13px 9px;
            font-weight: bold;
            align-items: center;
            border: transparent;
        }

        button:hover {
            background-color: white;
            color: rgb(235 54 86);
            cursor: pointer;
            border: 1px solid rgb(235 54 86);
            font-weight: bold;
            align-items: center;
        }

        .learnbtn1 {
            display: flex;
            justify-content: center;
        }

        iframe {
            background-image: url(/Simran/Interior/images/bgimage.jpg);
        }

        .socialmedia img {
            max-width: 17px;
            width: 100%;
            box-shadow: -2px 10px 36px -3px rgba(235, 54, 86, 0.82);
            background-color: #d7e1dc;
            border-radius: 50%;
            padding: 9px;
            transition: 0.5s;
        }

        .socialmedia img:hover {
            background-color: #eb3656;
        }

        .socialmedia {
            display: flex;
            gap: 24px;
        }

        .ldiv {
            width: 50%;
            position: relative;
        }

        .calldiv img,
        .maildiv img,
        .addiv img {
            max-width: 20px;
            width: 100%;
        }

        .calldiv p,
        .maildiv p,
        .addiv p {
            margin: 0;

        }

        .calldiv,
        .maildiv,
        .addiv {
            display: flex;
            gap: 15px;
        }

        .flogo {
            max-width: 114px;
            width: 100%;
        }

        footer h3 {
            color: black !important;
            margin-top: 0;
        }

        .fdiv22 {
            display: flex;
            justify-content: space-around;
        }

        .fdiv2 ul {
            list-style: none;
            padding: 0;

        }

        footer {
            color: #646363;
            margin-bottom: 100px;
            font-size: 15px;
        }

        footer li {
            margin-bottom: 15px;
        }


        .fdiv2 {
            width: 250px;
        }

        .mailinfo button {
            border: transparent;
            background-color: #ffeae1;

            color: #eb3656;
            padding: 6px;
        }

        .mailinfo {
            background-color: #ffeae1;
            padding: 6px;
            display: flex;
            justify-content: space-around;
            border: 1px solid #eb3656;
        }

        .fdiv1 {
            max-width: 249px;
            align-items: flex-start;
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .f2 {
            display: flex;
        }

        .fdiv1content {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        @media(max-width:764px) {

            .section1,
            .section2,
            .section3,
            .section4,
            .section5,
            .footerdiv {
                padding: 24px 15px;
            }

            .section1 {
                background-size: 54% 127%;
                height: 325px;
            }

            .dodiv {
                padding: 75px;
                padding-top: 0;
            }

            .herodiv {
                flex-direction: column;
                align-items: baseline;
            }

            .experience {
                left: 11px;
                top: 186px;
                font-size: 8px;
            }

            .experience span {
                font-size: 24px;
            }

            .img2 {
                position: unset;
            }

            .sec5con {
                justify-content: center;
                height: unset;
            }

            .rdiv h1 {
                font-size: 24px;
            }

            .rdiv h5 {
                font-size: 18px;
                margin-top: 15px;
            }

            .upform {
                flex-direction: column;
                width: unset;
            }

            .logo img {
                margin-bottom: 20px;
            }

            .menu ul {
                margin-bottom: 20px;
                gap: 12px;
                font-size: 12px;
            }

            .btmdiv1 {
                flex-direction: column;
                gap: unset;

            }

            .topdiv h1 {
                font-size: 23px;

            }

            .menu ul {
                flex-wrap: wrap;
            }

            .content {
                font-size: 20px;
                max-width: 333px;
                width: 100%;
                flex-direction: column;
                margin-left: 10px;

            }


            .content p {
                font-size: 13px;
            }

            .content h1 {
                font-size: 20px;
            }

            .rdiv {

                text-align: left;
                width: unset;
            }

            .s2con {
                flex-direction: column;
            }

            .bottomdiv {
                justify-content: space-evenly;
                flex-wrap: wrap;

            }

            .img1,
            .img2 {
                width: 100%;
            }

            .section4 {
                margin-bottom: 0;
            }

            .txtarea {
                justify-content: unset;
            }

            .upform input {
                width: unset;
            }

            .imgbox {
                margin-bottom: 30px;
            }

            .teambox {
                margin-bottom: 150px;
            }

            .socialmedia img {
                box-shadow: -2px 1px 14px -3px rgba(235, 54, 86, 0.82);
                max-width: 12px;
            }

            .calldiv img {
                max-width: 16px;
            }

            .btmdivv {
                flex-wrap: wrap;
            }

            .testimonialcontent {
                margin: unset;
            }

            .testimonialcontent img {
                max-width: 105px;
            }

            .testimonialcontent p {
                margin-top: 35px;
                font-size: 21px;
                line-height: 36px;
            }

            .fdiv22 {

                flex-direction: column;
                gap: 40px;
                font-size: 11px;
            }

            .fdiv2 {
                width: 225px;
            }

            .f2 {
                gap: 12px;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <div class="container">
            <div class="herodiv">
                <div class="logo">

                </div>
                <div class="menu">
                <ul>
                            <a  href="index.php">HOME</a>
                            <a href="about_us.php">ABOUT US</a>
                            <a href="packages.php">PACKAGES</a>
                            <a class="home" href="contact.php">CONTACT</a>
                        </ul>

                    <button id="loginid" class="call">Login</button>

                </div>
            </div>
        </div>


        <section class="section6" id="contact">
            <div class="container">
                <div class="topdiv">
                    <p>CONTACT US</p>
                    <h1>GET IN TOUCH</h1>
                </div>
                <div class="btmdiv">
                    <form action="" id="myForm">
                        <div class="upform">
                            <input type="text" placeholder="Your Name" id="nameid" name="name">
                            <input type="email" placeholder="Your Email" id="emailid" name="email">
                        </div>
                        <div class="upform">
                            <input type="text" placeholder="Subject" id="subjectid" name="subject">
                            <input type="number" placeholder="Phone" id="phoneid" name="phone">
                        </div>

                        <div class="upform">
                            <input type="text" cols="30" rows="7" name="message" id="messageid" placeholder="Your Message">
                        </div>
                        <div class="learnbtn1">
                            <button class="learnbtn" id="submitid">SEND MESSAGE</button>
                        </div>

                    </form>
                </div>
            </div>
        </section>



</body>
<script>
    $(document).ready(function() {

        $.validator.addMethod('phoneValid', function(value, element) {
            return this.optional(element) || /^\d{10}$/.test(value);
        }, 'Phone number must be exactly 10 digits.');

        $("#myForm").validate({
            rules: {
                name: "required",
                email: "required",
                subject: "required",
                phone: {
                    required: true,
                    phoneValid: true
                },
                message: {
                    required: true
                }
            },
            messages: {
                name: "Please Enter Name",
                email: "Please Enter Email",
                subject: "Please Enter Subject",
                phone: {
                    required: "Please enter your phone number",
                    phoneValid: "Phone number must be exactly 10 digits."
                },
                message: {
                    required: "Please enter your message"
                }
            },
            submitHandler: function(form) {
                var formData = $(form).serialize();
                console.log(formData);

                $.ajax({
                    url: "contact_submit.php",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        if (response = "Message sent successfully!") {
                            sweetAlert("Success", "Message Sent !", "success").then(()=>{
                                $('#myForm')[0].reset();
                            });
                        } else {
                            alert("Error 404 !");
                        }

                    }
                });
            }
        });



        $("#loginid").click(function(e) {
            e.preventDefault();
            window.location.href = "dashboard/login.php";
        })
    })
</script>

</html>