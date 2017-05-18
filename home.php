<?php
/**
 * 读取当前目录下的内容，并将目录保存在session中
 */
if (! session_id())
    session_start();
require_once 'function.php';
// 制表格
echo "<form method=\"POST\"><div class=\"table-responsive\"><table class=\"table table-striped\"><thead><tr><th width=20px></th><th>文件名/类型/时间</th><th>大小</th><th>打开</th><th>重命名</th><th>查看</th><th>pdf</th><th>发送邮件</th></thead>";
// n行7列
$content1 = "";
$a = 1;
$content2 = "";
$b = 1;
// 首先读取./文件夹里面的内容
if (! $style = opendir($folder)) {
    printerror("目录不存在");
}
// 把folder存入SESSION中
if ($folder)
    $_SESSION['folder'] = $folder;


while ($stylesheet = readdir($style)) {
    $ufolder = $folder;
    $sstylesheet = $stylesheet;
    if ($sstylesheet !== "." && $sstylesheet !== "..") {
        // 点击实现变色
        $trontd = "<tr width=100% 
                    onclick='st=document.getElementById(\"$sstylesheet\").checked;
                             if(st==true){
                                document.getElementById(\"$stylesheet\").checked=false;
                                this.style.backgroundColor=\"\";}
                             else{document.getElementById(\"$stylesheet\").checked=true;
                                this.style.backgroundColor=\"#fcdd8c\";}'>";
        // 重命名
        $rename = "<td><a href='{$meurl}?op=re&file=" . htmlspecialchars($stylesheet) . "&folder=$folder'>重命名</a></td>\n";
        // 生成pdf
        $generate_pdf = "<td><a href='{$meurl}?op=generate&file=" . htmlspecialchars($stylesheet) . "&folder=$folder'>pdf</a></td>\n";
        // 预览pdf
        $preview = "<td><a href='{$meurl}?op=preview&file=" . htmlspecialchars($stylesheet) . "&folder=$folder'>预览</a></td>\n";
        // 发送邮件
        $send_mail = "<td><a href='{$meurl}?op=send&file=" . htmlspecialchars($stylesheet) . "&folder=$folder'>发送</a></td>\n";
        // 编辑文件
        $edit = "<td><a href='{$meurl}?op=edit&file=" . htmlspecialchars($stylesheet) . "&folder=$folder'>编辑</a></td>\n";
        
        $path = $ufolder . $stylesheet;
        
       
        
        
        if (is_dir($sstylesheet) && is_readable($sstylesheet)) {
            // 获取文件夹大小
            $foldersize = Size(dirSize($path));
            // 打开目录
            $opendir = "<td><a href='{$meurl}?op=home&folder=" . htmlspecialchars($ufolder . $sstylesheet) . "/'>打开</a></td>\n";
            $content1[$a] = "$trontd<td><span class=\"glyphicon glyphicon-folder-open\"></span>
                            <input name='select_item[d][$sstylesheet]'  type='checkbox' id='$sstylesheet' value='{$ufolder}{$sstylesheet}' style=\"display:none\" />" . "<td _order='1{$sstylesheet}' _ext='1' _time='1'><a href='{$meurl}?op=home&folder={$ufolder}{$sstylesheet}/'>{$sstylesheet}</a></td>\n" . "<td _size='1'>" . $foldersize . "</td>" . $opendir . $rename . "<td></td><td></td><td></td></tr>\n";
            $a ++;
        } elseif (! is_dir($sstylesheet)) {
            $extension = explode(".", $ufolder . $sstylesheet);
            $extension = end($extension);
            // 获取文件大小
            $filesize = Size(filesize($path));
            // 判断是不是zip压缩文件
            if ($extension == "zip") {
                $content2[$b] = "$trontd<td><span class=\"glyphicon glyphicon-book\"></span>
                <input name='select_item[f][$sstylesheet]' type='checkbox' id='$sstylesheet' value='{$ufolder}{$sstylesheet}' style=\"display:none\"></td><td _order='3{$sstylesheet}'_ext='3' _time='1'><a href='{$ufolder}{$sstylesheet}' target='_blank'>{$sstylesheet}</a></td>\n" . "<td _size='1'>" . $filesize . "</td>" . "<td></td>\n" . $rename . "<td><a href='{$meurl}?op=unz&file=" . htmlspecialchars($sstylesheet) . "&folder=$ufolder'><span>提取</span></a></td>\n" . "<td></td>\n<td></td>\n</tr>";
            } elseif ($extension == "png" || $extension == "gif" || $extension == "gif" || $extension == "jpg" || $extension == "bmp") {
                $content2[$b] = "$trontd<td><span class=\"glyphicon glyphicon-picture\"></span>
                <input name='select_item[f][$sstylesheet]' type='checkbox' id='$sstylesheet' value='{$ufolder}{$sstylesheet}' style=\"display:none\"></td><td _order='3{$sstylesheet}' _ext='3' _time='1'><a href='{$ufolder}{$sstylesheet}' target='_blank'>{$sstylesheet}</a></td>\n" . "<td _size='1'>" . $filesize . "</td>" . "<td></td>\n" . $rename . "<td><a href='{$folder}{$stylesheet}' target='_blank'><span>查看</span></td>" . "<td></td><td></td></tr>";
            } elseif ($extension == "pdf") {
                $content2[$b] = "$trontd<td><span><img src=\"image/pdf.jpg\" width=\"15px\" height=\"15px\"></img></span>
                <input name='select_item[f][$sstylesheet]' type='checkbox' id='$sstylesheet' value='{$ufolder}{$sstylesheet}' style=\"display:none\"></td><td _order='3{$sstylesheet}' _ext='3' _time='1'><a href='{$ufolder}{$sstylesheet}' target='_blank'>{$sstylesheet}</a></td>\n" . "<td _size='1'>" . $filesize . "</td><td></td>" . $rename . "<td></td>" . $preview . $send_mail . "<tr>";
            } else {
                $content2[$b] = "$trontd<td><span class=\"glyphicon glyphicon-file\"></span>
                <input name='select_item[f][$sstylesheet]' type='checkbox' id='$sstylesheet' value='{$ufolder}{$sstylesheet}' style=\"display:none\"></td><td _order='3{$sstylesheet}' _ext='3' _time='1'><a href='{$ufolder}{$sstylesheet}' target='_blank'>{$sstylesheet}</a></td>\n" . "<td _size='1'>" . $filesize . "</td>" . $edit . $rename . "<td><a href='{$folder}{$stylesheet}' target='_blank'><span>查看</span></td>" . $generate_pdf . "<td></td></tr>";
            }
            $b ++;
        }
    }
}
// 关闭文件流
closedir($style);

//表格标题设置



$lu = explode('/', $_SESSION['folder']);
array_pop($lu);
$u = '';
echo '<h5 class=\"sub-header\">';
foreach ($lu as $v) {
    $u = $u.$v.'/';
    if($v=='.'){$v='主页';}elseif($v==''){$v='根目录';}
    echo '<a href="'.$meurl.'?op=home&folder='.$u.'">'.$v.'</a> » ';
}
echo "文件\n"
    ."<span class='nav-right'>",$a-1," 个文件夹 ",$b-1," 个文件</span></h5>";

// 返回上一级目录

if ($_SESSION['folder'] != './' and $_SESSION['folder'] != '/') {
    $last = (substr($_SESSION['folder'], 0, 1) == '/') ? explode('/', substr($_SESSION['folder'], 1, - 1)) : explode('/', substr($_SESSION['folder'], 2, - 1));
    $back = (substr($_SESSION['folder'], 0, 1) == '/') ? '' : substr($_SESSION['folder'], 0, 1);
    array_pop($last);
    foreach ($last as $value) {
        $back = $back . '/' . $value;
    }
    echo "<tr width=100%><td></td><td _order=\"1\" _ext=\"1\" _time=\"1\"><a href='{$meurl}?op=home&folder=" . $back . "/" . "'>上级目录</a></td><td _size=\"1\"></td><td></td><td></td><td></td><td></td><td></td></tr>";
}

for ($i = 1; $i < $a; $i ++)
    echo $content1[$i];

for ($j = 1; $j < $b; $j ++)
    echo $content2[$j];

require_once 'bottom.php';
echo "</table></div></form>";
