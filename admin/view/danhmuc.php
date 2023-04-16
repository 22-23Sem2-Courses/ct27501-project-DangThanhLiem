<div class="main">
    <div class="container">

        <h2 style=" font-size: 50px;">Danh mục</h2>
        <form action="index.php?act=adddm" method="post" enctype="multipart/form-data" style="text-align: end; display:flex;" class="row">
            <div class="col me-2">
                <input class="form-control me-2" type="text" name="tendm" value="">
            </div>
            <div class="col me-2">
                
                <input  class="form-control" type="file" name="hinh" value="">
            <?php
            if (isset($uploadOK) && ($uploadOK == 0)) {
                echo "Yêu cầu nhập đúng file hình ảnh!";
            }
            ?>
            </div>
            <div class="col">
                <input  class="btn btn-outline-dark" type="submit" name="themmoi" value="Thêm mới">

            </div>
        </form>
        <br>
        <table class="table table-dark  table-striped  w-100"  style="text-align: center; font-size:20px;">
            <tr>
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>Hình</th>   
                <th>Hành động</th>
            </tr>
            <?php
            if (isset($kq) && (count($kq) > 0)) {
                $i = 1;
                foreach ($kq as $dm) {
                    echo
                        '<tr>
                        <td>' . $i . '</td>
                        <td>' . $dm['tendm'] . '</td>
                        <td><img src="../uploaded/dm/' . $dm['img'] . '" width="80px"</td>
                        <td><a href="index.php?act=updatedmform&id=' . $dm['id'] . '">Sửa</a> | <a href="index.php?act=deletedm&id=' . $dm['id'] . '">Xóa</a></td>
                     </tr>';
                    $i++;
                }
            }
            ?>
        </table>
    </div>
</div>