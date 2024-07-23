$('main').ready(function() {
    $('#airingButton').click(function() {
        console.log('Buttoni Airing ../../Backend/DisplayMovie.php');
        $.ajax({
            url: '../../Backend/AiringMovies.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log('Data fetched successfully:', data);
                displayMovies(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error fetching data:', textStatus, errorThrown);
                console.log('Response:', jqXHR.responseText);
            }
        });    });
        $('#upcomingButton').click(function() {
            console.log('Buttoni Airing ../../Backend/DisplayMovie.php');
            $.ajax({
                url: '../../Backend/UpcomingMovies.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log('Data fetched successfully:', data);
                    displayMovies(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching data:', textStatus, errorThrown);
                    console.log('Response:', jqXHR.responseText);
                }
            });    });
    function fetchMovies() {
        console.log('Fetching movies from: ../../Backend/DisplayMovie.php');
        $.ajax({
            url: '../../Backend/DisplayMovie.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log('Data fetched successfully:', data);
                displayMovies(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error fetching data:', textStatus, errorThrown);
                console.log('Response:', jqXHR.responseText);
            }
        });
    }

    function displayMovies(movies) {
        const $articlesContainer = $('.articles-container');
        $articlesContainer.empty();




        if (movies.length > 0) {
            movies.forEach(function(movie) {
                const $article = $('<article>', { class: 'grid-item' });

                const $title = $('<h2>').text(movie.Title);
                $article.append($title);

                const $link = $('<a>', {
                    href: 'MovieDetail.php?movieid=' + movie.MovieID,
                    'data-movieid': movie.MovieID,  // Correct attribute
                    class: 'movie-link'
                });

                const $img = $('<img>', {
                    src: movie.photo_link,
                    alt: 'Image of ' + movie.Title,
                    css: {
                        width: '167px',
                        height: '244px'
                    }
                });
                $link.append($img);
                const $Ratings = $('<p>', { class: 'rate' }).text('Rating: ' + movie.Ratings);
                $article.append($Ratings);

                $article.append($link);

                
                $articlesContainer.append($article);
            });

            // Add click event listener to links
            $('.movie-link').on('click', function(e) {
                e.preventDefault();
                const movieId = $(this).data('movieid'); // Correctly fetch data-movieid
                console.log('Clicked movie ID:', movieId);
                window.location.href = 'Moviedetail.php?movieid=' + movieId;

            });
        } else {
            $articlesContainer.text('0 results');
        }
    }

    fetchMovies();
});
