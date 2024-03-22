<!-- app/Views/home.php -->
<?php
    require_once 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropertEase</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container">
    <div class="hero">
        <div class="search-container">
            <h1>PropertEase</h1>
        </div>
        <div class="hero">
            <div class="search-container">
                <h1>PropertEase</h1>
                <!-- Include the search bar here -->
                <input type="text" placeholder="Search.." id="searchBar">
            </div>
        </div>
    </div>
    <div class="properties">
        <!-- Property cards will be added here -->
    </div>
</div>

<script src="/js/main.js"></script>

</body>
</html>
