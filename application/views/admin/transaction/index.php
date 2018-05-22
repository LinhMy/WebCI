<?php
// load ra file head
$this->load->view('admin/transaction/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <h6>Danh sách danh mục giao dịch</h6>
            <div class="num f12">Tổng số: <b><?php echo $total_rows; ?></b></div>
        </div>

        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead class="filter"><tr><td colspan="8">
                    <form method="get" action="" class="list_filter form">
                        <table width="80%" cellspacing="0" cellpadding="0"><tbody>

                            <tr>
                                <td style="width:40px;" class="label"><label for="filter_id">Mã số</label></td>
                                <td class="item"><input type="text" style="width:55px;" id="filter_id" value="<?php echo $this->input->get('id'); ?>" name="id"></td>
                                <td style="width:150px">
                                    <input type="submit" value="Lọc" class="button blueB">
                                    <input type="reset" onclick="window.location.href = '<?php echo admin_url('transaction'); ?>'; " value="Reset" class="basic">
                                </td>

                            </tr>
                            </tbody></table>
                    </form>
                </td></tr></thead>

            <thead>
            <tr>
                <td style="width:10px;"><img src="<?php echo public_url(); ?>/admin/images/icons/tableArrows.png" /></td>
                <td style="width: 100px;">Mã Số</td>
                <td style="width: 100px;">Số Tiền</td>
                <td style="width: 100px;">Cổng thanh toán</td>
                <td style="width: 50px;">Trạng Thái</td>
                <td style="width: 50px;">Ngày Tạo</td>
                <td style="width:100px;">Chức năng</td>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <td colspan="8">
                    <div class="list_action itemActions">
                        <a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('transaction/delete_all'); ?>">
                            <span style='color:white;'>Xóa hết</span>
                        </a>
                    </div>

                    <div class='pagination'>
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </td>
            </tr>
            </tfoot>

            <tbody>
            <?php foreach ($list as $row): ?>
                <tr class="row_<?php echo $row->id_transaction; ?>">
                    <td><input type="checkbox" name="id[]" value="<?php echo $row->id_transaction; ?>" /></td>
                    <td><?php echo $row->id_transaction; ?></td>
                    <td ><?php echo number_format($row->amount); ?> VNĐ</td>
                    <td style="width: 200px;"><?php echo $row->payment; ?></td>
                    <td>
                        <?php
                        if($row->status == 0){
                            echo "Chưa Thanh Toán";
                        }elseif($row->status == 1){
                            echo "Đã Thanh Toán";
                        }else{
                            echo "Thanh Toán Thất Bại";
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $row->created; ?>
                    </td>
                    <td class="option textC">
                        <a title="Xem chi tiết giao dịch" class="tipS lightbox" target="_blank" href="<?php echo admin_url('transaction/view/'.$row->id_transaction) ?>">
                            <img src="<?php echo public_url(); ?>/admin/images/icons/color/view.png" />
                        </a>

                        <a href="<?php echo admin_url('transaction/delete/'.$row->id_transaction); ?>" title="Xóa" class="tipS verify_action" >
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
