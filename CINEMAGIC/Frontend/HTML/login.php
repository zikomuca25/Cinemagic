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

    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; 
    $password = isset($_POST['pass']) ? htmlspecialchars(sha1($_POST['pass'].$salt)) : ''; 

    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? and password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->num_rows;
    $stmt->close();

    if($count == 1){ 
        $user = $result->fetch_assoc();

        
        if ($user['admin'] == 1) {
            $_SESSION["admin"] = $email;  
            header("Location: ../../admin/homepageadmin.php");

        } else if ($user['admin'] == 0) {
            $_SESSION["username"] = $email; 
            header("Location: ./Movie.php"); //hererr the file is called Movie.php

        }
    }
    else{  
        echo  '<script>
                    window.location.href = "login.php";
                    alert("Login failed. Invalid email or password!!")
                </script>';
    }     

}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Login page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/loginstyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class = "container">
        <div id="form">
        <h1>Login Form</h1>
<form name="form" action="login.php" onsubmit="return isvalid()" method="POST">
<input type="email" id="email" name="email" placeholder="email"></br></br>
<input type="password" id="pass" name="pass" placeholder="password"></br></br>
<input type="submit" id="btn" value="Login" name="submit"/>
    <div class="container">
        <a href="signup.php" class="nav-link">Don't have an account?</a>
        <a href="default.php" class="nav-link">Go back 🏠</a>
    </div>
</form>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"> </script>
    <script>
        function isvalid(){
            var email = document.form.email.value;
            var pass = document.form.pass.value;
            if(email.length=="" && pass.length==""){
                alert(" email and password field is empty!!!");
                return false;
            }
            else if(email.length==""){
                alert(" email field is empty!!!");
                return false;
            }
            else if(pass.length < 8){
                alert(" password should be longer than 8 characters!!!");
                return false;
            }
            else if(pass.length==""){
                alert(" password field is empty!!!");
                return false;
            }
            
        }
    </script>
    
</body>
</html>