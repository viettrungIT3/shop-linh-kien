<style id="css-reset-password"><?=load_css("login");?></style>
<div class="wrapper reset-password">
    <div class="wrapper-inner">
    <div class="info">
	<div class="logo">
					<?php  $this->load->view("partials/icons/logo") ?>
				</div>
           <div class="content">
                  <h1>Reset your password</h1>
           </div>
		   <div class="error">
				<?php $this->load->view("/partials/messages")?>
				</div>
        </div>
        <form class="" action="" method="post">
        <div class="row">
       
            <div class="col-sm-12">
                
                <div class="form-group">
                    <label>PLEASE TYPE IN YOUR NEW PASSWORD</label>
                    <input type="password" name="input_password" value="" class="form-control" placeholder="Password new" required title="
                   	 Please fill in the password field" />
                </div><!--end of form group-->
            </div><!--end of cols 12-->
            <div class="col-sm-12">
            <div class="row">
            <div class="col-md-12 form-group">
                <button type="submit" class='btn btn-lg btn-primary' id="reset"> Save</button>
            </div>
          </div>
            </div><!--end of cols 12-->
        </div><!--end of row-->
        </form>
        <div class='row'>
            <div class="col-sm-12 sub-links text-center">
                <p>
                Already have an account?
                    <a href="<?=base_url("/login")?>">Log in</a>
                </p>
            </div>
        </div>
    </div><!--- wrapper inner -->
</div><!--- login wrapper -->




