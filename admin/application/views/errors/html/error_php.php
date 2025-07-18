<?php
defined('BASEPATH') or
	header("Location: error");

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?= base_url('public/img/icon.png') ?>" type="image/png" sizes="32x32">
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

<!-- <style>
	.scroll-top {
		position: fixed;
		bottom: 1rem;
		right: 1rem;
		display: none;
		z-index: 1000;
	}
</style> -->

<body>
	<div class="d-flex align-items-center justify-content-center vh-100">
		<div class="text-center">
			<h1 class="display-1 fw-bold text-dark mb-0">Error</h1>
			<h4 class="fs-2 fw-bold text-dark mb-3">A PHP Error was encountered</h4>

			<p class="text-danger">Severity: <?php echo $severity; ?></p>
			<p class="text-danger">Message: <?php echo $message; ?></p>
			<p class="text-danger">Filename: <?php echo $filepath; ?></p>
			<p class="text-danger">Line Number: <?php echo $line; ?></p>

			<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

				<p class="text-danger">Backtrace:</p>
				<?php foreach (debug_backtrace() as $error): ?>

					<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>

						<p style="margin-left:10px" class="text-danger">
							File: <?php echo $error['file'] ?><br />
							Line: <?php echo $error['line'] ?><br />
							Function: <?php echo $error['function'] ?>
						</p>

					<?php endif ?>

				<?php endforeach ?>

			<?php endif ?>
		</div>
	</div>
	<!-- <footer class="mt-5 py-3">
		<div class="container">
			<div class="row">
				<div class="col-md-6 mx-auto text-center">
					&copy; Copyright 2024,
					<a href="https://github.com/RamsNotes31/outdooria-fp" class="text-decoration-none text-dark fw-bold" target="_blank">Outdooria</a>.
				</div>
			</div>
		</div>
	</footer> -->
	</div>
</body>
<!-- <script>
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
</script> -->

</html>