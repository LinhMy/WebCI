<?php
// load ra file head
$this->load->view('admin/bill/head', $this->data);
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
                                    <input type="reset" onclick="window.location.href = '<?php echo admin_url('bill'); ?>'; " value="Reset" class="basic">
                                </td>

                            </tr>
                            </tbody></table>
                    </form>
                </td></tr></thead>

            <thead>
            <tr>
                <td style="width:10px;"><img src="<?php echo public_url(); ?>/admin/images/icons/tableArrows.png" /></td>
                <td>Mã Số</td>
                <td>ID User</td>
                <td>Ngày Tạo</td>
                <td> Tổng Số Tiền </td>
                <td>Địa chỉ</td>


            </tr>
            </thead>

            <tfoot>
            </tfoot>

            <tbody>
            <?php foreach ($list as $row): ?>
                <tr class="row_<?php echo $row->bill_id; ?>">
                    <td><input type="checkbox" name="id[]" value="<?php echo $row->bill_id; ?>" /></td>
                    <td><?php echo $row->bill_id; ?></td>
                    <td>
                        <?php echo $row->user_id; ?>
                    </td>
                    <td>
                        <?php echo $row->date_bill; ?>
                    </td>
                    <td>
                        <?php echo $row->total; ?>
                    </td>
                    <td>
                        <?php echo $row->address; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>


    </div>
</div>

<div class="clear mt30"></div>
