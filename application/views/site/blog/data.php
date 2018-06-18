<?php foreach ($post_list as $item) {
       # code...
   ?>
      <!-- Blog entry -->
      <div class="w3-container w3-white w3-margin w3-padding-large" id ="show-view">
        <div class="w3-center">
          <a href="<?php echo  base_url('/blog/view_post/'.$item->post_id); ?>"><h3><?=$item->title ?></h3></a>
          <h5><?php //echo $item->post_by?> <span class="w3-opacity"><?=$item->create_date ?></span></h5>
        </div>

        <div class="w3-justify">
          <a href="<?php echo  base_url('/blog/view_post/'.$item->post_id); ?>">
            <img src="<?php echo  base_url('upload/post/'.$item->image); ?>" alt="<?=$item->title ?>" style="width:100%" class="w3-padding-16">
          </a>
          <p><strong></strong><?=$item->summary ?></p>
          <p class="w3-left"><button class="w3-button w3-white w3-border" onclick="likeFunction(this)"><b><i class="fa fa-thumbs-up"></i> Thích</b></button></p>
            <p class="w3-right">
            <a href="<?php echo  base_url('/blog/view_post/'.$item->post_id); ?>">
              <button class="w3-button w3-black" >
                <b> Đọc tiếp </b><span class="w3-tag w3-white">>></span>
              </button>
            <a/>
            </p>
          <p class="w3-clear"></p>
          <div class="w3-row w3-margin-bottom" id="demo1" style="display:none">
            <hr>
          </div>
        </div>        
        <hr>
      </div>
    <?php }?>