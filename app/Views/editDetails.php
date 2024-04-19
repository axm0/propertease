<?php require_once __DIR__ . '/navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Property Details - PropertEase</title>
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
                        if ($index == 0) {
                            echo '<div class="carousel-item active">';
                        } else {
                            echo '<div class="carousel-item">';
                        }
                        echo '<img class="d-block w-100" src="/images/' . $property['PropertyID'] . '/' . basename($image) . '" alt="Property Image">
                        </div>';
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
            <form action="/propertease/public/property/edit/<?= $property['PropertyID'] ?>" method="POST">
                <p><strong><label for="address">Address:</label></strong>
                    <input type="text" id="address" name="address" class="form-control" value="<?= ($property['Address']) ?>"><br></p>
                <p><strong><label for="state">State:</label></strong>
                    <input type="text" id="state" name="state" class="form-control" value="<?= ($property['State']) ?>"><br></p>
                <p><strong><label for="zipcode">Zip Code:</label></strong>
                    <input type="text" id="zipcode" name="zipcode" class="form-control" value="<?= ($property['ZipCode']) ?>"><br></p>
                <p><strong><label for="propertytype">Property Type:</label></strong>
                    <input type="text" id="propertytype" name="propertytype" class="form-control" value="<?= ($property['PropertyType']) ?>"><br></p>
                <p><strong><label for="size">Size:</label></strong>
                    <input type="text" id="size" name="size" class="form-control" value="<?= ($property['Size']) ?>"><br></p>
                <p><strong><label for="bedrooms">Bedrooms:</label></strong>
                    <input type="text" id="bedrooms" name="bedrooms" class="form-control" value="<?= ($property['NumberBedrooms']) ?>"><br></p>
                <p><strong><label for="bathrooms">Bathrooms:</label></strong>
                    <input type="text" id="bathrooms" name="bathrooms" class="form-control" value="<?= ($property['NumberBathrooms']) ?>"><br></p>
                <p><strong><label for="price">Price:</label></strong>
                    <input type="text" id="price" name="price" class="form-control" value="<?= number_format($property['Price']) ?>"><br></p>
                <p><strong><label for="listingstatus">ListingStatus:</label></strong>
                    <input type="text" id="listingstatus" name="listingstatus" class="form-control" value="<?= ($property['ListingStatus']) ?>"><br></p>
                <div class="row mt-4">
                    <div class="col">
                        <h3>Description</h3>
                        <p><textarea id="description" name="description" class="form-control" rows="4" cols="45"><?= $property['Description'] ?></textarea><br></p>
                    </div>
                </div>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete</button>
                <button type="submit" class="btn btn-primary float-right">Save changes</button>
                <a href="/propertease/public/myProperties" class="btn btn-link float-right">Cancel</a>
            </form>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><strong>Confirm Deletion</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            You have selected to delete this property.
                            If this was the action that you intended, please confirm your choice, or click cancel.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger">Yes, delete it</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>