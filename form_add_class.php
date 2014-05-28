



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
	
	/********** form_add_class.php - get status button value **********/
	$('input:radio[id=radio1_status]').click(function() {
		$('input#status_value').val('1')
	})
	$('input:radio[id=radio3_status]').click(function(){
		$('input#status_value').val('0')
	})
	</script>


	<form id='manage_product' style='width: 80%; margin: 0 auto;' class="form-horizontal">
		<div class="form-group">
			<label for="inp_menu_name" class="col-sm-3 control-label">Class</label>
			<div class="col-sm-8">
			<input type="text" class="form-control" id="inp_menu_name"  name="inp_menu_name"  >
			</div>
		</div>
		<div class="form-group">
			<label for="inp_menu_name" class="col-sm-3 control-label">Status</label>
			<div class="col-sm-8">
				<div id="radioset_status">
					<input type="radio" id="radio1_status" name="status" value="enable" checked><label for="radio1_status">Enable</label>
					<input type="radio" id="radio3_status" name="status" value="disable"><label for="radio3_status">Disable</label>
				</div>
			</div>
			
			<input type="hidden" name="status_value" id="status_value" value="1" />
			
		</div>
	</form>




