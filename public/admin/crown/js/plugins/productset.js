 $(document).ready(function() {
        $(".product_name").change(function(event) {
            event.preventDefault();
            var product_id1 = $("#product_name1").val();
            var product_id2 = $("#product_name2").val();
            var product_id3 = $("#product_name3").val();
            var product_id4 = $("#product_name4").val();
            var product_id5 = $("#product_name5").val();
            var qty1 = $("#qty1").val();
            var qty2 = $("#qty2").val();
            var qty3 = $("#qty3").val();
            var qty4 = $("#qty4").val();
            var qty5 = $("#qty5").val();            

            jQuery.ajax({
            type: "POST",
            url: "<?php echo admin_url('productset/total_product_set'); ?>",
            dataType: 'json',
            data: {pid1: product_id1 ,pid2: product_id2, pid3: product_id3, pid4:               product_id4, pid5: product_id5, prod :pro,
                qty1: qty1, qty2: qty2, qty3: qty3, qty4: qty4, qty5: qty5
            },
            success: function(res) {
                if (res)
                    {
                    // Show Entered Value
                    jQuery("div#result_total").html(res);
                    }
                }
            });
        });
    });