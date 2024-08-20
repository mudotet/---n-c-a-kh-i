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
        <a href="../../user/views/homeView.php"><img src="../../../public/img/logo.png" alt="logo" /></a>
      </div>
      <div class="menu">
        <ul>
          <li class="selected"><a href="">PRODUCT MANAGEMENT</a></li>
          <li>
            <a href="orderView.php">ORDER MANAGEMENT</a>
          </li>
            <li><a href="../../user/views/homeView.php">Logout</a></li>
          
        </ul>
      </div>
    </div>
  </header>


  <br /><br /><br /><br /><br /><br /><br />
  <!--Admin-->
  <div class="admin add--product">
    <h2 class="admin__title">Change product</h2>
    <div class="admin__add-product">
      <?php
      include_once '../controllers/editProductController.php';
      $editProductController = new editProductController();
      if (isset($_GET['id']) && $_GET['id'] != null) {
        $product = $editProductController->getProduct($_GET['id']);
      }
      ?>
      <form method="POST">
        <div class="form-group">
          <label class="form-label">product name:</label>
          <?php
          echo '<input required name="name" class="form-control" value="' . $product->name . '">'
          ?>
        </div>
        <div class="form-group">
          <label class="form-label">thumbnail:</label>
          <input required name="image" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label class="form-label">price:</label>
          <?php
          echo '<input required name="price" class="form-control" value="' . $product->price . '">'
          ?>
        </div>
        <div class="form-group">
          <label class="form-label">sale price:</label>
          <?php
          echo '<input required name="newprice" class="form-control" value="' . $product->newprice . '">'
          ?>
        </div>
        <div class="form-group">
          <label class="form-label">day:</label>
          <?php
          echo '<input required name="date" class="form-control" type="date" value="' . $product->date . '">'
          ?>
        </div>
        <div class="form-group">
          <label class="form-label">quantity:</label>
          <?php
          echo '<input required name="amount" class="form-control" value="' . $product->amount . '">'
          ?>
        </div>
        <div class="form-group">
          <label class="form-label">unit price:</label>
          <?php
          echo '<input required name="unit" class="form-control" value="' . $product->unit . '">'
          ?>
        </div>
        <div class="btn-admin">
          <input type="submit" value="Save" class="btn-edit-page">
        </div>
      </form>
      <?php
      if (!empty($_POST)) {
        $newproduct = $editProductController->getNewProduct($_GET['id']);
        $editProductController->updateProduct($newproduct, $_GET['id']);
        $editProductController->addImage($newproduct);
      }
      ?>
    </div>
  </div>
</body>

</html>