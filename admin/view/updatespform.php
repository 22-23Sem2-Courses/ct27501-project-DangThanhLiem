<div class="main">
    <div class="container">

        <h2 style=" font-size: 50px;">Cập nhật sản phẩm</h2>
        <form action="index.php?act=sanpham_update" method="post" enctype="multipart/form-data" class="row; d-flex">
            <div class="col-2 me-1">
                <select name="iddm" id="" class="form-select mb-3">
                    <option value="0">Chọn danh mục</option>
                    <?php
                    $iddmcur = $spct[0]['iddm'];
                    if (isset($dsdm)) {
                        foreach ($dsdm as $dm) {
                            if ($dm['id'] == $iddmcur)
                                echo '<option value="' . $dm['id'] . '"selected>' . $dm['tendm'] . '</option>';
                            else
                                echo '<option value="' . $dm['id'] . '">' . $dm['tendm'] . '</option>';
                        }
                    }
                    ?>
                </select>

            </div>
            <div class="col-2 me-1">
                <input class="form-control  "  type="text" name="tensp" value="<?= $spct[0]['tensp'] ?>" placeholder="Nhập tên sản phẩm">
                
            </div>
            <div class="col-2 me-1">
                <input class="form-control  "  type="text" name="chatlieu" id="" placeholder="Nhập chất liệu" value="<?= $spct[0]['chatlieu'] ?>">

            </div>
            <div class="col-2 me-1">
                <input class="form-control  "  type="text" name="mau" id="" placeholder="Nhập màu" <?= $spct[0]['mau'] ?>>

            </div>
            <div class="col-1 me-1">
                <input class="form-control  "  type="text" name="gia" placeholder="Nhập giá" value="<?= $spct[0]['gia'] ?>">

            </div>
            <div class="col-1 me-1">
                <input  class="form-control" type="file" name="hinh" value="?=$spct[0]['img']?>" width=80px>

            </div>
            <?php
            if (isset($uploadOK) && ($uploadOK == 0)) {
                echo "Yêu cầu nhập đúng file hình ảnh!";
            }
            ?>
    
                <input   type="hidden" name="id" value="<?= $spct[0]['id'] ?>">

            
            <div class="col-1">
                <input class="btn btn-outline-dark" type="submit" name="capnhat" value="Cập nhật">

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