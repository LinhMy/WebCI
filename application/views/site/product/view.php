<script src="<?php echo public_url() ?>/site/rateit/scripts/jquery.rateit.js"></script>
<link type="text/css" href="<?php echo public_url() ?>/site/rateit/scripts/rateit.css" rel="stylesheet">
<div class="tab-catalog" style="width: 1340px; margin: 0px auto; height: auto;">
    <div class="single-product" style="width: 877px; margin-left: 378px;">
        <div class="row" style="padding-left: 40px;">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="images kt-images">
                    <div class="kt-main-image">
                        <a title="" class="zoom"
                           href="<?php echo base_url('upload') ?>/products/<?php echo $product_info->image; ?>"><img
                                    style="width: 376px; height: 320px; margin-left: 8px;"
                                    src="<?php echo base_url('upload') ?>/products/<?php echo $product_info->image; ?>"
                                    alt="<?php echo $product_info->name; ?>"></a>
                    </div>
                    <div class="kt_tum" style="height: 80px; margin:8px;">
                            <div class="owl-carousel" style="margin_left:10px;height:60px;" data-items="1"  data-animateout="slideInUp" data-animatein="slideInUp">
                            <?php if(is_array($image_list)){ ?>
                            <div class="page" id="an_di"> 
                                <?php foreach ($image_list as $img): ?>
                                <a style="height:60px;" href="<?php echo base_url('upload') ?>/products/<?php echo $img->path ?>">
                                <img style="width: 76px; height: 60px; margin_left:10px;" src="<?php echo base_url('upload') ?>/products/<?php echo $img->path; ?>" ></a>
                                <?php endforeach; ?>
                            </div>
                            <?php }?>                            
                           </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6"
            ">
            <div class="summary">
                <h1 title="" class="product_title entry-title"
                    style="color: red; margin-left: "><?php echo $product_info->name; ?></h1>
                <?php if ($product_info->discount > 0) { ?>
                    <span class="price" style="font-size: 15px; color: #800000; float: left; padding-right: 8px;"><i
                                style="color: #0b0b0b;">Giá:</i> <?php echo number_format($product_info->price - $product_info->discount); ?>
                        VNĐ</span>
                    <span class="price"
                          style="font-size: 15px;color: #666666; text-decoration: line-through;"><?php echo number_format($product_info->price); ?>
                        VNĐ</span>
                <?php } else { ?>
                    Giá: <span class="price"
                               style="font-size: 15px; color: #800000; "><?php echo number_format($product_info->price - $product_info->discount); ?>
                        VNĐ</span>
                <?php } ?>
                <p class="stock out-of-stock"><label>Tình Trạng:</label> <i class="fa fa-check"></i> Còn Hàng </p>
                <div class="short-descript">
                    <p>Vote:</p>
                    <div id="vote">
                       <?php echo $data_vote ?>
                        <?php //$this->load->view('site/rating'); ?>
                    </div>
            </div>
            
            <div class="short-descript">
                <p><strong style="margin-left: 4px">Thông tin:</strong><?php echo $product_info->note; ?></p>
            </div>
            <form name="add_product" method="post"
                  action="<?php echo base_url('cart/add/' . $product_info->product_id); ?>"
                  enctype="multipart/form-data">
                <button type="submit" class="single_add_to_cart_button button alt">Thêm Vào Giỏ Hàng</button>
            </form>
        </div>
    </div>

</div>
<div class="product-tabs">
    <ul class="nav-tab">
        <li class="active"><a data-toggle="tab" href="#tab-1">Đánh Giá Sản Phẩm</a></li>
    
	    <br><br>
        <?php $this->load->view('site/rating'); ?>
        <!-- lay gia tri cua product de vote-->
        <input type="hidden" value = "<?php echo $product_info->product_id?>" id="product-id">
        <input type="hidden" value = "0" id="type-vote">
        <!-- end lay gia tri cua product de vote -->

        <!-- comment và button gửi -->
        <div id="tab-1" class="tab-panel active">
            <input type="text" value="" name="comment" id="comment"/>
            <input type="submit" name="votebtn" class="votebtn"/>
        </div>
        <!-- hien thi comment -->
		<br/>
        <div id="comment-vote">
            <?php if(!$comments){ ?>
                    <div id="view-comment" style="margin-left:50px;"></div>
                    <div id="created-date" style="margin-left:600px;margin-top:-20px"></div>
                    <hr/>
            <?php }
            else
            {?>
            <?php foreach ($comments as $item) : ; ?>
			<div id="view-comment" style="margin-left:50px"><?php echo $item->comment?></div>
			<div id="created-date" style="margin-left:600px;margin-top:-20px"><?php echo $item->created_date?></div>
            <hr/>
		   <?php endforeach; ?>
            <?php }?>
        </div>        
		<div id="insertcomment"></div>	

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
                                    <a href="<?php echo base_url('chi-tiet-san-pham/' . seoname($row->name) . '/' . seoname($row->name) . '/' . $row->product_id) ?>"
                                       title="">
                                        <img style="width: 230px; height: 297px;"
                                             src="<?php echo base_url('upload'); ?>/products/<?php echo $row->image; ?>"
                                             alt="<?php echo $row->name; ?>">
                                    </a>
                                    <div class="group-button">
                                        <a class="wishlist" href="">Yêu Thích</a>
                                        <a class="compare button"
                                           href="<?php echo base_url('chi-tiet-san-pham/' . seoname($row->name) . '/' . seoname($row->name) . '/' . $row->product_id) ?>"
                                           title="">Chi Tiết</a>
                                        <a class="button add_to_cart_button"
                                           href="<?php echo base_url('cart/add/' . $row->product_id); ?>">Thêm Vào
                                            Giỏ</a>
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
</div>
</div>
</div>
