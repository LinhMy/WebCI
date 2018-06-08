<link rel="stylesheet" href="<?php echo public_url()?>/js/jquery/autocomplete/css/smoothness/jquery-ui-1.8.16.custom.css" type="text/css">
<script src="<?php echo public_url()?>/js/jquery/autocomplete/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#add_product").click(function(event) {
            event.preventDefault();
            var product_id1 = $("#product_name1").val();
            var product_id2 = $("#product_name2").val();
            var product_id3 = $("#product_name3").val();
            var product_id4 = $("#product_name4").val();
            var product_id5 = $("#product_name5").val();
            var qty1 = $("#qty1").val();
            var qty2 = $("#qty2").val();
            var qty3 = $("#qty3").val();
            var qty4 = $("#qty4").val();
            var qty5 = $("#qty5").val();            

            jQuery.ajax({
            type: "POST",
            url: "<?php echo admin_url('productset/total_product_set'); ?>",
            dataType: 'json',
            data: {pid1: product_id1, pid2: product_id2, pid3: product_id3, pid4:               product_id4, pid5: product_id5,
                qty1: qty1, qty2: qty2, qty3: qty3, qty4: qty4, qty5: qty5
            },
            success: function(res) {
                if (res)
                    {
                    // Show Entered Value
                    jQuery("div#result_total").html(res);
                    }
                }
            });
        });
    });
</script>
<?php

