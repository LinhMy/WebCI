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
                                            <a href="<?php echo base_url('chi-tiet-san-pham/' . seoname($row->name) . '/' . seoname($row->name) . '/' . $row->product_id) ?>"
                                               title="">
                                                <img style="width: 230px; height: 297px;"
                                                     src="<?php echo base_url('upload'); ?>/products/<?php echo $row->image; ?>"
                                                     alt="">
                                            </a>
                                            <div class="group-button">
                                                <a class="compare button"
                                                   href="<?php echo base_url('chi-tiet-san-pham/' . seoname($row->name) . '/' . seoname($row->name) . '/' . $row->product_id) ?>"
                                                   title="">Chi Tiết</a>
                                                <a class="button add_to_cart_button"
                                                   href="<?php echo base_url('cart/add/' . $row->product_id) ?>">Thêm
                                                    Giỏ Hàng</a>
                                            </div>

                                        </div>
                                        <div class="info">

                                            <h3 class="product-name short"><a
                                                        href="<?php echo base_url('chi-tiet-san-pham/' . seoname($row->name) . '/' . seoname($row->name) . '/' . $row->product_id) ?>"
                                                        title=""><?php echo $row->name; ?></a></h3>
                                            <span class="price">
                                                <?php if ($row->discount > 0) { ?>
                                                    <ins><?php echo number_format($row->price - $row->discount); ?>
                                                        VNĐ</ins>
                                                    <del><?php echo number_format($row->price); ?> VNĐ</del>
                                                <?php } else { ?>
                                                    <ins><?php echo number_format($row->price); ?> VNĐ</ins>
                                                <?php } ?>
												</span>

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