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
					<label for="text">Tên: </label>
					<div class="sec-2">
						<input type="text" name="input_user_first_name" placeholder="Vui lòng nhập tên...">
					</div>
				</div>

				<div class="lname">
					<label for="text">Họ đệm: </label>
					<div class="sec-2">
						<input type="text" name="input_user_last_name" placeholder="Vui lòng nhập họ đệm...">
					</div>
				</div>

				<div class="email">
					<label for="email">Email: </label>
					<div class="sec-2">
						<input type="email" name="input_user_login" placeholder="Vui lòng nhập email...">
					</div>
				</div>

				<div class="password">
					<label for="password">Mật khẩu:</label>
					<div class="sec-2">
						<input class="pas" type="password" name="input_user_password" placeholder="Vui lòng nhập mật khẩu...">
						<ion-icon class="show-hide md hydrated" name="eye-outline" role="img" aria-label="eye outline">
						</ion-icon>
					</div>
				</div>

				<div class="password">
					<label for="password">Nhập lại mật khẩu:</label>
					<div class="sec-2">
						<input class="pas" type="password" name="input_user_password2" placeholder="Vui lòng nhập lại mật khẩu...">
						<ion-icon class="show-hide md hydrated" name="eye-outline" role="img" aria-label="eye outline">
						</ion-icon>
					</div>
				</div>

				<button type="submit" class='btn btn-lg btn-primary' id="register">Đăng ký</button>

				<div class="footer">
					<span><a href="/login">Đăng nhập</a></span>
					<span><a href="/forgot-password">Quên mật khẩu?</a></span>
				</div>
			</div>

		</form>
	</div>
	<!--- wrapper inner -->
</div>
<!--- register wrapper -->