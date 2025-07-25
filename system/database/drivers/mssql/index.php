<?php
defined('BASEPATH') or
	header("Location: error");
$ci = new CI_Controller();
$ci = &get_instance();
$ci->load->library('url');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo $ci->config->item('url_logo') ?>" type="image/png" sizes="64x64">
	<title>Error</title>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Space+Grotesk:wght@300..700&display=swap"
		rel="stylesheet" />
	<script type="module" crossorigin src="<?= base_url('public/js/all.min.js') ?>"></script>
	<link rel="stylesheet" crossorigin href="<?= base_url('public/css/all.css') ?>">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<style>
	.scroll-top {
		position: fixed;
		bottom: 1rem;
		right: 1rem;
		display: none;
		z-index: 1000;
	}
</style>

<body>
	<div class="scroll-top">
		<button class="btn btn-neoraised btn-warning btn-md-lg">
			<i class="bi bi-chevron-up"></i>
		</button>
	</div>
	<div class="d-flex align-items-center justify-content-center vh-100">
		<div class="text-center">
			<h1 class="display-1 fw-bold text-dark mb-0">Error</h1>
			<h2 class="display-6 fw-semibold text-secondary mb-3">
				403 Forbidden
			</h2>
			<p class="text-muted mb-4 fs-4">
				Directory access is forbidden.
			</p>
			<div class="d-flex justify-content-center">
				<a href="<?= base_url('home'); ?>" class="btn btn-primary btn-neoraised btn-lg fw-bold"> Kembali</a>
			</div>
		</div>
	</div>
</body>

<script>
	window.addEventListener("scroll", function() {
		if (window.scrollY > 100) {
			document.querySelector(".scroll-top").style.display = "block";
		} else {
			document.querySelector(".scroll-top").style.display = "none";
		}
	});
	document.querySelector(".scroll-top").addEventListener("click", function() {
		window.scrollTo({
			top: 0,
			behavior: "smooth"
		});
	});
</script>

</html>