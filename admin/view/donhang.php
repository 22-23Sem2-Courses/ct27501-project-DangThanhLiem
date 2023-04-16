<div class="main">
    <div class="container">
        <h2 style=" font-size: 50px;">Đơn hàng</h2>
        <table class="table table-dark table-striped">
            <tr>
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Mã đơn hàng</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Tổng tiền</th>
            </tr>
            <?php
            if (isset($kq) && (count($kq) > 0)) {
                $i = 1;
                foreach ($kq as $dh) {
                    echo
                        '<tr>
                        <td>' . $i . '</td>
                        <td>' . $dh['hoten'] . '</td>
                        <td>' . $dh['madh'] . '</td>
                        <td>' . $dh['address'] . '</td>
                        <td>' . $dh['email'] . '</td>
                        <td>' . $dh['tel'] . '</td>
                        <td>' . $dh['tongdonhang'] . ' $</td>
                     </tr>';
                    $i++;
                }
            }
            ?>
        </table>

    </div>
</div>