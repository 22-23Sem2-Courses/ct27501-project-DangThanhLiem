<?php
function getall_donhang() 
{
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM tbl_donhang");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function taodonhang($madh, $tongdonhang, $pttt, $hoten, $address, $email, $tel)
{

    $conn = connectDB();
    $stmt = $conn->prepare("INSERT INTO tbl_donhang(madh,tongdonhang,pttt,hoten,address,email,tel) values(?,?,?,?,?,?,?)");
    $stmt->execute([$madh, $tongdonhang, $pttt, $hoten, $address, $email, $tel]);
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $last_id = $conn->lastInsertId();
    return $last_id;
}
function addtocart($iddh, $idsp, $tensp, $img, $dongia, $soluong)
{

    $conn = connectDB();
    $stmt = $conn->prepare("INSERT INTO tbl_giohang(iddh,idsp,tensp,img,dongia,soluong) values(?,?,?,?,?,?)");
    $stmt->execute([$iddh, $idsp, $tensp, $img, $dongia, $soluong]);
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;

}
function getshowcart($iddh)
{
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM tbl_giohang WHERE iddh=" . $iddh);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function getorderinfo($iddh)
{
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM tbl_donhang WHERE id=" . $iddh);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
?>





