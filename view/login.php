<div class="main">
    <div class="bg-dark">
        <br><br>
    </div>
    <div class="container text-center mt-5 mb-4">
        <div  class="row" style="height: 400px;">
            <div class="col-md-4 offset-md-4  shadow-lg p-3 mb-5 bg-body-tertiary rounded ">
                <h2>Login</h2>
                <script>
                    const passField = document.querySelector("input");
                    const showBtn = document.querySelector("span i");
                    showBtn.onclick = (() => {
                        if (passField.type === "password") {
                            passField.type = "text";
                            showBtn.classList.add("hide-btn");
                        } else {
                            passField.type = "password";
                            showBtn.classList.remove("hide-btn");
                        }
                    });
                </script>
                <form action="index.php?act=login" method="post">
                    <div class="row mb-4">
                        <Label class="col-sm-2 col-lg-3 col-form-label" for="user">
                            Username:
                        </Label>
                        <div class="col-sm-10 col-lg-9">
                            <input class="form-control" type="text" name="user" placeholder="Nhập username" value="">
            
                        </div>
            
                    </div>
            
                    <div class="row mb-4">
                        <label  class="col-sm-2 col-lg-3 col-form-label" for="pass">Password</label>
                        <div class="col-sm-10 col-lg-9">
                            <input class="form-control" type="password" name="pass" placeholder="Nhập Mật Khẩu" required>
            
                        </div>
            
            
                    </div>
                    <input class=" btn btn-outline-dark mb-4"  type="submit" name="login" value="Đăng nhập">
                </form>

            </div>
        </div>
    </div>
</div>