<?php
echo "<nav class=\"navbar navbar-default navbar-fixed-bottom\">
  <div class=\"container\">
   <div class=\"row\">
    <div class=\"col-md-1 col-md-offset-3\">
    <input type='checkbox' id='check' onclick='Check()'> 
    </div>
    <div class=\"col-md-1\">
    <input class='button' name='action' type='submit' value='移动' /> 
    </div>
    <div class=\"col-md-1\">
    <input class='button' name='action' type='submit' value='复制' /> 
    </div>
    <div class=\"col-md-1\">
    <input class='button' name='action' type='submit' onclick='return confirm(\"点击确认后，选中的文件将作为Backup-time.zip创建！\")'  value='压缩' /> 
    </div>
    <div class=\"col-md-1\">
    <input class='button' name='action' type='submit' onclick='return confirm(\"您真的要删除选中的文件吗?\")' value='删除' /> 
    </div>
    </div>
    </div>
</nav>";