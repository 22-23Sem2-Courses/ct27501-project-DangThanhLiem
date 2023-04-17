<div class="main">
    <div class="container">
        <h2  style=" font-size: 50px;">Tài khoản</h2>
        <table class="table table-dark  table-striped  w-100 "  style="text-align: center; font-size:20px;">
            <tr>
                <th>STT</th>
                <th>Email</th>
                <th>username</th>
                <th>password</th>
            </tr>
            <?php
            if (isset($kq) && (count($kq) > 0)) {
                $i = 1;
                foreach ($kq as $tk) {
                    echo
                        '<tr>
                        <td>' . $i . '</td>
                        <td>' . $tk['email'] . '</td>
                        <td>' . $tk['user'] . '</td>
                        <td>' . $tk['pass'] . '</td>
                     </tr>';
                    $i++;
                }
            }
            ?>
        </table>

    </div>
</div>