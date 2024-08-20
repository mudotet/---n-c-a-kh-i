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
                <li><a href="aboutUsView.php">About us</a></li>
                <li><a href="../../admin/views/loginView.php">Login</a></li>

            </ul>
        </div>
        <div class="icon">
            <ul>
                <li class="selected">
                    <a href="cartView.php"><img src="../../../public/img/shopping-bag.png" alt="shopping-bag"/></a>
                </li>
            </ul>
            <?php
            include_once '../controllers/cartController.php';
            $cartController = new cartController();
            $bill = $cartController->showBill();
            echo '<p>(' . $bill[0] . ')</p>';
            ?>
        </div>
    </div>
</header>
<div class="menu-2">
    <ul>
        <li><a href="homeView.php">Homepage</a></li>
        <li><a href="listProductView.php">Products</a></li>
        <li><a href="aboutUsView.php">About us</a></li>
    </ul>
</div>
<!-------------------------cart--------------------------------->
<div class="cart-container">
    <div class="cart-content-left">
        <table>
            <tr>
                <th>Product name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th></th>
            </tr>
            <?php
            $list = $cartController->showList();
            for ($i = 0; $i < count($list); $i++) {
                echo '<tr>
            <td>' .
                    $list[$i]->name .
                    '</td>
            <td>
              <div class="cart-content-left-product-price">
                <p>';
                if ($list[$i]->new_price == null) {
                    echo number_format($list[$i]->price, 0, ',', '.');
                } else {
                    echo number_format($list[$i]->new_price, 0, ',', '.');
                }
                echo 'đ / ' .
                    $list[$i]->unit .
                    ' kg</p>
              </div>
              <div class="cart-content-left-product-old-price">
                <p>';
                if ($list[$i]->new_price == null) {
                    echo '*';
                } else {
                    echo number_format($list[$i]->price, 0, ',', '.') .
                        'đ / ' .
                        $list[$i]->unit .
                        ' kg';
                }
                echo '</p>
              </div>
            </td>
            <td>
              <p>' .
                    $list[$i]->qty .
                    '</p>
            </td>
            <td>
              <p>' .
                    number_format($list[$i]->sum, 0, ',', '.') .
                    'đ</p>
            </td>
            <td>
            <a id="delete' .
                    $list[$i]->id .
                    '" href="" onclick="ask(' .
                    $list[$i]->id .
                    ')"><button>Xóa</button></a>
            </td>
            </tr>';
            }
            echo '<script>
        function ask(id) {
        if (confirm("Xóa Products này?")) {
          document.getElementById("delete" + id).setAttribute("href", "cartView.php?id=" + id);
        } else {
          document.getElementById("delete" + id).setAttribute("href", "cartView.php");
        }
        }
        </script>';
            if (isset($_GET['id']) && $_GET['id'] != null) {
                $cartController->delete($_GET['id']);
            }
            ?>
        </table>
    </div>
    <div class="cart-content-right">
        <table>
            <tr>
                <th colspan="2">Total price</th>
            </tr>
            <?php echo '<tr>
          <td>Total Products</td>
          <td>' .
                $bill[0] .
                '</td>
        </tr>
        <tr>
          <td>Total</td>
          <td>' .
                number_format($bill[1], 0, ',', '.') .
                'đ</td>
        </tr>
        <tr>
          <td>Total temporary</td>
          <td>' .
                number_format($bill[1], 0, ',', '.') .
                'đ</td>
        </tr>'; ?>
        </table>
        <div class="cart-content-right-button">
            <a href="listProductView.php">
                <button>Continue shopping</button>
            </a>
            <a href="payView.php">
                <button>Payment</button>
            </a>
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