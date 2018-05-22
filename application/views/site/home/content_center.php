<div class="container">
<!-- Tab cat -->
<?php $i = 3; $c = 33; foreach ($catalog_list as $row): ?>
<div class="kt-category-tabs kt-tab-fadeeffect margin-top-50 " >
    <div class="tab-head">
        <h3 class="title"><a href=""><img class="icon" src="<?php echo base_url('upload'); ?>/icons/<?php echo $c; ?>.png" alt=""><?php echo $row->category_name; ?> </a></h3>
        <ul class="nav-tab">
            <li class="active"><a data-animated="fadeInUp" data-toggle="tab" href="#tab-<?php echo $i; ?>">Mới Nhất</a></li>
            <li><a data-animated="fadeInUp" data-toggle="tab" href="#tab-<?php echo $i+1; ?>">Xem Nhiều</a></li>


        </ul>
        <div class="floor-elevator">
            <a class="btn-elevator up  fa fa-angle-up"></a>
            <a class="btn-elevator down fa fa-angle-down"></a>
        </div>
    </div>
    <div class="category-tab-content">

        <div class="tab-inner has-banner-left">

            <div class="tab-content-products">
                <div class="tab-container">
                    <div id="tab-<?php echo $i; ?>" class="tab-panel active">
                        <ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
                        <?php foreach ($row->subs as $subs){ ?>
                            <?php foreach ($subs->sub_pr as $product){ ?>
                            <li class="product-item style10">
                                <div class="product-inner">
                                    <div class="thumb">
                                        <a href="<?php echo base_url('chi-tiet-san-pham/'.seoname($product->product_name).'/'.seoname($product->product_name).'/'.$product->product_id) ?>" title="">
                                            <img style="height: 297px; width: 243px;" src="<?php echo base_url('upload'); ?>/products/<?php echo $product->image; ?>" alt="">
                                        </a>
                                        <a href="<?php echo base_url('chi-tiet-san-pham/'.seoname($product->product_name).'/'.seoname($product->product_name).'/'.$product->product_id) ?>" title="" class="button quick-view yith-wcqv-button">Chi Tiết</a>
                                        <div class="group-button">
                                            <a class="wishlist " href="#">Wishlist</a>
                                            <a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($product->product_name).'/'.seoname($product->product_name).'/'.$product->product_id) ?>" title="">Compare</a>
                                            <a class="button add_to_cart_button" href="<?php echo base_url('cart/add/'.$product->product_id); ?>">Add to cart</a>
                                        </div>

                                    </div>
                                    <div class="info">
                                        <h3 class="product-name short"><a href="<?php echo base_url('chi-tiet-san-pham/'.seoname($product->product_name).'/'.seoname($product->product_name).'/'.$product->product_id) ?>" title=""><?php echo $product->product_name; ?></a></h3>
                                        <?php if($product->discount > 0){ ?>
                                        <span class="price"><?php echo number_format($product->price - $product->discount); ?> VNĐ</span>
                                        <span class="price" style="text-decoration: line-through; color: #0b0b0b"><?php echo number_format($product->price); ?> VNĐ</span>
                                        <?php }else{ ?>
                                            <span class="price"><?php echo number_format($product->price); ?> VNĐ</span>

                                        <?php } ?>
                                    </div>
                                </div>
                            </li>
                        <?php }} ?>
                        </ul>
                    </div>
                    <div id="tab-<?php echo $i+1; ?>" class="tab-panel">
                        <ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
                        <?php foreach ($row->subs as $sub ){ ?>
                            <?php foreach ($sub->sub_pr_xn as $product ){ ?>
                                <li class="product-item style10">
                                    <div class="product-inner">
                                        <div class="thumb">
                                            <a href="<?php echo base_url('chi-tiet-san-pham/'.seoname($product->product_name).'/'.seoname($product->product_name).'/'.$product->product_id) ?>" title="">
                                                <img style="height: 297px; width: 243px;" src="<?php echo base_url('upload'); ?>/products/<?php echo $product->image; ?>" alt="">
                                            </a>
                                            <a href="<?php echo base_url('chi-tiet-san-pham/'.seoname($product->product_name).'/'.seoname($product->product_name).'/'.$product->product_id) ?>" title="" class="button quick-view yith-wcqv-button">Chi Tiết</a>
                                            <div class="group-button">
                                                <a class="wishlist " href="#">Wishlist</a>
                                                <a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($product->product_name).'/'.seoname($product->product_name).'/'.$product->product_id) ?>" title="">Compare</a>
                                                <a class="button add_to_cart_button" href="<?php echo base_url('cart/add/'.$product->product_id); ?>">Add to cart</a>
                                            </div>

                                        </div>
                                        <div class="info">
                                            <h3 class="product-name short"><a href="<?php echo base_url('chi-tiet-san-pham/'.seoname($product->product_name).'/'.seoname($product->product_name).'/'.$product->product_id) ?>" title=""><?php echo $product->product_name; ?></a></h3>
                                            <?php if($product->discount > 0){ ?>
                                                <span class="price"><?php echo number_format($product->price - $product->discount); ?> VNĐ</span>
                                                <span class="price" style="text-decoration: line-through; color: #0b0b0b"><?php echo number_format($product->price); ?> VNĐ</span>
                                            <?php }else{ ?>
                                                <span class="price"><?php echo number_format($product->price); ?> VNĐ</span>

                                            <?php } ?>
                                        </div>
                                    </div>
                                </li>
                        <?php }} ?>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<?php $i = $i + 3; $c++; endforeach; ?>
<!-- ./Tab cat -->

</div>