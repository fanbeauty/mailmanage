<?php
echo "<form action='{$meurl}?op=create' method='post'>\n" . 
     "<div class='sub-header'>创建文件 或 目录 
      <span class='nav-right'>
      <select name='isfolder' style='width:100px;height:20px;padding:0;margin:0;margin-top:-2px;font-size:12px;'>
      <option value='0'>文件 File</option>\n" . "<option value='1'>文件夹 Dir</option>
      </select>
      </span>
      </div>
          <ul class=\"list-group\">
          <li class=\"list-group-item\">
      <div class=\"input-group\">
  <span class=\"input-group-addon\">文件名:</span>
  <input type=\"text\" id='nfname' class=\"form-control\" placeholder='请输入文件名...' name='nfname' ></div>
          </li>
          <li class=\"list-group-item\">
          <div class=\"input-group\">
  <span class=\"input-group-addon\">目标目录:</span>
   <input type='text' id='ndir' class=\"form-control\" name='ndir' value='" . $_SESSION['folder'] . "'></div>
</li>
</ul>";
echo "<input type='hidden' name='folder' value='$folder'>\n" . "<input type='submit' value='创建' class='nav-right'>\n" . "</form>\n";
