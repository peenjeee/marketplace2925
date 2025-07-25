<?php
defined('BASEPATH') or
	header("Location: error");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>403 Forbidden</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" crossorigin href="<?= base_url('public/css/all.css'); ?>">
</head>

<body class="d-flex align-items-center justify-content-center vh-100">

	<div class="container text-center">
		<div class="card card-brutalist p-5 mx-auto" style="max-width: 600px;">
			<h1 class="display-1 font-display" style="color: var(--color-accent-flame);">403</h1>
			<h2 class="font-ui">ACCESS FORBIDDEN</h2>
			<p class="text-muted mt-3">You don't have permission to access this directory.</p>
			<div class="mt-4">
				<a href="<?= base_url('welcome'); ?>" class="btn btn-hw-primary">Go to Homepage</a>
			</div>
		</div>
	</div>

</body>

</html>