<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/myProperties.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/03397d1206.js" crossorigin="anonymous"></script>
    <title>My Favorites</title>
</head>

<body>
<?php require_once 'navbar.php'; ?>

<div class="header">
    <h1 class="title">My Favorites</h1>
</div>

<div class="container">
    <div class="row">
        <?php
        foreach ($images as $propertyID => $data):
            $address = strlen($data['address']) > 30 ? substr($data['address'], 0, 27) . '...' : $data['address'];
            $description = strlen($data['description']) > 100 ? substr($data['description'], 0, 97) . '...' : $data['description'];
            ?>
            <div class="col-md-4 mb-4" id="property-<?= $propertyID ?>">
                <div class="card h-100">
                    <img src="/images/<?= $propertyID ?>/<?= basename($data['images'][0]) ?>" alt="Property <?= $propertyID ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($address) ?>
                            <button id="btn<?= $propertyID ?>" class="heart" style="color:red; font-size:20px; position: relative" onclick="toggleFavorite(<?= $propertyID ?>, this)">
                                <i class="fas fa-heart"></i>
                            </button>
                        </h5>
                        <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;"><?= htmlspecialchars($description) ?></p>
                        <a href="/propertease/public/property/<?= $propertyID ?>" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function toggleFavorite(propertyID, button) {
        var action = button.style.color === "grey" ? "insert" : "delete";
        var data = {"action": action};

        $.ajax({
            type: 'POST',
            url: "/propertease/public/favorites/favorite/" + propertyID,
            data: data,
            success: function(response) {
                if (action === "delete") {
                    var property = document.getElementById('property-' + propertyID);
                    property.parentNode.removeChild(property);
                } else {
                    button.style.color = "grey";
                }
            },
            error: function() {
                alert("Error updating favorite status.");
            }
        });
    }

    function removeFavorite(propertyID) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/propertease/public/favorites/delete/' + propertyID, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    var property = document.getElementById('property-' + propertyID);
                    property.parentNode.removeChild(property);
                }
            }
        };
        xhr.send();
    }
</script>
</body>

</html>