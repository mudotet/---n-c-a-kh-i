<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../../public/css/style.css" />
  <link rel="stylesheet" href="../../../public/css/admin-style.css" />
  <title>Hóa đơn</title>
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

  <div class="form-group">
    <form method="post" style="padding-left: 10%;">
      <select class="form-control" name="status">
        <option>Toàn bộ</option>
        <option>Đang xử lý</option>
        <option>Đang giao hàng</option>
        <option>Hoàn thành</option>
      </select>
      <a href=""><button style="margin-left: 20px;">Search</button></a>
    </form>

  </div>
  <div class="container" style="padding-top: 20px;">

    <table border="1" width="80%">
      <thead>
        <tr>
          <th width="50px">ST#T</th>
          <th>Ordercode</th>
          <th>Customer name</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Note</th>
          <th>Total price</th>
          <th>payment method</th>
          <th>Day</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include_once '../controllers/orderController.php';
        
        if (isset($_GET['status']) && $_GET['status'] != null) {
          $orderController = new orderController();
          $list = $orderController->getOrderList($_GET['status']);
        } else {
          $orderController = new orderController();
          $list = $orderController->getOrderList('Toàn bộ');
        }
        for ($i = 0; $i < count($list); $i++) {
          echo '<tr>
        <td width="50px">' .
            $list[$i]->stt .
            '</td>
        <td>' .
            $list[$i]->order_id .
            '</td>
        <td>' .
            $list[$i]->customer_name .
            '</td>
        <td>' .
            $list[$i]->address .
            '</td>
        <td>' .
            $list[$i]->phone .
            '</td>
        <td>' .
            $list[$i]->email .
            '</td>
        <td>' .
            $list[$i]->note .
            '</td>
        <td>' .
            $list[$i]->total_price .
            '</td>
        <td>' .
            $list[$i]->payment .
            '</td>
        <td>' .
            $list[$i]->date .
            '</td>
        <td>' .
            $list[$i]->status .
            '</td>
                <td><a href="orderDetailView.php?id=' .
            $list[$i]->order_id .
            '">Xem chi tiết</a></td>
        </tr>';
        }

        if (!empty($_POST)) {
          echo '<script>window.location.href = "orderView.php?status='.$_POST['status'].'";</script>';
        }
        ?>
      </tbody>
    </table>

  </div>
</body>

</html>