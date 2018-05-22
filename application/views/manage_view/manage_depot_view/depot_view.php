<div class="updatezip" style="max-width:1200px;margin-top:100px; margin-left: 250px ; margin-right:  10px ; ">
    <form name='image_in' action='' method='POST' style=" margin-right:  10px;
    border: 1px solid #ddd; background: #FFFAFA " enctype="multipart/form-data">
              <div style=" margin-left: 20px; margin-top:20px"> 
               <!--Danh mục: 
               <select name ="category">
                 <?php foreach ($category as $i => $item) { ?>  
                  <option value="<?=$item->name_category?>"><?=$item->name_category?></option>
                  <?php }?>
               </select>
               <br />
               Tiêu đề: <br /><input type="text" name="title"  value="" id="title_id">          
               <br />
               Nội dung: <br /><textarea rows="20" cols="100" required="required" name="content"></textarea>    
               <br /-->

               <!-- Thêm ảnh bằng file *.zip -->
               Ảnh minh họa:
               <input type="file" name="zip_file">
                <br />
               <input type="submit" value="Đăng ảnh" id ="submitbt" style="margin-left: 50px; margin-bottom: 20px; margin-top: 20px" name="submit">
              </div> 
           </form> 
</div>