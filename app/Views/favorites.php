<?php
    require_once 'navbar.php';
    ?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/favorites.css">
    <!-- The src below is used to get the heart for the likes-->
    <script src="https://kit.fontawesome.com/03397d1206.js" crossorigin="anonymous"></script>
    <title>My Favorites</title>
</head>
<body>

<div class="header">
    <h1 class="title">My Favorites</h1>
</div>

<!-- This function is used to toggle the like button, it is used several times-->
<script>
    function toggleHeart(element){
        if(element.style.color == "grey"){
            element.style.color = "red"
        }
        else{
            element.style.color = "grey"
        }
    }
</script>

<div class="container">
    <div class="box">
        <div class="hearts">
            <Button id="btnh" class="heart"><i class="fas fa-heart"></i></Button>
            <!-- call the toggle function for the heart-->
            <script>
                document.getElementById("btnh").onclick = function(event){
                    toggleHeart(event.target)
                }
            </script>
        </div>
        <a href="page1.html"> <!-- goes to property listing -->
            <img src="https://via.placeholder.com/300x180" alt="Box 1">
            <p>Some text here</p>
        </a>
    </div>

    <div class="box">
        <div class="hearts">
            <Button id="btnh1" class="heart"><i class="fas fa-heart"></i></Button>
            <script>
                document.getElementById("btnh1").onclick = function(event){
                    toggleHeart(event.target)
                }
            </script>
        </div>
        <a href="page2.html">
            <img src="https://via.placeholder.com/300x180" alt="Box 2">
            <p>Some text here</p>
        </a>
    </div>
    <div class="box">
        <div class="hearts">
            <Button id="btnh2" class="heart"><i class="fas fa-heart"></i></Button>
            <!-- call the toggle function for the heart-->
            <script>
                document.getElementById("btnh2").onclick = function(event){
                    toggleHeart(event.target)
                }
            </script>
        </div>
        <a href="page3.html">
            <img src="https://via.placeholder.com/300x180" alt="Box 3">
            <p>Some text here</p>
        </a>
    </div>
</div>

<div class="container">
    <div class="box">
        <div class="hearts">
            <Button id="btnh3" class="heart"><i class="fas fa-heart"></i></Button>
            <!-- call the toggle function for the heart-->
            <script>
                document.getElementById("btnh3").onclick = function(event){
                    toggleHeart(event.target)
                }
            </script>
        </div>
        <a href="page4.html">
            <img src="https://via.placeholder.com/300x180" alt="Box 4">
            <p>Some text here</p>
        </a>
    </div>
    <div class="box">
        <div class="hearts">
            <Button id="btnh4" class="heart"><i class="fas fa-heart"></i></Button>
            <!-- call the toggle function for the heart-->
            <script>
                document.getElementById("btnh4").onclick = function(event){
                    toggleHeart(event.target)
                }
            </script>
        </div>
        <a href="page5.html">
            <img src="https://via.placeholder.com/300x180" alt="Box 5">
            <p>Some text here</p>
        </a>
    </div>
    <div class="box">
        <div class="hearts">
            <Button id="btnh5" class="heart"><i class="fas fa-heart"></i></Button>
            <!-- call the toggle function for the heart-->
            <script>
                document.getElementById("btnh5").onclick = function(event){
                    toggleHeart(event.target)
                }
            </script>
        </div>
        <a href="page6.html">
            <img src="https://via.placeholder.com/300x180" alt="Box 6">
            <p>Some text here</p>
        </a>
    </div>
</div>

<div class="container">
    <div class="box">
        <div class="hearts">
            <Button id="btnh6" class="heart"><i class="fas fa-heart"></i></Button>
            <!-- call the toggle function for the heart-->
            <script>
                document.getElementById("btnh6").onclick = function(event){
                    toggleHeart(event.target)
                }
            </script>
        </div>
        <a href="page7.html">
            <img src="https://via.placeholder.com/300x180" alt="Box 7">
            <p>Some text here</p>
        </a>
    </div>
    <div class="box">
        <div class="hearts">
            <Button id="btnh7" class="heart"><i class="fas fa-heart"></i></Button>
            <!-- call the toggle function for the heart-->
            <script>
                document.getElementById("btnh7").onclick = function(event){
                    toggleHeart(event.target)
                }
            </script>
        </div>
        <a href="page8.html">
            <img src="https://via.placeholder.com/300x180" alt="Box 8">
            <p>Some text here</p>
        </a>
    </div>
    <div class="box">
        <div class="hearts">
            <Button id="btnh8" class="heart"><i class="fas fa-heart"></i></Button>
            <!-- call the toggle function for the heart-->
            <script>
                document.getElementById("btnh8").onclick = function(event){
                    toggleHeart(event.target)
                }
            </script>
        </div>
        <a href="page9.html">
            <img src="https://via.placeholder.com/300x180" alt="Box 9">
            <p>Some text here</p>
        </a>
    </div>
</div>

</body>
</html>