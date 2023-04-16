<style id="css-login">
	<?= load_css("login"); ?>
</style>
<div class="wrapper login-wrapper">
	<div class="wrapper-inner">

		<form class="" action="" method="POST" data-type='login-form'>
			<div class="screen-1">
				<div class="logo">
					<?php $this->load->view("partials/icons/logo") ?>
				</div>
				<div class="error text-center">
					<?php $this->load->view("/partials/messages") ?>
				</div>
				<div class="email">
					<label for="email">Email: </label>
					<div class="sec-2">
						<ion-icon name="mail-outline" role="img" class="md hydrated" aria-label="mail outline">
						</ion-icon>
						<input type="email" name="input_user_login" placeholder="Vui lòng nhập email...">
					</div>
				</div>
				<div class="password">
					<label for="password">Mật khẩu:</label>
					<div class="sec-2">
						<ion-icon name="lock-closed-outline" role="img" class="md hydrated" aria-label="lock closed outline"></ion-icon>
						<input class="pas" type="password" name="input_user_password" placeholder="Vui lòng nhập mật khẩu...">
						<ion-icon class="show-hide md hydrated" name="eye-outline" role="img" aria-label="eye outline">
						</ion-icon>
					</div>
				</div>
				<button type="submit" class='btn btn-lg btn-primary' id="login">Đăng nhập</button>

				<div class="footer">
					<span><a href="/register">Đăng ký</a></span>
					<span><a href="/forgot-password">Quên mật khẩu?</a></span>
				</div>
			</div>

		</form>
	</div>
	<!--- wrapper inner -->
</div>
<!--- login wrapper -->