<?php
// load ra file head
$this->load->view('admin/admin/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <h6>Danh sách quản trị admin</h6>
            <div class="num f12">Tổng số: <b><?php echo $total_rows; ?></b></div>
        </div>

        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">


            <thead>
            <tr>
                <td style="width:10px;"><img src="<?php echo public_url(); ?>/admin/images/icons/tableArrows.png" /></td>
                <td style="width: 100px;">Mã ID</td>
                <td style="width: 100px;">username</td>
                <td style="width: 100px;">Email</td>
                <td style="width: 100px;">Số điện thoại</td>
                <td style="width: 100px;">Địa Chỉ</td>
                <td style="width: 100px;">Nội dung</td>
                <td style="width:100px;">Chức năng</td>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <td colspan="8">
                    <div class="list_action itemActions">
                        <a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('admin/delete_all'); ?>">
                            <span style='color:white;'>Xóa hết</span>
                        </a>
                    </div>

                    <div class='pagination'>

                    </div>
                </td>
            </tr>
            </tfoot>

            <tbody>
            <?php foreach ($list as $row): ?>
                <tr class="row_<?php echo $row->user_id; ?>">
                    <td><input type="checkbox" name="id[]" value="<?php echo $row->user_id; ?>" /></td>
                    <td ><?php echo $row->user_id; ?></td>
                    <td ><?php echo $row->name; ?></td>
                    <td ><?php echo $row->email; ?></td>
                    <td ><?php echo $row->phone; ?></td>
                    <td ><?php echo $row->address; ?></td>
                    <td ><?php echo $row->note; ?></td>
                    <td class="option">
                        <a href="<?php echo admin_url('admin/edit/'.$row->user_id); ?>" title="Chỉnh sửa" class="tipS ">
                            <img src="<?php echo public_url(); ?>/admin/images/icons/color/edit.png" />
                        </a>

                        <a href="<?php echo admin_url('admin/delete/'.$row->user_id); ?>" title="Xóa" class="tipS verify_action" >
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
