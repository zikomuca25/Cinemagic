<?php
class CommonAdmin {
    public static function generateHeader() {
        return '
        <header style="background-color: #1e1e1e; color: #fff; padding: 10px;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-auto">

                    <a href="/Frontend/HTML/default.php" id="signOut" style="color: #fff; background-color: #D72323; padding: 5px; text-decoration: none;">Sign out</a>
                    </div>
                </div>
            </div>
        </header>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0e0e0e;">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="homepageadmin.php" style="color: white;">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                                Modify
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: #1e1e1e;">
                                <a class="dropdown-item" href="./admin_users.php" style="color: white;">Users</a>
                                <a class="dropdown-item" href="./admin_events.php" style="color: white;">Events</a>
                                <a class="dropdown-item" href="./admin_movies.php" style="color: white;">Movies</a>
                            </div>
                        </li>
    
                    </ul>
                </div>
            </div>
        </nav>';
    }
}
?>
