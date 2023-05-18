<style id="css-login">
	<?=load_css("forgot-password");
	?>

</style>

<div class="forgot-password">
<div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="text-center">
						<h3><i class="fa fa-lock fa-4x"></i></h3>
						<h2 class="text-center">Forgot Password?</h2>
						<p>You can reset your password here.</p>
						
						<div class="panel-body">
						<div class="error">
						<?php $this->load->view("/partials/messages")?>
					
						
					</div>
							<form id="register-form" role="form" autocomplete="off" class="form" method="post">

								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i
												class="glyphicon glyphicon-envelope color-blue"></i></span>
										<input id="email" name="email" placeholder="Email address" class="form-control"
											type="email">
									</div>
								</div>
								<div class="form-group">
									<input name="recover-submit" class="btn btn-lg btn-primary btn-block"
										value="Reset Password" type="submit" style="background: #1abc9c !important;">
								</div>


							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>
