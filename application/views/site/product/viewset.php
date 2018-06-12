<!--script src="<?php// echo public_url() ?>/site/rateit/scripts/jquery.rateit.js"></script>
<link type="text/css" href="<?php// echo public_url() ?>/site/rateit/scripts/rateit.css" rel="stylesheet"-->
<div class="tab-catalog" style="width: 1340px; margin: 0px auto; height: auto;">
    <div class="single-product" style="width: 877px; margin-left: 378px;">
        <div class="row" style="padding-left: 40px;">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="images kt-images">
                    <div class="kt-main-image">
                        <a title="" class="zoom"
                           href="<?php echo base_url('upload') ?>/set/<?php echo $product_set_info->image; ?>"><img
                                    style="width: 376px; height: 320px; margin-left: 8px;"
                                    src="<?php echo base_url('upload') ?>/set/<?php echo $product_set_info->image; ?>"
                                    alt="<?php echo $product_set_info->name; ?>"></a>
                    </div>
                    <div class="kt-thumbs" style="height: 80px;">
                        <div class="owl-carousel" data-items="1" data-nav="true" data-animateout="slideInUp"
                             data-animatein="slideInUp">
                            <?php $image = json_decode($product_set_info->image) ?>
                            <?php if (is_array($image)) { ?>

                                <div class="page-thumb">
                                    <?php foreach ($image as $img): ?>
                                        <a class="item-thumb zoom"
                                           href="<?php echo base_url('upload') ?>/set/<?php echo $img ?>"><img
                                                    style="width: 100px; height:100px;"
                                                    src="<?php echo base_url('upload') ?>/set/<?php echo $img ?>"
                                                    alt="<?php echo $product_set_info->name; ?>"></a>
                                    <?php endforeach; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6"
            ">
            <div class="summary">
                <h1 title="" class="product_title entry-title"
                    style="color: red; margin-left: "><?php echo $product_set_info->name; ?></h1>
             
                    <span class="price" style="font-size: 15px; color: #800000; float: left; padding-right: 8px;"><i
                                style="color: #0b0b0b;">Giá:</i> <?php echo number_format($product_set_info->price); ?>
                        </span>
                    <span class="price"
                          style="font-size: 15px;color: #666666; text-decoration: line-through;"> VNĐ
                        </span>
                <p class="stock out-of-stock"><label>Tình Trạng:</label> <i class="fa fa-check"></i> Còn Hàng </p>
                <div class="short-descript">
                    <p>Vote:
                    <div id="vote">
                    </p><?php echo $data_vote ?></div>
            </div>
            <div class="short-descript">
                <p><strong style="margin-left: 4px">Thông tin:</strong><?php ?></p>
            </div>
            <form name="add_product" method="post"
                  action="<?php echo base_url('cart/add/' . $product_set_info->product_set_id); ?>"
                  enctype="multipart/form-data">
                <button type="submit" class="single_add_to_cart_button button alt">Thêm Vào Giỏ Hàng</button>
            </form>
            <div class="share" style="padding-top: 8px;">
                <span class='st_facebook_hcount' displayText='Facebook'></span>
                <span class='st_twitter_hcount' displayText='Tweet'></span>
                <span class='st_googleplus_hcount' displayText='Google +'></span>
                <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
                <script type="text/javascript">stLight.options({
                        publisher: "71bbd720-bb71-4ba5-93e5-81ec93d19019",
                        doNotHash: true,
                        doNotCopy: false,
                        hashAddressBar: false
                    });</script>
            </div>
        </div>
    </div>
</div>
<div class="product-tabs">
    <ul class="nav-tab">
        <li class="active"><a data-toggle="tab" href="#tab-1">Đánh Giá Sản Phẩm</a></li>
        <br><br>
        <?php $this->load->view('site/rating'); ?>
        <input type="hidden" value = "<?php echo $product_set_info->product_set_id?>" id="product-id">
        <input type="hidden" value = "1" id="type-vote">
        <div id="tab-1" class="tab-panel active">
            <input type="text" value="" name="comment" id="comment"/>
            <input type="submit" name="votebtn" class="votebtn"/>
        </div>
        <table>
            <tr>
                <th>Comment</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($comments as $item) : ; ?>
                <tr>
                    <td><?php echo $item->comment ?></td>
                    <td><?php echo $item->created_date ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </ul>
    <ul class="nav-tab">
        <li><a data-toggle="tab" href="#tab-2">Sản Phẩm Liên Quan</a></li>
    </ul>
    <div class="tab-container">

        <div id="tab-2" class="tab-panel" style="margin-bottom: 370px; ">
            <div id="tab-1" class="tab-panel active">
                <ul style="float: left;">
                    <?php foreach ($list as $row): ?>
                        <li class="product-item style6" style="float: left; width: 233px; height: 390px;">
                            <div class="product-inner">
                                <div class="thumb">
                                    <a href="<?php echo base_url('chi-tiet-san-pham/' . seoname($row->name) . '/' . seoname($row->name) . '/' . $row->product_set_id) ?>"
                                       title="">
                                        <img style="width: 230px; height: 297px;"
                                             src="<?php echo base_url('upload'); ?>/products/<?php echo $row->image; ?>"
                                             alt="<?php echo $row->name; ?>">
                                    </a>
                                    <div class="group-button">
                                        <a class="wishlist" href="">Yêu Thích</a>
                                        <a class="compare button"
                                           href="<?php echo base_url('chi-tiet-san-pham/' . seoname($row->name) . '/' . seoname($row->name) . '/' . $row->product_set_id) ?>"
                                           title="">Chi Tiết</a>
                                        <a class="button add_to_cart_button"
                                           href="<?php echo base_url('cart/add/' . $row->product_set_id); ?>">Thêm Vào
                                            Giỏ</a>
                                    </div>
                                </div>
                                <div class="info">
                                    <h3 class="product-name short"><a
                                                href="<?php echo base_url('chi-tiet-san-pham/' . seoname($row->name) . '/' . seoname($row->name) . '/' . $row->product_set_id) ?>"
                                                title=""><?php echo $row->name; ?></a></h3>
                                    <span class="price">
                                               
                                                    <ins><?php echo number_format($row->price ); ?>
                                                        VNĐ</ins>
												</span>
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
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0&appId=310458242824669&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
