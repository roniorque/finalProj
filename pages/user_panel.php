<?php

require '../config.php';
use App\User;
session_start();

if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    // Redirect the user to the login page or display an error message
    header("Location: login.php"); // Redirect to the login page
    exit; // Stop executing the rest of the code
} else {
    $user_id = $_SESSION['user']['id'];
    $user = User::getById($user_id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/user_panel.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.9/css/boxicons.min.css">
    <title>Document</title>
</head>
<style>
        body {
            background-color: white;
            color: black;
            font-family: Arial, sans-serif;
        }
.title{
    text-align: center;
}
        .container {
            margin: 50px auto;
            max-width: 400px;
            max-height: 900px;  
        }

        .box {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid black;
        }

        .label {
            font-weight: bold;
        }

        .btn {
            background-color: black;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            margin-right: 10px;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: gray;
        }
    </style>
<body>
    <div>
        <h1 style="text-align: center;">
            USER INFORMATION
    </h1>
    </div>
    <div class="container">
        <form action="save_user.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $user->getID(); ?>">
            <div>
                <label>Username: </label>
                <input type="text" class="box" value="<?php echo $user->getUsername(); ?>" name="username" required ><br>
            </div>
            <div>
                <label>Email: </label>
                <input type="email" value="<?php echo $user->getEmail(); ?>" name="email" class="box" required><br>
            </div>
            <div>
                <label>Shipping Address: </label>
                <input type="text" value="<?php echo $user->getShipping(); ?>" name="shipping" class="box" required><br>
            </div>
            <div>
                <label>Billing Address:</label>
                <input type="text" value="<?php echo $user->getBilling(); ?>" name="billing" class="box" required><br>
            </div>
            <div>
                <label>Phone Number:</label>
                <input type="tel" value="<?php echo $user->getBilling(); ?>" name="billing" class="box" required><br>
            </div>
            <div>
                <label>Password:</label>
                <input type="password" value="<?php echo $user->getBilling(); ?>" name="billing" class="box" required><br>
            </div>
            <input type="submit" value="Save" class="btn">
            <a href="logout.php" class="btn">LOGOUT</a> 
        </form>
        
    </div>
    
</body>
</html>
