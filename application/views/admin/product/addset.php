<?php
// load ra file head
$this->load->view('admin/product/head', $this->data);
?>
<div class="line"></div>

<div class="wrapper">

    <!-- Form -->
    <form enctype="multipart/form-data" method="post" action="<?php echo admin_url('setproduct/add'); ?>" id="form" class="form">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img class="titleIcon" src="<?php echo public_url(); ?>/admin/images/icons/dark/add.png">
                    <h6>Thêm mới Set sản phẩm</h6>
                </div>

                <ul class="tabs">
                    <li><a href="#tab1">Thông tin chung</a></li>
                </ul>

                <div class="tab_container">
                    <div class="tab_content pd0" id="tab1">
                        <div class="formRow">
                            <label for="param_product_name" class="formLeft">Tên set:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input type="text" _autocheck="true" id="param_product_name" name="set_name"></span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error"><?php echo form_error('set_name'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                            <div class="formRight">
                                <input type="file" name="image" id="image">

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
			<input type="text" _autocheck="true" class="format_number" id="param_price" style="width:100px" name="price">
			<img src="<?php echo public_url(); ?>/admin/crown/images/icons/notifications/information.png" style="margin-bottom:-8px" title="Giá bán sử dụng để giao dịch" class="tipS">
		</span>
                                <span class="autocheck" name="price_autocheck"></span>
                                <div class="clear error" name="price_error"><?php echo form_error('price'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <!-- Price -->
                        <div class="formRow">
                            <label for="param_discount" class="formLeft">
                                Giảm giá (VND)
                                <span></span>:
                            </label>
                            <div class="formRight">
		<span>
			<input type="text" class="format_number" id="param_discount" style="width:100px" name="sale">
			<img src="<?php echo public_url(); ?>/admin/crown/images/icons/notifications/information.png" style="margin-bottom:-8px" title="Số tiền giảm giá" class="tipS">
		</span>
                                <span class="autocheck" name="discount_autocheck"></span>
                                <div class="clear error" name="discount_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                         <!-- ngày -->
                        <div class="formRow">
                            <label for="param_date" class="formLeft">
                                Ngày :
                            </label>
                            <div class="formRight">
                                <span class="oneFour"><input type="date" id="param_quantity" name="date"></span>
                                <span class="autocheck" name="quantity_autocheck"></span>

                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- quantity -->
                        <div class="formRow">
                            <label for="param_quantity" class="formLeft">
                                Số lượng :
                            </label>
                            <div class="formRight">
                                <span class="oneFour"><input type="text" id="param_quantity" name="quantity"></span>
                                <span class="autocheck" name="quantity_autocheck"></span>

                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_content" class="formLeft">Chọn sản phẩm thêm vào set:</label>
                            <div class="table" stype="backgroud: white; ">
                            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll" stype="border-collapse: collapse;">
           
            <tr>
                <td style="width:10px;"><img src="<?php echo public_url(); ?>/admin/images/icons/tableArrows.png" /></td>

                <td style="width: 100px;">Tên sản phẩm</td>
                <td style="width: 100px;">Danh mục</td>
                <td style="width: 100px;">Giá bán gốc</td>
                <td style="width: 50px;">Giảm giá</td>
                <td style="width: 50px;">Hình ảnh</td>
            </tr>

            <tbody>
            <?php foreach ($list as $row): ?>
                <tr class="row_<?php echo $row->product_id; ?>">
                    <td><input type="checkbox" name="id[]" value="<?php echo $row->product_id; ?>" /></td>
                    <td ><?php echo $row->product_name; ?></td>
                    <td style="width: 200px;"><?php echo $row->category_name; ?></td>
                    <td><?php echo number_format($row->price); ?> VNĐ</td>
                    <td><?php echo number_format($row->discount); ?> VNĐ</td>
                    <td style="text-align: center;"><img src="<?php echo  base_url('upload/products/'.$row->image); ?>" style="width: 100px; height: 70px;"></td>
                    
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
                            </div>
                            <div class="clear"></div>
                        </div>					         <div class="formRow hide"></div>
                    </div>

                </div><!-- End tab_container-->

                <div class="formSubmit">
                    <input type="submit" class="button blueB" id ="submit" value="Thêm mới">
                    <input type="reset" class="basic" value="Hủy bỏ">
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>