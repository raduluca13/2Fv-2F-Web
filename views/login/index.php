<h1 style="text-align:center">Login</h1>
<form class="login" action="#" method="post">
	<span id="login_failure" style="display:block;text-align:center;">Invalid login data.Try again!</span>
	<span id="login_success" style="display:block;text-align:center;">Login successful!You will be redirected soon!</span>
	<span id="username_error" style="display:block;text-align:center;">User is not valid</span>
	<script>
		setElementInvisible('login_failure');
		setElementInvisible('login_success');
	</script>
	<div><label for="username">Username</label>
	<input type="text" name="username" id="username" onblur="onBlur()"></div>

	<div><label for="password">Password</label>
	  <input type="password" name="password" id="password"></div>
	<div class="actions">
		<button type="button" onclick="jsLogin()">Login</button>
	</div>
	<div class="forget_password">
		<p>Register <a href="/register">here</a>.</p>
		<a href="/forgot">I forgot my password</a>
	</div>
</form>
