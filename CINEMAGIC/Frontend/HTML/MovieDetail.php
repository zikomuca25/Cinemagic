<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challengers</title>
    <link rel="stylesheet" href="../CSS/moviedetail.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <img src="" alt="Challengers Image" class="image" id="movieImage">
        <div class="content">
            <h1></h1>
            <p></p>
            <div class="details">
                <!-- Movie details will be populated here by JavaScript -->
            </div>
            <button  class="button1"id="book" >BookNow</a>

        </div>
        <a href="Movie.php" class="exit">X</a>
    </div>
    
    <script src="../JS/MovieDetail.js">
       
    </script>
    <script>
   $(".button1").ready(function() {
            $('#book').click(function() {
                const movieId = getUrlParameter('movieid');
                        window.location.href = 'Book.php?movieId=' + movieId; 
            });
        });
        function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    const regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    const results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}
        </script>
</body>
</html>
