<style>
    div.form-login p{
        margin-bottom: 10px;
    }
    div.form-login i{
        color: red;
    }
</style>
<div class="tab-catalog" style="width: 1340px; margin: 0px auto; height: auto;">
    <div class="container">
        <div class="row" style="margin-left: 492px;">
            <div class="form-login">
            <form action="" name="register" method="post" enctype="multipart/form-data">
                <h3 class="title">Đăng Ký Tài Khoản</h3>
                <p>
                    <input type="text" name="username"  placeholder="Tên Của Bạn">

                </p>
                <i><?php echo form_error('name'); ?></i>
                <p>
                    <input type="email" name="email" placeholder="Email Của Bạn">
                </p>
                <i><?php echo form_error('email'); ?></i>
                <p>
                    <input type="password" name="password" placeholder="Mật Khẩu" >
                </p>
                <i><?php echo form_error('password'); ?></i>
                <p>
                    <input type="password" name="rpassword" placeholder="Nhập Lại Mật Khẩu" >
                </p>
                <i><?php echo form_error('rpassword'); ?></i>
                <p>
                    <input type="text" name="phone" placeholder="Số Điện Thoại Của Bạn" >
                </p>
                <i><?php echo form_error('phone'); ?></i>
                <p>
                    <input type="text" name="address" placeholder="Địa Chỉ Của Bạn" >
                </p>
                <i><?php echo form_error('adress'); ?></i>
                <p>
                    <input type="text" name="note" placeholder="ghi chú" >
                </p>
                <i><?php echo form_error('note'); ?></i>
                <label class="inline" for="rememberme">
                    <input type="checkbox" value="forever" id="rememberme" name="approved">
                    Đồng Ý Với Các Điều Khoản Của Chúng Tôi.!
                </label><i><?php echo form_error('approved'); ?></i><br />
                <button class="button primary" type="reset" >Nhập Lại</button>
                <button class="button primary" type="submit">Đăng Ký</button>
            </form>
            </div>

        </div>
    </div>
</div>
