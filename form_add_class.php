
<style>
	radioset span, #radioset_status span {
		font-weight: initial;
		font-family: Calibri;
		font-size: initial;
	}

	#radioset label, #radioset_status label {
		width: 50%;
	}
</style>

<script>
	$(function() {
	
		$( "#radioset_status" ).buttonset();
		
	});
</script>

	<div id="error_msg" class="alert_msg" style="display: none;">Fill in required fields.</div>	

	<form id='add_class_form' style='width: 80%; margin: 0 auto;' class="form-horizontal">
		<div class="form-group">
			<label for="lbl_class" class="col-sm-3 control-label">Class *</label>
			<div class="col-sm-8">
			<input type="text" class="form-control" id="input_class"  name="input_class"  >
			</div>
		</div>
		<div class="form-group">
			<label for="lbl_status" class="col-sm-3 control-label">Status</label>
			<div class="col-sm-8">
				<div id="radioset_status" class="rad_class_status" style="width: 100%;">
					<input type="radio" id="radio1_status" name="rad_status" value="1" checked><label for="radio1_status">Enable</label>
					<input type="radio" id="radio3_status" name="rad_status" value="0"><label for="radio3_status">Disable</label>
				</div>
			</div>
		</div>
	</form>




