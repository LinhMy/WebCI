<?php
// load ra file head
$this->load->view('admin/product/head', $this->data);
?>
<div class="line"></div>

<div class="wrapper">

    <!-- Form -->
    <form  method="post" id="form" class="form" action=""  enctype="multipart/form-data">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img class="titleIcon" src="<?php echo public_url(); ?>/admin/images/icons/dark/add.png">
                    <h6>Chỉnh sửa Set sản phẩm</h6>
                </div>

                <ul class="tabs">
                    <li><a href="#tab1">Thông tin chung</a></li>

                </ul>

                <div class="tab_container">
                    <div class="tab_content pd0" id="tab1">
                        <div class="formRow">
                            <label for="param_product_name" class="formLeft">Tên sản phẩm:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input type="text" _autocheck="true" id="param_product_name" value="<?php echo $set_info->name; ?>" name="name"></span>
                                <span class="autocheck" name="product_name_autocheck"></span>
                                <div class="clear error" name="product_name_error"><?php echo form_error('product_name'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                            <div class="formRight">
                                <input type="file" name="image" id="image">
                                <img src="<?php echo base_url('upload/products/'.$set_info->image); ?>" style="width: 100px; height: 70px;">

                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- Price -->
                        <div class="formRow">
                            <label for="param_price" class="formLeft">
                                Giá :
                                <span class="req">*</span>
                            </label>
                            <div class="formRight">
		<span class="oneTwo">
			<input type="text" _autocheck="true" value="<?php echo number_format($set_info->price); ?>" class="format_number" id="param_price" style="width:100px" name="price">
			<img src="<?php echo public_url(); ?>/admin/crown/images/icons/notifications/information.png" style="margin-bottom:-8px" title="Giá bán sử dụng để giao dịch" class="tipS">
		</span>
                                <span class="autocheck" name="price_autocheck"></span>
                                <div class="clear error" name="price_error"><?php echo form_error('price'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                       


                <div class="formRow">
                    <label for="param_date" class="formLeft">
                        Ngày :
                    </label>
                    <div class="formRight">
                        <span class="oneFour"><input type="date" id="param_date" value="<?php echo $set_info->create_date?>" name="create_date"></span>
                        <span class="autocheck" name="quantity_autocheck"></span>

                    </div>
                    <div class="clear"></div>
                </div>


                        <!-- warranty -->
                        <div class="formRow">
                            <label for="param_quantity" class="formLeft">
                                Số lượng :
                            </label>
                            <div class="formRight">
                                <span class="oneFour"><input type="text" id="param_quantity" value="<?php echo $set_info->quantity ?>" name="quantity"></span>
                                <span class="autocheck" name="quantity_autocheck"></span>

                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                    <label for="param_date" class="formLeft">
                        Cho phép bán :
                    </label>
                    <div class="formRight">
                        <span class="oneFour"><input type="checkbox" id="check" "<?php echo ($set_info->display==1)?"checked":""?>" value = "<?php echo $set_info->display?>" name="checkbox"></span>
                        <span class="autocheck" name="quantity_autocheck"></span>

                    </div>
                    <div class="clear"></div>
                </div>
                        <div class="formRow hide"></div>
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
<script language="javascript">
            document.getElementById('check').onclick = function(e){
                if (this.checked){
                 this.value="1";
                }
                else{
                this.value="0";
                }
            };
</script>