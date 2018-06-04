<?php
// load ra file head
$this->load->view('admin/blog/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <h6>Danh sách các tin tức của Shop</h6>
            <div class="num f12">Tổng số: <b><?php echo $total_rows; ?></b></div>
        </div>

        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead class="filter"><tr><td colspan="8">
                    <form method="get" action="" class="list_filter form">
                        <table width="80%" cellspacing="0" cellpadding="0"><tbody>

                            <tr>


                                <td style="width:40px;" class="label"><label for="filter_id">Tiêu đề</label></td>
                                <td style="width:155px;" class="item"><input type="text" style="width:155px;" id="filter_iname" value="<?php echo $this->input->get('title'); ?>" name="title"></td>

                                <td style="width:150px">
                                    <input type="submit" value="Lọc" class="button blueB">
                                    <input type="reset" onclick="window.location.href = '<?php echo admin_url('blog'); ?>'; " value="Reset" class="basic">
                                </td>

                            </tr>
                            </tbody></table>
                    </form>
                </td></tr></thead>

            <thead>
            <tr>
                <td style="width:10px;"><img src="<?php echo public_url(); ?>/admin/images/icons/tableArrows.png" /></td>

                <td style="width: 100px;">Tiêu đề bài viết</td>
                <td style="width: 100px;">Tóm tắt</td>
                <td style="width: 50px;">Ảnh</td>
                <td style="width: 100px;">Ngày đăng</td>
                <td style="width: 20px;">Lượt xem</td>
                <td style="width:100px;">Chức năng</td>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <td colspan="8">
                    <div class="list_action itemActions">
                        <a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('blog/delete_all'); ?>">
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
                <tr class="row_<?php echo $row->post_id; ?>">
                    <td><input type="checkbox" name="id[]" value="<?php echo $row->post_id; ?>" /></td>
                    <td ><?php echo $row->title; ?></td>
                    <td style="width: 200px;"><?php echo $row->summary; ?></td>
                    <td style="text-align: center;">
                        <a href="<?php// echo base_url('chi-tiet-san-pham/'.seoname($row->product_name).'/'.seoname($row->product_name).'/'.$row->product_id) ?>" title="Click vào đây để xem chi tiết tin tức" >
                        <img src="<?php echo  base_url('upload/post/'.$row->image_post); ?>" style="width: 100px; height: 70px;">
                        </a>
                    </td>
                    <td><?php echo ($row->date_post); ?> </td>
                    <td><?php echo $row->view; ?></td>

                    <td class="option">
                        <a href="<?php echo admin_url('blog/edit/'.$row->post_id); ?>" title="Chỉnh sửa" class="tipS ">
                            <img src="<?php echo public_url(); ?>/admin/images/icons/color/edit.png" />
                        </a>

                        <a href="<?php echo admin_url('blog/delete/'.$row->post_id); ?>" title="Xóa" class="tipS verify_action" >
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
