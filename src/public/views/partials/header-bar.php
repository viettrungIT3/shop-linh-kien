<style id="css-header-bar">
	<?= load_css("main-nav") ?>
</style>
<div class="shop">
	<div class="wrapper-inner">

		<div class="user-login">
			<div class="container">

				<div class="container-head">
					<?php $this->load->view("partials/icons/logo") ?>

					<div class="container-nav">
						<?php $this->load->view("partials/header-nav") ?>

						<?php if (isset($params['user'])) { ?>
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