<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../../public/css/login.css">
    <title>Login</title>
</head>

<body style="background: url('../../../public/img/lepower-tec-desk-lamps-category-page-banner.webp'); background-size: cover;background-position-y:-60px ;">
    <?php
    include_once '../controllers/loginController.php';
    $loginController = new loginController();
    $loginController->login();
    ?>
    <div id="wrapper">
        <form id="form-login" method="post">
            <h1 class="form-heading">Login</h1>
            <div class="form-group">
                <input type="text" class="form-input" placeholder="Username" id="email" name="use_name">
            </div>
            <div class="form-group">
                <input type="password" class="form-input" placeholder="Password" id="pwd" name="use_pass">
            </div>
            <input type="submit" value="Login" class="form-submit">

            <a href="../../admin/views/registerView.php" style="color: #ffffff; margin-top: 20px">Register</a>
        </form>
    </div>

</body>

</html>