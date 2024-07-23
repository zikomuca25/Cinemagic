<?php
require_once("../../Backend/PHP/db.php"); 
session_start();
    if(isset($_SESSION["admin"])){
        header("Location: ../../admin/homepageadmin.php");
        exit(); 
    }
    if(isset($_SESSION["username"])){
        header("Location: ./Movie.php");
        exit();
    }
    

    if (isset($_POST['submit'])) {
        $username = isset($_POST['user']) ? htmlspecialchars($_POST['user']) : ''; 
        $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; 
        $password = isset($_POST['pass']) ? htmlspecialchars($_POST['pass']) : ''; 
        $cpassword = isset($_POST['cpass']) ? htmlspecialchars($_POST['cpass']) : ''; 
        $dob = isset($_POST['date']) ? htmlspecialchars($_POST['date']) : ''; 
    
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $count_user = $result->num_rows;
        $stmt->close();
    
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $count_email = $result->num_rows;
        $stmt->close();
    
        if ($count_email == 0) {  
            if (strlen($password) < 8) {
                echo  '<script>
                            alert("Passwords should be longer than 8");
                            window.location.href = "signup.php";
                       </script>';
            } elseif (!preg_match("/[A-Z]/", $password) || !preg_match("/[a-z]/", $password) || !preg_match("/[0-9]/", $password) || !preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $password)) {
                echo  '<script>
                            alert("Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character");
                            window.location.href = "signup.php";
                       </script>';
            } else {
                if ($password == $cpassword) {
                    $hash = sha1($password . $salt);
    
                    $stmt = $conn->prepare("INSERT INTO user(username, email, password, dateOfBirth) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("ssss", $username, $email, $hash, $dob);
                    $stmt->execute();
                    $stmt->close();

                    $_SESSION["username"] = $email;  
                    header('Location: ./Movie.php');
                } else { 
                    echo  '<script>
                                alert("Passwords do not match");
                                window.location.href = "signup.php";
                           </script>';
                }  
            }    
        } else {  
            if ($count_email > 0) {
                echo  '<script>
                            window.location.href = "signup.php"; 
                            alert("Email already exists!!");
                       </script>';
            }
        }     
    }
    ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../CSS/loginstyle.css">

  </head>
  <body>
      <div id="form1">
            <h1 id="heading">SignUp Form</h1><br>
            <form name="form" action="signup.php" method="POST">
                <i 
                class="fa fa-user fa-lg"></i>
                <input type="text" id="user" name="user" placeholder="Enter Username" required></br></br>
                <i class="fa-solid fa-envelope fa-lg"></i>
                <input type="email" id="email" name="email" placeholder="Enter Email" required></br></br>
                <i class="fa-solid fa-calendar fa-lg"></i>
                <input type = "date" id = date name = date></br></br>
                <i class="fa-solid fa-lock fa-lg"></i>
                <input type="password" id="pass" name="pass" placeholder="Create Password" required></br></br>
                <i class="fa-solid fa-lock fa-lg"></i>
                <input type="password" id="cpass" name="cpass" placeholder="Retype Password" required></br></br>

                <input type="submit" id="btn" value="SignUp" name = "submit"/>
            </form>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
