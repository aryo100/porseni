<?php
$id_akun = "";
$username = "";
$password = "";
$pt = "";
$status = "";
if ($op=="edit") {
	foreach ($sql->result() as $obj) {
		$op = "edit";
		$id_akun = $obj->id_akun;
		$username = $obj->username;
		$password = $obj->password;
		$pt = $obj->pt;
		$status = $obj->status;

	}
	
}
?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker3.min.css" />
<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
<div class="page-content">
	<!-- Siswa -->
	<div class="page-header">
		<h1>
			Akun
		</h1>
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/admin/akun_simpan" method="POST">
		<div class="form-horizontal" >  
			<input type="hidden" name="op" value="<?php echo $op;?>" class="form-control">
			<input type="hidden" name="id_akun" value="<?php echo $id_akun;?>" class="form-control">
			
			<!-- User -->
			<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Usename </label>
			<div class="col-sm-3">
				<input type="text" id="form-field-1" placeholder="Username" name="username" value="<?php echo $username;?>" class="col-xs-12" required/>
			</div>
			</div>

			<!-- Pass -->
			<?php if ($op=="edit") { ?>
			<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password </label>
			<div class="col-sm-3">
				<input type="text" id="form-field-1" placeholder="123445" name="password" value="<?php echo $password;?>" class="col-xs-12" required/>
			</div>
			</div>
			<?php } ?>

			<!-- Nama -->
			<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Perguruan Tinggi </label>
			<div class="col-sm-3">
				<input type="text" id="form-field-1" placeholder="Politeknik Negeri Jakarta" name="pt" value="<?php echo $pt;?>" class="col-xs-12" required/>
			</div>
			</div>

			<!-- Submit -->
			<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right"></label>
			<div class="col-sm-3">
				<button type="submit" class="btn btn-primary btn-sm">Submit</button>
			</div>
			</div>
		
		
		
		</div>
		</form>
		<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
<script type="text/javascript">
//datepicker plugin
//link
$('.date-picker').datepicker({
	autoclose: true,
	todayHighlight: true
})
//show datepicker when clicking on the icon
.next().on(ace.click_event, function(){
	$(this).prev().focus();
});
</script>
