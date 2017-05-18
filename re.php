<?php
$ufile = $file = $_REQUEST['file'];
$ufolder = $folder = $_REQUEST['folder'];
$ufile = $file;
if (! $file == "") {
    echo "<form action='{$meurl}?op=rename' method='post'>\n" . "<div class='sub-header'>重命名 " . $ufolder . $ufile . '</div>';
    echo "<input type='hidden' name='rename' value='" . $ufile . "'>\n" . "<input type='hidden' name='folder' value='" . $ufolder . "'>\n" . "
<div class=\"input-group\"><input type=\"text\" class=\"form-control\" placeholder=\"请输入文件名......\" name='nrename' value='$ufile'>
<span class='input-group-btn'><button class='btn btn-primary' type='submit'>重命名</button></span></div></form>\n";
}