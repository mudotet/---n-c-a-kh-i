<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../../../public/css/style.css"/>
    <title>Lights</title>
</head>

<body>
<!-------------------------header------------------------------->
<header>
    <div class="header-container">
        <div class="logo">
            <a href="../../user/views/homeView.php"><img src="../../../public/img/logo.png" alt="logo"/></a>
        </div>
        <div class="menu">
            <ul>
                <li class="selected"><a href="listProductView.php">PRODUCT MANAGEMENT</a></li>
                <li>
                    <a href="orderView.php">ORDER MANAGEMENT</a>
                </li>
                <li><a href="../../user/views/homeView.php">Logout</a></li>

            </ul>
        </div>
    </div>
</header>


<br/><br/><br/><br/><br/><br/><br/>
<!--Admin-->
<div class="admin add--product">
    <h2 class="admin__title">Add product</h2>
    <div class="admin__add-product">
        <form method="POST">
            <div class="form-group">
                <label class="form-label">product name:</label>
                <input required name="name" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-label">thumbnail:</label>
                <input required name="image" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-label">price:</label>
                <input type="number" required name="price" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-label">sale price:</label>
                <input type="number" name="newprice" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-label">day:</label>
                <input required name="date" class="form-control" type="date">
            </div>
            <div class="form-group">
                <label class="form-label">quantity:</label>
                <input type="number" required name="amount" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-label">unit:</label>
                <input required name="unit" class="form-control">
            </div>
            <div class="btn-admin">
                <input type="submit" value="Create now" class="btn-add-input">
            </div>
        </form>
        <?php
        include_once '../controllers/addProductController.php';
        $addProductController = new addProductController();
        $product = $addProductController->getProduct();
        if (!empty($_POST)) {
            $addProductController->addProduct($product);
            $addProductController->addImage($product);
            echo '<script>alert("Create product successfully!")</script>';
            echo '<script>window.location.href = "listProductView.php";</script>';
        }
        ?>
    </div>
</div>

</body>

</html>