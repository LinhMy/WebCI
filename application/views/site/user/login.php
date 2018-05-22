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
                <form action="<?php echo base_url('user/login'); ?>" name="login" method="post" enctype="multipart/form-data">
                    <h3 class="title">Đăng Nhập Tài Khoản</h3>
                    <label style="color: red;"><?php echo form_error('login'); ?></label>
                    <p>
                        <input type="email" name="email" placeholder="Email Của Bạn">
                    </p>
                    <i><?php echo form_error('email'); ?></i>
                    <p>
                        <input type="password" name="password" placeholder="Mật Khẩu" >
                    </p>
                    <i><?php echo form_error('password'); ?></i>

                    <button class="button primary" type="submit">Đăng Nhập</button>
                </form>
            </div>

        </div>
    </div>
</div>
