<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../../../public/css/style.css" />
  <link rel="stylesheet" href="../../../public/css/admin-style.css" />
  <title>Order</title>
</head>

<body>
  <header>
    <div class="header-container">
      <div class="logo">
        <a href="../../user/views/homeView.php"><img src="../../../public/img/logo.png" alt="logo" /></a>
      </div>
      <div class="menu">
        <ul>
          <li><a href="listProductView.php">PRODUCT MANAGEMENT</a></li>
          <li class="selected">
            <a href="orderView.php">ORDER MANAGEMENT</a>
          </li>
            <li><a href="../../user/views/homeView.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </header>

  <div class="container" style="padding-top: 200px">
    <h1 class="h1">Customer info</h1>
    <br>
    <table border="1" width="80%">
      <thead>
        <tr>
          <th width="50px">#</th>
          <th>Ordercode</th>
          <th>Customer name</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Note</th>
          <th>Total price</th>
          <th>Payment method</th>
          <th>Day</th>
          <th>status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        include_once '../controllers/orderController.php';
        $orderController = new orderController();
        $list = $orderController->getOrderList('Toàn bộ');
        for ($i = 0; $i < count($list); $i++) {
          if ($list[$i]->order_id == $_GET['id']) {
            echo '
          <tr>
            <td width="50px">' . $list[$i]->stt . '</td>
            <td>' . $list[$i]->order_id . '</td>
            <td>' . $list[$i]->customer_name . '</td>
            <td>' . $list[$i]->address . '</td>
            <td>' . $list[$i]->phone . '</td>
            <td>' . $list[$i]->email . '</td>
            <td>' . $list[$i]->note . '</td>
            <td>
              ' . number_format($list[$i]->total_price, 0, ',', '.') . 'đ
            </td>
            <td>' . $list[$i]->payment . '</td>
            <td>' . $list[$i]->date . '</td>
            <td>' . $list[$i]->status . '</td>
            <td>
              <form method="post">
                <input name="status" type="text" />
                <button>Update</button>
              </form>
            </td>
          </tr>
          ';
          }
        }
        include_once '../controllers/orderDetailController.php';
        $orderDetailController = new orderDetailController();
        if (!empty($_POST) && !isset($_GET['update'])) {
          $list =
            $orderDetailController->getDetailProduct($_GET['id']);
          $orderDetailController->updateStatus($list, $_GET['id']);
        } ?>
      </tbody>
    </table>
    <br><br>
    <h1 class="h1"> Thông tin đơn hàng</h1>
    <br>
    <table border="1" width="80%">
      <thead align="right">
        <tr>
          <th width="50px">STT</th>
          <th>Tên Products</th>
          <th>Giá</th>
          <th>Giá khuyến mãi</th>
          <th>Số lượng</th>
          <th>Thành tiền</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $list = $orderDetailController->getDetailProduct($_GET['id']);
        $stt = 0;
        for ($i = 0; $i < count($list); $i++) {
          $stt++;
          echo '
          <tr>
            <td width="50px">' . $stt . '</td>
            <td>' . $list[$i]->name . '</td>
            <td>' . number_format($list[$i]->price, 0, ',', '.') . 'đ</td>
            <td>
              ';
          if ($list[$i]->new_price != null) {
            echo number_format(
              $list[$i]->new_price,
              0,
              ',',
              '.'
            ) . 'đ';
          }
          echo '
            </td>
            <td>' . $list[$i]->qty . '</td>
            <td>' . number_format($list[$i]->sum, 0, ',', '.') . 'đ</td>
          </tr>
          ';
        } ?>
      </tbody>
    </table>
  </div>
</body>

</html>