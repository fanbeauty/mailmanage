<?php
include_once 'function.php';
$folder = $_REQUEST['folder'];
$file = $_REQUEST['file'];
$path = $folder . $file;
// header("Location:editplus.php?folder=$folder&file=$file");
?>

<!-- /head>
<body>
	<div class="container">
		<h5>编辑</h5>
		<form id="form"
			action="<?php echo "{$meurl}?op=editplus&folder={$folder}&file={$file}";?>"
			method="post">
			<div id="editor" name="content">
                  <?php echo uCode(file_get_contents($path));?>
             </div>
			<button type="submit" class="btn btn-default navbar-btn nav-right">保存</button>
		</form>
	</div>
</body>
</html>
-->
 <?php
	$contentData = '';
	if(file_exists($path)){
	    $content=file_get_contents($path);
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>KindEditor PHP</title>
	<link rel="stylesheet" href="themes/default/default.css" />
	<link rel="stylesheet" href="plugins/code/prettify.css" />
	<script charset="utf-8" src="js/kindeditor.js"></script>
	<script charset="utf-8" src="lang/zh_CN.js"></script>
	<script charset="utf-8" src="plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content1"]', {
				cssPath : '../plugins/code/prettify.css',
				uploadJson : '../php/upload_json.php',
				fileManagerJson : '../php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>
</head>
<body>
	<form method="post" action="<?php echo "{$meurl}?op=editplus&folder={$folder}&file={$file}";?>">
		<textarea name="content1" style="width:700px;height:200px;visibility:hidden;">
		<?php  echo $content;
	    ?></textarea>
		<br />
		<button type="submit" class="btn btn-default navbar-btn nav-right">保存</button>
	</form>
</body>
</html>