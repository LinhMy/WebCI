
<div id="leftSide" style="padding-top:30px;">

    <!-- Account panel -->

    <div class="sideProfile">
        <a href="#" title="" class="profileFace"><img src="<?php echo public_url(); ?>/admin/images/user.png" width="40"></a>
        <span>Xin chào: <strong>admin!</strong></span>
        <span>Hoàng văn Tuyền</span>
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
                <strong>2</strong>
            </a>

            <ul class="sub">
                <li>
                    <a href="<?php echo admin_url('transaction'); ?>">
                        Giao dịch							</a>
                </li>
                <li>
                    <a href="<?php echo admin_url('order'); ?>">
                        Đơn hàng sản phẩm							</a>
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
                <strong>3</strong>
            </a>

            <ul class="sub">
                <li>
                    <a href="<?php echo admin_url('product');?>">
                        Sản phẩm							</a>
                </li>

                <li>
                    <a href="<?php echo admin_url('Category'); ?>">
                        Danh mục							</a>
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
        <li class="account">

            <a href="" class=" exp">
                <span>Tài khoản</span>
                <strong>3</strong>
            </a>

            <ul class="sub">
                <li>
                    <a href="<?php echo admin_url('admin')?>">
                        Ban quản trị							</a>
                </li>
            </ul>

        </li>
        <li class="support">

            <a href="admin/support.html" class=" exp">
                <span>Hỗ trợ và liên hệ</span>
                <strong>2</strong>
            </a>

            <ul class="sub">
                <li>
                    <a href="admin/support.html">
                        Chat với khách hàng							</a>
                </li>
                <li>
                    <a href="admin/contact.html">
                        xử lý yêu cầu							</a>
                </li>
            </ul>

        </li>
    </ul>

</div>
<div class="clear"></div>
