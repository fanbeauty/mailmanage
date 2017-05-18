<?php
session_start();
include_once 'header.php';
$username = $_POST['username'];
$password = $_POST['password'];
if ($username == '123' && $password == '123') {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header("Location:manage.php?op=home");
} else {
    ?>
<body class="container">
	<div class="alert alert-warning" role="alert">
		用户名或密码错误， <a href="login.php" class="alert-link">请重新登陆</a>
	</div>
<?php
}
include_once 'footer.php';
?>