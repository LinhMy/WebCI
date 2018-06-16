<script type="text/javascript">
    $(document).ready(function(){
        document.getElementById("search_price").style.display = "none";
        document.getElementById("danhmuc").style.display ="none";
        document.getElementById("footer-site").style.display ="none";
        document.getElementById("footer-site1").style.display ="none";
       /* size_li = $("div#show-view").size();    
        x=3;
        $('div#show-view').hide();
        $('div#show-view:lt('+x+')').show();
        $('#loadMore').click(function () {
            x= (x+3 <= size_li) ? x+3 : size_li;
            $('div#show-view:lt('+x+')').show();
        });*/
    });

</script>
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
      <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
    </div>
    <!--p ><button class="w3-button w3-orange"  id="loadMore"><b>Show more </b><span class="w3-tag w3-white">>></span></button></p-->
    </div>

    <!-- About/Information menu -->
    <div class="w3-col l4">
      <!-- About Card -->
      

      <!-- Posts -->
      <div class="w3-white w3-margin">
        <div class="w3-container w3-padding w3-red " >
          <h4>Bài viết phổ biến</h4>
        </div>
        <ul class="w3-ul w3-hoverable w3-white">
        <?php foreach ($post_popular  as $row) {?>
          <li class="w3-padding-16">
            <img src="<?php echo  base_url('upload/post/'.$row->image); ?>" alt="Image" class="w3-left w3-margin-right" style="width:50px">
            <span class="w3-large"><?=$row->title ?></span>
            <br>
            <span><?=$row->summary ?></span>
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
            <span class="w3-tag w3-light-grey w3-small w3-margin-bottom"><?=$rows->name?></span>
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
  <a href="#" class="w3-button w3-black w3-padding-large w3-margin-bottom"><i class="fa fa-arrow-up w3-margin-right"></i>Lên đầu trang</a>
</footer>

<script>
// Toggle between hiding and showing blog replies/comments

document.getElementById("myBtn").click();
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

function likeFunction(x) {
    x.style.fontWeight = "bold";
    x.innerHTML = "✓ Đã thích";
}
</script>

</div>
<script type="text/javascript">
	var page = 0;
	$(window).scroll(function() {
	    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
	        page++;
	        loadMoreData(page);
	    }
	});


	function loadMoreData(page){
	  $.ajax(
	        {
	            url: '?page=' + page,
	            type: "get",
	            beforeSend: function()
	            {
	                $('.ajax-load').show();
	            }
	        })
	        .done(function(data)
	        {
	            if(data == " "){
	                $('.ajax-load').html("No more records found");
	                return;
	            }
	            $('.ajax-load').hide();
	            $("#post-data").append(data);
	        })
	        
	}
</script>