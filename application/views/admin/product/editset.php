<script type="text/javascript">
    $(document).ready(function() {
        $(".product_name").change(function(event) {
            event.preventDefault();
            var product_id =  []; 
            var qty=[];         
           for (i = 0; i <  $("[name*=product_name]").length; i++) { 
               product_id.push($("[name*=product_name]").eq(i).val());
               qty.push($("[name*=qty]").eq(i).val());
            }           

            jQuery.ajax({
            type: "POST",
            url: "<?php echo admin_url('productset/total_product_set'); ?>",
            dataType: 'text',
            data: { product_id :product_id, qty:qty
            },
            success: function(res) {
                if (res)
                    {
                    // Hien thi tong tien tra ve
                    jQuery("div#result_total").html(res);
                    }
                }
            });
        });
        $("#add_product").click(function(){
            event.preventDefault();            
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
                                <span class="autocheck" name="name_autocheck"></span>
                                
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                            <div class="formRight">
                                <input type="file" name="image" id="image">
                                <img src="<?php echo base_url('upload/set/'.$set_info->image); ?>" style="width: 100px; height: 70px;">

                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- Price -->
                       

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
                
                <div class="formRow">
                            Các sản phẩm có trong set:
                            <br />
                            <button value="Thêm" class="button blueB" id="add_product">
                                <img src="<?php echo public_url(); ?>/admin/images/icons/color/plus.png" style="margin-bottom:-3px" >
                                    Thêm  
                            </button>                       
                            
                    <!--hien thi san pham co trong set-->
                            <?php  foreach ($product_set_item as $item) {?>
                                <div class="selectproduct">                                
                                    Tên sản phẩm:
                                    <select class="product_name" name ="product_name[]" style="width:355px;">
                                        <!--  hien thi toan bo san pham co trong DB -->
                                        <option value="" "selected" >-- Chọn sản phẩm --</option>     
                                        <?php foreach ($product_list as $row): ?>
                                        <option value="<?= $row->product_id?>" <?php echo (($row->product_id==$item->product_id)?"selected":"" ); ?>><?= $row->name?></option>
                                        <?php endforeach; ?>
                                    </select>                                
                                     Số lượng:  
                                    <input type="number" step="1" min="1" name="qty[]"  value="<?php echo number_format($item->qty) ?>" title="Qty"  size="4" style="width:55px; height: 35px"class ="product_name">
                                    <img src="<?php echo public_url(); ?>/admin/images/icons/color/del.png" style="margin-bottom:-3px" class="removeproduct" name="removeproduct[]">
                                    
                                <br />   
                                </div>    
                            <?php } ?>  
                            <div class="insertproduct"> 
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
                                    <!--input type="text" _autocheck="true" class="format_number" id="param_price" style="width:200px" name="price"-->
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
                                    <input type="text" _autocheck="true" class="format_number" id="price" style="width:200px" name="price" value = "<?php echo $set_info->price;?>">
                                    <img src="<?php echo public_url(); ?>/admin/crown/images/icons/notifications/information.png" style="margin-bottom:-8px" title="Thiết lập giá cho set sản phẩm vừa tạo" class="tipS">
                                </span>
                                
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