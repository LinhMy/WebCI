<?php
// load ra file head
$this->load->view('admin/user/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <h6>Danh sách quản trị user</h6>
            <div class="num f12">Tổng số: <b><?php echo $total_rows; ?></b></div>
        </div>

        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">


            <thead>
            <tr>

                <td style="width: 100px;">Mã ID</td>
                <td style="width: 100px;">username</td>
                <td style="width: 100px;">Email</td>
                <td style="width: 100px;">Số ĐT</td>
                <td style="width: 100px;">Địa chỉ</td>
                <td style="width: 100px;">Ghi chú</td>
                <td style="width:100px;">Chức năng</td>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($list as $row): ?>
                <tr class="row_<?php echo $row->user_id; ?>">

                    <td ><?php echo $row->user_id; ?></td>
                    <td ><?php echo $row->name; ?></td>
                    <td ><?php echo $row->email; ?></td>
                    <td ><?php echo $row->phone; ?></td>
                    <td ><?php echo $row->address; ?></td>
                    <td ><?php echo $row->note; ?></td>
                    <td class="option">
                        <a href="<?php echo admin_url('user/edit/'.$row->user_id); ?>" title="Chỉnh sửa" class="tipS ">
                            <img src="<?php echo public_url(); ?>/admin/images/icons/color/edit.png" />
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>


    </div>
</div>

<div class="clear mt30"></div>
