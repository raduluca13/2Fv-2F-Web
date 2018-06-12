<h1 style="text-align:center">Profile</h1>
	<form class="register" action="" method="post">

		<span id="profile_success" style="display:block; color: #11aa0b; font-weight: bold;">You have modified your account informations successfully!.</span>
		<span id="profile_failure" style="display:block; color: #e21212; font-weight: bold;">Sorry! You have not succed to modify your account informations.</span>

		<script>
			setElementInvisible('profile_success')
			setElementInvisible('profile_failure')
		</script>

		<div>
			<label for="First Name">First Name</label>
		  	<input type="text" name="firstname" id="firstname" onblur="onBlur()">
            	<span id="firstname_error">Please enter a valid First name.</span>
		</div>

		<div>
		  	<label for="Last Name">Last Name</label>
			<input type="text" name="lastname" id="lastname" onblur="onBlur()">
            <span id="lastname_error">Please enter a valid Last name.</span>
		</div>

		<div>
			<label for="github">Github account</label>
			<input type="link" name="github" id="git" onblur="onBlur()">
      <span id="github_error">You musts specify a valid GitHub account</span>
		</div>

		<div>
			<label for="facebook">Facebook account</label>
			<input type="link" name="facebook" id="fb" onblur="onBlur()">
            <span id="facebook_error">Please enter a valid facebook account link.</span>
		</div>

        <div>
            <label for="profile">Password</label>
            <input type="password" name="password" id="pwd" placeholder="optional" onblur="onBlur()">
						<span id="password_error">Enter a password longer than 8 characters</span>

        </div>

        <div>
            <label for="profile">Confirm password*</label>
            <input type="password" name="confirmpassword" id="c_pwd" onblur="onBlur()">
            <span id="confirm_password_error" style="color: #e21212;" </span>
        </div>

        <div class="actions">
                <!--<input type="submit" id="edit_fb" name="register" onclick="jsProfile()" value="Edit">-->
            <input type="button" id="home_button" value="Home" onclick="window.location.href='/home'" />
            <button type="button" id="edit_button" onclick="jsProfile()">Edit</button>
            
        </div>
	</form>
