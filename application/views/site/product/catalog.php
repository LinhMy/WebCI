<div class="tab-catalog" style="width: 1340px; margin: 0px auto; height: auto;">
    <div class="row" style="width: 73%; float: right;">
    <div class="col-sm-12 col-md-8 col-lg-9" style="width: 100%;">
        <!-- tab product -->
        <div class="kt-tabs style4 kt-tab-fadeeffect">
            <div class="shop-page-bar">
            </div>
            <div class="tab-container" style="width: 1160px; z-index: 0;">
                <div id="tab-1" class="tab-panel active">
                    <ul style="float: left;">
                    <?php foreach ($list as $row): ?>
                        <li class="product-item style6" style="float: left; width: 233px; height: 390px;">
                            <div class="product-inner">
                                <div class="thumb">
<<<<<<< HEAD
                                    <a href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->name_catalog).'/'.seoname($row->name).'/'.$row->product_id) ?>" title="<?php echo $row->site_title; ?>">
                                        <img style="width: 230px; height: 297px;" src="<?php echo base_url('upload'); ?>/products/<?php echo $row->image_link; ?>" alt="<?php echo $row->site_title; ?>">
                                    </a>
                                    <div class="group-button">
                                        <a class="wishlist" href="">Yêu Thích</a>
                                        <a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->name_catalog).'/'.seoname($row->name).'/'.$row->product_id) ?>" title="<?php echo $row->site_title; ?>">Chi Tiết</a>
=======
                                    <a href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->product_name).'/'.seoname($row->product_name).'/'.$row->product_id) ?>" title="">
                                        <img style="width: 230px; height: 297px;" src="<?php echo base_url('upload'); ?>/products/<?php echo $row->image; ?>" alt="">
                                    </a>
                                    <div class="group-button">
                                        <a class="wishlist" href="">Yêu Thích</a>
                                        <a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->product_name).'/'.seoname($row->product_name).'/'.$row->product_id) ?>" title="">Chi Tiết</a>
>>>>>>> 7006a02f223b32e3b6b904cad2d22b9710f4647a
                                        <a class="button add_to_cart_button" href="<?php echo base_url('cart/add/'.$row->product_id); ?>">Thêm Vào Giỏ</a>
                                    </div>

                                </div>
                                <div class="info">

                                    <h3 class="product-name short"><a href="#"><?php echo $row->product_name; ?></a></h3>
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
        <div class='pagination'>
            <?php echo $this->pagination->create_links(); ?>
        </div>
</div>
</div>
<div class="clear"></div>