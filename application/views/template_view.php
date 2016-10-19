<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title ?></title>
	<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href="<?= base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url()?>assets/css/style.css" rel="stylesheet">
	<link href="<?= base_url()?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

<body>

<div class="container">
	<?= $content ?>

<footer>
	<?php if ($report_form): ?>
		<?= $report_form ?>
		<?php if($this->session->flashdata('error')) : ?>
			<div class="errors"><?= $this->session->flashdata('error')  ?></div>
		<?php endif; ?>
	<?php endif; ?>
	<div class="footer-info">
		Created by Lukáš Danko | <?php echo anchor('report','Reports'); ?>
	</div>
</footer>
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?= base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/js/script.js"></script>
</html>