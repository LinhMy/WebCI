<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>Bảng điều khiển</h5>
            <span>Trang quản lý hệ thống</span>
        </div>
        
        <div class="clear"></div>
    </div>
</div>

<div class="line"></div>

<div class="wrapper">

    <div class="widgets">
        <!-- Stats -->
        <?php
        // load ra file head
        $this->load->view('admin/home/revenue', $this->data);
        ?>

        <!-- Amount -->
        <div class="oneTwo">
            <div class="widget">
                <div class="title">
                    <img class="titleIcon" src="<?php echo public_url(); ?>/admin/images/icons/dark/money.png">
                    <h6>Doanh số</h6>
                </div>

                <table width="100%" cellspacing="0" cellpadding="0" class="sTable myTable">
                    <tbody>

                    <tr>
                        <td class="fontB blue f13">Tổng doanh số</td>
                        <td style="width:120px;" class="textR webStatsLink red">
                            <?php foreach ($year as $value) :
                                if ($value->label_y =="2018") {
                                    echo $value->total_sum;
                                }
                                endforeach; ?>.000 đ
                            </td>
                    </tr>

                    <tr>
                        <td class="fontB blue f13">Doanh số hôm nay</td>
                        <td style="width:120px;" class="textR webStatsLink red">
                            <?php foreach ($day_reve as $value) :
                                    echo $value->amount;
                                endforeach; ?>.000 đ
                        </td>
                    </tr>

                    <tr>
                        <td class="fontB blue f13">Doanh số theo tháng</td>
                        <td style="width:120px;" class="textR webStatsLink red">
                            <?php foreach ($month as $value) :
                                if ($value->label_m == date("F")) {
                                    echo $value->total_sum;
                                }
                                endforeach; ?>.000 đ
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>


        <!-- User -->
        <div class="oneTwo">
            <div class="widget">
                <div class="title">
                    <img class="titleIcon" src="<?php echo public_url(); ?>/admin/images/icons/dark/users.png">
                    <h6>Thống kê dữ liệu</h6>
                </div>

                <table width="100%" cellspacing="0" cellpadding="0" class="sTable myTable">
                    <tbody>

                    <tr>
                        <td>
                            <div class="left">Tổng số giao dịch</div>
                            <div class="right f11"><a href="admin/tran.html">Chi tiết</a></div>
                        </td>

                        <td class="textC webStatsLink">
                            <?php echo $tran; ?>					</td>
                    </tr>

                    <tr>
                        <td>
                            <div class="left">Tổng số sản phẩm</div>
                            <div class="right f11"><a href="admin/product.html">Chi tiết</a></div>
                        </td>

                        <td class="textC webStatsLink">
                          <?php foreach ($prod as $value) :                            
                                    echo $value->quantity;                            
                                endforeach; ?>				
                        </td>
                    </tr>

                    
                    <tr>
                        <td>
                            <div class="left">Tổng số thành viên</div>
                            <div class="right f11"><a href="admin/user.html">Chi tiết</a></div>
                        </td>

                        <td class="textC webStatsLink">
                           <?php echo $member; ?>			</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="left">Tổng số liên hệ</div>
                            <div class="right f11"><a href="admin/contact.html">Chi tiết</a></div>
                        </td>

                        <td class="textC webStatsLink">
                            <?php echo $contact; ?>    			</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="clear"></div>

    </div>

</div>

<div class="clear mt30"></div>