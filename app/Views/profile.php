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
                <label for="firstName" class="text"><?= $user['Name'] ?></label>
            </div>
            <div class="row">
                <a id="editProfileBtn" class="btn btn-secondary rounded-pill" style="width:6rem;" href="#">Edit Profile</a>
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
<!--Edit Profile Modal-->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name" class="my-1">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter new name">
                        <label for="email" class="my-1">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter new email">
                        <label for="phone" class="my-1">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter new phone">
                        <label for="user_type" class="my-1">User Type</label>
                        <select class="form-control" id="user_type">
                            <option value="buyer">Buyer</option>
                            <option value="seller">Seller</option>
                            <option value="agent">Agent</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    document.getElementById('name').value = '<?php echo $user['Name']; ?>';
    document.getElementById('email').value = '<?php echo $user['Email']; ?>';
    document.getElementById('phone').value = '<?php echo $user['Phone_no']; ?>';
    document.getElementById('user_type').value = '<?php echo $user['User_type']; ?>';

    document.getElementById('editProfileBtn').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default behavior of the link
        var modal = document.getElementById('editProfileModal');
        modal.classList.add('show');
        modal.style.display = 'block';
        modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('modal-open');
    });

    // Close the modal when the close button is clicked
    document.querySelector('.modal .close').addEventListener('click', function() {
        var modal = document.getElementById('editProfileModal');
        modal.classList.remove('show');
        modal.style.display = 'none';
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('modal-open');
    });

    // Close the modal when clicked outside of it
    window.addEventListener('click', function(e) {
        var modal = document.getElementById('editProfileModal');
        if (e.target == modal) {
            modal.classList.remove('show');
            modal.style.display = 'none';
            modal.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('modal-open');
        }
    });
</script>
</html>
