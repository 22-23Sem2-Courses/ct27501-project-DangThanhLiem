<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-dress" role="tabpanel" aria-labelledby="list-dress-list">
          <h5 class="text-bg-dark " style="text-align: center; border-radius: 5px; border: inset;">
            <?= $dm[0]['tendm'] ?>
          </h5>
          <div class="">
            <div class="row row-cols-1 row-cols-md-3 g-4">
              <?php foreach ($dssp as $sp) {
                echo '
                    <!-- SP1 -->
                    <div class="col">
                      <div class="card h-100">
                      <form action="index.php?act=addcart" method="post">
                        <img src="../uploaded/sp/' . $sp['img'] . '" class=" ptc card-img-top " style="height: 350px;" alt="...">
                        <div class="card-body ">
                          <h6 class="card-title me-3">' . $sp['tensp'] . '</h6>
                        </div>
                        <div class="card-footer d-flex row" style="padding: 0px;margin: unset;">
                          <!-- Button trigger modal -->
                            <button type="button" class="btn col-auto me-auto" data-bs-toggle="modal" data-bs-target="#r-1">
                              ORDER
                            </button>
                            <input  type="submit" class="btn btn-dark" name="addtocart" value="ORTHER">
                            <div class="col-auto" style="padding-top: 7px;"><small class=" text-body-secondary" >' . $sp['gia'] . ' $</small></div>
                           
                            <input type="hidden" value= "' . $sp['id'] . '" name="id">
                            <input type="hidden" value= "' . $sp['tensp'] . '" name="tensp">
                            <input type="hidden" value= "' . $sp['img'] . '" name="img">
                            <input type="hidden" value= "' . $sp['gia'] . '" name="gia">

                            <!-- Modal -->
                            <div class="modal fade" id="r-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog w-25">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Thông tin sản phẩm</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <p>
                                      Tên sản phẩm:' . $sp['tensp'] . '
                                    </p>
                                    <p>
                                      Chất liệu:' . $sp['chatlieu'] . '
                                    </p>
                                    <p>
                                      Màu:' . $sp['mau'] . ' 
                                    </p>
                                    <p>
                                    </p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" >Close</button>
                                    <input  type="submit" class="btn btn-dark" name="addtocart" value="ORTHER">
                                    
                                    
                                  </div>
                                </div>
                              </div>
                              
                                
                            </div>
                           

                        </div>
                        </form>
                      </div>

                    </div>
                    
                    
                    <!-- End sp1 -->
              ';
              }
              ?>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>