<link rel="stylesheet" href="<?php echo public_url()?>/js/jquery/autocomplete/css/smoothness/jquery-ui-1.8.16.custom.css" type="text/css">
<script src="<?php echo public_url()?>/js/jquery/autocomplete/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function() {
        $( "#text-search" ).autocomplete({
            source: "<?php echo site_url('product/search/1'); ?>",
        });
    });
</script>

<div class="top-bar">
    <div class="container">
        <ul class="kt-nav top-bar-menu">
            <li><a href="#"><span class="menu-icon pe-7s-headphones"></span> 0905.77.0963</a></li>
            <li><a href="#"><span class="menu-icon flaticon-new4"></span> Natulieshop@gmail.com</a></li>
        </ul>
        <ul class="kt-nav top-bar-menu right">
            <li>
                <a href="#"><span class="menu-icon pe-7s-add-user"></span> Đăng nhập/đăng Ký</a>
            </li>
            <li class="menu-item-has-children box-setting">
                <a href="#"><span class="menu-icon pe-7s-config"></span> Chỉnh sửa</a>
                <div class="sub-menu box-setting-content">
                    <div class="box-section">
                        <h4 class="title">Select your language:</h4>
                        <div class="inner">
                            <a href="#"><img src="<?php echo base_url('upload'); ?>/icons/1.png" alt=""></a>
                            <a href="#"><img src="<?php echo base_url('upload'); ?>/icons/2.png" alt=""></a>
                            <a href="#"><img src="<?php echo base_url('upload'); ?>/icons/3.png" alt=""></a>
                            <a href="#"><img src="<?php echo base_url('upload'); ?>/icons/4.png" alt=""></a>
                        </div>
                    </div>
                    <div class="box-section currency">
                        <h4 class="title">Select your currency:</h4>
                        <div class="inner">
                            <a href="#"><i class="fa fa-usd"></i></a>
                            <a class="current" href="#"><i class="fa fa-gbp"></i></a>
                            <a href="#"><i class="fa fa-eur"></i></a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="main-header">
        <div class="row main-header-wapper">
            <div class="col-sm-12 col-md-3">
                <div class="logo">
                    <a href="#"><img src="<?php echo base_url('upload'); ?>/logos/2.png" alt="" ></a>
                </div>
            </div>
            <div class="col-sm-12 col-md-9">
                <ul class="main-header-menu">
                    <li><a href="#">Thông Tin</a></li>
                    <li><a href="#">Cổng Thanh Toán</a></li>
                    <li><a href="#">Vận Chuyển</a></li>
                    <li><a href="#">Đổi Trả</a></li>
                    <li><a href="#">Di Động: 01674717919 - 0905770963</a></li>

                </ul>
                <form class="advanced-search" method="get" action="<?php echo site_url('product/search') ?>">
                    <div class="category-dropdwon">
                        <select name="catalog">
                            <option value="0">Danh Mục</option>
                        <?php foreach ($catalog_list as $row): ?>
                            <option value="<?php echo $row->id_catalog; ?>" <?php echo $this->input->get('Category') == $row->id_catalog ? 'selected': '' ?> ><?php echo $row->name; ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="search-text-box">

                        <input style="color: black;" type="text" aria-haspopup="true" aria-autocomplete="list" value="<?php echo isset($key) ? $key : '' ?>" role="textbox" autocomplete="off" class="input ui-autocomplete-input" placeholder="Tìm kiếm sản phẩm..."  name="key-search" id="text-search">
                            <button type="submit" name="but" id="but" value="" class="btn-search"><span class="flaticon-magnifying-glass34"></span></button>

                    </div>

                </form>

                <div class="mini-cart">
            
                    <a class="cart-link" href="<?php echo base_url('cart/index') ?>">
                        <span class="text"><?php echo $total_items; ?> Sản Phẩm</span>

								<span class="menu-icon icon  pe-7s-shopbag">
									<span class="count"><?php echo $total_items; ?></span>
								</span>
                    </a>

                    <div class="sub-menu mini-cart-content">
                        <div class="content-inner">
                            <h3 class="box-title">Bạn có <span class="count"><?php echo $total_items; ?> sản phẩm</span> trong giỏ hàng.</h3>
                            <ul class="list-item-cart">
                            <?php $total_amount = 0; foreach ($carts as $row): $total_amount = $total_amount + $row['subtotal'];?>
                                <li class="item-cart">
                                    <div class="thumb">
                                        <a href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row['name_catalog']).'/'.seoname($row['name']).'/'.$row['id']) ?>"><img style="width: 101px; height: 135px;" src="<?php echo base_url('upload'); ?>/products/<?php echo $row['image_link'] ?>" alt=""></a>
                                    </div>
                                    <div class="product-info">
                                        <h4 class="product-name"><a href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row['name_catalog']).'/'.seoname($row['name']).'/'.$row['id']) ?>"><?php echo $row['name']; ?></a></h4>
                                        <span class="price"><?php echo $row['qty']; ?> x <?php echo number_format($row['price']); ?> VNĐ</span>
                                        <a href="<?php echo base_url('cart/del/'.$row['id']); ?>"  class="remove-item" ><i class="fa fa-close"></i></a>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                            <div class="subtotal">
                                Tổng Tiền: <span class="amout"><?php echo number_format($total_amount); ?> VNĐ</span>
                            </div>

                            <a href="<?php echo site_url('order/check_out'); ?>" class="button primary">THANH TOÁN</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('site/left', $this->data); ?>
</div>