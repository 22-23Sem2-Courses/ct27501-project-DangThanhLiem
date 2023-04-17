<section>
    <div>
        <h3>ID đơn hàng:
            <?= $iddh ?>
        </h3>
        <?php
        if (isset($_SESSION['iddh']) && $_SESSION['iddh'] > 0) {
            $getshowcart = getshowcart($iddh);

            $i = 0;
            $tong = 0;

            if (isset($getshowcart) && (count($getshowcart) > 0)) {
                echo '<table>
          <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Hành động</th>
          </tr>
       ';
                foreach ($getshowcart as $item) {
                    (float) $tt = (float) $item['soluong'] * $item['dongia'];
                    $tong += $tt;
                    var_dump($item);
                    echo '  <tr>
            <td>' . ($i + 1) . '</td>
            <td>' . $item['tensp'] . '</td>
            <td><img width="80px" src="../uploaded/sp/' . $item['img'] . '"></td>
            <td>' . $item['dongia'] . '$</td>
            <td>' . $item['soluong'] . '</td>
            <td>' . $tt . '$</td>
            <td><a href="index.php?act=delcart&i=' . $i . '" class="text-danger"><i class="fas fa-trash fa-lg"></i></a></td>
          </tr> 
          ';

                    $i++;
                }
                echo '<tr>
                        <td colspan="5"></td>
                        <td>$ ' . $tong . '</td>
                        <td></td>
                    </tr>';
                echo ' </table>';
            } else {
                echo "Giỏ hàng rỗng. <a href='index.php?act=product.php&id=20'>Tiếp tục đặt hàng</a>";
            }
        }

        ?>
        <div>
        </div>
        <div>
            <?php
            if (isset($_SESSION['iddh']) && $_SESSION['iddh'] > 0) {
                $orderinfo = getorderinfo($_SESSION['iddh']);
                if (count($orderinfo) > 0) {

                    var_dump($orderinfo[0]);
                    ?>
                    <h3>Mã đơn hàng:
                        <?= $orderinfo[0]['madh']; ?>
                    </h3>

                    <table class="dathang">
                        <tr>
                            <td><strong>Tên người nhận:</strong><br>
                                <?= $orderinfo[0]['hoten']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Địa chỉ người nhận:</strong><br>
                                <?= $orderinfo[0]['address']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Email người nhận:</strong><br>
                                <?= $orderinfo[0]['email']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Số điện thoại người nhận:</strong><br>
                                <?= $orderinfo[0]['tel']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Phương thức thanh toán </strong><br>

                                <?php
                                var_dump($orderinfo[0]['pttt']);
                                switch ($orderinfo[0]['pttt']) {
                                    case 1:
                                        $txtmess = "Thanh toán khi nhận hàng";
                                        break;
                                    case '2':
                                        $txtmess = "Thanh toán chuyển khoản";
                                        break;
                                    case '3':
                                        $txtmess = "Thanh toán ví MoMo";
                                        break;
                                    case '4':
                                        $txtmess = "Thanh toán Online";
                                        break;

                                    default:
                                        $txtmess = "Quý khách chưa chọn ...";
                                        break;
                                }
                                ?>
                                <!-- <input type="radio" name="pttt" value="1"><br>
                                    <input type="radio" name="pttt" value="2"><br>
                                    <input type="radio" name="pttt" value="3"><br>
                                    <input type="radio" name="pttt" value="4"><br> -->
                            </td>
                        </tr>
                        <tr>
                        </tr>

                    </table>

                    <?php
                }
            }
            ?>
            </form>
        </div>
    </div>
</section>