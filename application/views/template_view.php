<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title ?></title>
	<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href="<?= base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<link href="<?= base_url()?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">


	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.0/css/select.bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/editor.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/editor.bootstrap.min.css">

	<link href="<?= base_url()?>assets/css/style.css" rel="stylesheet">
</head>

<body>

<div class="auth_panel">
	<?php if(is_logged()) {

		echo $this->session->userdata('email');
		echo " ";
		echo anchor('auth/logout',"Logout");
	}else{
		echo anchor('auth/login','Login');
		echo " ";
		echo anchor('auth/register','Register');

	}; ?>

</div>

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
		Created by Lukáš Danko | <?php echo anchor('report','Reports') . " | " . anchor('datatable','DataTable'); ?>
	</div>
</footer>
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.1.0/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/select/1.1.0/js/dataTables.select.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/dataTables.editor.js"></script>
<script src="<?= base_url()?>assets/js/editor.bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/js/script.js"></script>
</html>