</div><!--end of body wrapper-->

</div><!--end of page wrapper-->

<div id="pageMessages"></div>

<?php
$currentPage = basename($_SERVER['REQUEST_URI']);
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Lấy phần đường dẫn của URL
$parts = explode('/', $path); // Tách đường dẫn thành các phần dựa trên ký tự '/'
$verify = $parts[1]; // Lấy phần tử thứ 2

if ($currentPage !== "login" && $currentPage !== "register" && $currentPage !== "forgot-password" && $verify != "verify") {
	$this->load->view("partials/footer");
}
?>



<?php $this->load->view("js-template/template"); ?>

<?php echo $scripts; ?>

<!-- <script type="module" src="<?= get_script_uri('controllers/inactivity') ?>"> </script> -->
<script src="<?= get_script_uri('jquery.easing.1.3.min') ?>"> </script>
<script src="<?= get_script_uri('jquery.sticky') ?>"> </script>
<script src="<?= get_script_uri('owl.carousel.min') ?>"> </script>
<script src="<?= get_script_uri('main') ?>"> </script>

</div>

</body>

</html>