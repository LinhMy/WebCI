<div class="tab-catalog" style="width: 1340px; margin: 0px auto; height: auto;">
    <div class="row" style="width: 73%; float: right;">
        <div class="col-sm-12 col-md-8 col-lg-9" style="width: 100%;">
            <!-- tab product -->
            <div class="kt-tabs style4 kt-tab-fadeeffect">
                <div class="shop-page-bar">
                    <nav class="woocommerce-breadcrumb breadcrumbs">
                        <a href="#">Trang Chủ</a>
                        <a href="#">Túi Xách</a>
                        Hàng Quảng Châu
                    </nav>

                </div>
                <div class="tab-container" style="width: 1160px; z-index: 0;">
                    <div id="tab-1" class="tab-panel active">
                        <ul style="float: left;">
                            <?php foreach ($list as $row): ?>
                                <li class="product-item style6" style="float: left; width: 233px; height: 390px;">
                                    <div class="product-inner">
                                        <div class="thumb">
                                            <a href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->name_catalog).'/'.seoname($row->name).'/'.$row->id_product) ?>" title="<?php echo $row->site_title; ?>">
                                                <img style="width: 230px; height: 297px;" src="<?php echo base_url('upload'); ?>/products/<?php echo $row->image_link; ?>" alt="<?php echo $row->site_title; ?>">
                                            </a>
                                            <div class="group-button">
                                                <a class="wishlist" href="">Yêu Thích</a>
                                                <a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->name_catalog).'/'.seoname($row->name).'/'.$row->id_product) ?>" title="<?php echo $row->site_title; ?>">Chi Tiết</a>
                                                <a class="button add_to_cart_button" href="<?php echo base_url('cart/add/'.$row->id_product) ?>">Thêm Giỏ Hàng</a>
                                            </div>

                                        </div>
                                        <div class="info">

                                            <h3 class="product-name short"><a href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->name_catalog).'/'.seoname($row->name).'/'.$row->id_product) ?>" title="<?php echo $row->site_title; ?>"><?php echo $row->name; ?></a></h3>
												<span class="price">
                                                <?php if($row->discount > 0){ ?>
                                                    <ins><?php echo number_format($row->price - $row->discount); ?> VNĐ</ins>
                                                    <del><?php echo number_format($row->price); ?> VNĐ</del>
                                                <?php }else{ ?>
                                                    <ins><?php echo number_format($row->price); ?> VNĐ</ins>
                                                <?php }?>
												</span>
                                            <div class="rating"  title="Rated 3 out of 5">
                                                <i class="active fa fa-star"></i>
                                                <i class="active fa fa-star"></i>
                                                <i class="active fa fa-star"></i>
                                                <i class="active fa fa-star"></i>
                                                <i class="fa fa-star"></i>

                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                    </div>

                </div>
            </div>
            <!-- .tab product -->
        </div>

    </div>
</div>
<div class="clear"></div>