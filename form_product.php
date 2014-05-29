<?php 
	require_once('scripts.php'); 
	require_once('conn.php');
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style>
			#radioset_status span, #radioset_promo span, #radioset_latest_product span,#radioset_best_seller span {
			  font-weight: initial;
			  font-family: Calibri;
			  font-size: initial;
			 }

			#radioset_status label, #radioset_promo label, #radioset_latest_product label, #radioset_best_seller label {
			  width: 50%;
			 }
			
		</style>
		<script>
			$(function() {
				  $( "#radioset_best_seller" ).buttonset();
				  $( "#radioset_latest_product" ).buttonset();
				  $( "#radioset_promo" ).buttonset(); 
				  $( "#radioset_status" ).buttonset();
			});
		</script>
		
	</head>
	<body>
		<form id='manage_product' style='width: 80%; margin: 0 auto;' class="form-horizontal">
			  <div class="form-group">
				<label for="inp_menu_image" class="col-sm-3 control-label">Image</label>
				<div class="col-sm-8">
				  <input type="file" class="form-control" id="inp_menu_image" name="inp_menu_image" /> 
				</div>
			  </div>
			  <div class="form-group">
				<label for="inp_menu_name" class="col-sm-3 control-label">Title</label>
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
				<label for="inp_old_menu_price" class="col-sm-3 control-label">Old Price</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="inp_old_menu_price" name="inp_old_menu_price" >
				</div>
			  </div>
			  <div class="form-group">
				<label for="inp_new_menu_price" class="col-sm-3 control-label">New Price</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="inp_new_menu_price" name="inp_new_menu_price" >
				</div>
			  </div>
			  <div class="form-group">
				<label for="inp_discount" class="col-sm-3 control-label">Discount</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="inp_discount" name="inp_discount" >
				</div>
			  </div>
			  <div class="form-group">
				<label for="inp_menu_qty" class="col-sm-3 control-label">Quantity</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="inp_menu_qty" name="inp_menu_qty" >
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="menu_class" class="col-sm-3 control-label">Class</label>
				<div class="col-sm-8">
				<select class="form-control" id="inp_menu_class" name="inp_menu_class"></select> 
				</div>
			  </div>
			  <div class="form-group">
				<label for="inp_menu_cat" class="col-sm-3 control-label">Category</label>
				<div class="col-sm-8">
				  <select class="form-control" id="inp_menu_cat" name="inp_menu_cat" ></select>
				</div>
			  </div>
			  
			  <div class="form-group">			  
			   <label for="lbl_latest_product" class="col-sm-3 control-label">Latest Product</label>
			   <div class="col-sm-8">
					<div id="radioset_latest_product">
					 <input type="radio" id="rad_latest_product_1" name="rad_latest_product" value="enable" checked ><label for="rad_latest_product_1">Enable</label>
					 <input type="radio" id="rad_latest_product_2" name="rad_latest_product" value="disable" ><label for="rad_latest_product_2">Disable</label>
					</div>
			   </div>
			  </div>
			  <div class="form-group">			  
			   <label for="lbl_best_seller" class="col-sm-3 control-label">Best Seller</label>
			   <div class="col-sm-8">
					<div id="radioset_best_seller">
					 <input type="radio" id="rad_best_seller_1" name="rad_best_seller" value="enable" ><label for="rad_best_seller_1">Enable</label>
					 <input type="radio" id="rad_best_seller_2" name="rad_best_seller" value="disable" checked><label for="rad_best_seller_2">Disable</label>
					</div>
			   </div>
			  </div>
			  <div class="form-group">			  
			   <label for="lbl_promo" class="col-sm-3 control-label">Promo</label>
			   <div class="col-sm-8">
					<div id="radioset_promo">
					 <input type="radio" id="rad_promo_1" name="rad_promo" value="enable" ><label for="rad_promo_1">Enable</label>
					 <input type="radio" id="rad_promo_2" name="rad_promo" value="disable" checked><label for="rad_promo_2">Disable</label>
					</div>
			   </div>
			  </div>
			  
			  <div class="form-group">
				<label for="inp_menu_uom" class="col-sm-3 control-label">Unit Of Measurement</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="inp_menu_uom" name="inp_menu_uom" >
				</div>
			  </div>
			  
			  
			  <div class="form-group">			  
			   <label for="lbl_status" class="col-sm-3 control-label">Status</label>
			   <div class="col-sm-8">
					<div id="radioset_status">
					 <input type="radio" id="rad_status_1" name="rad_status" value="enable" ><label for="rad_status_1">Enable</label>
					 <input type="radio" id="rad_status_2" name="rad_status" value="disable" checked><label for="rad_status_2">Disable</label>
					</div>
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