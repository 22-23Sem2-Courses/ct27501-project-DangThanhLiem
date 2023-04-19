<?php
session_start();
ob_start();
include "../model/connectdb.php";
include "../model/user.php";
if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $role = checkuser($user, $pass);
    $_SESSION['role'] = $role;
    // nếu là quyền admin thì nhảy qua trang chủ còn không thì báo lỗi
    if ($role == 1)
        header('location: index.php');
    else if ($role == 0) {
        $txt_error = "Bạn không phải admin!";
    } else {
        $txt_error = "Username hoặc password không tồn tại!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>

</head>

<body>
    <div class="main">
        <h2>Login</h2>
        <!-- kiểm tra diều kiện trong chính cái trang này -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="user" value="" placeholder="Nhập tài khoản">
            <div class="container">
                <input type="password" name="pass" placeholder="Nhập mật khẩu" required>
            </div>
            <input type="submit" name="dangnhap" value="Đăng nhập">
            <?php
            if (isset($txt_error) && ($txt_error != ""))
                echo "<font color='red'>" . $txt_error . "</font>";
            ?>
        </form>

</body>

</html>
