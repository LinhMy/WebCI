<div class="tab-catalog" style="width: 1340px; margin: 0px auto; height: auto;">
<div class="single-product" style="width: 877px; margin-left: 378px;">
<div class="row" style="padding-left: 40px;">
    <div class="col-sm-6 col-md-6 col-lg-6" >
        <div class="images kt-images">
            <div class="kt-main-image">
                <a title="<?php echo $product_info->site_title; ?>" class="zoom" href="<?php echo base_url('upload') ?>/products/<?php echo $product_info->image_link; ?>"><img style="width: 376px; height: 320px; margin-left: 8px;" src="<?php echo base_url('upload') ?>/products/<?php echo $product_info->image_link; ?>" alt="<?php echo $product_info->name; ?>"></a>
            </div>
            <div class="kt-thumbs" style="height: 80px;">
                <div class="owl-carousel" data-items="1" data-nav="true" data-animateout="slideInUp" data-animatein="slideInUp">
                    <?php $image_list = json_decode($product_info->image_list) ?>
                    <?php if(is_array($image_list)){ ?>

                    <div class="page-thumb">
                        <?php foreach ($image_list as $img): ?>
                        <a class="item-thumb zoom" href="<?php echo base_url('upload') ?>/products/<?php echo $img ?>"><img style="width: 100px; height:100px;" src="<?php echo base_url('upload') ?>/products/<?php echo $img ?>" alt="<?php echo $product_info->name; ?>"></a>
                        <?php endforeach; ?>
                    </div>
                    <?php } ?>


                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6"">
        <div class="summary">
            <h1 title="<?php echo $product_info->site_title; ?>"  class="product_title entry-title"><?php echo $product_info->name; ?></h1>
            <?php if($product_info->discount > 0){ ?>
                <span class="price" style="font-size: 15px; color: #800000; float: left; padding-right: 8px;"><i style="color: #0b0b0b;">Giá:</i> <?php echo number_format($product_info->price - $product_info->discount); ?> VNĐ</span>
                <span class="price" style="font-size: 15px;color: #666666; text-decoration: line-through;"><?php echo number_format($product_info->price); ?> VNĐ</span>
            <?php }else{ ?>
                Giá: <span class="price" style="font-size: 15px; color: #800000; "><?php echo number_format($product_info->price - $product_info->discount); ?> VNĐ</span>
            <?php }?>
            <p class="stock out-of-stock"><label>Tình Trạng:</label> <i class="fa fa-check"></i> Còn Hàng </p>
            <div class="rating" title="Rated 3 out of 5">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <span>(3 reviews)</span>
            </div>
            <div class="short-descript">
                <p><strong>Thông tin:</strong><?php echo $product_info->content; ?></p>
            </div>
            <form name="add_product" method="post" action="<?php echo base_url('cart/add/'.$product_info->product_id); ?>" enctype="multipart/form-data">
            <div class="quantity">
                <span>Số Lượng Mua:</span>
                <input type="text" data-step="1" data-min="" data-max="" name="qty" value="01" title="Qty" class="input-text qty text" size="4">
            </div>
            <button type="submit" class="single_add_to_cart_button button alt">Thêm Vào Giỏ Hàng</button>
            </form>
            <div class="share" style="padding-top: 8px;">
                <span class='st_facebook_hcount' displayText='Facebook'></span>
                <span class='st_twitter_hcount' displayText='Tweet'></span>
                <span class='st_googleplus_hcount' displayText='Google +'></span>
                <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
                <script type="text/javascript">stLight.options({publisher: "71bbd720-bb71-4ba5-93e5-81ec93d19019", doNotHash: true, doNotCopy: false, hashAddressBar: false});</script>
            </div>

        </div>
    </div>
</div>

<div class="product-tabs">
    <ul class="nav-tab">
        <li class="active"><a data-toggle="tab" href="#tab-1">Đánh Giá</a></li>
        <li><a data-toggle="tab" href="#tab-2">Sản Phẩm Liên Quan</a></li>
    </ul>
    <div class="tab-container" >
        <div id="tab-1" class="tab-panel active">
            <div class="fb-comments" data-href="<?php echo base_url('chi-tiet-san-pham/'.seoname($product_info->name_catalog).'/'.seoname($product_info->name).'/'.$product_info->product_id) ?>" data-colorscheme="light" data-numposts="5" data-width="500"></div>
        </div>
        <div id="tab-2" class="tab-panel" style="margin-bottom: 370px; ">
            <div id="tab-1" class="tab-panel active">
                <ul style="float: left;">
                    <?php foreach ($list as $row): ?>
                        <li class="product-item style6" style="float: left; width: 233px; height: 390px;">
                            <div class="product-inner">
                                <div class="thumb">
                                    <a href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->name_catalog).'/'.seoname($row->name).'/'.$row->product_id) ?>" title="<?php echo $row->site_title; ?>">
                                        <img style="width: 230px; height: 297px;" src="<?php echo base_url('upload'); ?>/products/<?php echo $row->image_link; ?>" alt="<?php echo $row->name; ?>">
                                    </a>
                                    <div class="group-button">
                                        <a class="wishlist" href="">Yêu Thích</a>
                                        <a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->name_catalog).'/'.seoname($row->name).'/'.$row->product_id) ?>" title="<?php echo $row->site_title; ?>">Chi Tiết</a>
                                        <a class="button add_to_cart_button" href="<?php echo base_url('cart/add/'.$row->product_id); ?>">Thêm Vào Giỏ</a>
                                    </div>

                                </div>
                                <div class="info">

                                    <h3 class="product-name short"><a href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->name_catalog).'/'.seoname($row->name).'/'.$row->product_id) ?>" title="<?php echo $row->site_title; ?>" ><?php echo $row->name; ?></a></h3>
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
</div>
</div>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>