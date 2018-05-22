
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <div class="widget widget-payment-methods">
                    <h3 class="widget-title">Chấp nhận thanh toán: </h3>
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
        <div class="coppyright">Copyrights © 2016 Natulieshop - Đà Nẵng. Túi xách & mỹ phẩm giá rẻ tại Đà Nẵng</div>


        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
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
