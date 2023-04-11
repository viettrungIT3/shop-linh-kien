<style id="css-header-bar">
	<?= load_css("main-nav") ?>
</style>
<div class="shop">
	<div class="wrapper-inner">

		<div class="user-login">
			<div class="container">

				<div class="container-head">
					<a href="" class="logo">
						<?php $this->load->view("partials/icons/logo") ?>
					</a>

					<div class="container-nav">
						<?php $this->load->view("partials/header-nav") ?>

						<?php if ($params['user']) { ?>
							<button type="button" class="btn btn-outline-danger"><a href="/logout">Đăng xuất</a></button>
						<?php } else { ?>
							<button type="button" class="btn btn-outline-primary"><a href="/register">Đăng ký</a></button>
							<button type="button" class="btn btn-outline-primary"><a href="/login">Đăng nhập</a></button>
						<?php } ?>
					</div>

				</div>
			</div>

		</div><!-- end of wrapper inner -->
	</div><!-- end of header bar wrapper -->