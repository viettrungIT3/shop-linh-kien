<style id="css-forgot-password"><?=load_css("login");?></style>
<div class="wrapper forgot-password">
	<div class="row">
		 <div class="col-8">
		 <div class="wrapper-inner">
        <div class="info">
		<div class="logo">
					<?php  $this->load->view("partials/icons/logo") ?>
				</div>
           <div class="content">
                <h1 class="text-center">Your password reset email is on the way!</h1>
                <p class="text-center" style="font-weight: normal;">
                    Please remember to check your spam or junk folder if you don't receive an email. 
                </p>
           </div>
        </div>
        <div class='row'>
            <div class="col-sm-12 sub-links text-center">
                <p> Already have an account?  <a href="<?=base_url("/login")?>">Log in</a> </p>
            </div>
        </div>
    </div><!--- wrapper inner -->
		 </div>
	</div>
</div><!--- forgot passwor wrapper -->




