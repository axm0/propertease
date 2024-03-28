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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container-fluid">
    <div class="hero d-flex justify-content-center align-items-center">
        <div class="search-container text-center">
            <h1 class="mb-4">PropertEase</h1>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." id="searchBar" aria-label="Search" aria-describedby="search-addon">
                <button class="btn btn-primary" type="button" id="search-addon">Search</button>
            </div>
        </div>
    </div>
    <div class="properties row row-cols-1 row-cols-md-3 g-4 mt-4">
        <!-- Carousel Container -->
        <div id="trendingHomesCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#trendingHomesCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#trendingHomesCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <!-- Add more buttons for additional slides as needed -->
            </div>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="carousel-item-container">
                        <div>
                            <img src="https://via.placeholder.com/800x400?text=First+Slide" class="d-block w-100" alt="First Slide">
                        </div>
                        <div>
                            <img src="https://via.placeholder.com/800x400?text=Second+Slide" class="d-block w-100" alt="Second Slide">
                        </div>
                        <!-- Add more div elements for additional items -->
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-item-container">
                        <div>
                            <img src="https://via.placeholder.com/800x400?text=Third+Slide" class="d-block w-100" alt="Third Slide">
                        </div>
                        <div>
                            <img src="https://via.placeholder.com/800x400?text=Fourth+Slide" class="d-block w-100" alt="Fourth Slide">
                        </div>
                        <!-- Add more div elements for additional items -->
                    </div>
                </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#trendingHomesCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#trendingHomesCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <!-- Additional sections -->
    </div>
</div>

<!-- Include Bootstrap JavaScript at the bottom, just before the closing body tag -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/main.js"></script>

</body>
</html>