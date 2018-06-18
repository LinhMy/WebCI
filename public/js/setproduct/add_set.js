 $(document).ready(function() {
        $(".product_name").live("change",function(event) {            
            event.preventDefault();  
            var product_id =  []; 
            var qty=[];         
           // $(".selectproduct").insertBefore($(".insertproduct"));
           for (i = 0; i <  $(".selectproduct").length; i++) { 
               product_id.push($("[name*=product_name]").eq(i).val());
               qty.push($("[name*=qty]").eq(i).val());
            }          

            jQuery.ajax({
            type: "POST",
            url: "http://localhost/WebCI/admin/productset/total_product_set",
            dataType: 'json',
            data: { product_id :product_id, qty:qty },
            success: function(res) {
                if (res)
                    {
                    // hien thi du kieu tra ve
                    jQuery("div#result_total").html(res);                   
                    }
                }
            });
        });
        $("#add_product").click(function(){
            event.preventDefault();            
           // $(".selectproduct").clone().insertBefore($(".insertproduct"));
           $(".selectproduct:first").clone().appendTo($(".insertproduct"));
        });
        $(".removeproduct").live("click",function(){
            event.preventDefault();         
            var index = $( ".removeproduct" ).index( this ); 
            $(".selectproduct").get(index).remove();
        });
		 document.getElementById('check').onclick = function(e){
                if (this.checked){
                 this.value="1";
                }
                else{
                this.value="0";
                }
            };
    });