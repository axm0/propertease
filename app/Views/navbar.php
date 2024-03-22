
<!-- Navigation Bar -->
<div class="navigation">
    <div id="logo">
        <a href="/propertease/public/home" class="menu-item">Home/Logo</a>
    </div>
    <div class="menu">
        <a href="#" class="menu-item">Button 1</a>
        <a href="#" class="menu-item">Button 2</a>
        <a href="#" class="menu-item">Button 3</a>
        <a href="/propertease/public/about" class="menu-item">About</a>
        <a href="/propertease/public/profile" class="menu-item">Profile</a>
        <!-- Trigger/Open The Modal -->
        <a href="#" class="menu-item" onclick="document.getElementById('id01').style.display='block'">Login/Sign-Up</a>
    </div>
</div>

<!-- The Modal -->
<div id="id01" class="modal">
    <form class="modal-content animate" action="/action_page.php" method="post">
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

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
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