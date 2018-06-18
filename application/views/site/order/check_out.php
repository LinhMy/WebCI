<div class="tab-catalog" style="width: 1340px; margin: 0px auto; height: auto;">
    <div class="container">
        <div class="row" style="margin-left: 330px; margin-top: 20px;">
            <h2>Thông tin nhận hàng của thành viên: </h2>
            <form name="edit" action="<?php echo base_url('order/check_out'); ?>" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Tổng số tiền cần thanh toán:</td>
                        <td style="color: red"><?php echo  number_format($total_amount);  ?> VNĐ

                        </td>

                    </tr
                    <tr>
                        <td>Họ Tên:</td>
                        <td><input type="text" name="name" value="<?php echo isset($user_info->name) ? $user_info->name : '' ?>">
                            <i style="color:red;"><?php echo form_error('name'); ?></i>
                        </td>

                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" value="<?php echo isset($user_info->email) ? $user_info->email : '' ?>">
						<i style="color:red;"><?php echo form_error('email'); ?></i>
                        </td>
                    </tr>

                    <tr>
                        <td>phone:</td>
                        <td><input type="text" name="phone" value="<?php echo isset($user_info->phone) ? $user_info->phone : '' ?>">
						<i style="color:red;"><?php echo form_error('phone'); ?></i>
                        </td>

                    </tr>
                    <tr>
                        <td>Ghi chú:</td>
                        <td><textarea cols="40" style="text-align: left;width: 235px" type="text" name="message" value="">
                            </textarea><i style="color:red;"><?php echo form_error('message'); ?></i>
                        </td>

                    </tr>
                    <tr>
                        <td>Thanh toán qua:</td>
                        <td>
                            <select name="payment" style="width: 235px">
                                <option value="" >-- Cổng Thanh Toán --</option>
                                <option value="offline">Thanh toán khi nhận hàng</option>
                            </select>
                            <i style="color:red;"><?php echo form_error('payment'); ?></i>
                        </td>

                    </tr>

                </table>
                <button type="submit" class="button">THANH TOÁN</button>
            </form>
        </div>
    </div>
</div>
