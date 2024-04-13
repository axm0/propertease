<?php require_once __DIR__ . '/navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details - PropertEase</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body style="padding-top: 56px;">
<div class="container my-5">
    <h1><?= $property['Address'] ?></h1>
    <div class="row">
        <div class="col-md-8">
            <!-- Property Images Carousel -->
            <div id="propertyImagesCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    foreach ($images as $index => $image) {
                        $active = $index === 0 ? 'active' : '';
                        echo '<div class="carousel-item ' . $active . '">';
                        echo '<img src="/images/' . $property['PropertyID'] . '/' . basename($image) . '" alt="Property Image" class="d-block w-100">';
                        echo '</div>';
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#propertyImagesCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#propertyImagesCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Property Details -->
            <h3>Property Details</h3>
            <p><strong>Address:</strong> <?= $property['Address'] ?></p>
            <p><strong>State:</strong> <?= $property['State'] ?></p>
            <p><strong>Zip Code:</strong> <?= $property['ZipCode'] ?></p>
            <p><strong>Property Type:</strong> <?= $property['PropertyType'] ?></p>
            <p><strong>Size:</strong> <?= $property['Size'] ?> sq.ft.</p>
            <p><strong>Bedrooms:</strong> <?= $property['NumberBedrooms'] ?></p>
            <p><strong>Bathrooms:</strong> <?= $property['NumberBathrooms'] ?></p>
            <p><strong>Price:</strong> $<?= number_format($property['Price']) ?></p>
            <p><strong>Listing Status:</strong> <?= $property['ListingStatus'] ?></p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <h3>Description</h3>
            <p><?= $property['Description'] ?></p>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>