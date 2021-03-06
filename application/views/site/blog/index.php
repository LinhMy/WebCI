
<script type="text/javascript" src="<?php echo public_url(); ?>/js/blogsite.js"></script>
<div class="container">
<!--  -->
  <!-- Grid -->
  <div class="w3-row w3-padding w3-border">

    <!-- Blog entries -->
    <div class="w3-col l8 s12" id="post-data">
        <?php
          $this->load->view('site/blog/data', $post_list);
        ?>
    <!-- END BLOG ENTRIES -->
    <div class="ajax-load text-center" style="display:none">
      <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Đang tải thêm bài viết...</p>
    </div>
    <!--p ><button class="w3-button w3-orange"  id="loadMore"><b>Show more </b><span class="w3-tag w3-white">>></span></button></p-->
    </div>

    <!-- About/Information menu -->
    <div class="w3-col l4">
      <!-- About Card -->
      

      <!-- Posts -->
      <div class="w3-white">
        <div class="w3-container w3-padding w3-red " >
          <h4>Bài viết phổ biến</h4>
        </div>
        <ul class="w3-ul w3-hoverable w3-white">
        <?php foreach ($post_popular  as $row) {?>
          <li class="w3-padding-16">
          <a href="<?php echo  base_url('/blog/view_post/'.$row->post_id); ?>">
            <img src="<?php echo  base_url('upload/post/'.$row->image); ?>" alt="Image" class="w3-left w3-margin-right" style="width:50px">
            <span class="w3-large"><?=$row->title ?></span>
            <br>
            <span><?=$row->summary ?></span>
          </a>
          </li>
        <?php } ?>
        </ul>
      </div>
      <hr>

      

      <!-- Tags -->
      <div class="w3-white w3-margin">
        <div class="w3-container w3-padding w3-red">
          <h4>Tags</h4>
        </div>
        <div class="w3-container w3-white">
          <p>            
            <?php foreach ($tag_list as $rows) {?>
            <a href="<?php echo  base_url('/blog/post_tag/'.$rows->tag_id); ?>">
            <span class="w3-tag w3-light-grey w3-small w3-margin-bottom"><?=$rows->name?></span>
            <a/>
            <?php }?>
           </p>
        </div>
      </div>
      <hr>

      <!-- Inspiration -->
      

      <div class="w3-white w3-margin">
        <div class="w3-container w3-padding w3-red">
          <h4>Liên hệ với chúng tôi</h4>
        </div>
        <div class="w3-container w3-xlarge w3-padding">
          <i class="fa fa-facebook-official w3-hover-opacity"></i>
          <i class="fa fa-instagram w3-hover-opacity"></i>
          <i class="fa fa-twitter w3-hover-opacity"></i>
          <i class="fa fa-linkedin w3-hover-opacity"></i>
        </div>
      </div>
      <hr>    
     

    <!-- END About/Intro Menu -->
    </div>

  <!-- END GRID -->
  </div>

<!-- END content -->
</div>



<!-- Footer -->
  <footer class="w3-container w3-dark-grey" style="padding:32px" id="footerid">
    <a href="#top" class="w3-button w3-black w3-padding-large w3-margin-bottom"><i class="fa fa-arrow-up w3-margin-right"></i>Lên đầu trang</a>
  </footer>
</div>
