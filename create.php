<?php
require_once 'function.php';
// 真正创建文件
$filename = $_POST['nfname'];
$foldername = $_POST['ndir'];
$isfolder=$_POST['isfolder'];
if (! $filename == "") {
    $foldername = gCode($foldername);
    $filename = gCode($filename);
    if ($isfolder == 1) {
        if (mkdir($foldername . "/" . $filename, 0755)) {
            $foldername = uCode($foldername);
            $filename = uCode($filename);
            echo "<div class='sub-header'>您的目录<a href='{$meurl}?op=home&folder=./" . $filename . "/'>" . $foldername . $filename . "/</a> 已经成功被创建。</div><div class='box'>\n" . "请选择 <a href='{$meurl}?op=home&folder=" . $foldername . $filename . "/'>打开文件夹</a> 或者 <a href='{$meurl}?op=home&folder=" . $_SESSION['folder'] . "'>返回目录</a>\n";
            echo "</div>";
        } else {
            $foldername = uCode($foldername);
            $filename = uCode($filename);
            printerror("您的目录 " . $foldername . $filename . " 不能被创建。请检查您的目录权限是否已经被设置为可写 或者 目录是否已经存在</span>\n");
        }
    } else {
        if (fopen($foldername . "/" . $filename, "w")) {
            $foldername = uCode($foldername);
            $filename = uCode($filename);
            echo "<div class='sub-header'>您的文件, <a href='{$meurl}?op=viewframe&file=" . $filename . "&folder=$foldername'>" . $foldername . $filename . "</a> 已经成功被创建</div><div class='box'>\n" . "<a href='{$meurl}?op=edit&fename=" . $filename . "&folder=" . $foldername . "'>编辑文件</a> 或者是 <a href='{$meurl}?op=home&folder=" . $_SESSION['folder'] . "'>返回目录</a>\n";
            echo "</div>";
        } else {
            $foldername = uCode($foldername);
            $filename = uCode($filename);
            printerror("您的文件 " . $foldername . $filename . " 不能被创建。请检查您的目录权限是否已经被设置为可写 或者 文件是否已经存在</span>\n");
        }
    }
}