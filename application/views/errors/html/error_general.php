<?php
defined('BASEPATH') or
	header("Location: error");
$ci = new CI_Controller();
$ci = &get_instance();
$ci->load->helper('url');
?>

<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo $ci->config->item('url_logo') ?>" type="image/png" sizes="64x64">
	<title>Error</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" crossorigin href="<?= base_url('public/css/brutals.css'); ?>">
</head>

<body class="d-flex align-items-center justify-content-center vh-100">

	<div class="container text-center">
		<div class="card card-brutalist p-5 mx-auto" style="max-width: 600px;">
			<h1 class="display-1 font-display" style="color: var(--color-accent-flame);"><?php echo $heading; ?></h1>
			<p class="text-muted mt-3 fs-5"><?php echo $message; ?></p>
			<div class="mt-4">
				<a href="<?php echo base_url("welcome"); ?>" class="btn btn-hw-primary">Kembali ke Beranda</a>
			</div>
		</div>
	</div>

</body>

</html>