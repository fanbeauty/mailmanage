<?php

/**
 * 帮助类函数
 */

/*
 * 1.
 * function gettime()
 * 获取文件或目录时间
 */
function gettime($filename)
{
    return "修改时间: " . date("Y-m-d H:i:s", filemtime($filename)) . "\n" . "创建时间: " . date("Y-m-d H:i:s", filectime($filename));
}

/*
 * 2.
 * function uCode($text)
 * 转换成utf-8编码
 */
function uCode($text)
{
    return mb_convert_encoding($text, 'UTF-8', 'GBK');
}

/*
 * 3.
 * function gCode($text)
 * 转换成fbk编码
 */
function gCode($text)
{
    return mb_convert_encoding($text, 'GBK', 'UTF-8');
}

/*
 * 4.
 * function dirSize()
 * 获取目录的大小
 */
function dirSize($directoty)
{
    $dir_size = 0;
    if ($dir_handle = opendir($directoty)) {
        while ($filename = readdir($dir_handle)) {
            $subFile = $directoty . DIRECTORY_SEPARATOR . $filename;
            if ($filename == '.' || $filename == '..') {
                continue;
            } elseif (is_dir($subFile)) {
                $dir_size += dirSize($subFile);
            } elseif (is_file($subFile)) {
                $dir_size += filesize($subFile);
            }
        }
        closedir($dir_handle);
    }
    return ($dir_size);
}

/*
 * 5.
 * function Size()
 * 计算文件大小
 */
function Size($size)
{
    $sz = " KMGT";
    $factor = floor((strlen($size) - 1) / 3);
    return ($size > 1024) ? sprintf("%.2f", $size / pow(1024, $factor)) . @$sz[$factor] : $size;
}

/*
 * function printerror()
 * 打印错误信息
 *
 */
function printerror($error)
{
    echo '<div class="panel">
    <div class="panel-heading"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;&nbsp;错误，错误信息如下</div>
    <div class="panel-body">
    <div class="alert alert-warning" role="alert">' . $error . '
     <a href="#" class="alert-link">请返回上一步</a>
     </div>
    </div>
    </div>';
}
