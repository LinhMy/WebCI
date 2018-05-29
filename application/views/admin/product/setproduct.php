<?php
// load ra file head
$this->load->view('admin/product/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <h6>Danh sách các set sản phẩm</h6>
            <div class="num f12">Tổng số: <b><?php echo $total_rows; ?></b></div>
        </div>

        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead class="filter"><tr><td colspan="8">
                    <form method="get" action="" class="list_filter form">
                        <table width="80%" cellspacing="0" cellpadding="0"><tbody>

                            <tr>
                                <td style="width:40px;" class="label"><label for="filter_id">Mã số</label></td>
                                <td class="item"><input type="text" style="width:55px;" id="filter_id" value="<?php echo $this->input->get('id'); ?>" name="id"></td>

                                <td style="width:40px;" class="label"><label for="filter_id">Tên</label></td>
                                <td style="width:155px;" class="item"><input type="text" style="width:155px;" id="filter_iname" value="<?php echo $this->input->get('product_name'); ?>" name="product_name"></td>
                                
                                <td style="width:150px">
                                    <input type="submit" value="Lọc" class="button blueB">
                                    <input type="reset" onclick="window.location.href = '<?php echo admin_url('product'); ?>'; " value="Reset" class="basic">
                                </td>

                            </tr>
                            </tbody></table>
                    </form>
                </td></tr></thead>

            <thead>
            <tr>
                <td style="width:10px;"><img src="<?php echo public_url(); ?>/admin/images/icons/tableArrows.png" /></td>

                <td style="width: 100px;">Tên set</td>
                <td style="width: 100px;">Giá bán gốc</td>
                <td style="width: 50px;">Giảm giá</td>
                <td style="width: 50px;">Hình ảnh</td>
                <td style="width: 20px;">Lượt xem</td>
                <td style="width: 20px;">Hiển thị</td>
                <td style="width:100px;">Chức năng</td>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <td colspan="8">
                    <div class="list_action itemActions">
                        <a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('setproduct/delete_all'); ?>">
                            <span style='color:white;'>Xóa hết</span>
                        </a>
                    </div>

                    <div class="list_action itemActions">
                        <a href="<?php echo admin_url('setproduct/add'); ?>" class="button blueB">
                            <span style='color:white;'>Thêm set mới</span>
                        </a>
                    </div>

                    <div class='pagination'>
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </td>
            </tr>
            </tfoot>

            <tbody>
            <?php foreach ($set_list as $row): ?>
                <tr class="row_<?php echo $row->set_id; ?>">
                    <td><input type="checkbox" name="id[]" value="<?php echo $row->set_id; ?>" /></td>
                    <td ><?php echo $row->set_name; ?></td>
                    <td><?php echo number_format($row->price); ?> VNĐ</td>
                    <td><?php echo number_format($row->sale); ?> VNĐ</td>
                    <td style="text-align: center;"><img src="<?php echo  base_url('upload/products/'.$row->image); ?>" style="width: 100px; height: 70px;"></td>
                    <td><?php echo $row->view; ?></td>
                    <td><input type ="checkbox" name = "display"  <?=(($row->display==1)?"checked":""); ?> ></td>

                    <td class="option">
                        <a href="<?php echo admin_url('setproduct/edit/'.$row->set_id); ?>" title="Chỉnh sửa" class="tipS ">
                            <img src="<?php echo public_url(); ?>/admin/images/icons/color/edit.png" />
                        </a>

                        <a href="<?php echo admin_url('setproduct/delete/'.$row->set_id); ?>" title="Xóa" class="tipS verify_action" >
                            <img src="<?php echo public_url(); ?>/admin/images/icons/color/delete.png" />
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>


    </div>
</div>

<div class="clear mt30"></div>
