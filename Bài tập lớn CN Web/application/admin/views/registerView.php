<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../../public/css/login.css">
    <title>Register</title>
</head>

<body style="background: url('../../../public/img/lepower-tec-desk-lamps-category-page-banner.webp'); background-size: cover;background-position-y:-60px ;">
<?php
include_once '../controllers/RegisterController.php';
$registerController = new RegisterController();
$registerController->register();
?>
<div id="wrapper">
    <form id="form-login" method="post">
        <h1 class="form-heading">Register</h1>
        <div class="form-group">
            <input type="text" class="form-input" placeholder="Username" id="username" name="username" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-input" placeholder="Password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-input" placeholder="Confirm Password" id="passwordConfirm"
                   name="passwordConfirm" required>
        </div
                <!--        <button type="submit" class="btn btn-primary"-->
                <!--                style="margin-top: 20px; padding: 20px 40px; background-color: #007BFF; color: #ffffff">Register-->
                <!--        </button>-->
        <input type="submit" value="Login" class="form-submit">
        <br>
        <!--        <a href="../../admin/views/loginView.php" style="color: #ffffff; margin-top: 20px">Login</a>-->
    </form>
</div>

</body>

</html>