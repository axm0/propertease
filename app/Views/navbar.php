<!-- app/Views/navbar.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropertEase</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="navigation">
    <div id="logo">
        <a href="/propertease/public/home" class="menu-item">Home/Logo</a>
    </div>
    <div class="menu">
        <a href="/propertease/public/viewProperties" class="menu-item">View Properties</a>
        <a href="/propertease/public/myProperties" class="menu-item">My Properties</a>
        <a href="#" class="menu-item">Button 3</a>
        <a href="/propertease/public/about" class="menu-item">About</a>
        <a href="/propertease/public/profile" class="menu-item">Profile</a>
        <a href="#" class="menu-item" onclick="document.getElementById('id01').style.display='block'">Login/Sign-Up</a>
    </div>
</div>

<div id="id01" class="login-modal">
    <!-- Modal content -->
    <form class="login-modal-content animate" action="/action_page.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="img_avatar2.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            <button type="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>
    </form>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>
