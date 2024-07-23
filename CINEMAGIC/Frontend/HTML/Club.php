<?php
include_once("common.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie </title>
    <link rel="stylesheet" href="../CSS/clubstyle.css">
    <link rel="stylesheet" href="../CSS/moviestyle.css">


     <style>
        /* CSS for the Bullet Points */
        .bullet-point {
            color: red; /* Change color as desired */
            font-size: 24px; /* Change font size as desired */
            font-weight: bold; /* Make the asterisks bold */
            margin: 0 5px; /* Adjust margin as desired */
        }
    </style>

</head>

<body>

 <!----------------------------------------------- Navbar ---------------------------------------->

 <?php
//COJA KT ZIKOS
echo common::generateHeader();
echo common::generateFirstNav();

?> 
    <section class = "page-title">
        CINEMAGIC CLUB
    </section>


    <div class="container">
    <section class="text-join-section">
        <h2>If you want to join, click here:</h2> 
        <button class="join-button" onclick="joinClub()">Join Now</button>
    </section>



</div>
         <section class="image-section">
        <img src="../CSS/joinclub.jpg" alt="Description of the image">
        </section>

 <div id="popup" class="popup">
  <div class="popup-content">
    <span class="close" onclick="closePopup()">&times;</span>
      <section class="img">
         <img src="../CSS/joincongrats.jpg" alt="Description of the image">
           </section>

  </div>
</div>

<div class="container">      
    <section class="club-info-section">
        <p id="p1"><strong>Here's how it works:</strong></p>
        
        <div id="p2">
            <p><strong><span class="bullet-point">✔</span>General Membership:</strong>  Everyone gets 10% off movie tickets upon registering!</p>
            <p><strong><span class="bullet-point">✔</span>Senior Discount (Ages 65+):</strong> Enjoy an additional 15% off movie tickets on Tuesdays and Wednesdays (excluding holidays).</p>
            <p><strong><span class="bullet-point">✔</span>Student Discount (Ages 13-22 with valid student ID):</strong> Get $2 off movie tickets every day, except for opening weekends of major releases.</p>
            <p><strong><span class="bullet-point">✔</span>Becoming a member is easy! "</strong></p>
        </div>
   
        <p id="p3">Priority access for ticket purchases and event bookings.
        Exclusive member-only promotions and giveaways.
        Advance screenings of upcoming movies (availability may vary).
        Earn points on your movie purchases to redeem for concessions or future tickets!
        Don't miss out on these incredible savings! Join our Movie Club today and start enjoying the benefits of being a member.</p>

        <!-- You can add more content here about the clubs -->
    </section>
</div>
<?php
echo common::generateFooter();
?> 

    <script>
 function joinClub() {
    // Send AJAX request to back-end script
    var xhr = new XMLHttpRequest(); // Create a new XMLHttpRequest object
    xhr.open("POST", "../../Backend/back-end-club.php", true); // Initialize the request
    xhr.onreadystatechange = function() { // Define a callback function to handle the response
        if (xhr.readyState === 4) { // Check if the request is complete
            if (xhr.status === 200) { // Check if the request was successful (status code 200)
                // Successful response from back-end
                var response = xhr.responseText; // Get the response text from the server
                if (response === "success") { // Check if the response indicates success
                    openPopup();
                  //  closePopup();  
                }
                else if(response === "member"){
                    alert("You are already a member !!!");
                }
                 else {
                    // Alert the user if joining the club failed
                    alert(response); // Show an alert with the response text (error message)
                }
            } else {
                // Handle errors if AJAX request fails
                alert("Error: " + xhr.statusText); // Show an alert with the error status text
            }
        }
    };
    xhr.send(); // Send the request to the server
}  
        </script>
        
        <script>
    // Function to open the popup
    function openPopup() {
        var popup = document.getElementById("popup");
        var overlay = document.getElementById("overlay");
        popup.style.display = "block";
        overlay.style.display = "block";
        setTimeout(function() {
        closePopup();
    }, 2000);
    }

    // Function to close the popup
    function closePopup() {
        var popup = document.getElementById("popup");
        var overlay = document.getElementById("overlay");
        popup.style.display = "none";
        overlay.style.display = "none";
    }
</script>

</body>

</html>