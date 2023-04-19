<?php
session_start();
ob_start();
if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {

    include "../model/connectdb.php";
    //connectDB();
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/user.php";
    include "../model/donhang.php";
    include "view/header.php";
    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'danhmuc':
                $kq = getall_dm();
                include "view/danhmuc.php";
                break;
            case 'taikhoan':
                $kq = getall_user();
                include "view/taikhoan.php";
                break;
            case 'adddm':
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $tendm = $_POST['tendm'];
                    $target_dir = "../uploaded/dm/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    $img = $_FILES["hinh"]["name"];
                    $uploadOK = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        // echo "Sorry, only JPG, PNG, JPEG &GIF files are allowed.";
                        $uploadOK = 0;
                    }
                    if ($uploadOK == 1) {
                        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                        themdm($tendm, $img);
                    }
                }
                $kq = getall_dm();
                include "view/danhmuc.php";
                break;
            case 'deletedm':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    deletedm($id);
                }
                $kq = getall_dm();
                include 'view/danhmuc.php';
                break;
            case 'updatedmform':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $kqone = getonedm($id);
                    $kq = getall_dm();
                }
                include "view/updatedmform.php";
                break;
           case 'danhmuc_update':
                if (isset($_POST['capnhat']) && ($_POST['capnhat']) > 0) {
                    $id = $_POST['id'];
                    $tendm = $_POST['tendm'];
                    $target_dir = "../uploaded/dm/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);
                    $img = $_FILES["img"]["name"];
                    $uploadOK = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        // echo "Sorry, only JPG, PNG, JPEG &GIF files are allowed.";
                        $uploadOK = 0;
                    }
                    if ($uploadOK == 1) {
                        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                    } else {
                        $img = "";
                    }
                    updatedm($id, $tendm, $img);
                }
                $kq = getall_dm();
                include "view/danhmuc.php";
                break;
            case 'sanpham':
                $dsdm = getall_dm();
                $kq = getall_sanpham();
                include "view/sanpham.php";
                break;
            case 'updatespform':
                $dsdm = getall_dm();
                if ((isset($_GET['id'])) && ($_GET['id'] > 0)) {
                    $spct = getonesp($_GET['id']);
                }
                $kq = getall_sanpham();
                include "view/updatespform.php";
                break;
            case 'sanpham_update':
                $dsdm = getall_dm();
                if ((isset($_POST['capnhat'])) && ($_POST['capnhat'] > 0)) {
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $chatlieu = $_POST['chatlieu'];
                    $mau = $_POST['mau'];
                    $gia = $_POST['gia'];
                    $id = $_POST['id'];
                    if ($_FILES["hinh"]["name"] != "") {
                        $target_dir = "../uploaded/sp/";
                        $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                        $img = $_FILES["hinh"]["name"];
                        $uploadOK = 1;
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                            // echo "Sorry, only JPG, PNG, JPEG &GIF files are allowed.";
                            $uploadOK = 0;
                        }
                        if ($uploadOK == 1) {
                            move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                            // insert_sanpham($iddm, $tensp, $gia, $img);
                        }
                    } else {
                        $img = "";
                    }
                    updatesp($id, $tensp, $img, $chatlieu, $mau, $gia, $iddm);
                }
                $kq = getall_sanpham();
                include "view/sanpham.php";
                break;

            case 'sanpham_add':
                if ((isset($_POST['themmoi'])) && ($_POST['themmoi'])) {
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $chatlieu = $_POST['chatlieu'];
                    $mau = $_POST['mau'];
                    $gia = $_POST['gia'];

                    $target_dir = "../uploaded/sp/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    $img = $_FILES["hinh"]["name"];
                    // $img = basename($_FILES["hinh"]["name"]);
                    $uploadOK = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        // echo "Sorry, only JPG, PNG, JPEG &GIF files are allowed.";
                        $uploadOK = 0;
                    }
                    if ($uploadOK == 1) {
                        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                        insert_sanpham($iddm, $tensp, $chatlieu, $mau, $gia, $img);
                    }
                }
                $dsdm = getall_dm();
                $kq = getall_sanpham();
                include "view/sanpham.php";
                break;
            case 'deletesp':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    deletesp($id);
                }
                $kq = getall_sanpham();
                include "view/sanpham.php";
                break;
            case 'donhang':
                $kq = getall_donhang();
                include "view/donhang.php";
                break;
            default:
                include "view/home.php";
                break;
            case 'thoat':
                if (isset($_SESSION['role']) && $_SESSION['role'])
                    unset($_SESSION['role']);
                header('location:login.php');
                break;
        }
    } else {
        include "view/home.php";
    }
    include "view/footer.php";
} else {
    header('location: login.php');
}
?>
