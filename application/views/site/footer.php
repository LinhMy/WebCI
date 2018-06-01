<div class="top" style="background: #f6f6f6; height: 500px">
    <div class="container">
        <div id="footer-info">

            <br>
            <p>Copyright 2014 CompanyName. All rights reservedCopyright 2014 CompanyName. All rights reserved.Copyright 2014 CompanyName. All rights reserved.</p><br>
            <br>
            <br>
            <p>Phone: &nbsp &nbsp &nbsp &nbsp<span style="font-size: 30px">01699807884</span></p><br>
            <p>Email: &nbsp &nbsp &nbsp &nbsp<span style="font-size: 30px">info@modu.vn</span></p>

        </div>
        <div id="footer-info2">
            <ul>

                <li><a href="#"> Vận chuyển </a></li>
                <li><a href="#"> Đổi trả </a></li>
                <li><a href="#"> Cổng thanh toán  </a></li>
                <li><a href="#">  Thông tin </a></li>

            </ul>
        </div>
        <div id="footer-info3">
            <h2>from the <b>BLOG</b></h2>
            <p><img style="width: 50px ; margin-right: 20px" src="<?php echo base_url ();?>css/images/features-icon-1.png">A fixed element does not leave a gap in the page where it would normally have been located</p>
            <p><img style="width: 50px ; margin-right: 20px" src="<?php echo base_url ();?>css/images/features-icon-1.png">A fixed element does not leave a gap in the page where it would normally have been located</p>

        </div>
    </div>
    <style>
        #footer-info{
            float: left;
            margin-top: 15px;
            margin-left: 17px;
            width: 32%;
            color: #888;

        }
        #footer-info p {
            padding: 0px;
            margin: 0px;
        }
        #footer-info2{
            float: left;
            margin-top: 60px;

            width: 40%;
            color: #888;

        }

        #footer-info2 a{
            text-decoration: none;
            color: #888;
        }
        #footer-info2 ul {
            width: 100px;
            float: left;
            margin-left: 68px;

        }

        #footer-info2 ul li {
            margin: 10px 0;

        }
        #footer-info3{
            float: left;
            margin-top: 60px;

            width: 25%;
            color: #888;
        }
        #footer-info3 p{
            overflow: auto
        }
        #footer-info3 img{
            float: left;
        }
    </style>
</div>
<div class="container">

    <div class="row">
        <div class="col-sm-12">
            <div class="widget widget-payment-methods" style="margin-top: 0px; border: none">
                <h3 class="widget-title" style="padding: 36px">Chấp nhận thanh toán: </h3>
                <div class="methods"
                <span><img style="width: 150px; height: 40px;" src="<?php echo base_url('upload'); ?>/payments/p01.jpg" alt=""></span>
                <span><img src="<?php echo base_url('upload'); ?>/payments/p02.png" alt=""></span>
                <span><img style="width: 150px; height: 40px;" src="<?php echo base_url('upload'); ?>/payments/p03.png" alt=""></span>
                <span><img style="width: 150px; height: 40px;" src="<?php echo base_url('upload'); ?>/payments/p04.jpg" alt=""></span>
                <span><img src="<?php echo base_url('upload'); ?>/payments/p05.png" alt=""></span>
                </div>
            </div>
        </div>
    </div>


<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<body>
<div class="support-icon-right" style="position:fixed; z-index:9999999; right:50px; bottom:10px;">
    <h3><i class="fa fa-facebook"></i> Chat với NatulieShop</h3>
    <div class="online-support">
        <div
                class="fb-page"
                data-href="https://www.facebook.com/T%C3%BAi-x%C3%A1ch-nam-n%E1%BB%AF-gi%C3%A1-r%E1%BA%BB-t%E1%BA%A1i-%C4%91%C3%A0-n%E1%BA%B5ng-1770089636567342/"
                data-small-header="true"
                data-height="300"
                data-width="250"
                data-tabs="messages"
                data-adapt-container-width="false"
                data-hide-cover="false"
                data-show-facepile="false"
                data-show-posts="false">
        </div>
    </div>
</div>
</body>
<script lang="javascript">var _vc_data = {id : 5670112, secret : '213cc27bccdcab55c33fdca2b4958191'};(function() {var ga = document.createElement('script');ga.type = 'text/javascript';ga.async=true; ga.defer=true;ga.src = '//live.vnpgroup.net/client/tracking.js';var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script>
<script>
    $(document).ready(function(){
        $('.online-support').hide();
        $('.support-icon-right h3').click(function(e){
            e.stopPropagation();
            $('.online-support').slideToggle();
        });
        $('.online-support').click(function(e){
            e.stopPropagation();
        });
        $(document).click(function(){
            $('.online-support').slideUp();
        });
    });
</script>

<style>

    .support-icon-right {
        background: #F0F3EF;
        position: fixed;
        right: 0;
        bottom: 0;
        top: auto !important
        z-index: 9;
        overflow: hidden;
        width: 250px;
        color: #fff!important;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        -ms-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }

    .support-icon-right h3 {

        font-weight: bold;
        font-size: 13px!important;
        font-family: Arial;
        color: #fff!important;
        margin: 0!important;
        background-color: #3B5998;
        cursor: pointer;
    }

    .support-icon-right i {
        background-color: #3B5998;
        padding: 15px 15px 12px 15px;
        margin-right: 15px;
        border-right: 1px solid #fff;;
    }
    .online-support {
        display: none;
    }

</style>
</div>
<div class="top" style="background: #f6f6f6; height: 100px">
    <div class="container">
        <h2 style="float: left;color: #888; padding:33px">Natuliesop</h2>
        <div id="linkbottom">
            <a href="#" class="fa fa-facebook" style=" padding: 20px;
            font-size: 30px;
            width: 20px;
            float: right;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
            border-radius: 50%;
            color: #888;"></a>
            <a href="#" class="fa fa-youtube"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-google"></a>
        </div>
    </div>
    <style>
        #linkbottom{
            float: right;
        }

        .fa-twitter {
            padding: 20px;
            font-size: 30px;
            width: 20px;
            float: right;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
            border-radius: 50%;
            color: #888;
        }

        .fa-google {
            padding: 20px;
            font-size: 30px;
            width: 20px;
            float: right;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
            border-radius: 50%;
            color: #888;
        }

        .fa-youtube {
            padding: 20px;
            font-size: 30px;
            width: 20px;
            float: right;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
            border-radius: 50%;
            color: #888;
        }
    </style>
</div>
