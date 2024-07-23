<?php
include_once("commonAdmin.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Welcome Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1e1e1e;
        }

        h1, h2, p {
            color: white;
        }

        .welcome-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .welcome-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .welcome-text {
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .welcome-text h2 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .welcome-text p {
            margin: 10px 0;
        }
    </style>

</head>
<body>
    
<?php echo CommonAdmin::generateHeader(); ?>
    <div class="welcome-container">
        <br><h1>Welcome to the Admin Panel</h1>
        <div class="welcome-text">
            <h2>Manage Your Cinema with Ease</h2>
            <p>Welcome to the admin panel of our cinema website. Here, you can manage all aspects of the cinema operations, from movie listings and user management to bookings and events. Use the navigation links above to get started.</p>
            <p>We are dedicated to providing you with the best tools to ensure a seamless management experience. If you need any assistance, please do not hesitate to contact our support team.</p>
        </div>
        <br><img src="../images/pexels-tima-miroshnichenko-7991582.jpg" alt="Welcome Image" class="welcome-image">
    </div>
</body>
</html>
  

