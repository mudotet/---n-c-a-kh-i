<?php
require_once('../../../library/dbhelper.php');

class loginController
{
    public function __construct()
    {
    }

    public function login()
    {
        if (!empty($_POST)) {
            $use_name = $_POST['use_name'];
            $use_pass = $_POST['use_pass'];
            //tao ket noi db
            $connect = new mysqli("localhost", "root", "", "quanlicuahang");
            mysqli_set_charset($connect, "utf8"); //unicode
            if ($connect->connect_error) {  //ktra ket noi co thanh cong khong
                var_dump($connect->connect_error);
                die();
            }
            $password = md5($use_pass);
            $query = "select * from taikhoan where username = '" . $use_name . "' and pass = '" . $use_pass . "'";
            $result = mysqli_query($connect, $query);
            $data = array();
            while ($row = mysqli_fetch_array($result, 1)) {
                $data[] = $row;
            }
            $connect->close();  // dong ket noi
            if ($data != null && count($data) > 0) {
                $user = $data[0];

                if ($user['username'] == 'admin') {
                    header('Location: ../views/listProductView.php');
                    die();
                }
                header('Location: ../../../index.php');
                die();
            } else {
                echo '<script>alert("Username or password is incorrect!"); window.location.href = "loginView.php";</script>';
            };
        }
    }
}
