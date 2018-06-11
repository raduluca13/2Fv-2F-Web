<h1 style="text-align:center">Register</h1>
	<form class="register" action="#" method="post">
		<span id="register_success" style="display:block;">You account has been created succesfully.You will be redirected soon.</span>
		<span id="register_failure" style="display:block;">You cannot create this account.You will be redirected soon.</span>
		<script>
			setElementInvisible('register_success')
			setElementInvisible('register_failure')
		</script>
		<div>
			<label for="Username">Username*</label>
			<input type="text" name="username" id="username" onblur="onBlur()">
			<span id="username_error">User is not valid</span>
		</div>

		<div>
			<label for="First Name">First Name*</label>
		  	<input type="text" name="firstname" id="firstname" onblur="onBlur()">
				<span id="firstname_error">First name is not valid</span>
		</div>

	  <div>
			<label for="Last Name">Last Name*</label>
	  	<input type="text" name="lastname" id="lastname" onblur="onBlur()">
			<span id="lastname_error">Last name is not valid</span>
	</div>

  <div>
  	<label for="password">Password*</label>
  	<input type="password" name="password" id="password" onblur="onBlur()">
		<span id="password_error">Enter a password longer than 8 characters</span>
	</div>

  <div>
  	<label for="password">Confirm Password*</label>
  	<input type="password" name="confirm_password" id="confirm_password" onblur="onBlur()">
		<span id="confirm_password_error">You musts specify the correct password!</span>
  </div>

	  <div>
			<label for="github">Github account*</label>
	  	<input type="link" name="github" id="github" onblur="onBlur()">
			<span id="github_error">You musts specify a valid GitHub account</span>
		</div>

	  <div>
			<label for="facebook">Facebook account*</label>
	  	<input type="link" name="facebook" id="facebook">
			<span id="facebook_error">You musts specify a valid Facebook account</span>
		</div>

	  <div><label for="gender">Gender*</label>
	   <fieldset>
		  <legend>Choose your gender</legend>
			  <div>
			    <input type="checkbox" id="female" name="gender" value="female" onclick="deselect_male()">
			    <label for="female">Female</label>
			  </div>
			  <div>
			    <input type="checkbox" id="male" name="gender" value="male" onclick="deselect_female()">
			    <label for="male">Male</label>
			  </div>
			</fieldset>
		</div>
		<div class="actions">
		  <button type="button" onclick="jsRegister()">Register</button>
		</div>

		<div class="account" style="text-align:center;">
			<a href="/login">I've already have an account</a>
			</div>
	</form>
</body>
