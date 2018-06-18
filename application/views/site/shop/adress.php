
<div class="tab-catalog" style="width: 1340px; margin: 0px auto; height: auto;">
    <div class="container" style="border-bottom: 2px solid #003399;">

        <div class="cell">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3779.602355748115!2d105.68745431463257!3d18.68183168731527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3139cddfa28a58d5%3A0x997b483b6a439dd!2zMTAgRHV5IFTDom4sIEjGsG5nIFBow7pjLCBUaMOgbmggcGjhu5EgVmluaCwgTmdo4buHIEFuLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1527125511854" width="635" height="400" frameborder="0" style="border:1" allowfullscreen></iframe>

        </div>
        <div class="row" >
            <br />    
            <?php ?>
            <h2 class="fa fa-spinner"> Thông tin shop <i><?=$shopinfo[0] ?></i></h2><br />
            <h3 class="fa fa-facebook-square"> Facebook:<a href="<?=$shopinfo[1] ?>"><?=$shopinfo[1] ?></a></h3><br />
            <h3 class="fa fa-check-square"> <?=$shopinfo[2] ?></h3><br />
            <i class="fa fa-volume-control-phone"> Điện thoại:<?=$shopinfo[4] ?></i><br />
            <?php $url ="upload/logos/".$shopinfo[5] ?>
            <img src="<?php echo base_url($url) ?>">
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
            <div id="myBtn" style = "background: white; color: red" title="Click vào để xem câu trả lời">Làm thế nào để có thể biết sản phẩm nào đang được khuyến mại ?</div>
            <br />
            <div id ="myBtn2" style = "background: white; color: red" title="Click vào để xem câu trả lời">Phí vận chuyển được tính như thế nào?</div>
            <br />
            <div id = "myBtn3" style = "background: white; color: red" title="Click vào để xem câu trả lời">Làm thế nào để mua hàng?</div>
            <br />
            <div id = "myBtn4" style = "background: white; color: red" title="Click vào để xem câu trả lời">Muốn hủy đơn hàng đã đặt thì phải làm như thế nào?</div>
            <br />
            <div id = "myBtn5" style = "background: white; color: red" title="Click vào để xem câu trả lời">Làm thế nào để đăng kí thành viên của Shop?</div>
            <br />
        </div>

        </div>
        <div id="myModal" class="modal">

        <!-- Modal content -->
            <div class="modal-content">
                <span class="close" id = "close">&times;</span>
                <h2>Làm thế nào để có thể biết sản phẩm nào đang được khuyến mại ? 
                </h2>
                <p style = "color:	#191970;">
                
                <br />
                <br />
                Quý khách đã đăng ký nhận bản tin của Shop chưa?
                 Nếu chưa, hãy đăng ký ngay để trở thành một trong những người đầu tiên
                  được cập nhật về tất cả các chương trình khuyến mãi mới nhất, những sản phẩm bán chạy nhất, đồng thời nhận được những ưu đãi hấp dẫn nhất.
                <br />
                Ngoài ra, quý khách có thể tham khảo những chương trình khuyến mãi và ưu đãi mới nhất của chúng tôi ngay tại trang chủ.
                </p>
            </div>

        </div>
        <div id="myModal2" class="modal">

        <!-- Modal content -->
            <div class="modal-content">
                <span class="close2" id = "close">&times;</span>
                <h2>Phí vận chuyển được tính như thế nào? 
                </h2>
                <p style = "color:#191970;">
                
                <br />
                <br />
                Phí giao hàng cho 1 đơn hàng bao gồm:
                    <br />
                    1. Phí xử lý đơn hàng<br />
                    User-added image<br />

                    2. Phí giao hàng<br />
                    Phí giao hàng sẽ được tính dựa trên trọng lượng, kích thước của gói hàng và khoảng khách giữa kho của nhà cung cấp và địa chỉ giao hàng.
                                
                </p>
            </div>
            
        </div>
        <div id="myModal3" class="modal">

        <!-- Modal content -->
            <div class="modal-content">
                <span class="close3" id = "close">&times;</span>
                <h2>Làm thế nào để mua hàng?
                </h2>
                <p style = "color:#191970;">
                
                <br />
                <br />
                Quý khách đã đăng ký nhận bản tin của Lazada chưa?
                 Nếu chưa, hãy đăng ký ngay để trở thành một trong những người đầu tiên
                  được cập nhật về tất cả các chương trình khuyến mãi mới nhất, những sản phẩm bán chạy nhất, đồng thời nhận được những ưu đãi hấp dẫn nhất.
                <br />
                Ngoài ra, quý khách có thể tham khảo những chương trình khuyến mãi và ưu đãi mới nhất của chúng tôi ngay tại trang chủ.
                </p>
            </div>
            
        </div>
        <div id="myModal4" class="modal">

        <!-- Modal content -->
            <div class="modal-content">
                <span class="close4" id = "close">&times;</span>
                <h2>Muốn hủy đơn hàng đã đặt thì phải làm như thế nào?
                </h2>
                <p style = "color:#191970;">
                
                <br />
                <br />
                Đầu tiên, quý khách cần tạo một tài khoản trước khi đặt đơn hàng. Sau đó, quý khách có thể đăng nhập vào tài khoản của quý khách để tiến hành hủy đơn hàng trực tuyến thông qua 3 bước đơn giản sau đây:
                    <br />
                Trong tài khoản của quý khách, quý khách vui lòng chọn mục” tài khoản của tôi”, sau đó chọn đơn hàng mà quý khách đang muốn hủy và nhấn nút chọn” Hủy”<br />
                Điền đầy đủ các yêu cầu hủy của quý khách<br />
                - Chọn sản phẩm quý khách đang cần hủy<br />
                - Chọn lý do hủy đơn hàng của quý khách, để chúng tôi có thể biết vì sao quý khách lại có nhu cầu hủy đơn hàng này.<br />
                - Hãy chắc chắn rằng quý khách đã đọc và đồng ý với chính sách hủy đơn hàng.<br />
                - Chọn “ tiếp tục” <br />
                Quý khách sẽ nhận được thông báo sau khi hoàn tất thực hiện xong các bước hủy đơn hàng. Tình trạng hủy đơn hàng sẽ được cập nhật trong vòng 30 phút tiếp theo. *Lưu ý*: Quá trình hủy đơn hàng trực tuyến chỉ áp dụng khi tình trạng đơn hàng của quý khách chưa được chuyển cho bộ phận vận chuyển.
                <br />
                Nếu quý khách chưa có tài khoản tại, vui lòng liên hệ với chúng tôi qua contact để chúng tôi hỗ trợ quý khách hủy đơn hàng.
                </p>
            </div>
            
        </div>
        <div id="myModal5" class="modal">

        <!-- Modal content -->
            <div class="modal-content">
                <span class="close5" id = "close">&times;</span>
                <h2>Làm thế nào để đăng kí thành viên của Shop?
                </h2>
                <p style = "color:#191970;">
                
                <br />
                <br />
                Quý khách đã đăng ký nhận bản tin của Lazada chưa?
                 Nếu chưa, hãy đăng ký ngay để trở thành một trong những người đầu tiên
                  được cập nhật về tất cả các chương trình khuyến mãi mới nhất, những sản phẩm bán chạy nhất, đồng thời nhận được những ưu đãi hấp dẫn nhất.
                <br />
                Ngoài ra, quý khách có thể tham khảo những chương trình khuyến mãi và ưu đãi mới nhất của chúng tôi ngay tại trang chủ.
                </p>
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
    
    div.row h3 {
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
    .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 15%;
    top: 20%;
    width: 70%; /* Full width */
    height: 70%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #FFFFFF;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}
.modal-content h2{
    color: #B22222;
}
/* The Close Button */
#close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

#close:hover,
#close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}


</style>
<script type="text/javascript">
    $(document).ready(function(){
         document.getElementById("search_price").style.display = "none";
         document.getElementById("danhmuc").style.display ="none"   
    });
    // Get the modal
var modal = document.getElementById('myModal');
var modal2 = document.getElementById('myModal2');
var modal3 = document.getElementById('myModal3');
var modal4 = document.getElementById('myModal4');
var modal5 = document.getElementById('myModal5');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var btn2 = document.getElementById("myBtn2");
var btn3 = document.getElementById("myBtn3");
var btn4 = document.getElementById("myBtn4");
var btn5 = document.getElementById("myBtn5");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close2")[0];
var span3 = document.getElementsByClassName("close3")[0];
var span4 = document.getElementsByClassName("close4")[0];
var span5 = document.getElementsByClassName("close5")[0];


// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}
btn2.onclick = function() {
    modal2.style.display = "block";
}
btn3.onclick = function() {
    modal3.style.display = "block";
}
btn4.onclick = function() {
    modal4.style.display = "block";
}
btn5.onclick = function() {
    modal5.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
span2.onclick = function() {
    modal2.style.display = "none";
}
span3.onclick = function() {
    modal3.style.display = "none";
}
span4.onclick = function() {
    modal4.style.display = "none";
}
span5.onclick = function() {
    modal5.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>