<?php
if (!isset($_SESSION['user_name'])) {
    // Optionally redirect to login or do other handling
    // header('Location: /login.php');
    // exit();
}
?>
<?php require_once __DIR__ . '/navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/03397d1206.js" crossorigin="anonymous"></script>
    <title>Property Details - PropertEase</title>
</head>
<body style="padding-top: 56px;">
<?php
    if($favorite) {
        $color = "red";
    }
    else
        $color = "grey";
    ?>
<div class="container my-5">
    <h1><?= $property['Address'] ?>
        <button id="btnh" class="heart" style="color:<?= $color ?>; font-size:35px">
            <script>
                document.getElementById("btnh").addEventListener("click", function()
                    <?php if(isset($_SESSION['user_name'])){ ?>{
                    if(this.style.color === "grey"){
                        this.style.color = "red"
                        var data = {"action":"insert"};
                    }
                    else {
                        this.style.color = "grey"
                        data = {"action":"delete"};
                    }
                    $.ajax({
                        type:'POST',
                        url:"/propertease/public/property/favorite/<?= $property['PropertyID'] ?>",
                        data:data,
                    });
                }<?php }
                    else { ?>{
                    window.location = '/propertease/public/login';
                }
                <?php } ?>)
            </script>
            <i class="fas fa-heart"></i>
        </button>
    </h1>
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
            <p><strong>Address:</strong> <?= $property['Address'] ?>, <?= $property['County'] ?>, <?= $property['State'] ?>, <?= $property['ZipCode'] ?></p>
            <p><strong>Property Type:</strong> <?= $property['PropertyType'] ?></p>
            <p><strong>Size:</strong> <?= $property['Size'] ?> sq.ft.</p>
            <p><strong>Bedrooms:</strong> <?= $property['NumberBedrooms'] ?></p>
            <p><strong>Bathrooms:</strong> <?= $property['NumberBathrooms'] ?></p>
            <p><strong>Price:</strong> $<?= number_format($property['Price']) ?></p>
            <p><strong>Amenities:</strong> <?= $property['Features'] ?></p>
            <p><strong>Year Built:</strong> <?= $property['YearBuilt'] ?></p>
            <p><strong>Condition:</strong> <?= $property['Condition'] ?></p>
            <p><strong>Listing Status:</strong> <?= $property['ListingStatus'] ?></p>
            <p><strong>Listing Date:</strong> <?= $property['ListingDate'] ?></p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <h3>Description</h3>
            <p><?= $property['Description'] ?></p>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>