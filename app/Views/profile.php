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
        <div class="col-2 d-flex justify-content-end mx-2">
            <img style="width: 150px; height: 150px;" src="/images/profile-circle-icon.png" alt="profile picture">
        </div>
        <div class="col-3 mx-5">
            <div class="row pt-5">
                <label for="firstName" class="text"><?= $user['Name'] ?></label>
            </div>
            <div class="row">
                <a id="editProfileBtn" class="btn btn-secondary rounded-pill" style="width:6rem;" href="#">Edit Profile</a>
            </div>
        </div>
    </div>
    <div id="favorites" class="section-header py-5">
        <div class="row">
            <h2 class="pb-2 text">My Top 3 Favorites<a class="btn btn-secondary rounded-pill mx-3" href="/propertease/public/favorites">Edit</a></h2>
        </div>
        <div class="row pt-3">
        <?php
        foreach ($favorites as $index => $favorite) {
            echo '
            <div class="col-4 mx-3" style="width:300px;height:180px;">
                <div class="box">
                    <a href="/propertease/public/property/'. $favorite['PropertyID'] .'">
                        <img style="width:300px;height:180px;" src="/images/' . $favorite['PropertyID'] . '/' . basename($favorite['PropertyURL']) . '" alt="Property Image">
                        <label for="">$'. $favorite['Price'] .', '. $favorite['Description'] .'</label>
                    </a>
                </div>
            </div>';
            if ($index == 3) {
                break;
            }
        }
        ?>
        </div>
    </div>
    <div id="properties" class="section-header my-5 py-5">
        <div class="row">
            <h2 class="pb-2 text">My Top 3 Properties<a class="btn btn-secondary rounded-pill mx-3" href="/propertease/public/myProperties">Edit</a></h2>
        </div>
        <div class="row pt-3">
            <?php
            foreach ($topProperties as $index => $property) {
                echo '
            <div class="col-4 mx-3" style="width:300px;height:180px;">
                <div class="box">
                    <a href="/propertease/public/property/'. $property['PropertyID'] .'">
                        <img style="width:300px;height:180px;" src="/images/' . $property['PropertyID'] . '/' . basename($property['PropertyURL']) . '" alt="Property Image">
                        <label for="">$'. $property['Price'] .', '. $property['Description'] .'</label>
                    </a>
                </div>
            </div>';
                if ($index == 3) {
                    break;
                }
            }
            ?>
        </div>
    </div>
</div>
<!--Edit Profile Modal-->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="close closeBtn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name" class="my-1">Name</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Enter new name">
                        <label for="email" class="my-1">Email</label>
                        <input name="email" type="text" class="form-control" id="email" placeholder="Enter new email">
                        <label for="phone" class="my-1">Phone</label>
                        <input name="phone" type="text" class="form-control" id="phone" placeholder="Enter new phone">
                        <label for="user_type" class="my-1">User Type</label>
                        <select name="user_type" class="form-control" id="user_type">
                            <option value="buyer">Buyer</option>
                            <option value="seller">Seller</option>
                            <option value="agent">Agent</option>
                        </select>
                        <label for="password" class="my-1">Password<span class="text-danger">*</span></label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Enter password" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="save" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="/js/main.js"></script>
<script>
    $(document).ready(function() {
        $('#name').val('<?php echo $user['Name']; ?>');
        $('#email').val('<?php echo $user['Email']; ?>');
        $('#phone').val('<?php echo $user['Phone_no']; ?>');
        $('#user_type').val('<?php echo $user['User_type']; ?>');

        let modal = $('#editProfileModal');

        $('#editProfileBtn').on('click', function() {
            modal.modal('show');
        });

        $('.modal .closeBtn').on('click', function() {
            modal.modal('hide');
        });

        // Close the modal when clicked outside of it
        $(document).on('click', function(e) {
            if ($(e.target).is(modal)) {
                modal.modal('hide');
            }
        });

        $('.modal #save').on('click', function() {
            var formData = $("form").serialize();

            $.ajax({
                type: 'POST',
                url: '/propertease/public/profile/save',
                data: formData,
                success: function() {
                    window.location.href = 'profile';
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $('.dropdown-toggle').click(function() {
            // Toggle the dropdown menu
            $(this).next('.dropdown-menu').toggleClass('show');
        });
    });
</script>
</html>
