
<?php

include_once("commonAdmin.php");
 echo CommonAdmin::generateHeader(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Movies Admin</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="admin.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Movies</b></h2>
                    </div>

					
                    <div class="col-sm-6">
                        <a href="#addMovieModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        
                        <th>Title</th>
                        <th>Description</th>
                        <th>Genre</th>
                        <th>Upcoming Date</th>
                        <th>Airing Date</th>
                        <th>Ending Date</th>
                        <th>Ratings</th>
                        <th>Category</th>
                        <th>Language</th>
                        <th>Photo Link</th>     
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Add Modal HTML -->
<div id="addMovieModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addMovieForm">
                <div class="modal-header">
                    <h4 class="modal-title">Add Movie</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">

                <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
             
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" required>
                    </div>
                    <div class="form-group">
                        <label>Genre</label>
                        <input type="text" class="form-control" name="genre" required>
                    </div>
                    <div class="form-group">
                        <label>UpcomingDate</label>
                        <input type="date" class="form-control" name="upcomingDate" required>
                    </div>
                    <div class="form-group">
                        <label>AiringDate</label>
                        <input type="date" class="form-control" name="AiringDate" required>
                    </div>
                    <div class="form-group">
                        <label>EndDate</label>
                        <input type="date" class="form-control" name="endDate" required>
                    </div>

                    <div class="form-group">
                        <label>Rating</label>
                        <input type="number" class="form-control" name="rating" required>
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <input type="number" class="form-control" name="category" required>
                    </div>
    
                    
                    <div class="form-group">
                    <label>Language</label>
                     <input type="text" class="form-control"  name="Language"  required>
                    </div>

                    <div class="form-group">
                        <label>photo_link</label>
                        <input type="text" class="form-control" name="photo_link" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="editMovieModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editMovieForm">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Movie</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
               
                <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
             
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" required>
                    </div>
                    <div class="form-group">
                        <label>Genre</label>
                        <input type="text" class="form-control" name="genre" required>
                    </div>
                    <div class="form-group">
                        <label>UpcomingDate</label>
                        <input type="date" class="form-control" name="upcomingDate" required>
                    </div>
                    <div class="form-group">
                        <label>AiringDate</label>
                        <input type="date" class="form-control" name="AiringDate" required>
                    </div>
                    <div class="form-group">
                        <label>EndDate</label>
                        <input type="date" class="form-control" name="endDate" required>
                    </div>

                    <div class="form-group">
                        <label>Rating</label>
                        <input type="number" class="form-control" name="rating" required>
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <input type="number" class="form-control" name="category" required>
                    </div>
    
                    
                    <div class="form-group">
                    <label>Language</label>
                     <input type="text" class="form-control"  name="Language"  required>
                    </div>

                    <div class="form-group">
                        <label>photo_link</label>
                        <input type="text" class="form-control" name="photo_link" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="MovieID" class="employee-id">  
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Modal HTML -->
<!-- Delete Modal HTML -->
<div id="deleteMovieModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteMovieForm">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Movies</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="movieid" class="employee-id">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>


<script>
$(document).ready(function(){
    // Fetch employees on page load
    fetchEmployees();

    function fetchEmployees() {
        $.ajax({
            url: 'AddDeleteMovieDatabase.php',
            type: 'GET',
            dataType: 'json',
            data: { type: 'fetch' },
            success: function(response) {
                console.log(response); // For debugging
                var tbody = '';
                $.each(response, function(index,row) {
                    tbody += '<tr>';
                    tbody += '<td><span class="custom-checkbox"><input type="checkbox" id="checkbox' + row.MovieID + '" name="options[]" value="' + row.MovieID + '"><label for="checkbox' + row.MovieID + '"></label></span></td>';
                    tbody += '<td>' + row.Title + '</td>';
                    tbody += '<td>' + row.Description + '</td>';
                    tbody += '<td>' + row.Genre + '</td>';
                    tbody += '<td>' + row.UpcomingDate + '</td>';
                    tbody += '<td>' + row.date_showing + '</td>';
                    tbody += '<td>' + row.end_date + '</td>';
                    tbody += '<td>' + row.Ratings + '</td>';
                    tbody += '<td>' + row.Category + '</td>';
                    tbody += '<td>' + row.Language + '</td>';
                    tbody += '<td>' + row.photo_link + '</td>';
                   
                    tbody += '<td>';
                    tbody += '<a href="#editMovieModal" class="edit" data-toggle="modal" data-MovieID="' + row.MovieID + '" data-title="' + row.Title + '" data-description="' + row.Description + '" data-genre="' + row.Genre + '" data-upcomingDate="' + row.UpcomingDate + '" data-AiringDate="' + row.date_showing + '" data-end_date="'+ row.end_date + '" data-rating="' + row.Ratings + '" data-Category="' + row.Category + '" data-language="' +row.Language  + '" data-photo_link="' + row.photo_link + '" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
                    tbody += '<a href="#deleteMovieModal" class="delete" data-toggle="modal" data-MovieID="' + row.MovieID + '"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                    tbody += '</td>';
                    tbody += '</tr>';
                });
                $('table tbody').html(tbody);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // For debugging
            }
        });
    }

    // Add Employee
    $('#addMovieForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var releasedDate = new Date($('#releasedDate').val());
        var formattedDate = releasedDate.getFullYear() + '-' + ('0' + (releasedDate.getMonth() + 1)).slice(-2) + '-' + ('0' + releasedDate.getDate()).slice(-2);
        formData += '&releasedDate=' + formattedDate;
        $.ajax({
            url: 'AddDeleteMovieDatabase.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log("Form Data:", formData);
            console.log("Form ID:", $(this).attr('id'));
                $('#addMovieModal').modal('hide');
                fetchEmployees();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // For debugging
            }
        });
    });

    // Edit Employee
    $(document).on('click', '.edit', function() {
        var id = $(this).data('movieid');
        var title = $(this).data('title');
        var description = $(this).data('description');
        var genre = $(this).data('genre');
        var upcomingDate = $(this).data('upcomingdate');

        var airingDate = $(this).data('airingdate');
        var endDate = $(this).data('end_date');
        var rating = $(this).data('rating');
        var category = $(this).data('category');
        var language = $(this).data('language');
        var photo_link = $(this).data('photo_link');
        // Print the data to the console
    console.log('Movie ID:', id);
    console.log('Title:', title);
    console.log('Description:', description);
    console.log('Genre:', genre);
    console.log('Upcoming Date:', upcomingDate);
    console.log('Airing Date:', airingDate);
    console.log('End Date:', endDate);
    console.log('Rating:', rating);
    console.log('Category:', category);
    console.log('Language:', language);
    console.log('Photo Link:', photo_link);
        $('#editMovieModal .employee-id').val(id);
        $('#editMovieModal [name="title"]').val(title);
        $('#editMovieModal [name="description"]').val(description);
        $('#editMovieModal [name="genre"]').val(genre);
        $('#editMovieModal [name="upcomingDate"]').val(upcomingDate);
        $('#editMovieModal [name="AiringDate"]').val(airingDate);
        $('#editMovieModal [name="endDate"]').val(endDate);
        $('#editMovieModal [name="rating"]').val(rating);
        $('#editMovieModal [name="category"]').val(category);
        $('#editMovieModal [name="Language"]').val(language);
        $('#editMovieModal [name="photo_link"]').val(photo_link);
    });

    $('#editMovieForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'AddDeleteMovieDatabase.php',
            type: 'PUT',
            data: formData,
            success: function(response) {
                console.log("Form Data:", formData);
                console.log("response:", response); // For debugging
                $('#editMovieModal').modal('hide');
                fetchEmployees();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // For debugging
            }
        });
    });

    // Delete Employee
  
    $(document).on('click', '.delete', function() {
       
        var id = $(this).data('movieid');
        console.log('Movie ID:', id); // Add this line to check if ID is correctly fetched
       
        $('#deleteMovieModal .employee-id').val(id);
       
    });

    $('#deleteMovieForm').submit(function(e) {
       
        e.preventDefault();
       
        var formData = $(this).serialize();
        
        $.ajax({
            url: 'AddDeleteMovieDatabase.php',
            type: 'DELETE',
            data: formData,
            success: function(response) {
                console.log("Respond:",response); // For debugging
                console.log("Form Data:",formData); // For debugging
                $('#deleteMovieModal').modal('hide');
                fetchEmployees();
            },
            
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // For debugging
            }
        });
    });
});
</script>
</body>
</html>
