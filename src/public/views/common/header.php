<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $page_title;?></title>
        <?php echo $styles;?>

        <style id="css-main-template"><?=load_css("core");?></style>
    </head>

    <body class="<?php echo $body_classes;?>" <?php if(isset($is_ie) && $is_ie): ?> data-browser='ie' <?php endif;?> >
        <main id="page-wrapper">
			<?php 
			if($params['user']){
				$this->load->view("partials/header-bar");
			}
			 ?>
       
