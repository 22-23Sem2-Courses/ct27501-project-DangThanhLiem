<?php
function getall_user()
{
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM tbl_user");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
// function deletedm($id)
// {
//     $conn = connectDB();
//     $sql = "DELETE  FROM tbl_danhmuc WHERE id=" . $id;
//     $conn->exec($sql);
// }
function checkuser($user, $pass)
{
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user=? AND pass=?");
    $stmt->execute([$user, $pass]);
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    if (count($kq) > 0)
        return $kq[0]['role'];
    else
        return 0;
}
function getuserinfo($user, $pass)
{
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user=? AND pass=?");
    $stmt->execute([$user, $pass]);
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    if (count($kq) > 0)
        return $kq;
}
// function updatedm($id, $tendm)
// {
//     $conn = connectDB();
//     $sql = "UPDATE tbl_danhmuc SET tendm='" . $tendm . "' WHERE id=" . $id;
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
// }
function themuser($user, $pass, $email)
{
    $conn = connectDB();
    $stmt = $conn->prepare("INSERT INTO tbl_user(user,pass,email) values(?,?,?)");
    $stmt->execute([$user, $pass, $email]);
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;

}
// ?>
