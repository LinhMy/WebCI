
<div class="tab-catalog" style="width: 1340px; margin: 0px auto; height: auto;">
    <div class="container" style="border-bottom: 2px solid #003399;">

        <div class="cell">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3779.602355748115!2d105.68745431463257!3d18.68183168731527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3139cddfa28a58d5%3A0x997b483b6a439dd!2zMTAgRHV5IFTDom4sIEjGsG5nIFBow7pjLCBUaMOgbmggcGjhu5EgVmluaCwgTmdo4buHIEFuLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1527125511854" width="635" height="400" frameborder="0" style="border:1" allowfullscreen></iframe>

        </div>
        <div class="row" >
            <br />
            <h2 class="fa fa-spinner"> Thông tin shop <i>NatulieShop</i></h2><br />
            <h3 class="fa fa-facebook-square"> facebook: https://www.facebook.com</h3><br />
            <h3 class="fa fa-check-square"> Chuyên cung cấp túi xách xỉ và lẻ, mỹ phẩm xuất xứ thailand 100%.
            <br /> Giá cả và chất lượng luôn cam kết tốt nhất cho khách hàng</h3><br />
            <i class="fa fa-volume-control-phone"> Điện thoại: 0905770963 - 01674717919</i><br />
            <img src="<?php echo base_url('upload/logos/2.png') ?>">
        </div>


        <div class="contact" >
            <form action="" method="POST">
                <input type="text" id="name" name="name" placeholder="Tên của bạn...">
                <input type="text" id="email" name="mailname" placeholder="Địa chỉ mail của bạn..">
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px" rows="5"></textarea><br>
                <input type="submit" name = "submit" value="Gửi phản hồi của bạn cho Shop">

            </form>
        </div>
        <div class="question">
            <br />
            <h4>Câu hỏi thường gặp:</h4>
            <br />
            <a href="">Làm thế nào để có thể biết sản phẩm nào đang được khuyến mại hoặc Shop đang có chương trình ưu đãi nào?</a>
            <br />
            <a href="">Phí vận chuyển được tính như thế nào?</a>
            <br />
            <a href="">Làm thế nào để mua hàng?</a>
        </div>

        </div>
</div>



<style>
    div.row h2{
        font-size: 15px;
        border-bottom: 2px solid #003399;
        /*width: 200px;*/
        padding-bottom: 4px;
        font-weight: 800;
        color: #000;
    }
    div.row h3{
        font-size: 14px;
        color: #000;
        padding-left: 5px;
    }
    div.row i{
        color: #000;
        padding: 5px;

    }
    div.cell {

       /* border-bottom: 2px solid #003399;*/
        width: 640px;
        padding-bottom: 4px;
        font-weight: 800;
        color: #000;
        float: left;
    }
    div.row {

       /*border-bottom: 2px solid #003399;*/
        padding-bottom: 4px;
        font-weight: 800;
        color: #000;
        float: right;
        
    }
    .question {

       /* border-bottom: 2px solid #003399;*/
            
        margin-left: 300px;
        margin-top: -434px;
        padding-bottom: 4px;
        font-weight: 800;
        color: #000;
        float: right;
    }
    div.contact {

        /*border-bottom: 2px solid #003399;*/
        width: 800px;
        padding-bottom: 4px;
        font-weight: 800;
        color: #000;
        float: left;
    }
    input[type=text], select, textarea {
        width: 50%; /* Full width */
        padding: 12px; /* Some padding */
        border: 1px solid #ccc; /* Gray border */
        border-radius: 4px; /* Rounded borders */
        box-sizing: border-box; /* Make sure that padding and width stays in place */
        margin-top: 6px; /* Add a top margin */
        margin-bottom: 16px; /* Bottom margin */
        resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
    }

    /* Style the submit button with a specific background color etc */
    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    /* When moving the mouse over the submit button, add a darker green color */
    input[type=submit]:hover {
        background-color: #45a049;
    }

    /* Add a background color and some padding around the form */
   


</style>
<script type="text/javascript">
    $(document).ready(function(){
         document.getElementById("search_price").style.display = "none";
         document.getElementById("danhmuc").style.display ="none"   
    });

</script>