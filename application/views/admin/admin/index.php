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
                <td style="width: 100px;">Thông tin</td>
                <td style="width: 100px;">Chức vụ</td>
                <td style="width:100px;">Chức năng</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $row): ?>
                <tr class="row_<?php echo $row->admin_id; ?>">
                    <td><input type="checkbox" name="id[]" value="<?php echo $row->admin_id; ?>" /></td>
                    <td ><?php echo $row->admin_id; ?></td>
                    <td ><?php echo $row->username; ?></td>
                    <td ><?php echo $row->information; ?></td>
                    <td ><?php echo $row->position; ?></td>
                    <td class="option">
                        <a href="<?php echo admin_url('admin/edit/'.$row->admin_id); ?>" title="Chỉnh sửa" class="tipS ">
                            <img src="<?php echo public_url(); ?>/admin/images/icons/color/edit.png" />
                        </a>

                        <a href="<?php echo admin_url('admin/delete/'.$row->admin_id); ?>" title="Xóa" class="tipS verify_action" >
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
