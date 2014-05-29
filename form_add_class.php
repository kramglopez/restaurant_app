
<style>
	radioset span, #radioset_status span {
		font-weight: initial;
		font-family: Calibri;
		font-size: initial;
	}

	#radioset label, #radioset_status label {
		width: 50%;
	}

	.alert_msg {
		background-color: #f2dede;
		border: 1px solid #ebccd1;
		color: #a94442;
		padding: 15px;
		border-radius: 4px;
		margin-bottom: 20px;
	}
</style>

<script>
	$(function() {
	
		$( "#radioset_status" ).buttonset();
		
	});
	
	/********** form_add_class.php - get status button value **********/
	$('input:radio[id=radio1_status]').click(function() {
		$('input#status_value').val('1')
	})
	$('input:radio[id=radio3_status]').click(function(){
		$('input#status_value').val('0')
	})
</script>

	<div id="error_msg" class="alert_msg" style="display: none;">Fill in required fields.</div>	

	<form id='add_class_form' style='width: 80%; margin: 0 auto;' class="form-horizontal">
		<div class="form-group">
			<label for="lbl_class" class="col-sm-3 control-label">Class</label>
			<div class="col-sm-8">
			<input type="text" class="form-control" id="tb_class"  name="tb_class"  >
			</div>
		</div>
		<div class="form-group">
			<label for="lbl_status" class="col-sm-3 control-label">Status</label>
			<div class="col-sm-8">
				<div id="radioset_status">
					<input type="radio" id="radio1_status" name="rad_status" value="enable" checked><label for="radio1_status">Enable</label>
					<input type="radio" id="radio3_status" name="rad_status" value="disable"><label for="radio3_status">Disable</label>
				</div>
			</div>
		</div>
	</form>




