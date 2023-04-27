<style id="css-register">
	<?= load_css("login"); ?>
</style>
<div class="wrapper login-wrapper">
	<div class="wrapper-inner">

		<form class="" action="" method="POST" data-type='register-form'>
			<div class="screen-1">
				<div class="logo">
					<?php $this->load->view("partials/icons/logo") ?>
				</div>
				<div class="error">
					<?php $this->load->view("/partials/messages") ?>
				</div>

				<div class="fname">
					<label for="text">First name: </label>
					<div class="sec-2">
						<input type="text" name="input_user_first_name" placeholder="Please enter first name...">
					</div>
				</div>

				<div class="lname">
					<label for="text">Last name: </label>
					<div class="sec-2">
						<input type="text" name="input_user_last_name" placeholder="Please enter last name...">
					</div>
				</div>

				<div class="email">
					<label for="email">Email: </label>
					<div class="sec-2">
						<input type="email" name="input_user_login" placeholder="Please enter email...">
					</div>
				</div>

				<div class="password">
					<label for="password">Password::</label>
					<div class="sec-2">
						<input class="pas" type="password" name="input_user_password" placeholder="Please enter a password...">
						<ion-icon class="show-hide md hydrated" name="eye-outline" role="img" aria-label="eye outline">
						</ion-icon>
					</div>
				</div>

				<div class="password">
					<label for="password">Re-enter the password:</label>
					<div class="sec-2">
						<input class="pas" type="password" name="input_user_password2" placeholder="Please re-enter password...">
						<ion-icon class="show-hide md hydrated" name="eye-outline" role="img" aria-label="eye outline">
						</ion-icon>
					</div>
				</div>

				<button type="submit" class='btn btn-lg btn-primary' id="register">Register</button>

				<div class="footer">
					<span><a href="/login">Log in</a></span>
					<span><a href="/forgot-password">Forgot password?</a></span>
				</div>
			</div>

		</form>
	</div>
	<!--- wrapper inner -->
</div>
<!--- register wrapper -->