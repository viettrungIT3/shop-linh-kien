
<form class="" action="" method="POST" data-type='login-form'>
    <div class="row">

        <?php $this->load->view("partials/inputs/input", [
                "value"     => genics_get_value($params['posting'] ?? NULL, "input_user_login", "", FALSE), 
                "type"      => "email", 
                "class"     => "form-control",
                "name"      => "input_user_login", 
                "label"     => "Email address", 
                "before"    => "<div class='col-md-12 form-group'>", 
                "after"     => "</div>", 
                "attributes" => [ 
                    "required" => true
                 ]
            ]);
        ?>

    </div>

    <div class="row">

        <?php $this->load->view("partials/inputs/input", [
            "value"     => "", 
            "type"      => "password", 
            "class"     => "form-control",
            "name"      => "input_user_password", 
            "label"     => "Password", 
            "before"    => "<div class='col-md-12 form-group'>", 
            "after"     => "</div>", 
            "attributes" => [
                "required" => true
             ]

        ]);?>

    
    </div>

    <!--button controls-->
    <div class="row">
        <div class="col-md-12 form-group">
            <button type="submit" class='btn btn-lg btn-primary' id="login">Log in</button>
        </div>
    </div><!--submit-->

</form><!-- form  -->
