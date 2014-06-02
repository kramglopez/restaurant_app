<?php 
	include('var_functions.php');
	
	$var_func = new var_functions();  
	$gen_password = $var_func->generate_password();
	// var_dump($gen_password);
	?>
<html>

<script src="js/home.js" type="text/javascript" language="javascript"></script>

<style>
#radioset span, #radioset_gender span {
	font-weight: initial;
	font-family: Calibri;
	font-size: initial;
}

#radioset label, #radioset_gender label {
	width: 50%;
}
</style>

<script>
$(function() {
		
	$( "#radioset" ).buttonset();
	
	$( "#radioset_gender" ).buttonset();
		
});
</script>

<body>

<div id='main_profile' >

	<div id="add_staff" >		
			<form id="add_staff_form" class="ac-login" action="?" method="post">

				<div id="validation_msg" class="msg_container error_msg" style=""><span id="val_msg" style="margin: 0px;"></span></div>
	 
				<table border="0" style="width: 100%;">
					<tr>
						<td colspan="2" style="text-align:left;">
							<h3 style="margin-top: 0px;">Restaurant Information</h3>
							<div style='display:none;background-color:#FF8073;' id = 'err_msg'></div>
						</td>

					</tr>
					<tr>
						<td class="padding_left">Restaurant *</td>
						<td class="padding_right"><input class="form-control" type="text" name="fname" id="fname"/></td>
					</tr>
					<tr>
						<td class="padding_left">Name</td>
						<td class="padding_right"><input class="form-control" type="text" name="mname" id="mname"/></td>
					</tr>
					<tr>
						<td class="padding_left">Type</td>
						<td class="padding_right">
							<select class="res_select form-control"  id = "country" name="country">
								<option value=""></option>

							</select>
						</td>
					</tr>					
					<tr>
						<td class="padding_left">Address</td>
						<td class="padding_right"><input class="form-control" type="text" name="lname" id="lname"/></td>
					</tr>
					<tr>
						<td class="padding_left">Contact No.</td>
						<td class="padding_right"><input class="form-control" type="text" name="lname" id="lname"/></td>
					</tr>
					<tr>
						<td class="padding_left">Logo</td>
						<td class="padding_right"><input type="file" class="form-control" id="inp_res_image" name="inp_res_image" /> 
</td>
					</tr>
					<tr>
						<td class="padding_left">Email</td>
						<td class="padding_right"><input class="form-control" type="email" name="email" id="email"/></td>	
					</tr>
					<tr>
						<td class="padding_left">Status</td>
						<td style="padding-left: 6px;">
							<div id="radioset">
								<input type="radio" id="radio1" name="status" value="activate" checked><label for="radio1">Activate</label>
								<input type="radio" id="radio3" name="status" value="deactivate"><label for="radio3">Deactivate</label>
							</div>
						</td>
					</tr>
				
				</table>
			</form>
	</div>

	<div id='confirm_add_user' style='display:none;' >
		<table>
			<tr>
				<td>
					<img src='https://d2g691qpj752hh.cloudfront.net/AcrestaPhilippines/phil1/thumbsUpOrange.png'>
				</td>
				<td>
					Your have successfully added a user.
				</td>
			</tr>
		</table>
	</div><!-- /confirm_add -->
	
</div>
	
</body>

</html>