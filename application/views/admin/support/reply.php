<?php
// load ra file head
$this->load->view('admin/support/head', $this->data);
?>
<div class="line"></div>

<div class="wrapper" >

<div class="container" >
  <form name='reply_contact' action='' method='POST' enctype="multipart/form-data">
    <?php foreach ($contact as $i => $item) {?>
        
    <div class="row">
      <div class="col-25">
        <label for="fname">Tên khách hàng:</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="name" value="<?=$item->name ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Email khách hàng:</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="email" value="<?=$item->email ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Thắc mắc:</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="content" style="height:130px"><?=$item->content ?></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Trả lời:</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="reply" value="" style="height:230px"></textarea>
      </div>
    </div>
     <div class="row">
      <input type="submit" value="Gửi phản hồi cho khách hàng" name="submit" style="background-color: red;">
    </div>

   <?php }?>
  </form>
</div>

</div>
