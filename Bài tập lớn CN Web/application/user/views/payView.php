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
            echo '
          <p>(' .
                $bill[0] .
                ')</p>
          ';
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
<!-------------------------pay--------------------------------->
<div class="pay-container">
    <div class="pay-content-left">
        <h3>VUI LÒNG NHẬP THÔNG TIN GIAO HÀNG</h3>
        <form method="post">
            <div class="pay-content-left-input">
                <label for="customername">Họ và tên:</label> <br/>
                <input id="customername" type="text" required name="customername"/>
            </div>
            <div class="pay-content-left-input">
                <label for="phone">Số điện thoại:</label><br/>
                <input id="phone" type="text" required name="phone"/>
            </div>
            <div class="pay-content-left-input">
                <label for="address">Địa chỉ:</label><br/>
                <input id="address" type="text" required name="address"/>
            </div>
            <div class="pay-content-left-input">
                <label for="email">Email:</label><br/>
                <input id="email" type="text" name="email"/>
            </div>
            <div class="pay-content-left-input">
                <label for="ghichu">Ghi chú:</label><br/>
                <input id="ghichu" type="text" name="ghichu"/>
            </div>
            <div class="pay-content-left-input">
                <label for="hinhthucthanhtoan">Hình thức thanh toán:</label><br/>
                <select id="hinhthucthanhtoan" name="hinhthucthanhtoan">
                    <option>Tiền mặt</option>
                    <option>Chuyển khoản</option>
                </select>
                <h4>Thông tin chuyển khoản:</h4>
                <p> Ngân hàng Quân đội (MB)</p>
                <p> STK: 0123456789</p>
            </div>
            <div class="pay-content-left-button">
                <button onclick="return confirm('Bạn muốn đặt hàng?')">ĐẶT HÀNG</button>
            </div>
        </form>
        <?php
        include_once '../controllers/payController.php';
        $payController = new payController();
        $customer = $payController->getCustomer();
        $list = $cartController->showList();
        if (count($list) == 0) {
            echo '<script>alert("Vui lòng thêm Products vào giỏ hàng!"); window.location.href = "listProductView.php";</script>';
        } elseif (!empty($_POST)) {
            $payController->addCustomer($customer);
            $payController->addOrderProduct($customer, $bill[1], $list);
            $payController->deleteTemporaryProduct();
        }
        ?>
    </div>
    <div class="pay-content-right">
        <table>
            <tr>
                <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
            </tr>
            <?php echo '<tr>
          <td>TỔNG Products</td>
          <td>' .
                $bill[0] .
                '</td>
        </tr>
        <tr>
          <td>THÀNH TIỀN</td>
          <td>' .
                number_format($bill[1], 0, ',', '.') .
                'đ</td>
        </tr>'; ?>
        </table>
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