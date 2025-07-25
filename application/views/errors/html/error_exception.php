<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Exception Error</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" crossorigin href="<?= base_url('public/css/brutals.css'); ?>">
</head>

<body class="d-flex align-items-center justify-content-center vh-100">

	<div class="container">
		<div class="card card-brutalist p-4 mx-auto text-start" style="max-width: 800px;">
			<h4 class="font-ui">An uncaught Exception was encountered</h4>
			<hr>
			<p><strong>Type:</strong> <?php echo get_class($exception); ?></p>
			<p><strong>Message:</strong> <?php echo $message; ?></p>
			<p><strong>Filename:</strong> <?php echo $exception->getFile(); ?></p>
			<p><strong>Line Number:</strong> <?php echo $exception->getLine(); ?></p>

			<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>
				<hr>
				<p class="font-ui"><strong>BACKTRACE:</strong></p>
				<?php foreach ($exception->getTrace() as $error): ?>
					<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
						<div class="p-2 mb-2" style="border: 1px solid var(--color-border);">
							<p class="mb-0"><strong>File:</strong> <?php echo $error['file']; ?></p>
							<p class="mb-0"><strong>Line:</strong> <?php echo $error['line']; ?></p>
							<p class="mb-0"><strong>Function:</strong> <?php echo $error['function']; ?></p>
						</div>
					<?php endif ?>
				<?php endforeach ?>
			<?php endif ?>
		</div>
	</div>

</body>

</html>