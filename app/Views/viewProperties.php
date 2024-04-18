<?php
if (!isset($_SESSION['user_name'])) {
    // Optionally redirect to login or do other handling
    // header('Location: /login.php');
    // exit();
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>All Properties</title>
</head>

<body>
<div class="header">
    <h1 class="title">All Properties</h1>
</div>

<div class="container">
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
