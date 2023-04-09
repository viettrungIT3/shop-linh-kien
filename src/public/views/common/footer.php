</div><!--end of body wrapper-->

</div><!--end of page wrapper-->

<?php if (!isset($params['timer']) || $params['timer'] === TRUE): ?>
	<div class="wrapper logout-wrapper">
		<div class="logout-wrapper-inner">

			<div class="logout-container">

				<div class="logout-container-inner">

					<h2>You will be logged out soon</h2>

					<div class="logout-content">

						<div class="logout-content-inner">

							Auto logout is happening in <span class='seconds-count'></span> seconds.

						</div>

					</div>

					<div class="logout-footer">
						<a href="#" id='btn-continue'>I'm still here</a>
						<a href="#" id='btn-logout'>Logout</a>
					</div>

				</div>

			</div>

		</div>
	</div>

<?php endif; ?>


<?php $this->load->view("js-template/template");?>

<?php echo $scripts;?>

<script type="module" src="<?= get_script_uri('controllers/inactivity') ?>"> </script>

</div>

</body>

</html>
