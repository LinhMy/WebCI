<link rel="stylesheet" href="<?php echo public_url()?>/js/jquery/autocomplete/css/smoothness/jquery-ui-1.8.16.custom.css" type="text/css">
<script src="<?php echo public_url()?>/js/jquery/autocomplete/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".product_name").change(function(event) {
            event.preventDefault();  
           /* var product_id = new [];          
           // $(".selectproduct").insertBefore($(".insertproduct"));
           for (i = 0; i <  $(".selectproduct").length; i++) { 
               product_id.push($("[name*=product_name]").eq(i).val());
            }*/
            var product_id1 =  $("[name*=product_name]").eq(0).val();
            var product_id2 =  $("[name*=product_name]").eq(1).val();
            var product_id3 =  $("[name*=product_name]").eq(2).val();
            var product_id4 =  $("[name*=product_name]").eq(3).val();
            var product_id5 =  $("[name*=product_name]").eq(4).val();
            var qty1 = $("[name*=qty]").eq(0).val();
            var qty2 = $("[name*=qty]").eq(1).val();
            var qty3 = $("[name*=qty]").eq(2).val();
            var qty4 = $("[name*=qty]").eq(3).val();
            var qty5 = $("[name*=qty]").eq(4).val();           

            jQuery.ajax({
            type: "POST",
            url: "<?php echo admin_url('productset/total_product_set'); ?>",
            dataType: 'json',
            data: { pid1: product_id1, pid2: product_id2, pid3: product_id3, pid4:               product_id4, pid5: product_id5,
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
        $("#add_product").click(function(){
            event.preventDefault();            
           // $(".selectproduct").clone().insertBefore($(".insertproduct"));
           $(".selectproduct:first").clone().appendTo($(".insertproduct"));
        });
        $(".removeproduct").click(function(){
            event.preventDefault();            
            $(".selectproduct:last").remove();
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
                                <span class="oneFour"><input type="number" id="param_quantity" name="quantity" step="1" min="1"  value="1" size="4" style="width:55px; height: 35px"></span>
                                <span class="autocheck" name="quantity_autocheck"></span>

                            </div>
                            <div class="clear"></div>
                        </div>

                        <!-- Chọn sản phẩm-->
		         
                 <div class="formRow">
                            Chọn sản phẩm thêm vào set:
                            <br />
                            <div>                                             
                                <button value="Thêm" class="button blueB" id="add_product">Thêm </button>                       
                                <input type="reset"  value="Xóa" class="removeproduct">
                            </div>
                            
                            <div class="selectproduct" name= "selectproduct[]">
                                Tên sản phẩm: 
                                <select class="product_name" name ="product_name[]" style="width:355px;" >
                                    <!--  hien thi toan bo san pham co trong DB -->
                                    <option value="" "selected" >-- Chọn sản phẩm --</option>                              
                                    <?php foreach ($product_list as $row): ?>
                                    <option value="<?= $row->product_id?>"><?= $row->name?></option>
                                    <?php endforeach; ?>
                                </select>
                               Số lượng: 
                                <input type="number" step="1" min="1" name="qty[]"  value="1" title="Qty"  size="4" style="width:55px; height: 35px"class ="product_name">
                            </div>
                            <div class="insertproduct">
                            </div>
                                
                           </div>
                            <div class="clear"></div>
                        </div>			
                        <div class="formRow">
                            <label for="param_price" class="formLeft">
                                Tổng tiền :
                                <span class="req">*</span>
                            </label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <div id='result_total' class="format_number" style = "color: red ; font-size: 20px;"> </div>
                                </span>
                                
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
