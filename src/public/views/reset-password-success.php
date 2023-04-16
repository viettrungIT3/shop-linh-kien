<style id="css-forgot-password"><?=load_css("login");?></style>
<div class="wrapper forgot-password">
    <div class="wrapper-inner">
        <div class="info">
		<div class="logo">
					<?php  $this->load->view("partials/icons/logo") ?>
				</div>
				<div class="error">
				<?php $this->load->view("/partials/messages")?>
				</div>
           <div class="content">
                <h1>Success</h1>
                <p style="font-weight: normal;">
                Your password has been reset. Please go back to <a href="<?=base_url("/login")?>">Log in</a> to try again.
                </p>
           </div>
        </div>
    </div><!--- wrapper inner -->
</div><!--- forgot passwor wrapper -->




