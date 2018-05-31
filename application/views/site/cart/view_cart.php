
<div class="tab-catalog" style="width: 1340px; margin: 0px auto; height: auto;">
    <div class="container">
        <div class="row" style="margin-left: 292px;">
            <div class="col-sm-12 main-content">
                <nav class="woocommerce-breadcrumb breadcrumbs">
                    <a href="#">Trang Chủ</a>
                    Giỏ Hàng Của Bạn
                </nav>
                <?php if($total_items > 0){ ?>
                    <div class="block-form">
                        <form id="cart" method="post" enctype="multipart/form-data" action="<?php echo base_url('cart/update') ?>">
                            <table class="shop_table cart">
                                <thead>
                                <tr>
                                    <th class="product">Tên Sản Phẩm/Giá</th>
                                    <th>Tình Trạng</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $total_amount = 0; ?>
                                <?php foreach ($carts as $rows): ?>
                                    <?php

                                    $total_amount = $total_amount + $rows['subtotal'];
                                    ?>
                                    <tr>
                                        <td class="product">
                                            <img alt="" style="width: 101px; height: 126px;" src="<?php echo base_url('upload'); ?>/products/<?php echo $rows['image_link']; ?>" class="product-thumb">
                                            <div class="product-info">
                                                <h3 class="product-name"><a href="<?php echo base_url('chi-tiet-san-pham/'.seoname($rows['name']).'/'.seoname($rows['name']).'/'.$rows['id']) ?>"><?php echo $rows['name']; ?></a></h3>
                                                <span class="product-price"><?php echo number_format($rows['price']); ?> VNĐ</span>
                                            </div>
                                        </td>
                                        <td class="stock">
                                            <span class="in-stock">Còn Hàng</span>
                                        </td>
                                        <td>
                                            <div class="quantity">
                                                <input name="qty_<?php echo $rows['id']; ?>" type="number" size="4" class="input-text qty text" title="Qty" value="<?php echo $rows['qty']; ?>" data-max="" data-min="0" data-step="1" vk_123a3="subscribed">
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount"><?php echo number_format($rows['subtotal']); ?>VNĐ</span>
                                        </td>
                                        <td class="product-remove">
                                            <a href="<?php echo base_url('cart/del/'.$rows['id']); ?>" class="remove"><i class="fa fa-close"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="3"></td>
                                    <td class="order-total" colspan="2">Tổng Tiền Thanh Toán: <?php echo number_format($total_amount); ?>VNĐ</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="block-form-footer">
                                <button type="submit" class="button" >CẬP NHẬT GIỎ HÀNG</button>
                                <a href="<?php echo site_url('cart/del'); ?>" class="button">XÓA TOÀN BỘ GIỎ HÀNG</a>
                                <a href="<?php echo site_url('order/check_out'); ?>" class="button">THANH TOÁN</a>
                            </div>
                        </form>
                    </div>
                <?php }else{ ?>
                    <h2 style="padding-bottom: 200px; font-size: 15px;">Giỏ hàng của bạn chưa có sản phẩm nào. </h2>
                <?php } ?>
            </div>
        </div>
    </div>
</div>