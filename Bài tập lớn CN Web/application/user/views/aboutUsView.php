<?php
session_start(); ?>
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
                <li><a href="homeView.php">Homepage</a></li>
                <li><a href="listProductView.php">Products</a></li>
                <li class="selected">
                    <a href="aboutUsView.php">About us</a>
                <li><a href="../../admin/views/loginView.php">Login</a></li>

                </li>
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
        <li><a href="homeView.php">Homepage</a></li>
        <li><a href="listProductView.php">Products</a></li>
        <li class="selected"><a href="aboutUsView.php">About us</a></li>
    </ul>
</div>
<!-------------------------picture about us--------------------->
<br/>
<div class="about-us-picture">
    <img src="../../../public/img/RD-RL-60-8w-1-1.jpg" alt="About Us"/>
</div>
<!-------------------------content------------------------------>
<div class="about-us-container">
    <h1>ABOUT US</h1>
    <div class="about-us-content">
        <img src="../../../public/img/about-us-1.jpg" alt="About Us 1"/>
        <div class="about-us-intro">
            <h3>Customers</h3>
            <h4>Online Consultation Support</h4>
            <p>
                Customers can receive support through live chat or hotline, helping them choose the most suitable
                product for their needs.
            </p>
        </div>
    </div>
    <div class="about-us-content">
        <div class="about-us-intro">
            <h3>Products</h3>
            <h4>Diverse Product Categories</h4>
            <p>
                The website offers a wide variety of study lamps with different designs, colors, and functionalities,
                making it easy for customers to choose.
            </p>
        </div>
        <img src="../../../public/img/about-us-2.jpg" alt="About Us 2"/>
    </div>
    <div class="about-us-content">
        <img src="../../../public/img/about-us-3.jpg" alt="About Us 3"/>
        <div class="about-us-intro">
            <h3>Shipping</h3>
            <h4>Shipping and Warranty Policies</h4>
            <p>
                Detailed information about shipping costs, delivery times, and product warranty policies are clearly
                presented to ensure customers' rights.
            </p>
        </div>
    </div>
    <div class="about-us-content-2">
        <img src="../../../public/img/about-us-1.jpg" alt="About Us 1"/>
        <div class="about-us-intro">
            <h3>Feedback</h3>
            <h4>Customer Reviews and Feedback</h4>
            <p>
                Customers can leave reviews and feedback on the products, providing valuable information for future
                buyers.
            </p>
        </div>
    </div>
    <div class="about-us-content-2">
        <img src="../../../public/img/about-us-2.jpg" alt="About Us 2"/>
        <div class="about-us-intro">
            <h3>Features</h3>
            <h4>Filtering and Search Features</h4>
            <p>
                Customers can easily search for study lamps by brand, price, or other criteria through the intelligent
                product filtering tool.
            </p>
        </div>
    </div>
    <div class="about-us-content-2">
        <img src="../../../public/img/about-us-3.jpg" alt="About Us 3"/>
        <div class="about-us-intro">
            <h3>Information</h3>
            <h4>Detailed Product Information</h4>
            <p>
                ach product is described in detail, including material, power consumption, size, and special features.
                Additionally, there are high-quality images and video introductions of the products.
            </p>
        </div>
    </div>
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
</footer>
</body>

</html>