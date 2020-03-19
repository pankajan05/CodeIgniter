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
			<h3 align="center"><?php echo $title; ?></h3>
			<form method="post" id="upload_form" align="center" enctype="multipart/form-data">
				<input type="file" name="image_file" id="image_file">
				<br><br>
				<input type="submit" name="upload" id="upload" value="Upload" class="btn btn-primary">
			</form>
			
			<div id="uploaded_image" class="pt-5">
				<?php echo $image_data; ?>
			</div>
		</div>
	</body>
<script>
	$(document).ready(function () {
		$('#upload_form').on('submit', function (e) {
			e.preventDefault();
			if($('#image_file').val() == '') {
			    alert("Please Select the File");
			} else {
			    $.ajax({
					url:"<?php echo base_url(); ?>main/ajax_upload",
					method:'POST',
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success:function (data) {
						$('#uploaded_image').html(data);
                    }
				})
			}
        })
    })
</script>
</html>
