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
				<h3>Insert date using codeIgniter</h3>

				<?php
				if($this->uri->segment(2) == 'inserted'){
					echo '<p class="text-success">Data Inserted</p>';
				}
				?>
				<form method="post" action="<?php echo base_url()?>main/form_validation" class="pt-5">
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
					<div class="form-group">
						<button type="submit" name="insert" class="btn btn-info">Insert</button>
					</div>
				</form>

				<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Delete</th>
						</tr>
						<?php
						if($fetch_data->num_rows() > 0) {
							foreach ($fetch_data->result() as $row) {
								?>
								<tr>
								<td><?php echo $row->Id; ?></td>
								<td><?php echo $row->first_name; ?></td>
								<td><?php echo $row->last_name; ?></td>
									<td><a href="#" class="delete_data" id="<?php echo $row->Id; ?>">Delete</a> </td>
								</tr>
						<?php
							}
						}
						else{ ?>
						<tr>
							<td colspan="3" class="text-center">No Data Found</td>
							</tr>
						<?php
						}
						?>
					</table>
				</div>
			</div>
			<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			var id = $(this).attr("id");
			if(confirm("Are you sure you want to delete this?"))
			{
			window.location = "<?php echo base_url();?>main/delete_data/"+id;
			}
			else {
			return false;
			}
        });
        });
			</script>
	</body>
</html>
