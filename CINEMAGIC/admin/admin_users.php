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
                        <th>UserName</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
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
                    <h4 class="modal-title">Add Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>UserName</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" name="dateOfBirth" required>
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
                    <h4 class="modal-title">Edit Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>UserName</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" name="dateOfBirth" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="userid" class="employee-id">
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
                    <h4 class="modal-title">Delete Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="UserID" class="employee-id">
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
            url: 'db1.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response); // For debugging
                var tbody = '';
                $.each(response, function(index, employee) {
                    tbody += '<tr>';
                    tbody += '<td><span class="custom-checkbox"><input type="checkbox" id="checkbox' + employee.UserID + '" name="options[]" value="' + employee.UserID + '"><label for="checkbox' + employee.UserID + '"></label></span></td>';
                    tbody += '<td>' + employee.username + '</td>';
                    tbody += '<td>' + employee.password + '</td>';
                    tbody += '<td>' + employee.email + '</td>';
                    tbody += '<td>' + employee.dateOfBirth + '</td>';
                    tbody += '<td>';
                    tbody += '<a href="#editEmployeeModal" class="edit" data-toggle="modal" data-id="' + employee.UserID + '" data-username="' + employee.username + '" data-password="' + employee.password + '" data-email="' + employee.email + '" data-dateOfBirth="' + employee.dateOfBirth + '"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
                    tbody += '<a href="#deleteEmployeeModal" class="delete" data-toggle="modal" data-id="' + employee.UserID + '"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
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
    $('#addEmployeeForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'db1.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log(response); // For debugging
                $('#addEmployeeModal').modal('hide');
                fetchEmployees();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // For debugging
            }
        });
    });

    // Edit Employee
    $(document).on('click', '.edit', function() {
        var id = $(this).data('id');
        var username = $(this).data('username');
        var password = $(this).data('password');
        var email = $(this).data('email');
        var dateOfBirth = $(this).data('dateofbirth');
        $('#editEmployeeModal .employee-id').val(id);
        $('#editEmployeeModal [name="username"]').val(username);
        $('#editEmployeeModal [name="password"]').val(password);
        $('#editEmployeeModal [name="email"]').val(email);
        $('#editEmployeeModal [name="dateOfBirth"]').val(dateOfBirth);
    });

    $('#editEmployeeForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'db1.php',
            type: 'PUT',
            data: formData,
            success: function(response) {
                console.log(response); // For debugging
                $('#editEmployeeModal').modal('hide');
                fetchEmployees();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // For debugging
            }
        });
    });

    // Delete Employee
    $(document).on('click', '.delete', function() {
        var id = $(this).data('id');
        console.log(id); // For debugging

        $('#deleteEmployeeModal .employee-id').val(id);

    });

    $('#deleteEmployeeForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'db1.php',
            type: 'DELETE',
            data: formData,
            success: function(response) {
                console.log(response); // For debugging
                $('#deleteEmployeeModal').modal('hide');
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
