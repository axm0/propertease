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
<?php require_once 'navbar.php'; ?>

<div class="container-fluid">
    <div class="hero d-flex justify-content-center align-items-center">
        <div class="search-container text-center">
            <h1 class="mb-4 py-4">PropertEase</h1>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." id="searchBar" aria-label="Search" aria-describedby="search-addon">
                <button class="btn btn-primary" type="button" id="search-addon">Search</button>
            </div>
        </div>
    </div>

    <!-- Dynamic Carousel with Cards -->
    <div id="dynamicCardsCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#dynamicCardsCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#dynamicCardsCarousel" data-bs-slide-to="1"></button>
            <!-- Add more indicators if needed -->
        </div>

        <!-- Carousel Inner -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <!-- Sample Card 1 -->
                    <div class="col">
                        <div class="card">
                            <img src="https://via.placeholder.com/800x400?text=First+Card" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card Title One</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <!-- Sample Card 2 -->
                    <div class="col">
                        <div class="card">
                            <img src="https://via.placeholder.com/800x400?text=Second+Card" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card Title Two</h5>
                                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <!-- Sample Card 3 -->
                    <div class="col">
                        <div class="card">
                            <img src="https://via.placeholder.com/800x400?text=Third+Card" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card Title Three</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <!-- Sample Card 4 -->
                    <div class="col">
                        <div class="card">
                            <img src="https://via.placeholder.com/800x400?text=Fourth+Card" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card Title Four</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional slides with cards -->
        </div>

            <!-- Carousel Controls -->
        <a class="carousel-control-prev" href="#dynamicCardsCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#dynamicCardsCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    <!-- End of Dynamic Carousel with Cards -->

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/main.js"></script>
</body>
</html>
