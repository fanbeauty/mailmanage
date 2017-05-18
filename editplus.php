<?php
require_once 'function.php';
$folder = $_REQUEST['folder'];
$file = $_REQUEST['file'];
$path = $folder . $file;
$content=$_REQUEST['content1'];
$myfile = fopen("$path", "w") or die("Unable to open file!");
if(fwrite($myfile, $content)){
    echo "编辑成功";
}
fclose($myfile);
?>



