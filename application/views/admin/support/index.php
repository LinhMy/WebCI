<?php
// load ra file head
$this->load->view('admin/support/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
  <!-- table hien thi lay tu DB -->
  <table class="table table-bordered table-hover table-list", border="1px solid #ddd" >
            <thead>
                <tr>                    
                    <th class="w50">STT</th>
                    <th>Khách hàng</th>
                    <th>Email</th>
                    <th>Thắc mắc</th>
                    <th>Ngày</th>
                    <th>Đã trả lời</th>
                    <th>Trả lời</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contact_list as  $i =>$item) {
                	?>                    
                <tr>
                    <td><?=$i+1?></td>    
                    <td><?=$item->name?></td>
                    <td><?=$item->email?></td>
                    <td><?=$item->content?></td>
                    <td><?=$item->date_sent?></td>
                    <td><input type="checkbox" value="" class="reply" checked="<?=($item->reply?"checked": "")?>"></td>
                    <td>
                    	<a href="<?php $base_url ?>/WebCI/admin/support/reply_contact/<?=$item->contact_id ?>" style="text-decoration: none">
                    	<input type="image" alt="Trả lời" id="image" src="http://icons.iconarchive.com/icons/seanau/email/256/Reply-icon.png" style="width:5%">  
                    	</a>
                    </td>
                </tr>
                <?php } ?>
                 
            </tbody>
        </table>
        

   </div>
</div>

<div class="clear mt30"></div>
<style type="text/css">
	table, td, th {    
    border: 1px solid #ddd;
    text-align: left;
	}

table {
    border-collapse: collapse;
    width: 100%;
	}

th, td {
    padding: 15px;
	}
</style>