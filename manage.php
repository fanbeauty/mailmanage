<?php
if (! session_id())
    session_start();
include_once 'header.php';
// manage.php 文件 的绝对路径
$meurl = $_SERVER['PHP_SELF'];
$op = (isset($_REQUEST['op'])) ? htmlentities($_REQUEST['op']) : 'home';
$action = (isset($_REQUEST['action'])) ? htmlspecialchars($_REQUEST['action']) : '';
$folder = (isset($_REQUEST['folder'])) ? htmlspecialchars($_REQUEST['folder']) : './';
$back = ($op !== 'home') ? $back = "<a class=\"list-group-item\" href='{$meurl}?op=home&folder=" . $_SESSION['folder'] . "'><span class=\"glyphicon glyphicon-backward\"></span>&nbsp;&nbsp;返回 " . $_SESSION['folder'] . "</a>\n" : $back = '';
?>
<body class="container">
	<h1 class="mailmanagetitle">Mailmanage</h1>
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
			<div class="list-group">
				<a href="?op=home" class="list-group-item active"><span
					class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;主页</a><?php echo $back;?> <a
					href="?op=up" class="list-group-item"><span
					class="glyphicon glyphicon-upload"></span>&nbsp;&nbsp;上传文件</a> <a
					href="?op=cr" class="list-group-item"><span
					class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;创建文件</a><a
					href="?op=logout" class="list-group-item"><span
					class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;注销</a>
			</div>
		</div>
		<div class="col-xs-12 col-sm-9">
			<div class="jumbotron">
			<?php
switch ($op) {
    case 'home':
        require_once 'home.php';
        break;
    case 'up':
        require_once 'up.php';
        break;
    case 'cr':
        require_once 'cr.php';
        break;
    case 'logout':
        require_once 'logout.php';
        break;
    case 'upload':
        require_once 'upload.php';
        break;
    case 'create':
        require_once 'create.php';
        break;
    case 're':
        require_once 're.php';
        break;
    case 'rename':
        require_once 'rename.php';
        break;
    case 'edit':
        require_once 'edit.php';
        break;
    case 'editplus':
        require_once 'editplus.php';
        break;
    case 'preview':
	    require_once 'preview.php';
    	break;
}
?>
			</div>

		</div>
	</div>
<?php
include_once 'footer.php';
?>
