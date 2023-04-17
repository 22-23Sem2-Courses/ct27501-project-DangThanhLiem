<?php
function getall_dm() 
{
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM tbl_danhmuc");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function deletedm($id)
{
    $conn = connectDB();
    $sql = "DELETE  FROM tbl_danhmuc WHERE id=" . $id;
    $conn->exec($sql);
}
function getonedm($id)
{
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM tbl_danhmuc WHERE id=?");
    $stmt->execute([$id]);
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function updatedm($id, $tendm, $img)
{
    $conn = connectDB();
    if ($img == "") {
        $stmt = $conn->prepare("UPDATE tbl_danhmuc SET tendm= ?WHERE id=?");
        $stmt->execute([$tendm, $id]);
    } else {
        $stmt = $conn->prepare("UPDATE tbl_danhmuc SET tendm= ?,img=? WHERE id=?");
        $stmt->execute([$tendm, $img, $id]);
    }

}
function themdm($tendm, $img)
{
    $conn = connectDB();
    $stmt = $conn->prepare("INSERT INTO tbl_danhmuc(tendm,img) values(?,?)");
    $stmt->execute([$tendm, $img]);
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
?>