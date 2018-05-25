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

<style>
* {
    box-sizing: border-box;
}

input[type=text], textarea {
    width: 100%;
    padding: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    font-size: 12px;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
    color:#698B69;    
    font-size: 15px;
    font-weight: bold;

}

input[type=submit] {
    background-color: #4CAF50;
    border: none;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    color: red;
    border-radius: 4px;
    cursor: pointer;
    margin-left: 400px;
    margin-top: 20px
}


.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    max-width:1200px;
}

.col-25 {
    float: left;
    width: 15%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 85%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}

</style>