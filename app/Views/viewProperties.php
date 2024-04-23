<?php
if (!isset($_SESSION['user_name'])) {
}
?>
<!-- app/Views/viewProperties.php -->
<?php
require_once 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/myProperties.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 3px;
        }
    </style>
    <title>All Properties</title>
</head>


<body>
<div class="header">
    <h1 class="title">All Properties</h1>
</div>

<div class="container">
    <form action="/propertease/public/viewProperties/filter" method="GET">
        <div class="row mb-3">
            <div class="col">
                <select name="state" class="form-control">
                    <option value="">All States</option>
                    <?php foreach ($states as $state): ?>
                        <option value="<?= $state ?>" <?= isset($selectedFilters['State']) && $selectedFilters['State'] === $state ? 'selected' : '' ?>><?= $state ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <input type="text" name="zipCode" class="form-control" placeholder="Zip Code" value="<?= $selectedFilters['ZipCode'] ?? '' ?>">
            </div>
            <div class="col">
                <select name="propertyType" class="form-control">
                    <option value="">All Property Types</option>
                    <?php foreach ($propertyTypes as $type): ?>
                        <option value="<?= $type ?>" <?= isset($selectedFilters['PropertyType']) && $selectedFilters['PropertyType'] === $type ? 'selected' : '' ?>><?= $type ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <input type="number" name="bedrooms" class="form-control" placeholder="Number of Bedrooms" value="<?= $selectedFilters['NumberBedrooms'] ?? '' ?>">
            </div>
            <div class="col">
                <input type="number" name="bathrooms" class="form-control" placeholder="Number of Bathrooms" value="<?= $selectedFilters['NumberBathrooms'] ?? '' ?>">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>
    <div class="row">
        <?php
        foreach ($images as $propertyID => $data):
            $address = strlen($data['address']) > 30 ? substr($data['address'], 0, 27) . '...' : $data['address'];
            $description = strlen($data['description']) > 100 ? substr($data['description'], 0, 97) . '...' : $data['description'];
            ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="/images/<?= $propertyID ?>/<?= basename($data['images'][0]) ?>" alt="Property <?= $propertyID ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($address) ?></h5>
                        <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;"><?= htmlspecialchars($description) ?></p>
                        <a href="/propertease/public/property/<?= $propertyID ?>" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>

</html>