</div><!--end of body wrapper-->

</div><!--end of page wrapper-->


<?php
$currentPage = basename($_SERVER['REQUEST_URI']);
if ($currentPage !== "login" && $currentPage !== "register") {
	$this->load->view("partials/footer");
}
?>



<?php $this->load->view("js-template/template"); ?>

<?php echo $scripts; ?>

<script type="module" src="<?= get_script_uri('controllers/inactivity') ?>"> </script>

</div>

</body>

</html>