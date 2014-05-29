<?php
	include('var_functions.php'); 
	$var_func = new var_functions();

	$is_allowed = $var_func->check_user_access('sysad_report');
	
	//var_dump($var_func->join_string(array('staff','crew'))); die();
	if($is_allowed != 1){
	  echo "Authentication of user failed.";die();
	}
  // var_dump($_POST);die();
 // echo "<pre>", var_dump(json_decode($_POST['data'],true)), "</pre>";die();
   $data = json_decode($_POST['data'],true);

 //echo "<pre>", var_dump($data), "</pre>";die();
?>
<html >

<head>

<script src="js/jquery-1.9.1.js" type="text/javascript" language="javascript"></script>

<script src="js/advancedtable_v2.js" type="text/javascript" language="javascript"></script>
	
<script src="js/jquery-ui.js" type="text/javascript" language="javascript"></script>
<script src="js/home.js" type="text/javascript" language="javascript"></script>
<script src="js/is_loading.js" type="text/javascript" language="javascript"></script>
<script language="javascript" type="text/javascript">

	$(document).ready(function() {
		$('select').children().remove();
		$("#searchtable").show();

		$("table#sysad_report").advancedtable({searchField: "#search", loadElement: "#loader", searchCaseSensitive: false, ascImage: "css/images/up.png", descImage: "css/images/down.png", searchOnField: "#searchOn"});
	});

</script>

<!--<link href="css/style.css" rel="stylesheet" type="text/css" />-->

<link href="css/advancedtable.css" rel="stylesheet" type="text/css" />

<style>

#searchtable td select, input#search {
	padding: 6px 12px;
	font-size: 14px;
	line-height: 1.428571429;
	color: #555555;
	background-color: #ffffff;
	background-image: none;
	border: 1px solid #cccccc;
	border-radius: 4px;
	-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	-webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
	transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
}

</style>

</head>

<body>

     <table class="normal" id="searchtable" border="0" cellspacing="4" cellpadding="0" style="display:none; width: 100%; margin-bottom: 10px;">
       <tr>
         <td width="80%">Search / Filter by Columns:  <select id="searchOn" name="searchOn" style="display:none;"/>&nbsp;&nbsp;<input name="search" type="text" id="search" style="display:none;" /></td>
         <td width="20%"><div id="loader" style="display:none;"><img src="css/images/loader.gif" alt="Laoder" /></div></td>
       </tr>
	<!--   <tr>
	        <td width="80%">Search / Filter by Date: <input type="date" id= "from_date" placeholder="From Date:"> <input type="date" id= "to_date"  placeholder="To Date:"></td>
	   </tr>-->
     </table><!-- /searchtable -->

     <table width="100%" id="sysad_report" class="advancedtable" border="0" cellspacing="0" cellpadding="0">

     <thead>

		<tr>
			<th>Restaurant Name</th>
			<th>Admin Name</th>
			<th>Contact no.</th>
			<th>Address</th>
			<th>No. of Orders</th>
		</tr>

     </thead>

       <tbody>

       <h5 id= 'total_rest'>Total Restaurant: <?php echo $data['count_rest']; ?></h5>
	   <h5 id= 'total_branch'>Total Branches: <?php echo $data['count_branches']; ?></h5>
	   <h5 id= 'total_orders'>Total Orders: <?php echo $data['count_orders']; ?></h5>
<?php 	foreach($data['lists'] as $info){ ?>

			<tr id = "<?php echo $info['user_id'];?>">
				<td>
				 <?php 
				   echo ucwords($info['restaurant']);
				  // $name = $var_func->join_string(array($info['fname'],$info['mname'],$info['lname']));
				   //echo $name;
				 
				 ?>
				</td>
				<td>
				 <?php echo ucfirst($info['admin_fname']).' '.ucfirst($info['admin_lname'])?>
				</td>
				<td>
				 <?php echo $info['restaurant_contact_no'];?>
				</td>
				<td>
				 <?php echo $info['restaurant_address'];?>
				</td>
				<td>
				 <?php echo $info['order_count'];?>
				</td>
	
				
			</tr>

   
	   <?php
	   } 
	   ?>

       </tbody>

     </table><!-- /staff -->


   

</div>
<div id='dialog_staff'>

</div>
</body></html>
 