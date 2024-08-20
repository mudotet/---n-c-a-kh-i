<?php
session_start();

if (!isset($_SESSION['value'])) {
    $_SESSION['value'] = 0;
}
?>
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
            <a href="homeView.php"><img src="../../../public/img/logo.png" alt="logo"/></a>
        </div>
        <div class="menu">
            <ul>
                <li class="selected"><a href="homeView.php">Homepage</a></li>
                <li><a href="listProductView.php">Products</a></li>
                <li><a href="aboutUsView.php">About us</a></li>
                <li><a href="../../admin/views/loginView.php">Login</a></li>

            </ul>
        </div>
        <div class="icon">
            <ul>
                <li>
                    <a href="cartView.php"><img src="../../../public/img/shopping-bag.png" alt="shopping-bag"/></a>
                </li>
            </ul>
            <?php
            include_once '../controllers/cartController.php';
            $controller = new cartController();
            $bill = $controller->showBill();
            echo '<p>(' . $bill[0] . ')</p>';
            ?>
        </div>
    </div>
</header>
<div class="menu-2">
    <ul>
        <li class="selected"><a href="homeView.php">Homepage</a></li>
        <li><a href="listProductView.php">Products</a></li>
        <li><a href="aboutUsView.php">About us</a></li>
    </ul>
</div>
<!-------------------------slider------------------------------->
<br/>
<div class="slider">
    <div class="slider-container">
        <img src="../../../public/img/hqdefault.webp" alt=""/>
        <img src="../../../public/img/banner-2.jpg" alt=""/>
        <img src="../../../public/img/huong-dan-thay-the-logo.webp" alt=""/>
    </div>
    <div class="dot-container">
        <div class="dot active"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
</div>
<!-------------------------new arrival-------------------------->

<h2 class="list-title">News products</h2>

<div class="product-container">

    <?php
    include_once '../controllers/homeController.php';
    $listProductController = new homeController();
    $list = $listProductController->getNewList();

    for ($i = 0; $i < count($list); $i++) {
        echo '<div class="product-item">
            <a href="productView.php?id=' .
            $list[$i]->id .
            '"><img src="../../../' .
            $list[$i]->image[0] .
            '" alt="Products ' .
            $list[$i]->id .
            '" /></a>
            <a href="productView.php?id=' .
            $list[$i]->id .
            '">
            <p class="name">' .
            $list[$i]->name .
            ' (' .
            $list[$i]->unit .
            'kg)</p>
            </a>
            <p class="price">';
        if ($list[$i]->newprice == null) {
            echo number_format($list[$i]->price, 0, ',', '.');
        } else {
            echo number_format($list[$i]->newprice, 0, ',', '.');
        }
        echo 'đ / ' .
            $list[$i]->unit .
            ' kg</p>
            <p class="old-price">';
        if ($list[$i]->newprice == null) {
            echo '*';
        } else {
            echo number_format($list[$i]->price, 0, ',', '.') .
                'đ / ' .
                $list[$i]->unit .
                ' kg';
        }
        echo '</p>
            </div>';
    }
    ?>
</div>

<!-------------------------best seller-------------------------->
<h2 class="list-title">Big Sale</h2>
<div class="product-container">
    <?php
    include_once '../controllers/homeController.php';
    $listProductController = new homeController();
    $list = $listProductController->getHotList();

    for ($i = 0; $i < count($list); $i++) {
        echo '<div class="product-item">
            <a href="productView.php?id=' .
            $list[$i]->id .
            '"><img src="../../../' .
            $list[$i]->image[0] .
            '" alt="Products ' .
            $list[$i]->id .
            '" /></a>
            <a href="productView.php?id=' .
            $list[$i]->id .
            '">
            <p class="name">' .
            $list[$i]->name .
            ' (' .
            $list[$i]->unit .
            'kg)</p>
            </a>
            <p class="price">';
        if ($list[$i]->newprice == null) {
            echo number_format($list[$i]->price, 0, ',', '.');
        } else {
            echo number_format($list[$i]->newprice, 0, ',', '.');
        }
        echo 'đ / ' .
            $list[$i]->unit .
            ' kg</p>
            <p class="old-price">';
        if ($list[$i]->newprice == null) {
            echo '*';
        } else {
            echo number_format($list[$i]->price, 0, ',', '.') .
                'đ / ' .
                $list[$i]->unit .
                ' kg';
        }
        echo '</p>
            </div>';
    }
    ?>
</div>
<!-------------------------tip---------------------------------->
<div class="tip">
    <h2>Why choose our website?</h2>
    <br/>
    <p>
        "A website that sells study lamps is an online platform dedicated to offering a variety of desk lamps to
        consumers. These products usually come in different designs, styles, and functionalities to meet the needs of
        studying, working from home, or office use.
        <br>
        On the website, users can find various types of lamps, such as LED lamps that help prevent eye strain, modern
        desk lamps, and lamps with adjustable brightness, among other features that promote eye protection and energy
        efficiency. Additionally, the website provides detailed product information, including descriptions, prices,
        images, and customer reviews, making it easier for buyers to compare and select the right product for their
        needs.
        <br>
        Some study lamp websites also offer customer support services such as purchase advice, return policies, and home
        delivery, providing a convenient and efficient shopping experience."
    </p>
</div>
<!-------------------------footer------------------------------->
<footer>
    <p class="info">
        Address: No. 50 Thai Thinh, Dong Da, Hanoi<br/>
        Phone: 0123456789i <br/>
        Email: lights6789@gmail.com
    </p>

    <div class="contact">
        <a href="https://www.facebook.com/"><img src="../../../public/img/facebook.png" alt="facebook"/></a>
        <a href="https://www.instagram.com/"><img src="../../../public/img/instagram.png" alt="instagram"/></a>
        <a href="https://www.youtube.com/"><img src="../../../public/img/youtube.png" alt="youtube"/></a>
    </div>
    <p class="info">
        <a href="../../admin/views/loginView.php">Login với tư cách admin</a>
    </p>

</footer>
<script src="../../../public/js/homeScript.js"></script>
</body>

</html>