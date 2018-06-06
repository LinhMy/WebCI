
<div id="leftSide" style="padding-top:30px;">

    <!-- Account panel -->

    <div class="sideProfile">
        <a href="#" title="" class="profileFace"><img src="<?php echo public_url(); ?>/admin/images/user.png" width="40"></a>
        <span>Xin chào: <strong>admin!</strong></span>
        <div class="clear"></div>
    </div>
    <div class="sidebarSep"></div>
    <!-- Left navigation -->

    <?php $this->load->helper('admin'); ?>

    <ul id="menu" class="nav">

        <li class="home">

            <a href="<?php echo admin_url(); ?>" class="active" id="current">
                <span>Bảng điều khiển</span>
                <strong></strong>

            </a>


        </li>
        <li class="tran">

            <a href="#" class=" exp">
                <span>Quản lý bán hàng</span>
                <strong>1</strong>
            </a>

            <ul class="sub">
                <li>
                    <a href="<?php echo admin_url('bill'); ?>">
                        Giao dịch							</a>
                </li>

            </ul>

        </li>
        <!--li class="tran">

            <a href="admin/depot.html" class=" exp">
                <span>Quản lý kho</span>
                <strong>2</strong>
            </a>

            <ul class="sub">
                <li>
                    <a href="<?php// echo admin_url('depot/addzip'); ?>">
                        Tải file ảnh zip							</a>
                </li>
                <li>
                    <a href="<?php //echo admin_url('depot/addexcel'); ?>">
                        Tải file excel							</a>
                </li>
            </ul>

        </li-->
        <li class="product">

            <a href="admin/product.html" class=" exp">
                <span>Sản phẩm</span>
                <strong>5</strong>
            </a>

            <ul class="sub">
                <li>
                    <a href="<?php echo admin_url('product');?>">
                        Danh sách sản phẩm							</a>
                </li>

                <li>
                    <a href="<?php echo admin_url('category'); ?>">
                        Danh mục							</a>
                </li>
                <li>
                    <a href="<?php echo admin_url('productset'); ?>">
                        Danh sách set sản phẩm					</a>
                </li>
                 <li>
                    <a href="<?php echo admin_url('depot/addzip'); ?>">
                        Tải file ảnh zip                            </a>
                </li>
                <li>
                    <a href="<?php echo admin_url('depot/addexcel'); ?>">
                        Tải file excel                          </a>
                </li>

            </ul>

        </li>
<!--chuyen huong phan tin tuc -->
         <li class="product">

            <a href="admin/blog" class=" exp">
                <span>Tin tức</span>
                <strong>2</strong>
            </a>

            <ul class="sub">
                <li>
                    <a href="<?php echo admin_url('blog')?>">
                        Quản lí bài viết							</a>
                </li>
                <li>
                    <a href="<?php echo admin_url('blog/posting')?>">
                       Viết bài						</a>
                </li>
            </ul>

            </li>
        <li class="account">

            <a href="" class=" exp">
                <span>Tài khoản</span>
                <strong>2</strong>
            </a>

            <ul class="sub">
                <li>
                    <a href="<?php echo admin_url('admin')?>">
                        Ban quản trị							</a>
                </li>
                <li>
                    <a href="<?php echo admin_url('user')?>">
                        Thành viên							</a>
                </li>
            </ul>

        </li>
        <li class="support">

            <a href="admin/support" class=" exp">
                <span>Hỗ trợ và liên hệ</span>
                <strong>1</strong>
            </a>

            <ul class="sub">
                
                <li>
                    <a href="<?php echo admin_url('support');?>">
                        Xử lý yêu cầu							</a>
                </li>
                <!--li>
                    <a href="?php echo admin_url('support/chat');?>">
                        Chat với khách hàng                         </a>
                </li-->
            </ul>

        </li>
    </ul>

</div>
<div class="clear"></div>
