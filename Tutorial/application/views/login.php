<html>
	<head>
		<title>Kajan</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
		<script src="<?php echo base_url('assets/js/jquery-3.1.0.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	</head>
	<body>
	<div class="container p-5">
		<form method="post" action="<?php echo base_url();?>main/login_validation">
			<div class="form-group">
				<label>Enter Username</label>
				<input type="text" name="username" class="form-control">
				<span class="text-danger"><?php echo form_error('username'); ?><span>
			</div>
			<div class="form-group">
				<label>Enter Password</label>
				<input type="password" name="password" class="form-control">
				<span class="text-danger"><?php echo form_error('password'); ?><span>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" name="insert" value="Login">
				<?php
				echo $this->session->flashdata('error');
				?>
			</div>
		</form>
	</div>
	<?php
	?>
	</body>
</html>

