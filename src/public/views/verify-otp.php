<style id="css-forgot-password"><?=load_css("otp");?></style>

<div class="wrapper otp">
	<div class="wrapper-inner ">
		<div class="row">
			<div class="col-8">
				<div class="info">
					<div class="content">
						<h4>A Code has been sent to your email.</h4>
					</div>
				</div>
				<form class="" action="" method="post">
					<div class="row">
						<?php
						if (isset($errors[0])) :
						?>
							<div class="text-errors-wrapper text-danger">
								<?php echo $errors; ?>
							</div>
						<?php
						endif;
						?>
						<?php
						if (isset($messages[0])) :
						?>
							<div class="text-messages-wrapper text-notice">
								<?php echo $messages; ?>
							</div>
						<?php
						endif;
						?>

						<?php if (!isset($messages[0])) :  ?>

							<div class="col-md-12">
								<p class="bg-warning" style="padding: 5px 15px;">If you don't see the code in your inbox, please check your spam folder.</p>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label>YOUR CODE:</label>
									<input type="text" name="input_otp" value="" class="form-control" placeholder="Your Code" />
								</div>
								<!--end of form group-->
							</div>
							<!--end of cols 12-->
							<div class="col-sm-12" id="otp">

								<button type="submit" class="btn btn-lg btn-primary">SUBMIT</button>

								<!-- <button type="submit" data-type="otp" id="submit_otp" class="btn btn-lg btn-cancel">SEND CODE AGAIN</button>

							 -->
                            
                            <input type="hidden" name="login" value="<?php echo $this->session->userdata("login")  ?>">
								<div class='row'>
								</div>
							<?php endif; ?>

							</div>
							<!--end of cols 12-->
					</div>
					<!--end of row-->
				</form>
			</div>
		</div>
	</div>
	<!--- wrapper inner -->
</div>
<!--- login wrapper -->


