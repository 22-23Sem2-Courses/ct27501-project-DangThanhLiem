<div class="main">
    <h2>Đơn hàng</h2>
    <table border="1">
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