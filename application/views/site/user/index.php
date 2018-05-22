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
</style>
<div class="tab-catalog" style="width: 1340px; margin: 0px auto; height: auto;">
    <div class="container">
        <div class="row" style="margin-left: 330px; margin-top: 20px;">
            <h2>Thông tin thành viên:</h2>
            <table>
                <tr>
                    <td>Họ Tên:</td>
                    <td><?php echo $user_info->name; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $user_info->email; ?></td>
                </tr>
                <tr>
                    <td>password</td>
                    <td>********</td>
                </tr>
                <tr>
                    <td>phone:</td>
                    <td><?php echo $user_info->phone; ?></td>
                </tr>
                <tr>
                    <td>adress:</td>
                    <td><?php echo $user_info->adress; ?></td>
                </tr>

            </table>
            <h4><a href="<?php echo base_url('user/edit'); ?>">Chỉnh Sửa</a></h4>
        </div>
    </div>
</div>