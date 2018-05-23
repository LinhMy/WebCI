<?php
// load ra file head
$this->load->view('admin/category/head', $this->data);
?>
<div class="line"></div>

<div class="wrapper">

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
                            <label for="param_category_name" class="formLeft">Tên Danh Mục:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input type="text" _autocheck="true" id="param_category_name" name="category_name"></span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error"><?php echo form_error('category_name'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft" for="param_name">Danh mục cha: </label>
                            <div class="formRight">
                        <span class="oneTwo">
                            <select name="parent_category_id" id="param_parent_id" _autocheck="true">
                                <option value="0">Là danh mục cha: </option>
                                <?php foreach ($list as $row): ?>
                                    <option value="<?php echo $row->category_id ?>"><?php echo $row->category_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

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