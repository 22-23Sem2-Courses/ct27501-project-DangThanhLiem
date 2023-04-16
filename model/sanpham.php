<?php
function getall_sp($iddm = 0, $kyw = "")
{
    $conn = connectDB();
    $sql = "SELECT * FROM tbl_sanpham WHERE 1";
    if ($iddm > 0)
        $sql .= " AND iddm=" . $iddm;

    if ($kyw != "")
        $sql .= " AND tensp like '%" . $kyw . "%'";
    $sql .= " order by id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function getall_sanpham()
{
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM tbl_sanpham");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function insert_sanpham($iddm, $tensp, $chatlieu, $mau, $gia, $img)
{
    $conn = connectDB();
    $stmt = $conn->prepare("INSERT INTO tbl_sanpham(iddm,tensp,chatlieu,mau,gia,img) values(?,?,?,?,?,?)");
    $stmt->execute([$iddm, $tensp, $chatlieu, $mau, $gia, $img]);
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function deletesp($id)
{
    $conn = connectDB();
    $sql = "DELETE  FROM tbl_sanpham WHERE id=" . $id;
    $conn->exec($sql);
}
function getonesp($id)
{
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM tbl_sanpham WHERE id=?");
    $stmt->execute([$id]);
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function updatesp($id, $tensp, $img, $chatlieu, $mau, $gia, $iddm)
{
    $conn = connectDB();
    if ($img == "") {
        $stmt = $conn->prepare("update tbl_sanpham set tensp=? , chatlieu=?,mau=?,gia=?,iddm=? where id=?");
        $stmt->execute([$tensp, $chatlieu, $mau, $gia, $iddm, $id]);
    } else {
        $stmt = $conn->prepare("update tbl_sanpham set tensp=? , chatlieu=?,mau=?,gia=?,img=?,iddm=? where id=?");
        $stmt->execute([$tensp, $chatlieu, $mau, $gia, $img, $iddm, $id]);
    }
}
?>