<?php 
	require_once('scripts.php'); 
	require_once('conn.php');
?>

<html>
	<body>
		<form id='manage_product' style='width: 80%; margin: 0 auto;' class="form-horizontal">
			  <div class="form-group">
				<label for="inp_menu_image" class="col-sm-3 control-label">Image</label>
				<div class="col-sm-8">
				  <input type="file" class="form-control" id="inp_menu_image" name="inp_menu_image" /> 
				</div>
			  </div>
			  <div class="form-group">
				<label for="inp_menu_name" class="col-sm-3 control-label">Name</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="inp_menu_name"  name="inp_menu_name"  >
				</div>
			  </div>
			  <div class="form-group">
				<label for="inp_menu_desc" class="col-sm-3 control-label">Description</label>
				<div class="col-sm-8">
				  <textarea class="form-control" rows="3" id="inp_menu_desc" name="inp_menu_desc"></textarea>
				</div>
			  </div>
			  <div class="form-group">
				<label for="inp_menu_price" class="col-sm-3 control-label">Price</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="inp_menu_price" name="inp_menu_price" >
				</div>
			  </div>
			  <div class="form-group">
				<label for="inp_menu_qty" class="col-sm-3 control-label">Quantity</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="inp_menu_qty" name="inp_menu_qty" >
				</div>
			  </div>
			  <div class="form-group">
				<label for="inp_menu_uom" class="col-sm-3 control-label">Unit Of Measurement</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="inp_menu_uom" name="inp_menu_uom" >
				</div>
			  </div>
			  <div class="form-group">
				<label for="inp_menu_cat" class="col-sm-3 control-label">Category</label>
				<div class="col-sm-8">
				  <select class="form-control" id="inp_menu_cat" name="inp_menu_cat" ></select>
				</div>
			  </div>
			  <div class="form-group">
				<label for="inp_menu_status" class="col-sm-3 control-label">Menu Status</label>
				<div class="col-sm-8">
					<div class="btn-group">
					  <button type="button" class="btn btn-default rad" id="1" >Available</button>
					  <button type="button" class="btn btn-default rad" id="0">Unavailable</button>
					</div>
				  <input type="hidden" class="form-control" id="inp_menu_status" name="inp_menu_status" >
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-offset-3 col-sm-8">
				  <button id='btn_submit_product' type='button' class="btn btn-default">Submit Product</button>
				</div>
			  </div>	
			  <div id='img_base_container' style='display:none;'></div>
			  <div id='dialog-form-category' style='display:none;'>
				  <div class="form-group">
					<label for="inp_menu_cat_others" class="col-sm-12 control-label">Other Category</label>
					<div class="col-sm-12">
					  <input type="text" class="form-control" id="inp_menu_cat_others" name="inp_menu_cat_others" />
					</div>
				  </div>
			  </div>
		<form>
	</body>
</html>