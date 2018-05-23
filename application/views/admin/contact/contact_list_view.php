 </div>
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
                    <td><input type="text" value="<?=$i+1?>" class="id"></td>    
                    <td><input type="text" value="<?=$item->name?>" class="name_custormer"></td>
                    <td><input type="text" value="<?=$item->email?>" class="email"></td>
                    <td><input type="text" value="<?=$item->content?>" class="content"></td>
                    <td><input type="text" value="<?=$item->date_sent?>" class="date"></td>
                    <td><input type="checkbox" value="" class="reply" checked="<?=($item->reply?"checked": "")?>"></td>
                    <td>
                    	<a href="" style="text-decoration: none">
                    	<input type="image" alt="Trả lời" id="image" src="http://icons.iconarchive.com/icons/seanau/email/256/Reply-icon.png" style="width:35%">  
                    	</a>
                    </td>
                </tr>
                <?php } ?>
                 
            </tbody>
        </table>
        
</div>