<?php
require_once 'function.php';
$oldname = $_POST['rename'];
$folder = $_POST['folder'];
$newname = $_POST['nrename'];

if (! $newname == "") {
    $loc1 = gCode("$folder" . $oldname);
    $loc2 = gCode("$folder" . $newname);
    if (rename($loc1, $loc2)) {
        echo "<div class='sub-header'>文件 " . $folder . $oldname . " 已被重命名成 " . $folder . $newname . "</a></div>\n" . "<div class='box'>请选择 <a href='{$meurl}?op=home&folder=" . $_SESSION['folder'] . "'>返回目录</a> 或者 <a href='?op=edit&fename={$newname}&folder={$folder}'>编辑新文件</a></div>\n";
    } else {
        printerror("重命名出错！");
    }
}
