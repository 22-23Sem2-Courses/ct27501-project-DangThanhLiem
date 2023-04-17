<div class="bg-dark">
  <br>
  <br>
</div>

<section class="h-100" >
  <div class=""> 
    <div class="text-center mt-1"><h1>Shopping Cart</h1></div>
      <div class="row align-items-center h-100">
          <div class="col-8" style="text-align:center;">
             <div class=" border-light rounded-5 mb-4  ">
                <div class="p-5 border-3">
                  <div class="row p-3 d-flex justify-content-between align-items-center text-white" style="background:#808080; border-radius:20px;" >
                    <tr>
                    <?php

                    // var_dump($_SESSION['giohang']);
                    $i = 0;
                    $tong = 0;
                    if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                      echo '<table border="1">
                          <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Hành động</th>
                          </tr>
                      ';
                      foreach ($_SESSION['giohang'] as $item) {
                        (float) $tt = (float) $item[3] * $item[4];
                        $tong += $tt;
                      ?>
                     <div class="col-md-2 col-lg-2 col-xl-2" >
                        <td>
                          <?php echo ($i + 1); ?>
                        </td>
                     </div>
                     <div class="col-md-2 col-lg-2 col-xl-2">
                       <td>
                         <?php echo $item[1]; ?>
                       </td>
                     </div>
                     <div class="col-md-2 col-lg-2 col-xl-2">
                       <td><img width="80px" src="../uploaded/sp/<?php echo $item[2] ?>"></td>

                     </div>
                     <div class="col-md-2 col-lg-2 col-xl-2" >
                       <td>
                         <?php echo $item[3]; ?> $
                       </td>
                     </div>
                     <div class="col-md-1 col-lg-1 col-xl-1 col-2 ">
                       <td class="" >
                         <form action="index.php" method="post" >
                           <div class="d-flex" style="justify-content: center;">
                         </form>
                             <button type="submit" name="minus" >-</button>
                             <input type="number" value="<?= $item[4] ?>" class=" text-center" min="1" max="100"
                               name="soluong">
                             <button type="submit" name="plus">+</button>
                            </div>
                         </form>
                       </td>
                       <div class="col-md-2 col-lg-2 col-xl-2">
                         <td>
                           <?php echo $tt ?> $
                         </td>
                       </div>
                       <div class="col-md-2 col-lg-2 col-xl-2">
  
                         <td><a href="index.php?act=delcart&i=' . $i . '" class="text-white"><i class="fas fa-trash fa-lg"></i></a></td>
                       </div>
                      
                       
                      </tr>


                      <?php
                      $i++;
                    }
                        echo '<tr class="border border-5 ">
                    <td colspan="5"></td>
                    <td><p>Thành Tiền</p>$ ' . $tong . '</td>
                    <td></td>
                    </tr>';
                        echo ' </table>';
                      }
                      ?>
                     </div>
                     <div class="mt-3">
                       <a href="index.php" class="btn btn-outline-dark">Mua tiếp</a>
                       <a class="btn btn-outline-dark" href="index.php?act=delcart">Xóa</a>
                     </div>



                  </div>

                </div>

              </div>
              <div class="col-4">
                    <div class=" shadow-lg p-3 bg-body-tertiary rounded  me-5">
                      <h3>Thông tin đặt hàng</h3>
                      <form  action="index.php?act=thanhtoan" method="post">
                        <input class="form-control" type="hidden" name="tongdonhang" value="<?= $tong ?>">
                        <table class="dathang">
                          <tr>
                            <td><input class="form-control" type="text" name="hoten" placeholder="Nhập họ tên"></td>
                          </tr>
                          <tr>
                            <td><input class="form-control" type="text" name="address" placeholder="Nhập địa chỉ "></td>
                          </tr>
                          <tr>
                            <td><input class="form-control" type="text" name="email" placeholder="Nhập email"></td>
                          </tr>
                          <tr>
                            <td><input class="form-control" type="text" name="tel" placeholder="Nhập số điện thoại"></td>
                          </tr>
                          <tr>
                            <td>Phương thức thanh toán <br>
                              <input type="radio" name="pttt" value="1">Thanh toán khi nhận hàng<br>
                              <input type="radio" name="pttt" value="2">Thanh toán chuyển khoản<br>
                              <input type="radio" name="pttt" value="3">Thanh toán ví MoMo<br>
                              <input type="radio" name="pttt" value="4">Thanh toán Online<br>
                            </td>
                          </tr>
                          <tr>
                            <td><input class="btn btn-outline-dark mb-4" type="submit" name="thanhtoan" value="Thanh toán"></td>
                          </tr>

                        </table>
                      </form>
                    </div>
                </div>

              </div>
       </div>
      

      </div>
   </div>
</section>