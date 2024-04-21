<?php require_once __DIR__ . '/navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Create Property - PropertEase</title>
</head>
<body style="padding-top: 56px;">
<div class="container my-5">
    <h1>Create a New Property</h1>
    <div class="row">
        <div class="col-md-8">
            <!-- Property Images Carousel -->
            <div id="propertyImagesCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    if (empty($images)) {
                        // Placeholder image URL
                        $placeholderImageURL = 'https://via.placeholder.com/300x180';
                        // Display placeholder image
                        echo '<div class="carousel-item active">';
                        echo '<img class="d-block w-100" src="' . $placeholderImageURL . '" alt="Placeholder Image">';
                        echo '</div>';
                    } else {
                        foreach ($images as $index => $image) {
                            if ($index == 0) {
                                echo '<div class="carousel-item active">';
                            } else {
                                echo '<div class="carousel-item">';
                            }
                            echo '<img class="d-block w-100" src="/images/' . $property['PropertyID'] . '/' . basename($image) . '" alt="Property Image">';
                            echo '</div>';
                        }
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
            <form action="/propertease/public/createProperty" method="POST" enctype="multipart/form-data">
                <p><strong><label for="address">Address:</label></strong>
                    <input type="text" id="address" name="address" class="form-control" required><br></p>
                <p><strong><label for="state">State:</label></strong>
                    <input type="text" id="state" name="state" class="form-control" required"><br></p>
                <p><strong><label for="zipcode">Zip Code:</label></strong>
                    <input type="text" id="zipcode" name="zipcode" class="form-control" required"><br></p>
                <p><strong><label for="propertytype">Property Type:</label></strong>
                    <input type="text" id="propertytype" name="propertytype" class="form-control" required><br></p>
                <p><strong><label for="size">Size:</label></strong>
                    <input type="text" id="size" name="size" class="form-control" required><br></p>
                <p><strong><label for="bedrooms">Bedrooms:</label></strong>
                    <input type="text" id="bedrooms" name="bedrooms" class="form-control" required><br></p>
                <p><strong><label for="bathrooms">Bathrooms:</label></strong>
                    <input type="text" id="bathrooms" name="bathrooms" class="form-control" required><br></p>
                <p><strong><label for="price">Price:</label></strong>
                    <input type="text" id="price" name="price" class="form-control" required><br></p>
                <p><strong><label for="listingstatus">Listing Status:</label></strong>
                    <input type="text" id="listingstatus" name="listingstatus" class="form-control" required><br></p>
                <div class="form-group">
                    <label for="images">Property Images:</label>
                    <input type="file" id="images" name="images[]" multiple>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <h3>Description</h3>
                        <p><textarea id="description" name="description" class="form-control" rows="4" cols="45"></textarea><br></p>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Create</button>
                <a href="/propertease/public/myProperties" class="btn btn-link float-right">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>