<?php
// load ra file head
$this->load->view('admin/user/head', $this->data);
?>
<div class="line"></div>

<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <!-- Form -->
    <form enctype="multipart/form-data" method="post" action="" id="form" class="form">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img class="titleIcon" src="<?php echo public_url(); ?>/admin/images/icons/dark/add.png">
                    <h6>Thêm mới danh mục</h6>
                </div>

                <ul class="tabs">
                    <li><a href="#tab1">Thông tin chung</a></li>
                </ul>

                <div class="tab_container">
                    <div class="tab_content pd0" id="tab1">
                        <div class="formRow">
                            <label for="param_name" class="formLeft">Username:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><?php echo $user_info->username; ?></span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error"><?php echo form_error('username'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>


                        <div class="formRow">
                            <label for="param_name" class="formLeft">Password:</label>
                            <div class="formRight">
                                <span class="oneTwo"><b style="color: red;">Làm mới password thì mời nhập liệu:</b><input type="password" _autocheck="true" id="param_password" value="<?php echo $user_info->password; ?>" name="password"></span>
                                <span class="autocheck" name="password_autocheck"></span>
                                <div class="clear error" name="password_error"><?php echo form_error('password'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_name" class="formLeft">Xác nhận mật khẩu:<span class="req">*</span></label>
                            <div class="formRight">
                                    <span class="oneTwo"><input type="password" _autocheck="true" id="param_password_rp" name="password_rp"></span>
                                    <span class="autocheck" name="password_rp_autocheck"></span>
                                    <div class="clear error" name="password_rp_error"><?php echo form_error('password_rp'); ?></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        <div class="formRow">
                            <label for="param_email" class="formLeft">email:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input type="email" _autocheck="true" id="param_email" value="<?php echo $user_info->email; ?>" name="email"></span>
                                <span class="autocheck" name="email_autocheck"></span>
                                <div class="clear error" name="email_error"><?php echo form_error('email'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label for="param_phone" class="formLeft">Số điện thoại:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input type="text" _autocheck="true" id="param_phone" value="<?php echo $user_info->phone; ?>" name="phone"></span>
                                <span class="autocheck" name="phone_autocheck"></span>
                                <div class="clear error" name="phone_error"><?php echo form_error('phone'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label for="param_address" class="formLeft">Địa chỉ:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input type="text" _autocheck="true" id="param_address" value="<?php echo $user_info->address; ?>" name="address"></span>
                                <span class="autocheck" name="email_autocheck"></span>
                                <div class="clear error" name="email_error"><?php echo form_error('address'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label for="param_note" class="formLeft">Ghi chú:</label>
                            <div class="formRight">
                                <span class="oneTwo"><textarea cols="" rows="4" id="param_note" value="<?php echo $user_info->note; ?>" name="note"></textarea></span>
                                <span class="autocheck" name="content_autocheck"></span>
                                <div class="clear error" name="name_error"><?php echo form_error('note'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                </div>




                </div><!-- End tab_container-->

                <div class="formSubmit">
                    <input type="submit" class="redB" value="Cập nhật">
                    <input type="reset" class="basic" value="Hủy bỏ">
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>