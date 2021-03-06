<div class="header-control">

    <div class="vertical-menu-wapper" id="danhmuc">
        <div class="box-vertical-megamenus" data-items="10">
            <h4 class="title"><span class="text">Danh mục sản phẩm</span> <span class="bar"><i class="fa fa-bars"></i></span></h4>
            <div class="verticalmenu-content">
                <ul class="kt-nav verticalmenu-list" >
                    <?php $i = 12; foreach ($category_list as $row): ?>
                    <li class="menu-item-has-children">
                        <a href="<?php echo base_url('product/catalog/'.seoname($row->name).'/'.$row->category_id); ?>">
                        <span class="menu-icon"><img src="<?php echo base_url('upload'); ?>/icons/<?php echo $i; ?>.png" alt="">
                        </span><?php echo $row->name; ?>
                        </a>
                        <ul class="sub-menu" ">
                        <?php foreach ($row->subs as $subs){ ?>
                            <li><a href="<?php echo base_url('product/catalog/'.seoname($subs->name).'/'.$subs->category_id); ?>"><?php echo $subs->name; ?></a></li>
                    <?php } ?>
                </ul>
                </li>
                <?php $i++; endforeach; ?>
                </ul>
                <a data-closetext="Close" data-opentext="View All Categories" class="viewall closed" href="#">View All Categories</a>
            </div>
        </div>
    </div>
    <div class="main-menu-wapper">
        <a class="mobile-navigation" href="#">
						<span class="icon">
							<span></span>
							<span></span>
							<span></span>
						</span>
            Main Menu
        </a>
        <ul class="kt-nav main-menu clone-main-menu">
            <li class="menu-item-has-children">
                <a href="<?php echo base_url(); ?>">Trang Chủ</a>
            </li>
            <li class="menu-item-has-children item-megamenu">
                <a href="<?php echo base_url(); ?>product/view_product">Sản Phẩm</a>
            </li>
            <li class="menu-item-has-children">
                <a href="<?php echo base_url('shop/adress'); ?>">Liên hệ</a>
            </li>
            <li class="menu-item-has-children">
                <a href="<?php echo base_url('blog'); ?>">Tin Tức</a>
            </li>
            <?php if(isset($user_info) && $user_info !=  ''): ?>
                <li><a style="text-transform: capitalize;" href="<?php echo site_url('user/index'); ?>">Xin chào:<?php echo $user_info->name; ?></a></li>
                <li><a style="text-transform: capitalize;" href="<?php echo site_url('user/logout'); ?>">Đăng Xuất</a></li>
            <?php else: ?>
                <li><a href="<?php echo site_url('user/login') ?>">Đăng Nhập</a></li>
                <li><a href="<?php echo site_url('user/register')?>">Đăng Ký</a></li>
            <?php endif; ?>

        </ul>
    </div>
</div>