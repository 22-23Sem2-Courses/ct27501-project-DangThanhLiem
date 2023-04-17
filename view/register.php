<div class="main">
    <div class="bg-dark">
        <br>
    </div>
    <div class="container text-center mt-5 mb-">
        <div class="row" style="height: 350px;">
            <div class="col-md-4 offset-md-4  shadow-lg p-3 mb-5 bg-body-tertiary rounded ">

                <h2>Register</h2>
                <form action="index.php?act=login" method="post" id="registerForm">
                    <div class="row mb-4">
                        <label class="col-sm-2 col-lg-3 col-form-label" for="email">Email:</label>
                        <div class="col-sm-10 col-lg-9">
                            <input type="text" name="email" placeholder="Nhập email" value="" id="email"
                                class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-2 col-lg-3 col-form-label" for="user">Username:</label>
                        <div class="col-sm-10 col-lg-9">
                            <input type="text" name="user" placeholder="Nhập user" value="" id="username"
                                class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-2 col-lg-3 col-form-label" for="pass">Password:</label>
                        <div class="col-sm-10 col-lg-9">
                            <input type="password" name="pass" placeholder="Nhập password" value="" id="password"
                                class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-2 col-lg-3 col-form-label" for="xacnhanpass">Re-Pass:</label>
                        <div class="col-sm-10 col-lg-9">
                            <input type="password" name="xacnhanpass" placeholder="Nhập lại password" value=""
                                id="confirm_password" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <input type="submit" name="register" value="Đăng ký" class=" btn btn-outline-dark mb-4">
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<script>
    function Validator(options) {
        function validate(inputElement, rule) {
            var errorElement = inputElement.parentElement.querySelector(options.errorSelector);
            var errorMessage = rule.test(inputElement.value);

            if (errorMessage) {
                errorElement.innerText = errorMessage;
                inputElement.parentElement.style.color = 'red';
            }
            else {
                errorElement.innerText = '';
            }
            return !errorMessage;
        }
        // Lấy element của form cần validate
        var formElement = document.querySelector(options.form);
        if (formElement) {
            // Khi submit form
            formElement.onsubmit = function (e) {
                //e.preventDefault();
                var isFormValid = true;
                // Lặp qua từng rules và validate
                options.rules.forEach(function (rule) {
                    var inputElement = formElement.querySelector(rule.selector);
                    var isValid = validate(inputElement, rule);
                    if (!isValid) {
                        isFormValid = false;
                    }
                });

                if (isFormValid) {
                    alert("Đăng ký tài khoản thành công");
                }
                else {
                    alert("Đăng ký tài khoản không thành công");
                }
            }



            options.rules.forEach(function (rule) {
                var inputElement = formElement.querySelector(rule.selector);
                if (inputElement) {
                    // Xử lý trường hợp blur ra khỏi input
                    inputElement.onblur = function () {
                        validate(inputElement, rule);
                    }

                    // Xử lý mỗi khi nhập vào input
                    inputElement.oninput = function () {
                        var errorElement = inputElement.parentElement.querySelector(options.errorSelector);
                        errorElement.innerText = '';
                    }
                }
            });
        }
    }
    // Định nghĩa các rules
    Validator.isName = function (selector, message) {
        return {
            selector: selector,
            test: function (value) {
                return value.trim() ? undefined : message || 'Vui lòng nhập vào giá trị';
            }
        }
    }
    Validator.isUsername = function (selector, message) {
        return {
            selector: selector,
            test: function (value) {
                return value.trim() ? undefined : message || 'Vui lòng nhập vào giá trị';
            }
        }
    }
    Validator.isEmail = function (selector, message) {
        return {
            selector: selector,
            test: function (value) {
                var regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                return regexEmail.test(value) ? undefined : message || 'Vui lòng nhập giá trị';
            }
        }
    }
    Validator.isPassword = function (selector) {
        return {
            selector: selector,
            test: function (value) {
                var regexpass = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
                return regexpass.test(value) ? undefined : 'Mật khẩu tối thiểu tám ký tự (ít nhất một chữ cái và một số)';
            }
        }
    }

    Validator.isConfirmpassword = function (selector, getConfirmValue, message) {
        return {
            selector: selector,
            test: function (value) {
                return value === getConfirmValue() ? undefined : message || "Giá trị nhập vào không đúng";
            }
        }
    }


    Validator({
        form: '#registerForm',
        errorSelector: '.form-message',
        rules: [
            Validator.isName("#name", "Nhập vào họ tên của bạn"),
            Validator.isUsername('#username', "Tên đăng nhập không được để trống"),
            Validator.isEmail("#email", "Email không hợp lê"),
            Validator.isPassword('#password'),
            Validator.isConfirmpassword("#confirm_password", function () {
                return document.querySelector("#registerForm #password").value;
            }, 'Mật khẩu không chính xác')
        ]
    });
</script>