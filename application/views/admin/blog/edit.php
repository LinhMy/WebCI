<?php
// load ra file head
$this->load->view('admin/blog/head', $this->data);
?>
<div class="line"></div>

<div class="wrapper">

    <!-- Form -->
    <form enctype="multipart/form-data" method="post"  id="form" class="form">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img class="titleIcon" src="<?php echo public_url(); ?>/admin/images/icons/dark/add.png">
                    <h6>Chỉnh sửa tin tức đã đăng</h6>
                </div>

                <ul class="tabs">
                    <li><a href="#tab1">Thông tin chung</a></li>
                </ul>

                <div class="tab_container">
                    <div class="tab_content pd0" id="tab1">
                        <div class="formRow">
                            <label for="param_title" class="formLeft">Tiêu đề:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input type="text" _autocheck="true" id="param_title" name="title" value ="<?php echo $post_info->title; ?>"></span>
                                <span class="autocheck" name="title_autocheck"></span>
                                <div class="clear error" name="tile_error"><?php echo form_error('title'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_content" class="formLeft">Nội dung chính:</label>
                            <div class="formRight">
                                <span class="oneTwo"><textarea  rows="7" id="param_content" name="summary"><?php echo $post_info->summary ?></textarea></span>
                                <span class="autocheck" name="content_autocheck"></span>

                            </div>
                            <div class="clear"></div>
                        </div>	
                        <!-- tu khoa tim kiem-->
                        <div class="formRow">
                            <label for="param_content" class="formLeft">Từ khóa tìm kiếm:</label>
                            <div class="formRight" style="height:170px">
                                <!--span class="oneTwo"><textarea cols="" rows="4" id="param_content" name="summary"></textarea></span>
                                <span class="autocheck" name="content_autocheck"></span-->
                                <dl class="dropdown">                                    
                                    <dt>
                                    <a href="">
                                        <span class="hida"></span>    
                                        <p class="multiSel" ><?php foreach ($tag_post as $item) {echo $item->name.",";}?></p>  
                                    </a>
                                    </dt>

                                    <dd>
                                        <div class="mutliSelect">
                                            <ul>
                                            <?php foreach ($tag_list as $tag) {?>
                                                <li>
                                                    <input type="checkbox" name = "tag-id[]" value="<?=$tag->tag_id ;?>" class="<?=$tag->name ;?>" <?php foreach ($tag_post as $item) {echo ($item->tag_id==$tag->tag_id)?"checked":"";}
                                                    ?>/><?=$tag->name ;?>
                                                </li>
                                            <?php }?>
                                            </ul>
                                        </div>
                                    </dd>
                                    
                                    </dl>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                            <div class="formRight">
                                <input type="file" name="image" id="image">
                                <img src="<?php echo base_url('upload/post/'.$post_info->image); ?>" style="width: 100px; height: 70px;">

                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- Price -->
                       

                        <div class="formRow">
                            <label for="param_content" class="formLeft">Nội dung bài viết:</label>
                            <div class="formRight">
                                <span class=""><textarea cols="" rows="50" id="content-posting" name="content"><?php echo $post_info->content ?></textarea></span>
                                <span class="autocheck" name="content_autocheck"></span>

                            </div>
                            <div class="clear"></div>
                        </div>					         
                        <div class="formRow hide"></div>
                    </div>

                </div><!-- End tab_container-->

                <div class="formSubmit">
                    <input type="submit" class="redB" value="Chỉnh sửa">
                    <input type="reset" class="basic" value="Hủy bỏ">
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>

<script>
$(".dropdown dt a").on('click', function() {
    event.preventDefault(); 
  $(".dropdown dd ul").slideToggle('fast');
});

$(".dropdown dd ul li a").on('click', function() {
    event.preventDefault(); 
  $(".dropdown dd ul").hide();
});

function getSelectedValue(id) {
  return $("#" + id).find("dt a span.value").html();
};

$(document).bind('click', function(e) {
  var $clicked = $(e.target);
  if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
});

$('.mutliSelect input[type="checkbox"]').on('click', function() {

  var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').attr("class");
    title = $(this).attr("class") + ",";

  if ($(this).is(':checked')) {
    var html = '<span title="' + title + '">' + title + '</span>';
    $('.multiSel').append(html);
    $(".hida").hide();
  } else {
    $('span[title="' + title + '"]').remove();
    var ret = $(".hida");
    $('.dropdown dt a').append(ret);

  }
});
</script>