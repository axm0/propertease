<?php
if (!isset($_SESSION['user_name'])) {
    // Optionally redirect to login or do other handling
    // header('Location: /login.php');
    // exit();
}
?>
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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/propertease/public/home">PropertEase</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="/propertease/public/viewProperties" class="nav-link">All Properties</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['user_name']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="/propertease/public/profile">Profile</a>
                            <a class="dropdown-item" href="/propertease/public/logout">Logout</a>
                            <a class="dropdown-item" herf="/propertease/public/favorites">My Favorites</a>
                            <a class="dropdown-item" herf="/propertease/public/myProperties">My Properties</a>
                        </div>
                    </li>
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