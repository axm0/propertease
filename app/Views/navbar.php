<!DOCTYPE html>
<!--app/Views/navbar.php-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropertEase</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body style="padding-top: 56px;">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/propertease/public/home">PropertEase</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <form class="form-inline my-2 my-lg-0" action="/propertease/public/search" method="get">
                <input class="form-control mr-sm-2" type="search" placeholder="Search Properties" aria-label="Search" name="query">
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="/propertease/public/viewProperties" class="nav-link">All Properties</a></li>
                <?php if (isset($_SESSION['userID'])): ?>
                    <li class="nav-item"><a href="/propertease/public/favorites" class="nav-link">My Favorites</a></li>
                <?php if(strtolower($_SESSION['user_type']) == "seller"): ?>
                    <li class="nav-item"><a href="/propertease/public/myProperties" class="nav-link">My Properties</a></li>
                <?php endif; ?>
                    <li class="nav-item"><a href="/propertease/public/profile" class="nav-link">Profile</a></li>
                    <li class="nav-item"><a href="/propertease/public/logout" class="nav-link">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="/propertease/public/login" class="nav-link">Login/Sign-Up</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="/js/main.js"></script>
</body>
</html>
