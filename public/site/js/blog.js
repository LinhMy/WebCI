
function likeFunction(x) {
    x.style.fontWeight = "bold";
    x.innerHTML = "✓ Đã thích";
}
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