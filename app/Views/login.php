<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup - PropertEase</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="text-center">
<!-- Centering wrapper start -->
<div class="d-flex justify-content-center align-items-center vh-100">
    <form id="signin-form" class="form-signin" method="post">
        <span class="h1 mb-3 font-weight-normal">PropertEase</span>
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <div class="mt-3">
            <button id="signin-toggle-btn" class="btn btn-sm btn-outline-primary">Sign up instead</button>
            <button id="forgot-password-btn" class="btn btn-sm btn-outline-secondary">Forgot Password</button>
        </div>
        <a href="/" class="text-primary mt-5">Back to Home</a>
    </form>

    <form id="signup-form" class="form-signin" style="display: none;">
        <span class="h1 mb-3 font-weight-normal">PropertEase</span>
        <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
        <label for="inputName" class="sr-only">Name</label>
        <input name="name" type="text" id="inputName" class="form-control" placeholder="Name" required autofocus>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
                <input name="didAgree" type="checkbox" value="agree" required> I agree to the terms and conditions
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
        <div class="mt-3">
            <button id="signup-toggle-btn" class="btn btn-sm btn-outline-primary">Sign in instead</button>
        </div>
        <a href="/" class="text-primary mt-5">Back to Home</a>
    </form>

    <form id="forgot-password-form" class="form-signin" style="display: none;">
        <span class="h1 mb-3 font-weight-normal">PropertEase</span>
        <h1 class="h3 mb-3 font-weight-normal">Forgot Password</h1>
        <div id="forgot-password-step1">
            <label for="forgotEmail" class="sr-only">Email address</label>
            <input type="email" id="forgotEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="securityCode" class="sr-only">Security Code</label>
            <input type="text" id="securityCode" class="form-control" placeholder="Security Code" required>
            <button id="verify-code-btn" class="btn btn-lg btn-primary btn-block mt-3" type="button">Verify</button>
        </div>
        <div id="forgot-password-step2" style="display: none;">
            <label for="newPassword" class="sr-only">New Password</label>
            <input type="password" id="newPassword" class="form-control" placeholder="New Password" required>
            <label for="confirmPassword" class="sr-only">Confirm New Password</label>
            <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm New Password" required>
            <button id="reset-password-btn" class="btn btn-lg btn-primary btn-block mt-3" type="button">Reset Password</button>
        </div>
        <div class="mt-3">
            <button id="back-to-signin-btn" class="btn btn-sm btn-outline-secondary">Back to Sign In</button>
        </div>
    </form>
</div>
<!-- Centering wrapper end -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('#signin-toggle-btn').click(function(){
            $('#signin-form').hide();
            $('#signup-form').show();
        });
        $('#signup-toggle-btn').click(function(){
            $('#signup-form').hide();
            $('#signin-form').show();
        });
        $('#forgot-password-btn').click(function(){
            $('#signin-form').hide();
            $('#forgot-password-form').show();
            // Show the first step of the forgot password form
            $('#forgot-password-step1').show();
            $('#forgot-password-step2').hide();
        });
        $('#verify-code-btn').click(function(){
            $('#forgot-password-step1').hide();
            $('#forgot-password-step2').show();
        });
        $('#reset-password-btn').click(function(){
            $('#forgot-password-form').hide();
            $('#signin-form').show();
        });
        $('#back-to-signin-btn').click(function(){
            $('#forgot-password-form').hide();
            $('#signin-form').show();
        });

        $('#forgot-password-form').submit(function(event) {
            var email = $('#forgotEmail').val();
            var code = $('#securityCode').val();

            if (email.trim() === "" || code.trim() === "") {
                alert("Please fill out all fields.");
                event.preventDefault();
            }
        });

        $('#signin-form').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '/propertease/public/login/login',
                data: formData,
            }).done(function() {
                window.location.href = 'home';
            });
        });

        $('#signup-form').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '/propertease/public/signup',
                data: formData,
            }).done(function() {
                window.location.href = 'home';
            });
        });

    });
</script>
</body>
</html>
