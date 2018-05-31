<?php
// load ra file head
$this->load->view('admin/product/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <h6>Danh sách các sản phẩm có trong set <?php //echo $setname?></h6>
            <div class="num f12">Tổng số: <b><?php echo $total_rows; ?></b></div>
        </div>

        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead class="filter"><tr><td colspan="8">
                    <form method="get" action="" class="list_filter form">
                        <table width="80%" cellspacing="0" cellpadding="0"><tbody>

                            <tr>
                                <!--td style="width:40px;" class="label"><label for="filter_id">Mã số</label></td>
                                <td class="item"><input type="text" style="width:55px;" id="filter_id" value="?php echo $this->input->get('id'); ?>" name="id"></td>

                                <td style="width:40px;" class="label"><label for="filter_id">Tên</label></td>
                                <td style="width:155px;" class="item"><input type="text" style="width:155px;" id="filter_iname" value="?php echo $this->input->get('product_name'); ?>" name="product_name"></td>
                                
                                <td style="width:150px">
                                    <input type="submit" value="Lọc" class="button blueB">
                                    <input type="reset" onclick="window.location.href = '?php echo admin_url('setproduct/viewproduct'); ?>'; " value="Reset" class="basic">
                                </td-->

                            </tr>
                            </tbody></table>
                    </form>
                </td></tr></thead>

            <thead>
            <tr>
                <td style="width:10px;"><img src="<?php echo public_url(); ?>/admin/images/icons/tableArrows.png" /></td>

                <td style="width: 100px;">Tên sản phẩm</td>
                <td style="width: 100px;">Danh mục</td>
                <td style="width: 100px;">Giá bán gốc</td>
                <td style="width: 50px;">Hình ảnh</td>                
                <td style="width: 50px;">Số lượng</td>
                <td style="width: 20px;">Thành tiền</td>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <td colspan="8">
                    <div class="list_action itemActions">
                        <!--a href="#submit" id="submit" class="button blueB" url="?php echo admin_url('product/delete_all'); ?>">
                            <span style='color:white;'>Xóa hết</span>
                        </a-->
                        <label style= "color:red">Tổng tiền:</label>
                        <label style= "color:red" name ="sum_money">123</label>
                    </div>

                    <!--div class='pagination'>
                        ?php echo $this->pagination->create_links(); ?>
                    </div-->
                </td>
            </tr>
            </tfoot>

            <tbody>
            <?php foreach ($list as $row): ?>
                <tr class="row_<?php echo $row->product_id; ?>">
                    <td><input type="checkbox" name="id[]" value="<?php echo $row->product_id; ?>" /></td>
                    <td ><?php echo $row->product_name; ?></td>
                    <td style="width: 200px;"><?php echo $row->category_name; ?></td>
                    <td><?php echo number_format($row->price); ?> VNĐ</td>
                    <td><?php echo number_format($row->discount); ?> VNĐ</td>
                    <td style="text-align: center;"><img src="<?php echo  base_url('upload/products/'.$row->image); ?>" style="width: 100px; height: 70px;" title="Click để xem chi tiết sản phẩm"></td>
                    <td><?php echo $row->view; ?></td>

                    
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>


    </div>
</div>

<div class="clear mt30"></div>
