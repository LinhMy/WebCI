<div class="rating" title = "Đánh giá sản phẩm" >
    <?php  for ($i=5; $i >=1 ; $i--) { ?>
    <input type="radio" id="star<?php echo $i?>" name="rating" checked="<?php echo ($i<=$data_vote)?true:false ?>" value="<?php echo $i?>" /><label class = "full" for="star<?php echo $i?>" title="Awesome-stars"></label>
    <?php }?>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    // Check Radio-box
    //$(".rating input:radio").attr("checked", false);

    $('.rating input').click(function () {
        $(".rating span").removeClass('checked');
        $(this).parent().addClass('checked');

    });
        var userRating =1;
        $('input:radio').change(function(event) {
            userRating=this.value;
        });
        $(".votebtn").click(function(event) {
        event.preventDefault();
        var product_id = $("#product-id").val();
        var type = $("#type-vote").val();
        var comment1 = $("input#comment").val();
        var base_url = "<?php echo base_url();?>"
		//alert(userRating);
          $.ajax({
              type: 'POST',
              url: base_url+'product/rating',
              data: {
                  product_id: product_id,
                  userRating: userRating,
                  comment: comment1,
                  type:type
              },
              dataType: 'json',
              success: function(data) {
                  // code here
                  //console.log(data);
                  jQuery("#vote").html(data);
                  jQuery('#comment').val("");
                  $("#comment-vote:last").clone().appendTo($("#insertcomment"));
                  $("#view-comment:last").text(comment1);
                  $("#created-date:last").text("<?php echo date('Y-m-d h:i:s')?>");
				  //$("input#comment").clone().appendTo($("#insertcomment"))
              },
              error: function() {
              }
          });
    });
});
</script>
<style>
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating {
  border: none;
  float: left;
}

.rating > input { display: none; }
.rating > label:before {
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before {
  content: "\f089";
  position: absolute;
}

.rating > label {
  color: #ddd;
 float: right;
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  }
</style>
