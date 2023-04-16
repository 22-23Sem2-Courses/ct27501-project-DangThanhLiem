<?php
session_start();
ob_start();
include "./model/connectdb.php";
include "./model/user.php";
if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $role = checkuser($user, $pass);
    $_SESSION['role'] = $role;
    if ($role == 1)
        header('location: index.php');
    else {
        $txt_error = "Username hoặc Password không tồn tại!";
        // header('location: login.php');
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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="user" value="">
            <div class="container">
                <input type="password" name="pass" placeholder="Nhập Mật Khẩu" required>
            </div>
            <input type="submit" name="dangnhap" value="Đăng nhập">
            <?php
            if (isset($txt_error) && ($txt_error != ""))
                echo "<font color='red'>" . $txt_error . "</font>";
            ?>
        </form>

</body>

</html>