// load ra file head
$this->load->view('admin/product/headset', $this->data);
?>
<div class="line"></div>
<div class="wrapper">

    <!-- Form -->
    <form enctype="multipart/form-data" method="post" action="<?php echo admin_url('productset/add'); ?>" id="form" class="form">
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
                            <label for="param_product_name" class="formLeft">Tên set sản phẩm:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input type="text" _autocheck="true" id="param_product_name" name="name"></span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error"><?php echo form_error('name'); ?></div>
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

                        <!-- Chọn sản phẩm-->
		         
                 <div class="formRow">
                            <label for="param_content" class="formLeft">Chọn sản phẩm thêm vào set:</label>
                                <thead class="filter"><tr><td colspan="8">
                    <!--form method="get" action="" class="list_filter form"-->
                        <table width="80%" cellspacing="0" cellpadding="0" >
                        <tbody>
                            <tr>
                                <td style="width:100px;" class="label"><label for="filter_id">Tên sản phẩm:</label></td>
                                <td style="width:355px;" class="item">
                                <select name="product_name1" id ="product_name1" style="width:355px;">
                                    <!--  hien thi toan bo san pham co trong DB -->
                                    <?php foreach ($product_list as $row): ?>
                                    <option value="<?= $row->product_id?>"><?= $row->name?></option>
                                    <?php endforeach; ?>
                                </select>
                                 <!--input type="text" id="text-search" value="<?php// echo isset($key) ? $key : '' ?>" name="key-search"  placeholder="Tìm kiếm sản phẩm..." >
                                     <input style="color: black;" type="text" aria-haspopup="true" aria-autocomplete="list" value="<?php //echo isset($key) ? $key : '' ?>" role="textbox" autocomplete="off" class="input ui-autocomplete-input" placeholder="Tìm kiếm sản phẩm..."  name="key-search" id="text-search">
                        <button type="submit" name="but" id="but" value="" class="btn-search"><span class="flaticon-magnifying-glass34"></span></button-->

                                </td>
                               
                                <td style="width:10px;" class="label"></td>
                                <td style="width:80px;" class="label"><label for="filter_id">Số lượng</label></td>
                                <td style="width:155px;" class="item">    
                                <input type="number" step="1" min="1" max="" name="qty" id ="qty1" value="1" title="Qty" class="input-text qty text" size="4" style="width:55px; height: 35px">
                                
                                </td>

                            </tr>
                            <br />
                            <tr>
                                <td style="width:100px;" class="label"><label for="filter_id">Tên sản phẩm:</label></td>
                                <td style="width:355px;" class="item">
                                <select name="product_name2" id ="product_name2" style="width:355px;">
                                    <!--  hien thi toan bo san pham co trong DB-->
                                    <?php foreach ($product_list as $row): ?>
                                    <option value="<?= $row->product_id?>"><?= $row->name?></option>
                                    <?php endforeach; ?>
                                </select>
                                </td>

                                <td style="width:10px;" class="label"></td>
                                <td style="width:80px;" class="label"><label for="filter_id">Số lượng</label></td>
                                <td style="width:155px;" class="item">    
                                <input type="number" step="1" min="1" max="" name="qty" value="1" title="Qty"  id ="qty2" class="input-text qty text" size="4" style="width:55px; height: 35px">

                                </td>
                                </tr>
                                <br />
                                <tr>
                                    <td style="width:100px;" class="label"><label for="filter_id">Tên sản phẩm:</label></td>
                                    <td style="width:355px;" class="item">
                                    <select name="product_name3" id="product_name3" style="width:355px;">
                                    <!-- hien thi toan bo san pham co trong DB -->
                                    <?php foreach ($product_list as $row): ?>
                                    <option value="<?= $row->product_id?>"><?= $row->name?></option>
                                    <?php endforeach; ?>
                                    </select>
                                    </td>

                                    <td style="width:10px;" class="label"></td>
                                    <td style="width:80px;" class="label"><label for="filter_id">Số lượng</label></td>
                                    <td style="width:155px;" class="item">    
                                    <input type="number" step="1" min="1" max="" name="qty" value="1" id ="qty3" title="Qty" class="input-text qty text" size="4" style="width:55px; height: 35px">

                                    </td>

                                    </tr>
                                    <br />
                                    <tr>
                                        <td style="width:100px;" class="label"><label for="filter_id">Tên sản phẩm:</label></td>
                                        <td style="width:355px;" class="item">
                                        <select name="product_name4" id="product_name4" style="width:355px;">
                                        <!-- hien thi toan bo san pham co trong DB -->
                                        <?php foreach ($product_list as $row): ?>
                                        <option value="<?= $row->product_id?>"><?= $row->name?></option>
                                        <?php endforeach; ?>
                                    </select>
                                        </td>

                                        <td style="width:10px;" class="label"></td>
                                        <td style="width:80px;" class="label"><label for="filter_id">Số lượng</label></td>
                                        <td style="width:155px;" class="item">    
                                        <input type="number" step="1" min="1" max="" name="qty" value="1"  id ="qty4" title="Qty" class="input-text qty text" size="4" style="width:55px; height: 35px">

                                        </td>

                                        </tr>
                                        <br />
                                        <tr>
                                            <td style="width:100px;" class="label"><label for="filter_id">Tên sản phẩm:</label></td>
                                            <td style="width:355px;" class="item">
                                            <select name="product_name5" id ="product_name5" style="width:355px;">
                                            <!--hien thi danh sach san pham -->
                                            <?php foreach ($product_list as $row): ?>
                                            <option value="<?= $row->product_id?>"><?= $row->name?></option>
                                            <?php endforeach; ?>
                                        </select>
                                            </td>

                                            <td style="width:10px;" class="label"></td>
                                            <td style="width:80px;" class="label"><label for="filter_id">Số lượng</label></td>
                                            <td style="width:155px;" class="item">    
                                            <input type="number" step="1" min="1" max="" name="qty" value="1"  id ="qty5" title="Qty" class="input-text qty text" size="4" style="width:55px; height: 35px">

                                            </td>

                                            </tr>
                                            
                                               
                            
                            </tbody></table>
                            <!--/form-->
                        </td></tr></thead>
                                        
                        <button value="Thêm" class="button blueB" id="add_product">Thêm </button>
                        
                        <input type="reset"  value="Xóa" class="basic">
                                
                            <div class="clear"></div>
                        </div>			
                        <div class="formRow">
                            <label for="param_price" class="formLeft">
                                Tổng tiền :
                                <span class="req">*</span>
                            </label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <!--input type="text" _autocheck="true" class="format_number" id="param_price" style="width:200px" name="price"-->
                                    <div id='result_total' class="format_number" style = "color: red ; font-size: 20px;"> </div>
                                </span>
                                
                            </div>
                            
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                        </div>			
                        <div class="formRow">
                            
                            <label for="param_price" class="formLeft">
                                Thiết lập giá cho set:
                                <span class="req">*</span>
                            </label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" _autocheck="true" class="format_number" id="price" style="width:200px" name="price">
                                    <img src="<?php echo public_url(); ?>/admin/crown/images/icons/notifications/information.png" style="margin-bottom:-8px" title="Thiết lập giá cho set sản phẩm vừa tạo" class="tipS">
                                </span>
                                
                            </div>
                        <div class="formRow hide"></div>
                    </div>

                </div><!-- End tab_container-->

                <div class="formSubmit">
                    <input type="submit" class="button blueB" id ="submit" value="Thêm mới">
                    <input type="reset" class="basic" onclick="window.location.href = '<?php echo admin_url('productset'); ?>'; " value="Hủy bỏ">
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
   
</div>
