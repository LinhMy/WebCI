
<script type="text/javascript" src="<?php echo public_url(); ?>/site/js/view_blog.js" type="text/javascript"></script>

<div class="tab-catalog" style="width: 1340px; margin: 0px auto; height: auto;">
    <div class="container" style="border-bottom: 2px solid #003399;">
    <section>
				<!--__--__--__-- A R T I C L E S --__--__--__--__-->
				<div >				
					<article>
						<h1><a href="singlepost.html"><?php echo $post->title?></a></h1>
						<h4>Đăng bởi: <a href="#">Admin</a> <?=$post->create_date?></h4>
						<img  src="<?php echo  base_url('upload/post/'.$post->image); ?>" alt="<?=$post->title ?>" alt="">
                        <div><?= $post->content ?> </div>
					</article>
				</div>
				
	</section>
	<div class="w3-container w3-white">
          <p>            
            <?php foreach ($tag_list as $rows) {?>
            <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">#<?=$rows->name?></span>
            <?php }?>
           </p>
        </div>
</div>

<!-- Footer -->
<footer class="w3-container w3-dark-grey" style="padding:32px">
<?php $a =$post->post_id;?>
  <a href="<?php echo  base_url('/blog/view_post/'.($a-1)); ?>" class="w3-button w3-black w3-padding-large w3-margin-bottom">Bài phía trước</a>
  <a href="<?php echo  base_url('/blog/view_post/'.($a+1)); ?>" class="w3-button w3-black w3-padding-large w3-margin-bottom">Bài tiếp theo</a>
  </footer>
</div>