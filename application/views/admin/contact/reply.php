<div class="" style="max-width:1200px;margin-top:100px; margin-left: 250px ; margin-right:  10px ; ">
    <form name='reply_contact' action='' method='POST' style=" margin-right:  10px;
    border: 1px solid #ddd; background: #FFFAFA " enctype="multipart/form-data">
              <div style=" margin-left: 20px; margin-top:20px"> 
               <!--Danh mục: 
               <select name ="category">
                 <?php foreach ($category as $i => $item) { ?>  
                  <option value="<?=$item->name_category?>"><?=$item->name_category?></option>
                  <?php }?>
               </select>
               <br /-->

               Tên khách hàng: <br /><input type="text" name="name"  value="" id="name_custormer">      
               <br />
               Email khách hàng: <br /><input type="text" name="email"  value="" id="email_custormer">      
               <br />
               Thắc mắc: <br /><input type="textarea" name="content"  value="" id="content">          
               <br />
               Trả lời: <br /><textarea rows="20" cols="100" required="required" name="reply"></textarea>    
               <br />
               <input type="submit" value="Gửi cho khách hàng" id ="submitbt" style="margin-left: 50px; margin-bottom: 20px; margin-top: 20px" name="submit">
              </div> 
           </form> 
</div>
