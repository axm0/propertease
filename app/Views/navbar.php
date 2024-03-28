<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropertEase</title>
    <!-- Ensure Bootstrap CSS is included -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body style="padding-top: 56px;"> <!-- Adjust this padding value to match the height of your navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a href="/propertease/public/home" class="navbar-brand">
            <img src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="Bootstrap">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="/propertease/public/viewProperties" class="nav-link">View Properties</a></li>
                <li class="nav-item"><a href="/propertease/public/myProperties" class="nav-link">My Properties</a></li>
                <li class="nav-item"><a href="/propertease/public/favorites" class="nav-link">My Favorites</a></li>
                <li class="nav-item"><a href="/propertease/public/about" class="nav-link">About</a></li>
                <li class="nav-item"><a href="/propertease/public/profile" class="nav-link">Profile</a></li>
                <li class="nav-item"><a href="/propertease/public/login" class="nav-link">Login/Sign-Up</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Rest of your HTML content -->

<!-- Include Bootstrap JS and Popper.js at the end of your document -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
