<?php 
	require_once('scripts.php'); 
	require_once('conn.php');

?>

<html>

	<body>
	
	<table>
		<tr>
			<td><a class="btn_edit btn btn-default" id="add_product"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New Product</a></td>
		</tr>
	</table>
	<table class="normal" id="searchtable" border="0" cellspacing="4" cellpadding="0" style="display:none; width: 100%; margin-bottom: 10px;">
       <tr>
         <td width="80%">Search / Filter:  <select id="searchOn" name="searchOn" style="display:none;"/>&nbsp;&nbsp;<input name="search" type="text" id="search" style="display:none;" /></td>
         <td width="20%"><div id="loader" style="display:none;"><img src="css/images/loader.gif" alt="Laoder" /></div></td>
       </tr>
     </table><!-- /searchtable -->
	<form id='product_search'>
		 
		<div class='row'>
		  <div class="col-xs-12 col-sm-12 col-md-12 " >
			<div class="input-group" style='padding: 7px; margin: 0 14px;'>
			  <input type="text" class="form-control input-lg" placeholder="Leave this blank to view all products.." name='inp_search' id='inp_search'>
			  <span class="input-group-btn">
				<button class="btn btn-default btn-lg" type="button" id='btn_search'>
					<span class="glyphicon glyphicon-search"></span> Search</button>
			  </span>
			  
			</div><!-- /input-group -->
		  </div><!-- /.col-lg-6 -->
		</div><!-- /.row -->
		
		<div id="search_result" class='table-responsive'></div>
		<div id='dialog-form'></div>
		<div id='dialog-confirm'></div>
	<form>
	
	</body>
</html>