<?php
include_once 'function.php';
// 上传文件
?>
<body>
	<div class="container kv-main">
		<hr>
		<form enctype="multipart/form-data" method="post">
			<label><h4><?php echo "本地上传 Max:" . ini_get('upload_max_filesize') . "," . ini_get('max_file_uploads') . "个";?></h4></label>
			<input id="file-fr" name="file-fr[]" type="file" multiple>
		</form>
		<hr>
		<br>
	</div>
	