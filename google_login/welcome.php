<?php

require_once 'config.php';

// Check if user is authenticated
if (isset($_GET['code'])) {
    // Fetch access token
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    // Check if access token exists and is valid
    if (!isset($token['access_token'])) {
        die('Access token is missing or invalid.');
    }

    // Set access token in the Google client
    $client->setAccessToken($token);

    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    // Prepare user info array
    $userinfo = [
        'email' => $google_account_info['email'],
        'first_name' => $google_account_info['givenName'],
        'last_name' => $google_account_info['familyName'],
        'gender' => $google_account_info['gender'],
        'full_name' => $google_account_info['name'],
        'picture' => $google_account_info['picture'],
        'verifiedEmail' => $google_account_info['verifiedEmail'],
        'token' => $google_account_info['id'],
    ];

    //Checking if user already exists in the Database
    $query = "SELECT * FROM google_login_user WHERE email = '{$userinfo['email']}'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $userinfo = mysqli_fetch_assoc($result);
        $token = $userinfo['token'];
    } else {
        // Insert user into database
        $query = "INSERT INTO google_login_user (email, first_name, last_name, gender, full_name, picture, verifiedEmail, token) VALUES ('{$userinfo['email']}', '{$userinfo['first_name']}', '{$userinfo['last_name']}', '{$userinfo['gender']}', '{$userinfo['full_name']}', '{$userinfo['picture']}', '{$userinfo['verifiedEmail']}', '{$userinfo['token']}')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $token = $userinfo['token'];
        } else {
            echo "User is not Created";
            die();
        }
    }

    // Set user token in session
    $_SESSION['user_token'] = $token;
} elseif (isset($_SESSION['user_token'])) {
    // User is authenticated, fetch user info from the database
    $query = "SELECT * FROM google_login_user WHERE token = '{$_SESSION['user_token']}'";
    $result = mysqli_query($conn, $query);
    $userinfo = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .user-info {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }
        .user-info img {
            border-radius: 50%;
            margin-right: 20px;
        }
        .user-info ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .user-info ul li {
            margin-bottom: 10px;
        }
        .user-info ul li strong {
            color: #333;
        }
        .user-info ul li a {
            color: #007bff;
            text-decoration: none;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($userinfo)) : ?>
            <div class="user-info">
                <!-- Output user picture -->
                <img src="<?php echo $userinfo['picture']; ?>" alt="Profile Picture" height="90px" width="90px">
                <ul>
                    <!-- Output user information -->
                    <li><strong>Full Name:</strong> <?php echo $userinfo['full_name']; ?></li>
                    <li><strong>Email Address:</strong> <?php echo $userinfo['email']; ?></li>
                    <li><strong>Gender:</strong> <?php echo $userinfo['gender']; ?></li>
                    <li>Logout: <a href="logout.php" class="btn btn-primary">Logout</a></li>
                </ul>
            </div>
        <?php else : ?>
            <p>User not authenticated.</p>
        <?php endif; ?>
    </div>
</body>
</html>


