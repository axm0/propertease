<?php require_once 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropertEase</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="profile">
    <div id="header" class="row py-4">
        <div class="col-2 d-flex justify-content-center mx-3">
            <svg class="bd-placeholder-img rounded-circle" width="150" height="150" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect class="profileCircle" width="100%" height="100%"></rect>
            </svg>
        </div>
        <div class="col-3">
            <div class="row pt-5">
                <label for="firstName" class="text">Name</label>
            </div>
            <div class="row">
                <div class="col">
                    <a href="#" class="button">Button 1</a>
                </div>
                <div class="col">
                    <a href="#" class="button">Button 2</a>
                </div>
                <div class="col">
                    <a href="#" class="button">Button 3</a>
                </div>
            </div>
        </div>
    </div>
    <div id="favorites" class="section-header pt-5">
        <h2 class="pb-2 text">Favorites</h2>
        <div class="row pt-3">
            <div class="col px-3">
                <div class="image-placeholder mb-3"></div>
                <label for="">Favorite Name,</label>
                <label for="">Description</label>
            </div>
            <div class="col px-3">
                <div class="image-placeholder mb-3"></div>
                <label for="">Favorite Name,</label>
                <label for="">Description</label>
            </div>
            <div class="col px-3">
                <div class="image-placeholder mb-3"></div>
                <label for="">Favorite Name,</label>
                <label for="">Description</label>
            </div>
        </div>
    </div>
    <div id="properties" class="section-header pt-5 mb-5">
        <h2 class="pb-2 text">Properties</h2>
        <div class="row pt-3">
            <div class="col px-3">
                <div class="image-placeholder mb-3"></div>
                <label for="">Property Name,</label>
                <label for="">Description</label>
            </div>
            <div class="col px-3">
                <div class="image-placeholder mb-3"></div>
                <label for="">Property Name,</label>
                <label for="">Description</label>
            </div>
            <div class="col px-3">
                <div class="image-placeholder mb-3"></div>
                <label for="">Property Name,</label>
                <label for="">Description</label>
            </div>
        </div>
    </div>
</div>
</body>
</html>
