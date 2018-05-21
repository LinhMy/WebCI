<style>
    div.row h4{
        padding: 5px;
        background-color: coral;
        color: #fff;
        width: 120px;
        border-radius: 4px ;
        text-align: center;
    }
    div.row h4 a{
        color: #fff;
    }
    div.row tr td i{
        color: red;
    }


</style>
<div class="tab-catalog" style="width: 1340px; margin: 0px auto; height: auto;">
    <div class="container">
        <div class="row" style="margin-left: 330px; margin-top: 20px;">
            <h2>Cập nhật thông tin thành viên:</h2>
        <form name="edit" action="<?php echo base_url('user/edit'); ?>" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Họ Tên:</td>
                    <td><input type="text" name="name" value="<?php echo $user_info->name; ?>">
                        <i><?php echo form_error('name'); ?></i>
                    </td>

                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $user_info->email; ?></td>
                </tr>
                <tr>
                    <td>password</td>
                    <td><input name="password" type="password" value="">
                        <i>Nếu thay đổi password thì nhập dữ liệu</i><br />
                        <i><?php echo form_error('password'); ?></i>
                    </td>
                </tr>
                <tr>
                    <td>phone:</td>
                    <td><input type="text" name="phone" value="<?php echo $user_info->phone; ?>">
                        <i><?php echo form_error('phone'); ?></i>
                    </td>

                </tr>
                <tr>
                    <td>adress:</td>
                    <td><input type="text" name="adress" value="<?php echo $user_info->adress; ?>">
                        <i><?php echo form_error('adress'); ?></i>
                    </td>

                </tr>

            </table>
            <button type="submit" class="button">Cập Nhật</button>
        </form>
        </div>
    </div>
</div>