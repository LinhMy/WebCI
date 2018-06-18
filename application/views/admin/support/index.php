<?php
// load ra file head
$this->load->view('admin/support/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>

     <div class="widget">
     <form  method="post" id="form" class="form" action=""  enctype="multipart/form-data">
        <fieldset>
          
                <ul class="tabs">
                    <li><a href="#tab1"  style="color:red">Thông tin về Shop</a></li>

                </ul>
                <?php// foreach ($shop_info as  $shop) {?>
                <div class="tab_container">
                    <div class="tab_content pd0" id="tab1">
                        <div class="formRow">
                            <label for="param_product_name" class="formLeft"><img src="<?php echo public_url(); ?>/admin/images/icons/color/info.png" style="margin-bottom:-3px" >		
                    	    Thông tin chung:<span class="req">*</span></label>
                            <div class="formRight">
                            <span class="oneTwo"><textarea cols="" rows="3" id="param_content" name="info_shop"><?=$shopinfo[0] ?></textarea></span>
                            <span class="autocheck" name="content_autocheck"></span>

                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label for="param_product_name" class="formLeft">
                            <img src="<?php echo public_url(); ?>/admin/images/icons/color/fb.png" style="margin-bottom:-3px" >
                    	       Facebook:<span class="req">*</span></label>
                            <div class="formRight">
                            <span class="oneTwo"><textarea cols="" rows="4" id="param_content" name="facebook"><?=$shopinfo[1] ?></textarea></span>
                                <span class="autocheck" name="content_autocheck"></span>
                         </div>
                            <div class="clear"></div>
                        </div>
                        
                        <div class="formRow">
                            <label for="param_product_name" class="formLeft"> 
                            <img src="<?php echo public_url(); ?>/admin/images/icons/color/star.png" style="margin-bottom:-3px" >  
                    	    
                            Thông điệp:<span class="req">*</span></label>
                            <div class="formRight">
                            <span class="oneTwo"><textarea cols="" rows="4" id="param_content" name="message"><?=$shopinfo[2] ?></textarea></span>
                            <span class="autocheck" name="content_autocheck"></span>

                        </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label for="param_product_name" class="formLeft">
                            <img src="<?php echo public_url(); ?>/admin/images/icons/color/user.png" style="margin-bottom:-3px" >
                    	    
                            Địa chỉ:<span class="req">*</span></label>
                            <div class="formRight">
                            <span class="oneTwo"><textarea cols="" rows="2" id="param_content" name="address"><?=$shopinfo[3]?></textarea></span>
                            <span class="autocheck" name="content_autocheck"></span>

                        </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label for="param_product_name" class="formLeft">
                            <img src="<?php echo public_url(); ?>/admin/images/icons/color/phone.png" style="margin-bottom:-3px" >
                            Điện thoại:<span class="req">*</span></label>
                            <div class="formRight">
                            <span class="oneTwo"><textarea cols="" rows="1" id="param_content" name="phone"><?=$shopinfo[4] ?> </textarea></span>
                            <span class="autocheck" name="content_autocheck"></span>

                        </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="formLeft">
                            <img src="<?php echo public_url(); ?>/admin/images/icons/color/plus.png" style="margin-bottom:-3px" >
                            Hình ảnh:<span class="req">*</span></label>
                            <div class="formRight">
                                <input type="file" name="image" id="image">
                                <img src="<?php echo base_url('upload/logos/'.$shopinfo[5]); ?>" style="width: 100px; height: 70px;">

                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow hide"></div>
                    </div>
                </div><!-- End tab_container-->
                <?php// } ?>
                <div class="formSubmit">
                    <input type="submit" class="redB" value="Cập nhật">
                    <!--input type="reset" class="basic" value="Hủy bỏ"-->
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
     </div>

    <div class="widget"  >
  <!-- table hien thi lay tu DB -->
  <fieldset>
          
                <ul class="tabs">
                    <li><a href="#tab1" style="color:red">Thắc mắc của khách hàng</a></li>

                </ul>
  <table class="table table-bordered table-hover table-list", border="1px solid #ddd"
            <thead>
                <tr>                    
                    <th class="w50">STT</th>
                    <th>Khách hàng</th>
                    <th>Email</th>
                    <th>Thắc mắc</th>
                    <th>Ngày</th>
                    <th>Đã trả lời</th>
                    <th>Trả lời</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contact_list as  $i =>$item) {
                	?>                    
                <tr>
                    <td><?=$i+1?></td>    
                    <td><?=$item->name?></td>
                    <td><?=$item->email?></td>
                    <td><?=$item->content?></td>
                    <td><?=$item->date_sent?></td>
                    <td><input type="checkbox" value="" class="reply" <?=(($item->reply==0)?"none": "checked")?>></td>
                    <td>
                    	<a href="<?php $base_url ?>/WebCI/admin/support/reply_contact/<?=$item->contact_id ?>" style="text-decoration: none">
                    	<input type="image" title ="Gửi phản hồi cho khách hàng" alt="Trả lời" id="image" src="http://icons.iconarchive.com/icons/seanau/email/256/Reply-icon.png" style="width:5%">  
                    	</a>
                    </td>
                </tr>
                <?php } ?>
                 
            </tbody>
        </table>
        </fieldset>

   </div>
  

</div>

<div class="clear mt30"></div>