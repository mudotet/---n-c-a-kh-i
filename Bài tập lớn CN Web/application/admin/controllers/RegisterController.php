<?php

class RegisterController
{
    public function __construct()
    {
    }

    public function register()
    {
        if (!empty($_POST)) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $passwordConfirm = $_POST['passwordConfirm'];

            // Kiểm tra mật khẩu có khớp không
            if ($password != $passwordConfirm) {
                $error = "Password confirmation does not match!";
                echo '<script>alert("' . $error . '"); window.location.href = "registerView.php";</script>';
                die();
            }

            // Kết nối đến cơ sở dữ liệu
            $connect = new mysqli("localhost", "root", "", "quanlicuahang");
            mysqli_set_charset($connect, "utf8");

            // Kiểm tra xem tên đăng nhập đã tồn tại chưa
            $stmt = $connect->prepare("SELECT * FROM taikhoan WHERE username=?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $error = "Username already exists!";
            } else {
                // Mã hóa mật khẩu bằng password_hash
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Thực hiện chèn dữ liệu vào cơ sở dữ liệu
                $stmt = $connect->prepare("INSERT INTO taikhoan (username, pass) VALUES (?, ?)");
                $stmt->bind_param("ss", $username, $hashedPassword);
                if ($stmt->execute()) {
                    echo '<script>
                            function success() {
                              alert("Register success, Please login to continue!");
                              window.location.href = "../../admin/views/loginView.php";
                            }
                            
                            success();
                        </script>';
                } else {
                    $error = "Error, please try again!";
                }
            }

            if (isset($error)) {
                echo '<script>alert("' . $error . '"); window.location.href = "registerView.php";</script>';
            }
        }
    }
}
