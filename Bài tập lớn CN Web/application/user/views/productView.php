<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../../public/css/style.css" />
  <title>Lights</title>
</head>

<body>
  <!-------------------------header------------------------------->
  <header>
    <div class="header-container">
      <div class="logo">
        <a href="homeView.php"><img src="../../../public/img/logo.png" alt="logo" /></a>
      </div>
      <div class="menu">
        <ul>
          <li><a href="homeView.php">Homepage</a></li>
          <li class="selected">
            <a href="listProductView.php">Products</a>
          </li>
          <li><a href="aboutUsView.php">About us</a></li>
                    <li><a href="../../admin/views/loginView.php">Login</a></li>
          
        </ul>
      </div>
      <div class="icon">
        <ul>
          <li>
            <a href="cartView.php"><img src="../../../public/img/shopping-bag.png" alt="shopping-bag" /></a>
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
      <li class="selected"><a href="listProductView.php">Products</a></li>
      <li><a href="aboutUsView.php">About us</a></li>
    </ul>
  </div>
  <!-------------------------product content---------------------->
  <div class="product-content">
    <?php
    $pid = $_GET['id'];
    include_once '../controllers/productController.php';
    $productController = new productController();
    $product = $productController->getDetailProduct($pid);

    echo '    <div class="product-content-left">
      <div class="product-content-left-big-img">
        <img src="../../../' .
      $product->image[0] .
      '" alt="" />
      </div>';
    if (count($product->image) > 1) {
      echo '<div class="product-content-left-small-img">';
      for ($i = 0; $i < count($product->image); $i++) {
        echo '<img src="../../../' . $product->image[$i] . '" alt="" /> ';
      }
      echo '</div>';
    }
    echo '</div>
    <div class="product-content-right">
      <div class="product-content-right-product-name">
        <h2>' .
      $product->name .
      '</h2>
      </div>
      <div class="product-content-right-product-price">
        <p>';
    if ($product->newprice == null) {
      echo number_format($product->price, 0, ',', '.');
    } else {
      echo number_format($product->newprice, 0, ',', '.');
    }
    echo 'đ / ' .
      $product->unit .
      ' kg</p>
      </div>
      <div class="product-content-right-product-old-price">
        <p>';
    if ($product->newprice == null) {
      echo '*';
    } else {
      echo number_format($product->price, 0, ',', '.') .
        'đ / ' .
        $product->unit .
        ' kg';
    }
    echo '</p>
      </div>
      <div class="product-content-right-product-status">
        <p>Tình trạng: Còn ' .
      $product->amount .
      ' Products</p>
      </div>
      <form method="post">
      <div class="product-content-right-quantity">
        <label for="qty">Số lượng:</label>
        <input id="qty" type="number" min="1" value="1" name="qty"/>
      </div>
      <div class="product-content-right-button">
        <button>Thêm vào giỏ hàng</button>
      </div>
      </form>
    </div>';
    if (!empty($_POST)) {
      $tmpProduct = $productController->getTmpProduct($product);
      $productController->addTmpProduct($tmpProduct);
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
      Address: No. 50 Thai Thinh, Dong Da, Hanoi<br />
      Phone: 0123456789i <br />
      Email: lights6789@gmail.com
    </p>

    <div class="contact">
      <a href="https://www.facebook.com/"><img src="../../../public/img/facebook.png" alt="facebook" /></a>
      <a href="https://www.instagram.com/"><img src="../../../public/img/instagram.png" alt="instagram" /></a>
      <a href="https://www.youtube.com/"><img src="../../../public/img/youtube.png" alt="youtube" /></a>
    </div>
  </footer>
  <script src="../../../public/js/productScript.js"></script>
</body>

</html>