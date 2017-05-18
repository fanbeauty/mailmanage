<?php
$file=$_REQUEST['file'];
$folder=$_REQUEST['folder'];
$path=$folder.$file;
//去除扩展名
$filename=substr($file,0,-4);
//如果文件存在，就打开这个文件
if(file_exists($path)){
    echo "<div class=\"sub-header\">文件:$filename</div>";
    echo "<embed src={$path} width='100%' height='850px'></embed>";
};





?>
