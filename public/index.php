<?php
session_start();
ob_start();
if (!isset($_SESSION['giohang']))
    $_SESSION['giohang'] = [];
include "../model/connectdb.php";
include "../model/user.php";
include "../model/sanpham.php";
include "../model/danhmuc.php";
include "../model/donhang.php";
$dsdm = getall_dm();
include "../view/header.php";
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'about':
            include "../view/about.php";
            break;
        case 'contract':
            include "../view/contract.php";
            break;
        case 'login':
            if (isset($_POST['login']) && $_POST['login']) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $kq = getuserinfo($user, $pass);
                $role = $kq[0]['role'];
                if ($kq[0]['role'] == 1) {
                    $_SESSION['role'] = $role;
                    header('location: ../admin/index.php');
                } else {
                    $_SESSION['role'] = $role;
                    $_SESSION['iduser'] = $kq[0]['id'];
                    $_SESSION['username'] = $kq[0]['user'];
                    header('location: index.php');
                }
            }
            include "../view/login.php";
            break;
        case 'thoat':
            unset($_SESSION['role']);
            unset($_SESSION['iduser']);
            unset($_SESSION['username']);
            header('location: index.php');
            break;

        case 'register':
            if (isset($_POST['register']) && $_POST['register']) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                themuser($user, $pass, $email);
            }
            include "../view/register.php";
            break;
        case 'product':
            if (isset($_GET['id']) && ($_GET['id'] > 0))
                $id = $_GET['id'];
            $dssp = getall_sp($id, "");
            $dm = getonedm($id);
            if ($id = 0)
                $dssp = getall_sp(0);

            include "../view/product.php";
            break;
        case 'viewcart':
            include "../view/viewcart.php";
            break;
        case 'addcart':
            if (isset($_POST['addtocart']) && $_POST['addtocart']) {
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $img = $_POST['img'];
                $gia = $_POST['gia'];
                if (isset($_POST['sl']) && ($_POST['sl'] > 0)) {
                    $sl = $_POST['sl'];
                } else {
                    $sl = 1;
                }
                $fg = 0;
                $i = 0;
                // if (isset($_POST['plus'])) {
                //     $slnew = $_SESSION['giohang'][$id][4] + 1;
                //     $_SESSION['giohang'][$id][4] = $slnew;
                // }
                // if (isset($_POST['minus'])) {
                //     $_SESSION['giohang'][$id][4];
                //     if ($_SESSION['giohang'][$id][4] <= 0)
                //         unset($_SESSION['giohang'][$id]);
                // }
                foreach ($_SESSION['giohang'] as $item) {
                    if ($item[1] == $tensp) {
                        $slnew = $sl + $item[4];
                        $_SESSION['giohang'][$i][4] = $slnew;
                        $fg = 1;
                        break;
                    }
                    $i++;
                }
                if ($fg == 0) {
                    $item = array($id, $tensp, $img, $gia, $sl);
                    $_SESSION['giohang'][] = $item;
                }
                header('location: index.php?act=viewcart');
            }
            break;
        case 'delcart':
            if (isset($_GET['i']) && ($_GET['i'] > 0)) {
                if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0))
                    array_splice($_SESSION['giohang'], $_GET['i'], 1);
            } else {
                if (isset($_SESSION['giohang']))
                    unset($_SESSION['giohang']);
            }
            if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                header('location: index.php?act=viewcart');
            } else {
                header('location: index.php?act=product&id=17');
            }
            break;
        case 'thanhtoan':
            if (isset($_POST['thanhtoan']) && $_POST['thanhtoan']) {
                $tongdonhang = $_POST['tongdonhang'];
                $hoten = $_POST['hoten'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $pttt = $_POST['pttt'];
                $madh = "DH" . rand(0, 99999);
                $iddh = taodonhang($madh, $tongdonhang, $pttt, $hoten, $address, $email, $tel);
                $_SESSION['iddh'] = $iddh;
                if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']))) {
                    foreach ($_SESSION['giohang'] as $item) {
                        addtocart($iddh, $item[0], $item[1], $item[2], $item[3], $item[4]);
                    }
                    unset($_SESSION['giohang']);
                }
            }
            // ($id, $tensp, $img, $gia, $sl)
            include "../view/donhang.php";
            break;
        default:
            include "../view/home.php";
            break;
    }
} else {
    include "../view/home.php";
}


include "../view/footer.php";
?>