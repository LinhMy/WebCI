<?php
// load ra file head
$this->load->view('admin/support/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
  <!-- chuyen trang qua fb -->
        <h3 style="margin-top: 15px; color: #104E8B">Chuyển qua Facebook để chat với khách hàng.</h3>
        <br />
        <a href="https://www.facebook.com/" target="_blank" title="facebook.com">
           
                Nhấn vào đây để chuyển trang.
            
        </a>

  
</div>

<div class="clear mt30"></div>
<style>
a:link {
    text-decoration: none;
}

a:visited {
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

a:active {
    text-decoration: underline;
}
</style>