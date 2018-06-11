<?php
// load ra file head
$this->load->view('admin/blog/head', $this->data);
?>
<div class="line"></div>

<div class="wrapper">

    <!-- Form -->
    <form enctype="multipart/form-data" method="post" action="<?php echo admin_url('blog/posting'); ?>" id="form" class="form">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img class="titleIcon" src="<?php echo public_url(); ?>/admin/images/icons/dark/add.png">
                    <h6>Cập nhật tin tức mới</h6>
                </div>

                <ul class="tabs">
                    <li><a href="#tab1">Thông tin chung</a></li>
                </ul>

                <div class="tab_container">
                    <div class="tab_content pd0" id="tab1">
                        <div class="formRow">
                            <label for="param_title" class="formLeft">Tiêu đề:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input type="text" _autocheck="true" id="param_title" name="title"></span>
                                <span class="autocheck" name="title_autocheck"></span>
                                <div class="clear error" name="tile_error"><?php echo form_error('title'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_content" class="formLeft">Nội dung chính:</label>
                            <div class="formRight">
                                <span class="oneTwo"><textarea cols="" rows="7" id="param_content" name="summary"></textarea></span>
                                <span class="autocheck" name="content_autocheck"></span>

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
                            <label for="param_content" class="formLeft">Nội dung bài viết:</label>
                            <div class="formRight">
                                <span class=""><textarea cols="" rows="50" id="param_content" name="content"></textarea></span>
                                <span class="autocheck" name="content_autocheck"></span>

                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- tu khoa tim kiem-->
                        <div class="formRow">
                            <label for="param_content" class="formLeft">Từ khóa tìm kiếm:</label>
                            <div class="formRight">
                                <span class="oneTwo"><textarea cols="" rows="2" id="param_content" name="key"></textarea></span>
                                <span class="autocheck" name="content_autocheck"></span>

                            </div>
                            <div class="clear"></div>
                        </div>
                        					         <div class="formRow hide"></div>
                    </div>


                </div><!-- End tab_container-->

                <div class="formSubmit">
                    <input type="submit" class="redB" value="Thêm mới">
                    <input type="reset" class="basic" value="Hủy bỏ">
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>