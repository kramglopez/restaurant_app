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
							<h3 style="margin-top: 0px;">Personal Information</h3>
							<div style='display:none;background-color:#FF8073;' id = 'err_msg'></div>
						</td>

					</tr>
					<tr>
						<td class="padding_left">First Name *</td>
						<td class="padding_right"><input class="form-control" type="text" name="fname" id="fname"/></td>
					</tr>
					<tr>
						<td class="padding_left">Middle Name</td>
						<td class="padding_right"><input class="form-control" type="text" name="mname" id="mname"/></td>
					</tr>
					<tr>
						<td class="padding_left">Last Name *</td>
						<td class="padding_right"><input class="form-control" type="text" name="lname" id="lname"/></td>
					</tr>
					<tr>
						<td class="padding_left">Gender *</td>
						<td style="padding-left: 6px;">
							<div id="radioset_gender">
								<input type="radio" id="radio1_gender" name="gender" value="male" checked><label for="radio1_gender">Male</label>
								<input type="radio" id="radio3_gender" name="gender" value="female"><label for="radio3_gender">Female</label>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:left;"><h3>Address</h3></td>
					</tr>
<!--					<tr>
						<td class="padding_left">Unit No.</td>
						<td class="padding_right"><input class="form-control" type="text" name="unit_no" id="unit_no"/></td>
					</tr>
					<tr>
						<td class="padding_left">Building No./ Name</td>
						<td class="padding_right"><input class="form-control" type="text" name="building_name" id="building_name"/></td>
					</tr>
					-->
					<tr>
						<td class="padding_left">Street *</td>
						<td class="padding_right"><input class="form-control" type="text" name="street" id="street"/></td>
					</tr>
					<tr>
						<td class="padding_left">City/ Town *</td>
						<td class="padding_right"><input class="form-control" type="text" name="town_city" id="town_city"/></td>
					</tr>
					<tr>
						<td class="padding_left">State/Province</td>
						<td class="padding_right"><input class="form-control" type="text" name="state_province" id="state_province"/></td>
					</tr>
					<tr>
						<td class="padding_left">Country *</td>
						<td class="padding_right">
							<select class="res_select form-control"  id = "country" name="country">
								<option value=""></option>
						<!--		<option value="Philippines">Philippines</option>
								<option value="Australia">Australia</option>
								<option value="Singapore">Singapore</option>
								<option value="Japan">Japan</option>-->
							</select>
						</td>
					</tr>
					<tr>
						<td class="padding_left">Date of Birth *</td>
						<td class="padding_right"><input class='form_date form-control' type="date" style="" type="text" name="birth_date" id="birth_date"/></td>
					</tr>
					<tr>
					<td class="padding_left">User Level </td>
						<td class="padding_right">
							Manager
						</td>
					</tr>
					<tr>
						<td class="padding_left">Branch *</td>
						<td class="padding_right">
							<select class="res_select form-control"  id = "branch_id" name="branch_id">
								<option value=""></option>
							</select>
							<label id = 'branch_label' style = 'display:none;'></label>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:left;"><h3>Contact Information</h3></td>
					</tr>
					<tr>
						<td class="padding_left">Contact No. *</td>
						<td class="padding_right"><input class="form-control" type="text" name="contact_no" id="contact_no"/></td>
					</tr>
					<tr>
						<td class="padding_left">Username / Email Address *</td>
						<td class="padding_right"><input class="form-control" type="email" name="email_add" id="email_add" placeholder="Enter email address"/></td>
					</tr>
					

					<tr>
						<td class="padding_left">Account Activation*</td>
						<td style="padding-left: 6px;">
							<div id="radioset">
								<input type="radio" id="radio1" name="status" value="activate" checked><label for="radio1">Activate</label>
								<input type="radio" id="radio3" name="status" value="deactivate"><label for="radio3">Deactivate</label>
							</div>
						</td>
					</tr>
				
				</table>
					<input type="hidden" id="password" name="password" value=<?php echo $gen_password;?>>
				<!--<table border="0"style="text-align:center; margin: 0 auto;">
					<tr>
						<td><input type="hidden" id = "u_id" /></td>
						<td><input type="hidden" id = "cur_p" /></td>
						<td style="padding-right: 3px;"><input type="button" id="btn_submit" value="Save"/></td>
						<td style="padding-left: 3px;"><input id="btn_cancel" type="button" value="Cancel"/></td>
					</tr>
				</table> -->
	  
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