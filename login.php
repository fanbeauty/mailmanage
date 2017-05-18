<?php
include_once 'header.php';
?>
<body>
	<div class="container">
		<form action="login_chk.php" method="post" class="form-login">
			<h2 class="form-login-heading">MailManage</h2>
			<div class="form-group">
				<label class="sr-only" for="inputUsername">username</label> <input
					type="text" class="form-control" id="inputUsername"
					placeholder="Username" name="username" required /> <label
					class="sr-only" for="inputPassword">password</label> <input
					type="password" class="form-control" id="inputPassword"
					placeholder="Password" name="password" required" />
			</div>
			<button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
		</form>
	</div>
<?php
include_once 'footer.php';
?>