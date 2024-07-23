$(document).ready(function() {
    
    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }

    var movieId = getUrlParameter('movieid');
    console.log('Movie ID:', movieId);

    if (!movieId) {
        console.error('Movie ID not provided in the URL.');
        return;
    }

    $.ajax({
        url: '../../Backend/movieDetail.php',
        type: 'GET',
        data: { movieid: movieId },
        dataType: 'json',
        success: function(data) {
            if (data && !data.error) {
                $('h1').text(data.Title || 'Title not available');
                $('p').text(data.Description || 'Description not available');
                $('#movieImage').attr('src', data.photo_link || 'default_image.jpg');
                $('.details').html(`
                    <p>${data.date_showing || 'N/A'}</p>
                    <p>${data.Genre || 'N/A'}</p>
                    <p>${data.Language || 'N/A'}</p>
                    <p>${data.Ratings || 'N/A'}</p>
                `);
                console.log(data);
            } else {
                console.error('Error in response:', data.error || 'Unknown error');
                $('.details').text('No movie details available.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching movie data:', error);
        }
    });
});
