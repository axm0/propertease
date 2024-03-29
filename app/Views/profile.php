<?php require_once 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropertEase</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/profile.css">
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
        <div class="row">
            <h2 class="pb-2 text">Top 3 Favorites <a class="btn btn-secondary rounded-pill mx-3" href="/propertease/public/favorites">Edit</a></h2>
        </div>
        <div class="row pt-3">
            <div class="col px-3">
                <div class="box">
                    <a href="#">
                        <img src="https://via.placeholder.com/300x180" alt="Box 1">
                        <label for="">Property Name,</label>
                        <label for="">Description</label>
                    </a>
                </div>
            </div>
            <div class="col px-3">
                <div class="box">
                    <a href="#">
                        <img src="https://via.placeholder.com/300x180" alt="Box 2">
                        <label for="">Property Name,</label>
                        <label for="">Description</label>
                    </a>
                </div>
            </div>
            <div class="col px-3">
                <div class="box">
                    <a href="#">
                        <img src="https://via.placeholder.com/300x180" alt="Box 3">
                        <label for="">Property Name,</label>
                        <label for="">Description</label>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="properties" class="section-header pt-5 mb-5">
        <div class="row">
            <h2 class="pb-2 text">Top 3 Properties <a class="btn btn-secondary rounded-pill mx-3" href="/propertease/public/myProperties">Edit</a></h2>
        </div>
        <div class="row pt-3">
            <div class="col px-3">
                <div class="box">
                    <a href="#">
                        <img src="https://via.placeholder.com/300x180" alt="Box 1">
                        <label for="">Property Name,</label>
                        <label for="">Description</label>
                    </a>
                </div>
            </div>
            <div class="col px-3">
                <div class="box">
                    <a href="#">
                        <img src="https://via.placeholder.com/300x180" alt="Box 2">
                        <label for="">Property Name,</label>
                        <label for="">Description</label>
                    </a>
                </div>
            </div>
            <div class="col px-3">
                <div class="box">
                    <a href="#">
                        <img src="https://via.placeholder.com/300x180" alt="Box 3">
                        <label for="">Property Name,</label>
                        <label for="">Description</label>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
