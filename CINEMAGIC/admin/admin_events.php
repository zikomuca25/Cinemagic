<?php

include_once("commonAdmin.php");
 echo CommonAdmin::generateHeader(); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
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
                        <h2>Manage <b>Admins</b></h2>
                    </div>

					
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
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
                        <th>Date</th>
                        <th>Time</th>
                        <th>Banner</th>
                        <th>Small Banner</th>
                        <th>Location</th>
                        <th>Price</th>
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
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addEmployeeForm">
            <div class="modal-header">
                    <h4 class="modal-title">Add Event</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="eventTitle" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="eventDescription" required>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" name="eventDate" required>
                    </div>
                    <div class="form-group">
                        <label>Time</label>
                        <input type="time" class="form-control" name="eventTime" required>
                    </div>
                    <div class="form-group">
                        <label>Banner</label>
                        <input type="text" class="form-control" name="eventBanner" required>
                    </div>
                    <div class="form-group">
                        <label>Small Banner</label>
                        <input type="text" class="form-control" name="eventSBanner" required>
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" name="eventLocation" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="eventPrice" required>
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
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editEmployeeForm">
            <div class="modal-header">
                    <h4 class="modal-title">Edit Event</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="eventTitle" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="eventDescription" required>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" name="eventDate" required>
                    </div>
                    <div class="form-group">
                        <label>Time</label>
                        <input type="time" class="form-control" name="eventTime" required>
                    </div>
                    <div class="form-group">
                        <label>Banner</label>
                        <input type="text" class="form-control" name="eventBanner" required>
                    </div>
                    <div class="form-group">
                        <label>Small Banner</label>
                        <input type="text" class="form-control" name="eventSBanner" required>
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" name="eventLocation" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="eventPrice" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="eventID" class="event-id">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteEmployeeForm">
            <div class="modal-header">
                    <h4 class="modal-title">Delete Event</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="eventID" class="event-id">
                    <input type="button"class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Fetch events on page load
    fetchEvents();

    function fetchEvents() {
        $.ajax({
            url: 'event_db.php', 
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response); // For debugging
                var tbody = '';
                $.each(response, function(index, event) {
                    tbody += '<tr>';
                    tbody += '<td><span class="custom-checkbox"><input type="checkbox" id="checkbox' + event.eventID + '" name="options[]" value="' + event.eventID + '"><label for="checkbox' + event.eventID + '"></label></span></td>';
                    tbody += '<td>' + event.eventTitle + '</td>';
                    tbody += '<td>' + truncateDescription(event.eventDescription) + '</td>';
                    tbody += '<td>' + event.eventDate + '</td>';
                    tbody += '<td>' + event.eventTime + '</td>';
                    tbody += '<td>' + event.eventBanner + '</td>';
                    tbody += '<td>' + event.eventSBanner + '</td>';
                    tbody += '<td>' + event.eventLocation + '</td>';
                    tbody += '<td>' + event.eventPrice + '</td>';
                    tbody += '<td>';
                    tbody += '<a href="#editEmployeeModal" class="edit" data-toggle="modal" data-id="' + event.eventID + '" data-title="' + event.eventTitle + '" data-description="' + event.eventDescription + '" data-date="' + event.eventDate + '" data-time="' + event.eventTime + '" data-banner="' + event.eventBanner + '" data-sbanner="' + event.eventSBanner + '" data-location="' + event.eventLocation + '" data-price="' + event.eventPrice + '"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
                    tbody += '<a href="#deleteEmployeeModal" class="delete" data-toggle="modal" data-id="' + event.eventID + '"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
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

    // Add Event
    $('#addEmployeeForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'event_db.php', 
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log(response); // For debugging
                $('#addEmployeeModal').modal('hide');
                fetchEvents();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // For debugging
            }
        });
    });

    // Edit Event
    $(document).on('click', '.edit', function() {
        var id = $(this).data('id');

        var eventTitle = $(this).data('title');

        var eventDescription = $(this).data('description');
        var eventDate = $(this).data('date');
        var eventTime = $(this).data('time');
        var eventBanner = $(this).data('banner');
        var eventSBanner = $(this).data('sbanner');
        var eventLocation = $(this).data('location');
        var eventPrice = $(this).data('price');
        
        $('#editEmployeeModal [name="eventTitle"]').val(eventTitle);
        $('#editEmployeeModal [name="eventDescription"]').val(eventDescription);
        $('#editEmployeeModal [name="eventDate"]').val(eventDate);
        $('#editEmployeeModal [name="eventTime"]').val(eventTime);
        $('#editEmployeeModal [name="eventBanner"]').val(eventBanner);
        $('#editEmployeeModal [name="eventSBanner"]').val(eventSBanner);
        $('#editEmployeeModal [name="eventLocation"]').val(eventLocation);
        $('#editEmployeeModal [name="eventPrice"]').val(eventPrice);
        $('#editEmployeeModal .event-id').val(id);
        console.log(id);

    });

    $('#editEmployeeForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        console.log(formData); 
        $.ajax({
            url: 'event_db.php', 
            type: 'PUT',
            data: formData,
            success: function(response) {
                console.log(response); // For debugging
                $('#editEmployeeModal').modal('hide');
                fetchEvents();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // For debugging
            }
        });
    });

    // Delete Event
    $(document).on('click', '.delete', function() {
        var id = $(this).data('id');
        $('#deleteEmployeeModal .event-id').val(id);
        console.log(id);
    });

    $('#deleteEmployeeForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'event_db.php', 
            type: 'DELETE',
            data: formData,
            success: function(response) {
                console.log(response); // For debugging
                $('#deleteEmployeeModal').modal('hide');
                fetchEvents();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // For debugging
            }
        });
    });
});

// Utility function to truncate long descriptions
function truncateDescription(description, maxLength = 50) {
    if (description.length > maxLength) {
        return description.substring(0, maxLength) + '...';
    } else {
        return description;
    }
}





</script>
</body>
</html>
