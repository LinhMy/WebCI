<?php
$price_from = $this->input->get('price_from');
$price_to = $this->input->get('price_to');

?>
<div class="search-price" style=" width: 292px; height: auto; float: left; margin-top: 230px;" id = "search_price">
    <div class="category-dropdwon">
        <h4 style="padding: 15px 10px; border-bottom: 2px solid #f75757; font-size: 14px; background-color: #0b0b0b; color: #fff;">TÌM KIẾM THEO GIÁ SẢN PHẨM <i style="float: right; padding-right: 3px;" class="fa fa-refresh"></i></h4>
        <div class="price-from" style="width: 35%; float: left; padding-left: 10px; padding-top: 5px;">
            <i class="fa fa-arrows-v"></i>
            <b>Giá Từ:</b><br /><br />
            <i class="fa fa-arrows-v" style="margin-bottom: 20px;"></i>
            <b>Giá Tới:</b>
        </div>
    <form name="search_price" action="<?php echo base_url('product/search_price') ?>" method="get" enctype="multipart/form-data">
        <div class="tab-price" style="float: left; width: 60%; padding-bottom: 10px;">
            <select name="price_from">
                <?php for ($i=0;$i <= 2000000;$i = $i + 50000): ?>
                    <option <?php echo ($price_from == $i) ? 'selected' : ''; ?> value="<?php echo $i; ?>"><?php echo number_format($i); ?> VNĐ</option>
                <?php endfor; ?>
            </select>

            <select name="price_to" >
                <?php for ($i=0;$i <= 2000000;$i = $i + 50000): ?>
                    <option <?php echo ($price_to == $i) ? 'selected' : ''; ?> value="<?php echo $i; ?>"><?php echo number_format($i); ?> VNĐ</option>
                <?php endfor; ?>
            </select>
        </div>

        <button class="button" type="submit" style="float: left;">TÌM KIẾM</button>
    </form>
    </div>
</div>