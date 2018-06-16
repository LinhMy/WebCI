<link rel="stylesheet" href="<?php echo public_url()?>/js/jquery/autocomplete/css/smoothness/jquery-ui-1.8.16.custom.css" type="text/css">
<script src="<?php echo public_url()?>/js/jquery/autocomplete/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".product_name").live("change",function(event) {            
            event.preventDefault();  
            var product_id =  []; 
            var qty=[];         
           // $(".selectproduct").insertBefore($(".insertproduct"));
           for (i = 0; i <  $(".selectproduct").length; i++) { 
               product_id.push($("[name*=product_name]").eq(i).val());
               qty.push($("[name*=qty]").eq(i).val());
            }          

            jQuery.ajax({
            type: "POST",
            url: "<?php echo admin_url('productset/total_product_set'); ?>",
            dataType: 'text',
            data: { product_id :product_id, qty:qty },
            success: function(res) {
                if (res)
                    {
                    // hien thi du kieu tra ve
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
        $(".removeproduct").live("click",function(){
            event.preventDefault();         
            var index = $( ".removeproduct" ).index( this ); 
            $(".selectproduct").get(index).remove();
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

                        <!--div class="formRow">
                            <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                            <div class="formRight">
                                <input type="file" name="image" id="image" >

                            </div>
                            <div class="clear"></div>
                        </div-->
                        <!-- upload nhieu hinh anh-->
                        <div class="formRow">
                            <label class="formLeft">Hình ảnh kèm theo:<span class="req">*</span></label>
                            <div class="formRight">
                                <input type="file" name="image_list[]"   multiple="multiple" >

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
                                <button value="Thêm" class="button blueB" id="add_product">
                                    <img src="<?php echo public_url(); ?>/admin/images/icons/color/plus.png" style="margin-bottom:-3px" >
                                    Thêm 
                                </button>                       
                                
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
                                <!--input type="reset"  value="Xóa" class="removeproduct"-->
                                <img src="<?php echo public_url(); ?>/admin/images/icons/color/del.png" style="margin-bottom:-3px" class="removeproduct" name ="removeproduct[]">
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
