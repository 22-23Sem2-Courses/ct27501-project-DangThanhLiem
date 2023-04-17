<div class="main">
    <div class="container">

        <h2 style=" font-size: 50px;">Sản phẩm</h2>
        <form action="index.php?act=sanpham_add" method="post" enctype="multipart/form-data"  class="row; d-flex">
            <div class="col-2 me-2" >

                <select name="iddm" id=""  class="form-select mb-3">
                    <option value="0">Chọn danh mục</option>
                    <?php
                    if (isset($dsdm)) {
                        foreach ($dsdm as $dm) {
                            echo '<option value="' . $dm['id'] . '">' . $dm['tendm'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col-2 me-2">

                <input class="form-control " type="text" name="tensp" value="" placeholder="Nhập tên sản phẩm">

            </div>
            <div class="col-2 me-2">

                <input class="form-control " type="text" name="chatlieu" id="" placeholder="Nhập chất liệu">
            </div>
            <div class="col-2 me-2">
                <input class="form-control " type="text" name="mau" id="" placeholder="Nhập màu">

            </div>
            <div class="col-2 me-2">

                <input class="form-control " type="text" name="gia" value="" placeholder="Nhập giá">
            </div>
            <div class="col-2 me-2">

            <input class="form-control " type="file" name="hinh" value="">
            <?php
            if (isset($uploadOK) && ($uploadOK == 0)) {
                echo "Yêu cầu nhập đúng file hình ảnh!";
            }
            ?>
            </div>
            <div class="col-2 me-2">

                <input  class="btn btn-outline-dark" type="submit" name="themmoi" value="Thêm mới">
            </div>

    
        </form>
        <br>
        <table class="table table-dark  table-striped  w-100 "  style="text-align: center; font-size:20px;">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình</th>
                <th>Chất liệu</th>
                <th>Màu</th>
                <th>Giá</th>
                <th>Hành động</th>
            </tr>
            <?php
            if (isset($kq) && (count($kq) > 0)) {
                $i = 1;
                foreach ($kq as $item) {
                    echo
                        '<tr>
                        <td>' . $i . '</td>
                        <td>' . $item['tensp'] . '</td>
                        <td><img src="../uploaded/sp/' . $item['img'] . '" width="80px"</td>
                        <td>' . $item['chatlieu'] . '</td>
                        <td>' . $item['mau'] . '</td>
                        <td>' . $item['gia'] . '</td>
                        <td><a href="index.php?act=updatespform&id=' . $item['id'] . '">Sửa</a> | <a href="index.php?act=deletesp&id=' . $item['id'] . '">Xóa</a></td>
                     </tr>';
                    $i++;
                }
            }
            ?>
        </table>
    </div>
</div>