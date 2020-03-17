<html>
	<head>
		<title>Kajan</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
		<script src="<?php echo base_url('assets/js/jquery-3.1.0.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	</head>
	<body>
			<div class="container pt-5">
				<h3>Insert date using codeIgniter</h3>
				<form method="post" action="<?php echo base_url()?>main/form_validation">
					<div class="form-group">
						<label>Enter First Name</label>
						<input type="text" name="first_name" class="form-control">
						<span class="text-danger"><?php echo form_error('first_name');?></span>
					</div>
					<div class="form-group">
						<label>Enter Last Name</label>
						<input type="text" name="last_name" class="form-control">
						<span class="text-danger"><?php echo form_error('last_name');?></span>
					</div>
				</form>
			</div>
	</body>
</html>
