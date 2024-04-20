<?php
require_once 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/myProperties.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Search Results</title>
</head>
<body>
<div class="container">
    <h2>Search Results for "<?= htmlspecialchars($query) ?>"</h2>
    <div class="row">
        <?php if (!empty($properties)): ?>
            <?php foreach ($properties as $propertyID => $property): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <?php
                        // Check if there are images and if the first image is not null
                        $imagePath = !empty($property['images'][0]) ? "/images/" . $propertyID . "/" . basename($property['images'][0]) : "/images/default-property.jpg";
                        ?>
                        <img src="<?= $imagePath ?>" alt="Property Image" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($property['details']['Address']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($property['details']['ZipCode']) ?></p>
                            <a href="/propertease/public/property/<?= $propertyID ?>" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No results found.</p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
